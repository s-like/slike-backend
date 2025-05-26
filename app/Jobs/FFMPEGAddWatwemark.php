<?php

namespace App\Jobs;

use FFMpeg;
use Illuminate\Http\File;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class FFMPEGAddWatwemark implements ShouldQueue
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
        $videoStorePath = $data['videoStorePath'];
        $watermarkPath = $data['watermarkPath'];
        $storageDrive = $data['storageDrive'];
        $s3VideoFolder = $data['s3VideoFolder'];
        $s3VideoFileName = $data['s3VideoFileName'];
        $video_id = $data['video_id'];

        \Log::info('FFMPEGAddWatwemark ' . $vidoeFilePath);
       

        $time = time();
        $path_output = explode('.', $videoStorePath);
        $path_output = $path_output[0] . time() . '.mp4';

        try {
            // add water mark
            $format = new X264();
            $advancedMedia = $ffmpeg->openAdvanced(array($vidoeFilePath, $watermarkPath));
            // $advancedMedia->filters()
            //     ->custom('[1][0]scale2ref=w=oh*mdar:h=ih*0.05[logo][video];[video][logo]', "overlay=x='if(lt(mod(t\,16)\,8)\,W-w-W*10/100\,W*10/100)':y='if(lt(mod(t+4\,16)\,8)\,H-h-H*5/100\,H*5/100)'", '[v]', '-preset', 'ultrafast', '-tag:v', 'hvc1');
            $advancedMedia->filters()
                ->custom('[1][0]scale2ref=w=oh*mdar:h=ih*0.05[logo][video];[video][logo]', "overlay=x='if(lt(mod(t\,16)\,8)\,W-w-W*10/100\,W*10/100)':y='if(lt(mod(t+4\,16)\,8)\,H-h-H*5/100\,H*5/100)'", '[v]', '-preset', 'ultrafast');
            $advancedMedia
                ->map(array('0:a', '[v]'), $format, $path_output);
            $advancedMedia->save();

            $vidoeFilePath = $path_output;
            // end add water mark

            $video_bit =  $ffprobe
                ->streams($vidoeFilePath)   // extracts streams informations
                ->videos()                      // filters video streams
                ->first();

            $path2 = asset(Storage::disk('local')->url('public/mooby.mp4'));
            $width = $video_bit->get('width');
            $height = $video_bit->get('height');
            $r_frame_rate = $video_bit->get('r_frame_rate');
            // $framerate = $r_frame_rate[0];
            // $gop = $r_frame_rate[1];
            if ($width > $height) {
                $path2 = asset(Storage::disk('local')->url('public/moobyH.mp4'));
            }

            $gif_output = storage_path("app/public/temp/gif" . $time . ".mp4");

            // create logo video
            $video = $ffmpeg->open($path2);
            $video
                ->filters()
                ->framerate(new FFMpeg\Coordinate\FrameRate($r_frame_rate), 1)
                // ->custom('setdar='.$sample_aspect_ratio)
                ->resize(new FFMpeg\Coordinate\Dimension($width, $height))
                ->synchronize();

            $video
                ->save(new X264('aac'), $gif_output);
            // end create logo video

            // concat
            $advancedMedia = $ffmpeg->openAdvanced(array($vidoeFilePath, $gif_output));
            $advancedMedia->filters()
                ->custom("[0:v]setsar=1[v0];[1:v]setsar=1[v1];[v0][0:a:0][v1][1:a:0]", "concat=n=2:v=1:a=1", '[outv][outa]');
            $advancedMedia
                ->map(array('[outv]', '[outa]'), (new X264('aac')), $videoStorePath);
            $advancedMedia->save();
            // end concat

            if ($video_id > 0) {
                DB::table('videos')->where('video_id', $video_id)->update(['watermark_state' => 2]);
            }
        } catch (\Exception $e) {
            try {
                $format = new X264();
                $advancedMedia = $ffmpeg->openAdvanced(array($vidoeFilePath, $watermarkPath));
                // $advancedMedia->filters()
                //     ->custom('[1][0]scale2ref=w=oh*mdar:h=ih*0.05[logo][video];[video][logo]', "overlay=x='if(lt(mod(t\,16)\,8)\,W-w-W*10/100\,W*10/100)':y='if(lt(mod(t+4\,16)\,8)\,H-h-H*5/100\,H*5/100)'", '[v]', '-preset', 'ultrafast', '-tag:v', 'hvc1');
                $advancedMedia->filters()
                    ->custom('[1][0]scale2ref=w=oh*mdar:h=ih*0.05[logo][video];[video][logo]', "overlay=x='if(lt(mod(t\,16)\,8)\,W-w-W*10/100\,W*10/100)':y='if(lt(mod(t+4\,16)\,8)\,H-h-H*5/100\,H*5/100)'", '[v]', '-preset', 'ultrafast');
                $advancedMedia
                    ->map(array('0:a', '[v]'), $format, $videoStorePath);
                $advancedMedia->save();
                if ($video_id > 0) {
                    DB::table('videos')->where('video_id', $video_id)->update(['watermark_state' => 1]);
                }
            } catch (\Exception $ex) {
            }
        }

        if ($storageDrive == 's3') {
            $video = $ffmpeg->open($vidoeFilePath);
            $video = new File($videoStorePath);
            Storage::disk('s3')->putFileAs($s3VideoFolder, $video, $s3VideoFileName);
            Storage::disk('s3')->setVisibility($s3VideoFolder . '/' . $s3VideoFileName, 'public');
            unlink($videoStorePath);
            Storage::disk('local')->deleteDirectory($s3VideoFolder);
        }
    }
}
