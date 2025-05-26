<?php

namespace App\Jobs;

use App\Mail\SendMail;
use FFMpeg as FFMpeg;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Sightengine\SightengineClient;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class VideoModerationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '18048M');
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $data = $this->data;
        $videoPath = $data['videoPath'];
        $user_id  = $data['user_id'];
        $video_duration = $data['video_duration'];
        $v_path = $data['v_path'];
        $video_id = $data['video_id'];

        $ffmpeg = FFMpeg\FFMpeg::create(array(
            'ffmpeg.binaries'  => config('app.ffmpeg'),
            'ffprobe.binaries' => config('app.ffprobe'),
            'timeout'          => 3600, // The timeout for the underlying process
            'ffmpeg.threads'   => 12, // The number of threads that FFMpeg should use
        ));
        $ffprobe =  FFMpeg\FFProbe::create(array(
            'ffmpeg.binaries'  => config('app.ffmpeg'),
            'ffprobe.binaries' => config('app.ffprobe'),
            'timeout'          => 3600, // The timeout for the underlying process
            'ffmpeg.threads'   => 12, // The number of threads that FFMpeg should use
        ));

        $nsfw = DB::table("nsfw_settings")->where("ns_id", 1)->first();
        $nudity = array();
        if ($nsfw) {
            if ($nsfw->status == 1) {
                $nsfw_filters = [];
                if ($nsfw->nudity == 1) {
                    $nsfw_filters[] = 'nudity';
                }
                if ($nsfw->wad == 1) {
                    $nsfw_filters[] = 'wad';
                }
                if ($nsfw->offensive == 1) {
                    $nsfw_filters[] = 'offensive';
                }
                if ($nsfw->api_key != '' && $nsfw->api_secret != '') {
                    $client = new SightengineClient($nsfw->api_key, $nsfw->api_secret);

                    $pic_frames = array();
                    $secds = 0;
                    $images = [];
                    do {

                        $pic_frames[] = $secds;
                        $secds = $secds + 3;
                    } while ($secds < $video_duration);
                    // dd($pic_frames);
                    foreach ($pic_frames as $key => $seconds) {
                        $video = $ffmpeg->open($v_path);
                        $video
                            ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(0))
                            ->save(storage_path('app/' . $videoPath . '/' . "thumb_{$key}.jpg"));
                        //   $mediaOpener = $mediaOpener->getFrameFromSeconds($seconds)
                        //   ->export()
                        //   ->save('public/videos/'.$this->authUser->user_id.'/'."thumb_{$key}.jpg");
                        // $imgName = storage_path('app/'.$videoPath.'/'."thumb_{$key}.jpg");
                        $imgName = asset(Storage::disk('local')->url($videoPath . '/' . "thumb_{$key}.jpg"));
                        $images[] = 'public/videos/' . $user_id . '/' . "thumb_{$key}.jpg";
                        try {

                            $output = $client->check($nsfw_filters)->set_url($imgName);
                            // dd($output);
                            if ($output->status == "success") {
                                if (in_array('wad', $nsfw_filters)) {
                                    if ($output->weapon > 0.50) {
                                        $nudity[] = $imgName;
                                        break;
                                    } elseif ($output->alcohol > 0.50) {
                                        $nudity[] = $imgName;
                                        break;
                                    } elseif ($output->drugs > 0.50) {
                                        $nudity[] = $imgName;
                                        break;
                                    }
                                }
                                if (in_array('nudity', $nsfw_filters)) {
                                    if (isset($output->nudity)) {
                                        $raw_nudity = $output->nudity;
                                        if ($raw_nudity->raw > 0.50) {
                                            $nudity[] = $imgName;
                                            break;
                                        }
                                    }
                                }

                                if (in_array('offensive', $nsfw_filters)) {
                                    if (isset($output->offensive)) {
                                        $offensive = $output->offensive;
                                        if ($offensive->prob > 0.50) {
                                            $nudity[] = $imgName;
                                            break;
                                        }
                                    }
                                }
                            } else {
                                echo "fail";
                            }
                        } catch (ClientException $e) {
                              \Log::info($e);
                            $msg = $e->getResponse()->getReasonPhrase();
                            $mail_settings = DB::table("mail_settings")->where("m_id", 1)->first();
                            if ($mail_settings) {
                                $company_settings = DB::table("settings")->where("setting_id", 1)->first();
                                $admin_email = $company_settings->site_email;
                                $site_name = $company_settings->site_name;
                                $from_email = $mail_settings->from_email;
                                $mailBody = '
                                      <b style="font-size:16px;color:#333333;margin:0;padding-bottom:10px;text-transform:capitalize">
                                      Video Moderation API warning
                                      </b>
                                      <p style="color:#333333;font-size:16px;line-height:24px;margin:0;padding-bottom:23px">
                                      ' . $msg . '
                                      </p>
                                      <p style="color:#333333;font-size:16px;line-height:24px;margin:0;padding-bottom:23px">Thank you</p>
                                      <p style="color:#333333;font-size:16px;line-height:24px;margin:0;padding-bottom:23px">' . $site_name . '</p>
                                      ';
                                // dd($mailBody);
                                // $ref_id
                                $from_email = config("app.from_mail");
                                $array = array('subject' => $site_name . ' - Video Moderation API warning', 'view' => 'emails.site.company_panel', 'body' => $mailBody);
                                if (filter_var($from_email, FILTER_VALIDATE_EMAIL)) {
                                    $array['from'] = $from_email;
                                }
                                // dd(strpos($_SERVER['SERVER_NAME'], "local"));
                                // if (strpos($_SERVER['SERVER_NAME'], "localhost") === false && strpos($_SERVER['SERVER_NAME'], "slikewebpanel.local") === false) {
                                    Mail::to($admin_email)->send(new SendMail($array));
                                // }
                            }
                            break;
                        }
                    }
                    foreach ($images as $val) {
                        Storage::disk('local')->delete($val);
                        // unlink($val);
                    }
                }
            }
        }

        if (count($nudity) > 0) {
            DB::table('videos')->where('video_id', $video_id)->update(['flag' => 1]);
        }
    }
}
