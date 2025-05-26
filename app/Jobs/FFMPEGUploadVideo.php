<?php

namespace App\Jobs;

use App\Models\User;
use FFMpeg as FFMpeg;
use Illuminate\Http\File;
use FFMpeg\Format\Video\X264;
use FFMpeg\Format\Video\X265;
use Illuminate\Bus\Queueable;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class FFMPEGUploadVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    public $timeout = 120;
    public $tries = 5;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '18048M');

    }

    /**
     * Execute the job.
     */
    public function handle()
    {
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
        $data = $this->data;
        $vidoeFilePath = $data['vidoeFilePath'];
        $audioFilePath = $data['audioFilePath'];
        $watermarkPath = $data['watermarkPath'];
        $fileType = $data['fileType'];
        $audioStorePath = $data['audioStorePath'];
        $storageDrive = $data['storageDrive'];
        $s3AudioFolder = $data['s3AudioFolder'];
        $s3AudioFileName = $data['s3AudioFileName'];
        $videoStorePath = $data['videoStorePath'];
        $thumbStorePath = $data['thumbStorePath'];
        $s3ThumbFolder = $data['s3ThumbFolder'];
        $s3ThumbFileName = $data['s3ThumbFileName'];
        $s3VideoFolder = $data['s3VideoFolder'];
        $s3VideoFileName = $data['s3VideoFileName'];
        $s3VideoFolder = $data['s3VideoFolder'];
        $s3VideoFolder = $data['s3VideoFolder'];
        $user_id = isset($data['user_id']) ? $data['user_id'] : 0;
        $time_folder = $data['time_folder'];
        $video_id = isset($data['video_id']) ? $data['video_id'] : 0;
        $sound_id = isset($data['sound_id']) ? $data['sound_id'] : 0;


        if ($vidoeFilePath != "" && $audioFilePath == "" && $watermarkPath == "") {
            // watermark (no) and audio(no)
            if ($fileType == 'V') {
                // $streamCount = $ffprobe->streams($vidoeFilePath)->audios()->count();
                \Log::info('Upload Video '.$vidoeFilePath);
                // if ($streamCount > 0) {
                if ($sound_id == 0) {
                    ExtractAudioJob::dispatch($vidoeFilePath, $user_id, $video_id, $time_folder, $storageDrive, $audioStorePath, $s3AudioFolder, $s3AudioFileName);
                }
                //     $audio = $ffmpeg->open($vidoeFilePath);
                //     $audio_format = new FFMpeg\Format\Audio\Mp3();

                //     $audio->save($audio_format, $audioStorePath);


                //     $duration = $ffprobe
                //         ->streams($audioStorePath)
                //         ->audios()
                //         ->first()
                //         ->get('duration');
                //     // dd($duration);
                //     $audio_duration = round($duration);

                //     $track = new GetId3(new File($audioStorePath));

                //     $title = $track->getTitle();
                //     $album = $track->getAlbum();
                //     $artist = $track->getArtist();


                //     $audioData = array(
                //         'user_id' => $user_id,
                //         'cat_id' => 0,
                //         'title'     => ($title != null) ? $title : "",
                //         'album'     => ($album != null) ? $album : "",
                //         'artist'    => ($artist != null) ? $artist : "",
                //         'sound_name' => $time_folder . '.mp3',
                //         // 'tags'     => $hashtags,
                //         'duration' => $audio_duration,
                //         'used_times' => 1,
                //         'created_at' => date('Y-m-d H:i:s')
                //     );

                //     $s_id = DB::table('sounds')->insertGetId($audioData);
                //     $sound_id = $s_id;

                //     DB::table('videos')->where('video_id', $video_id)->update([
                //         'sound_id' => $sound_id
                //     ]);

                //     if ($storageDrive == 's3') {
                //         $file = new File($audioStorePath);
                //         Storage::putFileAs($s3AudioFolder, $file, $s3AudioFileName);
                //         Storage::setVisibility($s3AudioFolder . '/' . $s3AudioFileName, 'public');

                //         unlink(storage_path('app/public/sounds/' . $user_id . '/' . $time_folder . '.mp3'));
                //     }
                // } else {
                //     $response = array("status" => "error", 'msg' => 'video format invalid.Please choose another video.');
                //     return $response;
                // }
            }

            // /////////////
            $video = $ffmpeg->open($vidoeFilePath);
            $format = new FFMpeg\Format\Video\X264();
            $format->setAudioCodec("aac");
            $format->setAdditionalParameters(array('-vf', "scale='min(560,iw)':-2,setsar=1:1",'-pix_fmt','yuv420p','-preset', 'veryslow'));
            // $format->setAdditionalParameters(array('-vf', 'scale=720:-2', '-preset', 'veryslow'));
            $video
                ->save($format, $videoStorePath);

            // $format = new X265();
            // $format->setAudioCodec("aac");
            // $format->setAdditionalParameters(array('-vf', 'scale=720:-2', '-preset', 'ultrafast', '-tag:v', 'hvc1'));
            // $video->save($format, $videoStorePath);

            // Storage::setVisibility('public/temp/' . $time_folder . '.mp4', 'public');
            // ///////

            $video = $ffmpeg->open($vidoeFilePath);
            $video
                ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(0))
                ->save($thumbStorePath);
            if ($storageDrive == 's3') {
                $img = new File($thumbStorePath);
                Storage::putFileAs($s3ThumbFolder, $img, $s3ThumbFileName);
                Storage::setVisibility($s3ThumbFolder . '/' . $s3ThumbFileName, 'public');
                unlink($thumbStorePath);

                $video = new File($videoStorePath);
                Storage::disk('s3')->putFileAs($s3VideoFolder, $video, $s3VideoFileName);
                Storage::disk('s3')->setVisibility($s3VideoFolder . '/' . $s3VideoFileName, 'public');
            }
        } elseif ($vidoeFilePath != "" && $audioFilePath != "" && $watermarkPath == "") {

            // watermark no and audio yes
            // $advancedMedia = $ffmpeg->openAdvanced(array($audioFilePath, $vidoeFilePath));

            // $advancedMedia->filters()
            //     ->custom('[1:v]', 'scale=720:-2', '[v]');

            // $advancedMedia
            //     ->map(array('0:a', '[v]'), new X264('aac', 'libx264'), $videoStorePath);

            // $advancedMedia->save();


            $video = $ffmpeg->open($vidoeFilePath);
            $video
                ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(0))
                ->save($thumbStorePath);
            if ($storageDrive == 's3') {
                $img = new File($thumbStorePath);
                Storage::putFileAs($s3ThumbFolder, $img, $s3ThumbFileName);
                Storage::setVisibility($s3ThumbFolder . '/' . $s3ThumbFileName, 'public');
                unlink($thumbStorePath);
            }

            if ($storageDrive == 's3') {
                $video = new File($videoStorePath);
                Storage::disk('s3')->putFileAs($s3VideoFolder, $video, $s3VideoFileName);
                Storage::disk('s3')->setVisibility($s3VideoFolder . '/' . $s3VideoFileName, 'public');
            }
        } elseif ($vidoeFilePath != "" && $audioFilePath == "" && $watermarkPath != "") {
            $streamCount = $ffprobe->streams($vidoeFilePath)->audios()->count();

            if ($streamCount > 0) {
                $video = $ffmpeg->open($vidoeFilePath);
                $audio_format = new FFMpeg\Format\Audio\Mp3();

                $video->save($audio_format, $audioStorePath);

                if ($storageDrive == 's3') {
                    $file = new File($audioStorePath);
                    Storage::putFileAs($s3AudioFolder, $file, $s3AudioFileName);
                    Storage::setVisibility($s3AudioFolder . '/' . $s3AudioFileName, 'public');

                    unlink(storage_path('app/public/sounds/' . $user_id . '/' . $time_folder . '.mp3'));
                }
            } else {
                $response = array("status" => "error", 'msg' => 'video format invalid.Please choose another video.');
                return $response;
            }

            // $advancedMedia = $ffmpeg->openAdvanced(array($watermarkPath, $vidoeFilePath));
            // $advancedMedia->filters()
            //     // ->custom('[1:v]', 'overlay=W-w-5:5', '[v]');
            //     ->custom('[1:v]scale=720:-2,', 'overlay=W-w-55:40', '[v]');
            // $advancedMedia
            //     ->map(array('1:a', '[v]'), new X264('aac', 'libx264'), $videoStorePath);
            // $advancedMedia->save();


            $video = $ffmpeg->open($vidoeFilePath);
            $video
                ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(0))
                ->save($thumbStorePath);
            if ($storageDrive == 's3') {
                $img = new File($thumbStorePath);
                Storage::putFileAs($s3ThumbFolder, $img, $s3ThumbFileName);
                Storage::setVisibility($s3ThumbFolder . '/' . $s3ThumbFileName, 'public');
                unlink($thumbStorePath);
            }

            if ($storageDrive == 's3') {
                $video = new File($videoStorePath);
                Storage::disk('s3')->putFileAs($s3VideoFolder, $video, $s3VideoFileName);
                Storage::disk('s3')->setVisibility($s3VideoFolder . '/' . $s3VideoFileName, 'public');
            }
        } elseif ($vidoeFilePath != "" && $audioFilePath != "" && $watermarkPath != "") {
            // watermark yes and audio yes
            // $advancedMedia = $ffmpeg->openAdvanced(array($watermarkPath, $audioFilePath, $vidoeFilePath));

            // $advancedMedia->filters()
            //     ->custom('[2:v]scale=720:-2,', 'overlay=W-w-55:40', '[v]');
            // $advancedMedia
            //     ->map(array('1:a', '[v]'), new X264('aac', 'libx264'), $videoStorePath);
            // $advancedMedia->save();


            $video = $ffmpeg->open($vidoeFilePath);
            $video
                ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(0))
                ->save($thumbStorePath);
            if ($storageDrive == 's3') {
                $img = new File($thumbStorePath);
                Storage::putFileAs($s3ThumbFolder, $img, $s3ThumbFileName);
                Storage::setVisibility($s3ThumbFolder . '/' . $s3ThumbFileName, 'public');
                unlink($thumbStorePath);
            }

            if ($storageDrive == 's3') {
                $video = new File($videoStorePath);
                Storage::disk('s3')->putFileAs($s3VideoFolder, $video, $s3VideoFileName);
                Storage::disk('s3')->setVisibility($s3VideoFolder . '/' . $s3VideoFileName, 'public');
            }
        }

        DB::table('videos')->where('video_id', $video_id)->update([
            'video' => $time_folder . '/' . $s3VideoFileName,
            'thumb' => $time_folder . '.jpg',
            'active' => 1
        ]);
        $dataArr['v_path'] = $videoStorePath;
        $dataArr['video_id'] = $video_id;
        $dataArr['video_path'] = $time_folder . '/' . $s3VideoFileName;
        $dataArr['user_id'] = $user_id;
        $dataArr['time_folder'] = $time_folder;
        // UpdateDurationAndRation::dispatch($dataArr);

        $notificationArr['user_id'] = $user_id;
        $notificationArr['video_id'] = $video_id;
        SendVideoNotificationJob::dispatch($notificationArr);

        // // notification
        // $video = DB::table('videos')->where('video_id', $video_id)->first();
        // // $users = DB::table("users as u")->select(DB::raw("GROUP_CONCAT(u.user_id) as user_ids"))
        // $users = DB::table("users as u")
        //     ->leftJoin('follow as f', function ($join) {
        //         $join->on('u.user_id', '=', 'f.follow_to');
        //         // ->where('f.follow_by',$request->login_id);
        //     })
        //     ->leftJoin('follow as f2', function ($join) use ($user_id) {
        //         $join->on('u.user_id', '=', 'f2.follow_to')
        //             ->where('f2.follow_by', $user_id);
        //     });
        // if ($user_id > 0) {
        //     $users = $users->leftJoin('blocked_users as bu', function ($join) use ($user_id) {
        //         $join->on('u.user_id', '=', 'bu.user_id');
        //         $join->where("bu.blocked_by", $user_id);
        //         // $join->whereRaw(DB::raw(" ( bu.blocked_by=" . $user_id . " )"));
        //     });

        //     $users = $users->leftJoin('blocked_users as bu2', function ($join) use ($user_id) {
        //         $join->on('u.user_id', '=', 'bu2.blocked_by');
        //         $join->where("bu2.user_id", $user_id);
        //         // $join->whereRaw(DB::raw(" (  bu2.user_id=" . $user_id . " )"));
        //     });

        //     $users = $users->whereRaw(' bu.block_id is null and bu2.block_id is null ');
        // }
        // $users = $users->where('f.follow_to', '<>', $user_id);
        // $users = $users->where('f.follow_by', $user_id)
        //     ->where("u.deleted", 0)
        //     ->where("u.active", 1);

        // $users = $users->orderBy('u.user_id', 'desc');
        // // $users = $users->first();
        // $users = $users->get()->pluck('user_id')->toArray();

        // $userRec = User::find($user_id);
        // $title = $userRec->fname . ' ' . $userRec->lname;
        // $body = 'Upload new video ' . $video->description;
        // $videoPath = 'public/videos/' . $user_id;
        // $videoThumbPath = storage_path('app/' . $videoPath . '/thumb/' . $video->thumb);
        // $img = $videoThumbPath;
        // $SERVER_API_KEY = config('app.server_api_key');
        // if (count($users) > 0) {
        //     // dd($users);
        //     // $user_ids = explode(',', $users->user_ids);
        //     $user_ids = $users;
        //     // dd($user_ids);
        //     $firebaseToken = User::where('fcm_token', '<>', '')->whereIn('user_id', $user_ids)->pluck('fcm_token')->all();
        //     // }

        //     $json_data = [
        //         "registration_ids" => $firebaseToken,
        //         "notification" => [
        //             "body" => $body,
        //             "title" => $title,
        //             "icon" => $img
        //         ],
        //         "data" => [
        //             "title" => $title,
        //             "body" => $body,
        //             "id" => $video_id,
        //             "type" => 'video',
        //             "image" => $img,
        //             'msg' => 'masssss',
        //             "name" => 'nammmeees'
        //         ],
        //         "click_action" => 'FLUTTER_NOTIFICATION_CLICK'
        //     ];
        //     $data = json_encode($json_data);
        //     // dd($data);
        //     //FCM API end-point
        //     $url = 'https://fcm.googleapis.com/fcm/send';
        //     //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        //     // $server_key = 'YOUR_KEY';
        //     //header with content_type api key
        //     $headers = array(
        //         'Content-Type:application/json',
        //         'Authorization:key=' . $SERVER_API_KEY
        //     );
        //     //CURL request to route notification to FCM connection server (provided by Google)
        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $url);
        //     curl_setopt($ch, CURLOPT_POST, true);
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //     $result = curl_exec($ch);
        //     // 			dd($result);
        //     if ($result === FALSE) {
        //         die('Oops! FCM Send Error: ' . curl_error($ch));
        //     }
        // }
        // //end notification


        // // video uploaded notification
        // $myToken = User::where('fcm_token', '<>', '')->where('user_id', $user_id)->pluck('fcm_token')->all();
        // if ($myToken) {
        //     // $title = auth()->guard('api')->user()->fname . ' ' . auth()->guard('api')->user()->lname;
        //     $body = 'Your video uploaded successfully!';

        //     $json_data = [
        //         "registration_ids" => $myToken,
        //         "notification" => [
        //             "body" => $body,
        //             "title" => $title,
        //             "icon" => $img
        //         ],
        //         "data" => [
        //             "title" => $title,
        //             "body" => $body,
        //             "id" => $video_id,
        //             "type" => 'video',
        //             "image" => $img,
        //             'msg' => 'masssss',
        //             "name" => 'nammmeees'
        //         ],
        //         "click_action" => 'FLUTTER_NOTIFICATION_CLICK'
        //     ];
        //     $data = json_encode($json_data);
        //     // dd($data);
        //     //FCM API end-point
        //     $url = 'https://fcm.googleapis.com/fcm/send';
        //     //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        //     // $server_key = 'YOUR_KEY';
        //     //header with content_type api key
        //     $headers = array(
        //         'Content-Type:application/json',
        //         'Authorization:key=' . $SERVER_API_KEY
        //     );
        //     //CURL request to route notification to FCM connection server (provided by Google)
        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $url);
        //     curl_setopt($ch, CURLOPT_POST, true);
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //     $result = curl_exec($ch);
        //     // 			dd($result);
        //     if ($result === FALSE) {
        //         die('Oops! FCM Send Error: ' . curl_error($ch));
        //     }
        // }
        // // end video uploaded notification

    }
}
