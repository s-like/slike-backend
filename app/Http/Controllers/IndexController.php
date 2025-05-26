<?php

namespace App\Http\Controllers;

use FFMpeg\FFProbe;
use FFMpeg as FFMpeg;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use FFMpeg\Format\Video\X264;
use App\Helpers\Common\Functions;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\GifCreator;
use FFMpeg\Coordinate\TimeCode;
use Intervention\Image\ImageManagerStatic as Image;

class IndexController extends Controller
{

  public function __construct()
  {
  }

  public function createGif(Request $request)
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


    $videos = DB::table('videos')->where('video_id', 48)->get();

    foreach ($videos as $row) {
      $path = explode('/', $row->video);
      $time_folder = $path[0];
      $videoFileName = $path[1];
      $videoPath = 'public/videos/' . $row->user_id . '/' . $time_folder;
      $v_path = asset(Storage::url($videoPath . '/' . $videoFileName));

      $gif_path = storage_path("app/public/videos/" . $row->user_id . "/gif");
      $gif_storage_path = $gif_path . '/' . $time_folder . '.gif';

      $media = FFMpeg::open($videoPath . '/' . $videoFileName);
      $duration = $media->getDurationInSeconds();

      $vidoeFilePath = asset(Storage::url($videoPath . '/' . $videoFileName));

      $video = $ffmpeg->open($vidoeFilePath);


      // This array holds our "points" that we are going to extract from the
      // video. Each one represents a percentage into the video we will go in
      // extracitng a frame. 0%, 10%, 20% ..
      $points = range(0, 100, 50);
      //dd($points);
      $temp = storage_path() . "/app/public/temp";

      // This will hold our finished frames.
      $frames = [];

      foreach ($points as $point) {

        // Point is a percent, so get the actual seconds into the video.
        $time_secs = floor($duration * ($point / 100));

        // Created a var to hold the point filename.
        $point_file = "$temp/$point.jpg";

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
      dd('done');
    }
  }

  public function index(Request $request)
  {
    $id = $request->id;

    return '<script>
   (function() {
     var app = {
       launchApp: function() {
         window.location.replace("slike://slikevideo.com?id=' . $id . '");
         this.timer = setTimeout(this.openWebApp, 100);
       },
   
       openWebApp: function() {
         window.location.replace("' . route("view-video", Crypt::encrypt($id)) . '");
       }
     };
   
     app.launchApp();
   })();
   </script>';
  }

  public function viewVideo($id, Request $request)
  {

    // dd(Crypt::encrypt($id));
    $video_id = Crypt::decrypt($id);
    // dd($video_id);
    $video_res = DB::table('videos as v')
      ->select(DB::raw('v.video,v.thumb,v.user_id,u.username,v.title,v.description,u.user_dp'))
      ->leftJoin('users as u', 'u.user_id', '=', 'v.user_id')
      ->where('video_id', $video_id)
      ->first();
    $home_data = DB::table('home_settings')->first();
    // dD($video_res);
    if ($video_res) {
      $video = $video_res->video;
      $thumb = $video_res->thumb;
      $user_id = $video_res->user_id;
      $title = $video_res->title;
      $description = $video_res->description;
      $username = $video_res->username;
      $user_dp = $video_res->user_dp;
      return view('view-video', compact('video', 'thumb', 'user_id', 'home_data', 'username', 'description', 'user_dp', 'title'));
    }
  }

  public function showVideo(Request $request)
  {
    $video_id = base64_decode($request->video_id);

    // $video_id = str_ireplace("yfmtythd84n4h", "", $video_de);
    $video_res = DB::table('videos as v')
      ->select(DB::raw('v.video,v.thumb,v.user_id,u.username,v.title,v.description'))
      ->leftJoin('users as u', 'u.user_id', '=', 'v.user_id')
      ->where('video_id', $video_id)
      ->first();
    if ($video_res) {
      $video = $video_res->video;
      $thumb = $video_res->thumb;
      $user_id = $video_res->user_id;
      $title = $video_res->title;
      $description = $video_res->description;
      $username = $video_res->username;
      $id = $video_id;
      return view('show-video', compact('video', 'thumb', 'user_id', 'username', 'description', 'title', 'id'));
    }
  }

  public function showVideoWeb(Request $request)
  {

    $video_id = $request->video_id;
    $id = $video_id;
    // $video_id = str_ireplace("yfmtythd84n4h", "", $video_de);
    $video_res = DB::table('videos as v')
      ->select(DB::raw('v.video,v.thumb,v.user_id,u.username,v.title,v.description'))
      ->leftJoin('users as u', 'u.user_id', '=', 'v.user_id')
      ->where('video_id', $video_id)
      ->first();
    //   dd(secure_url('storage/videos/'.$user_id.'/thumb/'.$thumb));
    if ($video_res) {
      $video = $video_res->video;
      $thumb = $video_res->thumb;
      $user_id = $video_res->user_id;
      $title = ($video_res->title != "") ? $video_res->title : "";
      $description = $video_res->description;
      $username = $video_res->username;
      return view('show-video', compact('video', 'thumb', 'user_id', 'username', 'description', 'title', 'id'));
    }
  }

