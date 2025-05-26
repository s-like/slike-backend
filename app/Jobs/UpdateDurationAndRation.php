<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use FFMpeg as FFMpeg;
use FFProbe as FFProbe;

class UpdateDurationAndRation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $video;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($video)
    {
        $this->video = $video;
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '18048M');
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $v_path = $this->video['v_path'];
        $video_id = $this->video['video_id'];
        //video duration
        $ffprobe = FFMpeg\FFProbe::create();
        $duration = $ffprobe
            ->streams($v_path)
            ->videos()
            ->first()
            ->get('duration');


        $video_dimensions = $ffprobe
            ->streams($v_path)   // extracts streams informations
            ->videos()                      // filters video streams
            ->first()                       // returns the first video stream
            ->getDimensions();
        $width = $video_dimensions->getWidth();
        $height = $video_dimensions->getHeight();
        $wide = $height > $width ? 0 : 1;
        $aspectRatio = round($width / $height, 2);

        $data = array(
            'updated_at' => date('Y-m-d H:i:s'),
            'wide'       => $wide,
            'aspect_ratio' => $aspectRatio,
            'duration'=>$duration
        );
        DB::table('videos')->where('video_id', $video_id)->update($data);

        
        $videoGif = array(
            'video_path'    => $this->video['video_path'],
            'video_id'      => $video_id,
            'user_id'       => $this->video['user_id'],
        );
 
        ConvertGif::dispatch($videoGif);
 
        $video = DB::table('videos')->where('video_id', $video_id)->first();
        $videoPath = 'public/videos/'.$video->user_id.'/'.$video->video;
        $storage_path = config('app.filesystem_driver');
        $c_path=  $this->video['time_folder'].'/master.m3u8';
        $videoStream = array(
            'disk'          => $storage_path,
            'original_name' => $video->video,
            'path'          => $videoPath,
            'c_path'        => $c_path,
            'video_id'      => $video_id,
            'user_id'       => $video->user_id
        );

        ConvertVideoForStreaming::dispatch($videoStream);
        
        
        // AddWatermarkOnVideo::dispatch($video);
        
       

        // $videoPath = 'public/videos/'.$video->user_id.'/'.$video->video;
        
        // $c_path=  $this->video['time_folder'].'/master.m3u8';
       
  
    }
}
