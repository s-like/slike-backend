<?php

namespace App\Jobs;


use Illuminate\Bus\Queueable;
use App\Helpers\Common\Functions;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use FFMpeg;

class AddWatermarkOnVideo implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  public $res;
  public $timeout = 120;
  public $tries = 5;
  /**
   * Create a new job instance.
   *
   * @return void
   */

  public function __construct($res)
  {
    $this->res = $res;
    // ini_set('max_execution_time', 3600);
    // ini_set('memory_limit', '18048M');
  }

  /**
   * Execute the job.
   *
   * @return void
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

    $watermark = DB::table('settings')->first();
    $storage_path = config('app.filesystem_driver');
    try {
      $path = explode('/', $this->res->video);
      if (isset($path[1])) {
        $time_folder = $path[0];
        $videoFileName = $path[1];
        $videoPath = 'public/videos/' . $this->res->user_id . '/' . $time_folder;
      } else {
        $time_folder = time();
        $videoFileName = $path[0];
        $videoPath = 'public/videos/' . $this->res->user_id;
      }

      \Log::info('Add Watermark');
      if ($watermark) {
        $watermark_img = $watermark->watermark;
        if ($watermark_img != "") {
          $watermarkImg = $watermark_img;
          $waterMarkPath = asset(Storage::url('public/uploads/logos/small_' . $watermarkImg));
          // }
          // }
          // $fname = explode('.', $videoFileName);
          $fname = substr($videoFileName, 0, -4);

          $waterFileName = $fname . '_download.mp4';
          $video_id = $this->res->video_id;

          $vidoeFilePath=asset(Storage::url($videoPath . '/' . $videoFileName));
          $videoStorePath=storage_path('app/public/videos/' . $this->res->user_id . '/' . $time_folder . '/' . $waterFileName);

          $watermarkArr['vidoeFilePath']=$vidoeFilePath;
          $watermarkArr['videoStorePath'] = $videoStorePath;
          $watermarkArr['watermarkPath'] = $waterMarkPath;
          $watermarkArr['storageDrive'] = $storage_path;
          $watermarkArr['s3VideoFolder'] = $videoPath;
          $watermarkArr['s3VideoFileName'] = $waterFileName;
          $watermarkArr['video_id'] = $video_id;

          $video = $ffmpeg->open($vidoeFilePath);
          $format = new FFMpeg\Format\Video\X264();
          $format->setAudioCodec("aac");

          $format->setAdditionalParameters(array('-vf', 'scale=720:-2', '-preset', 'ultrafast'));
          $video
              ->save($format, $videoStorePath);
              
          // FFMPEGAddWatwemark::dispatch($watermarkArr);
        }
      }
      \Log::info($this->res->video_id);
    } catch (\Exception $e) {
      \Log::info('Failed id');
      \Log::info($this->res->video_id);
      \Log::info($e);
    }
  }
}
