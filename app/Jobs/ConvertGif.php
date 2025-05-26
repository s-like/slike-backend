<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\GifCreator;
use FFMpeg\Coordinate\TimeCode;
use Intervention\Image\ImageManagerStatic as Image;
use FFMpeg as FFMpeg;
use Illuminate\Http\Request;
use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ConvertGif implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  public $video;

  public $timeout = 99999999999999999;

  public $numprocs = 1;

  /**
   * Create a new job instance.
   *
   * @return void
   */

  public function __construct($video)
  {
    ini_set('max_execution_time', 0);
    ini_set('memory_limit', '18048M');
    $this->video = $video;
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

    // $video_gif_path = "public/videos/" . $this->video['user_id'] . '/gif';
    // $folderExists = Storage::exists($video_gif_path);
    // if (!$folderExists) {
    //   Storage::makeDirectory($video_gif_path);
    // }
    // $videos = DB::table('videos')->where('video_id', 48)->get();

    // foreach ($videos as $row) {
    $path = explode('/', $this->video['video_path']);
    $timeFolder = "";
    if (isset($path[1])) {
      $time_folder = $path[0];
      $videoFileName = $path[1];
      $videoPath = 'public/videos/' . $this->video['user_id'] . '/' . $time_folder;
    } else {
      $time_folder = time();
      $videoFileName = $path[0];
      $videoPath = 'public/videos/' . $this->video['user_id'];
    }



    $v_path = asset(Storage::url($videoPath . '/' . $videoFileName));
    $user_id = $this->video['user_id'];

    $gif_path = storage_path("app/public/videos/" . $this->video['user_id'] . "/gif");
    $folderExists = Storage::exists($gif_path);
    if (!$folderExists) {
      Storage::makeDirectory($gif_path);
    }
    $gif_storage_path = $gif_path . '/' . $time_folder . '.gif';
    $vidoeFilePath = storage_path("app/public/videos/" . $this->video['user_id'] . '/' . $time_folder . '/' . $videoFileName);


    $duration = DB::table('videos')->where('video_id', $this->video['video_id'])->pluck('duration')->first();
    \Log::info($duration);

    $vidoeFilePath = asset(Storage::url($videoPath . '/' . $videoFileName));

    $video = $ffmpeg->open($vidoeFilePath);


    // This array holds our "points" that we are going to extract from the
    // video. Each one represents a percentage into the video we will go in
    // extracitng a frame. 0%, 10%, 20% ..
    $points = range(0, 100, 20);
    //dd($points);
    $temp = storage_path() . "/app/public/temp";

    // This will hold our finished frames.
    $frames = [];

    foreach ($points as $point) {

      // Point is a percent, so get the actual seconds into the video.
      $time_secs = floor($duration * ($point / 100));
      // Created a var to hold the point filename.

      $point_file = "$temp/$user_id$time_folder$point.jpg";

      // Extract the frame.
      $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds($time_secs));
      $frame->save($point_file);

      // If the frame was successfully extracted, resize it down to
      // 320x200 keeping aspect ratio.
      if (file_exists($point_file)) {
        $img = Image::make($point_file)->resize(400, 300, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->save($point_file, 40);
        $img->destroy();
      }

      // If the resize was successful, add it to the frames array.
      if (file_exists($point_file)) {
        $frames[] = $point_file;
      }
    }

    // If we have frames that were successfully extracted.
    if (!empty($frames)) {
      // We show each frame for 100 ms.
      $durations = array_fill(0, count($frames), 25);
      // Create a new GIF and save it.
      $gc = new GifCreator();
      $gc->create($frames, $durations, 0);
      file_put_contents($gif_storage_path, $gc->getGif());
      // Remove all the temporary frames.
      foreach ($frames as $file) {
        unlink($file);
      }
    }
    $storageDrive = config('app.filesystem_driver');
    if ($storageDrive == 's3') {
      $s3GifFolder = 'public/videos/' . $this->video['user_id'] . '/gif';

      $img = new File($gif_storage_path);
      Storage::putFileAs($s3GifFolder, $img, $time_folder . '.gif');
      Storage::setVisibility($s3GifFolder . '/' . $time_folder . '.gif', 'public');
      unlink($gif_storage_path);
    }

    DB::table("videos")->where("video_id", $this->video['video_id'])->update([
      'gif' => $time_folder . ".gif",
      'updated_at' => date('Y-m-d H:i:s')
    ]);
    //   dd('done');
    // }
  }
}
