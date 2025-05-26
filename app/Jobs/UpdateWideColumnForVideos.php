<?php

namespace App\Jobs;

use FFMpeg as FFMpeg;
use FFProbe as FFProbe;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateWideColumnForVideos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $video;
    public $ffprobe;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(isset($this->video['disk']) && $this->video['disk']=='s3'){
            $full_video_path = Storage::url($this->video['path']);
        }else{
            $full_video_path = storage_path('app/' . $this->video['path']);
        }
        $ffprobe = FFMpeg\FFProbe::create();
        $video_dimensions = $ffprobe
            ->streams($full_video_path)   // extracts streams informations
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
            'aspect_ratio' => $aspectRatio
        );
        DB::table('videos')->where('video_id', $this->video['video_id'])->update($data);
    }
}