  public function front()
  {
    $videos = DB::table('videos')
      ->select('user_id', 'video_id', 'video', 'thumb', 'gif', 'total_likes', 'total_comments', 'total_views')
      ->orderBy('total_likes')->orderBy('total_views')
      ->where(['active' => 1, 'enabled' => 1])
      ->where('video_id', '>=', 145)
      ->get()->take(5);
    // dd($videos);
    return view('home', compact('videos'));
  }

  public function videoInfo($videoId)
  {

    $video = DB::table('videos as v')
      ->join('users as u', 'u.user_id', 'v.user_id')
      ->select('v.total_views', 'u.username')
      ->where('v.video_id', $videoId)
      ->first();
    $comments = DB::table('comments as c')
      ->join('users as u', 'u.user_id', 'c.user_id')
      ->select('u.username', 'c.comment_id', 'c.comment')
      ->where(['c.active' => 1, 'c.video_id' => $videoId])
      ->get();
    $comment_html = view('partials.comments', ['comments' => $comments])->render();

    return response()->json(['success' => true, 'video' => $video, 'comment_html' => $comment_html]);
  }

  public function videoViewed($videoId)
  {

    DB::table('videos')
      ->increment('total_views');

    //change the user_id as per the logged in user via the auth()->guard() or not logged in user set to 0
    $uniqueViewExists = DB::table('video_views')
      ->where(['user_id' => 1, 'video_id' => $videoId, 'viewed_on' => date('Y-m-d')])
      ->exists();

    //set unique id as per cookie/loggedin user
    if (!$uniqueViewExists) {
      DB::table('video_views')
        ->insert(['user_id' => 1, 'video_id' => $videoId, 'viewed_on' => date('Y-m-d'), 'unique_id' => 1]);
    }

    return response()->json(['success' => true]);
  }


  public function test2()
  {
    $ffprobe = FFMpeg\FFProbe::create();
    $streamsCount = $ffprobe
      ->streams('C:\Users\unify1\Downloads\test2.mp4')
      ->count();

    dd($streamsCount);
  }

  public function test()
  {
    $ffmpeg = FFMpeg\FFMpeg::create();
    $ffprobe = FFMpeg\FFProbe::create();

    //       $streamCount = $ffprobe->streams(asset('video.mp4'))->audios()->count();
    // // dd($streamCount);
    //             if ($streamCount > 0) {
    //                 $video = $ffmpeg->open(asset('video.mp4'));
    //                 $audio_format = new FFMpeg\Format\Audio\Mp3();

    //                 $video->save($audio_format, 'testAudio.mp3');
    //             }

    //             $advancedMedia = $ffmpeg->openAdvanced(array(asset('water.png'), asset('TikTok.mp4')));
    //             $advancedMedia->filters()
    //                 // ->custom('[1:v]', 'overlay=W-w-5:5', '[v]');
    //                 ->custom('[1:v]scale=720:-2,', 'overlay=W-w-5:H-h-5', '[v]');
    //             $advancedMedia
    //                 ->map(array('1:v', '[v]'), new X264('aac', 'libx264'), 'testvideo.mp4');
    //             $advancedMedia->save();


    $advancedMedia = $ffmpeg->openAdvanced(array(asset('water.png'), asset('TikTok.mp4')));

    $advancedMedia->filters()
      ->custom('[1:v]scale=720:-2,', 'overlay=W-w-5:H-h-5', '[v]');

    $advancedMedia
      ->map(array('1:a', '[v]'), new X264('aac', 'libx264'), 'testvideo.mp4');

    $advancedMedia->save();
    dd(444);
    // $videoFileName=$this->CleanFileNameMp4($request->file('video')->getClientOriginalName());
    //       $video=new File(storage_path('app/public/video.mp4'));
    //           Storage::putFileAs("public", $video,'s3video.mp4');
    //           Storage::setVisibility('public/s3video.mp4', 'public');
    // dd(Storage::url('public/s3video.mp4'));
    $timeFolder = time();
    // Functions::ffmpegUpload(asset('video.mp4'),storage_path('app/public/videos/5/video.mp4'),asset('audio.mp3'),storage_path('app/public/sounds/5/'.$timeFolder.'.mp3'),asset('water.png'),'s3','public/videos/5/video.mp4','public/sounds/5/'.$timeFolder.'.mp3');

    $uploadStatus = Functions::ffmpegUpload(asset('video.mp4'), storage_path('app/public/videos/5/Testvideo.mp4'), '', storage_path('app/public/sounds/5/' . $timeFolder . '.mp3'), storage_path('app/public/videos/5/thumb/' . $timeFolder . '.jpg'), asset('water.png'), '', '', '', '', '', '', '');
  }
}
