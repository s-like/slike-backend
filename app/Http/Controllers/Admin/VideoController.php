<?php

namespace App\Http\Controllers\Admin;

use FFMpeg as FFMpeg;
use App\Jobs\ConvertGif;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use FFMpeg\Format\Video\X264;
use FFMpeg\Coordinate\TimeCode;
use Owenoj\LaravelGetId3\GetId3;
use App\Helpers\Common\Functions;
use App\Jobs\AddWatermarkOnVideo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Jobs\ConvertVideoForStreaming;
use App\Jobs\FFMPEGUploadVideo;
use FFMpeg\Filters\Video\VideoFilters;
use App\Jobs\UpdateWideColumnForVideos;
use Illuminate\Support\Facades\Storage;
use App\Jobs\UploadVideoOnCloudFlareStream;

class VideoController extends Controller
{
    private $ffmpeg;
    private $ffprobe;
    var $column_order = array(null, 'username', 'title', 'thumb', 'video'); //set column field database for datatable orderable
    var $column_search = array('u.username', 'v.title', 'v.video'); //set column field database for datatable searchable
    var $order = array('v.video_id' => 'desc'); // default order

    public function __construct()
    {
        $this->ffmpeg = FFMpeg\FFMpeg::create(array(
            'ffmpeg.binaries'  => config('app.ffmpeg'),
            'ffprobe.binaries' => config('app.ffprobe'),
            'timeout'          => 3600, // The timeout for the underlying process
            'ffmpeg.threads'   => 12, // The number of threads that FFMpeg should use
        ));
        $this->ffprobe =  FFMpeg\FFProbe::create(array(
            'ffmpeg.binaries'  => config('app.ffmpeg'),
            'ffprobe.binaries' => config('app.ffprobe'),
            'timeout'          => 3600, // The timeout for the underlying process
            'ffmpeg.threads'   => 12, // The number of threads that FFMpeg should use
        ));
        $this->middleware('app_version_check', ['only' => ['edit', 'delete', 'flaged_video', 'active_video']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = 'Videos';
        $menuUrl = route('admin.videos.index');

        return view("admin.videos", compact('menu', 'menuUrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $menu = 'Videos';
        $menuUrl = route('admin.videos.index');

        $submenu = 'Add Video';
        $submenuUrl = route('admin.videos.create');

        $action = 'add';
        $users = DB::table('users')
            ->select(DB::raw('user_id,username'))
            ->where('active', 1)
            ->where('deleted', 0)
            ->orderBy('user_id', 'ASC')
            ->get();
        $sounds = DB::table('sounds')
            ->select(DB::raw('sound_id,title'))
            ->where('deleted', 0)
            ->where('user_id', 0)
            ->orderBy('title', 'ASC')
            ->get();
        return view('admin.videos-create', compact('action', 'users', 'sounds', 'menu', 'menuUrl', 'submenu', 'submenuUrl'));
    }
    /*public function convertAllVideosToHlsStream(){
        $videoStoragePath = asset(Storage::url('public/videos'));
        $storage_path=config('app.filesystem_driver');
        $videos = DB::table("videos")->select(DB::raw("video_id,video,video as video_timer_folder,user_id") )->where("master_video",'<>','')->get();
        // dd($videos);
        foreach($videos as $video){
            $split = explode('/',$video->video_timer_folder);
            $timeFolder = $split[0];
            $videoName = $split[1];
            $c_path=  $this->getCleanFileName($timeFolder.'/master.m3u8');
            $videoPath = 'public/videos/'.$video->user_id;
            $file_path= $videoPath.'/'. $timeFolder.'/'.$videoName;
            $currentVideo = array(
                'disk'          => $storage_path,
                'path'          => $file_path,
                'c_path'        => $c_path,
                'video_id'      => $video->video_id,
                'user_id'       => $video->user_id
            );
            echo $file_path."<br/>";
            echo asset(Storage::url($file_path))."<br/>";

            ConvertVideoForStreaming::dispatch($currentVideo);
            // UpdateWideColumnForVideos::dispatch($currentVideo);

            echo $video->video_id."<br/>";
        }
        // return redirect()->back();
    }*/
    public function convertAllVideosToHlsStream()
    {
        $videoStoragePath = asset(Storage::url('public/videos'));
        $storage_path = config('app.filesystem_driver');
        $videos = DB::table("videos")->select(DB::raw("video_id,video,video as video_timer_folder,user_id"))->where("master_video", 'like', '%master%')->get();
        // dd($videos);
        foreach ($videos as $video) {
            $split = explode('/', $video->video_timer_folder);
            $timeFolder = $split[0];
            if (isset($split[1])) {
                $videoName = $split[1];
                $c_path =  $this->getCleanFileName($timeFolder . '/master.m3u8');
                $videoPath = 'public/videos/' . $video->user_id;
                $v_path = asset(Storage::url($videoPath . '/' . $timeFolder . '/' . $videoName));
                $video_bitrate =  $this->ffprobe
                    ->streams($v_path)
                    ->videos()
                    ->first()
                    ->get('bit_rate') / 1024;
                $video_bitrate = intval($video_bitrate);
                $videoPath = 'public/videos/' . $video->user_id;
                $file_path = $videoPath . '/' . $timeFolder . '/' . $videoName;
                $currentVideo = array(
                    'disk'          => $storage_path,
                    'path'          => $file_path,
                    'c_path'        => $c_path,
                    'video_id'      => $video->video_id,
                    'user_id'       => $video->user_id,
                    'bitrate'       => $video_bitrate
                );
                echo $file_path . "<br/>";
                echo asset(Storage::url($file_path)) . "<br/>";
                ConvertVideoForStreaming::dispatch($currentVideo);
                // UpdateWideColumnForVideos::dispatch($currentVideo);
                echo $video->video_id . "<br/>";
            }
        }
        // return redirect()->back();
    }
    public function convertAllVideosGifFiles()
    {
        $videoStoragePath = asset(Storage::url('public/videos'));
        $storage_path = config('app.filesystem_driver');
        $videos = DB::table("videos")->select(DB::raw("video_id,video,video as video_timer_folder,user_id"))->whereNull("gif")->get();

        // dd($videos);
        foreach ($videos as $video) {
            $split = explode('/', $video->video_timer_folder);
            $timeFolder = $split[0];
            if (isset($split[1])) {
                $videoName = $split[1];
                // $c_path=  $this->getCleanFileName($timeFolder.'/master.m3u8');
                $videoGif = array(
                    'video_path'    => $timeFolder . '/' . $videoName,
                    'video_id'      => $video->video_id,
                    'user_id'       => $video->user_id,
                );
                ConvertGif::dispatch($videoGif);
                echo $timeFolder . '/' . $videoName . "<br/>";
            } else {
                $videoName = $video->video;
                $videoGif = array(
                    'video_path'    => $video->video,
                    'video_id'      => $video->video_id,
                    'user_id'       => $video->user_id,
                );
                ConvertGif::dispatch($videoGif);
                echo $timeFolder . '/' . $videoName . "<br/>";
            }
        }
        // return redirect()->back();
    }
    private function _error_string($errArray)
    {
        $error_string = '';
        foreach ($errArray as $key) {
            $error_string .= $key . "\n";
        }
        return $error_string;
    }

    // private function _form_validation($request)
    // {

    //     $rules = [
    //         'user_id'          => 'required',
    //         'video'          => 'required',
    //     ];
    //     $messages = [
    //         'user_id.required'   => 'Username  is required.',
    //         'video.mimes'   => 'Video Type is invalid',
    //     ];

    //     $this->validate($request, $rules, $messages);

    //     $hashtags = '';
    //     $storage_path = config('app.filesystem_driver');
    //     $sound_id = 0;
    //     if (isset($request->description)) {
    //         if (stripos($request->description, '#') !== false) {
    //             $str = $request->description;
    //             preg_match_all('/#([^\s]+)/', $str, $matches);
    //             $hashtags = implode(',', $matches[1]);
    //         } else {
    //             $hashtags = '';
    //         }
    //     }

    //     if ($request->id > 0) {
    //         //edit

    //     } else {
    //         if ($request->hasFile('video')) {
    //             $videoUploadPath = "";
    //             $videoThumbPath = "";
    //             $videoUploadFolderPath = "";
    //             $time_folder = time();
    //             $videoPath = 'public/videos/' . $request->user_id;
    //             $audioPath = 'public/sounds/' . $request->user_id;
    //             $waterMarkPath = "";
    //             $watermark = DB::table('settings')->first();
    //             // if($watermark){
    //             //     $watermark_img = $watermark->watermark;
    //             //     if($watermark_img!="") {
    //             //         $watermarkImg=$watermark_img;
    //             //         $waterMarkPath=asset(Storage::url('public/uploads/logos/small_'.$watermarkImg));
    //             //     }
    //             // }
    //             Storage::disk('local')->makeDirectory('public/videos/' . $request->user_id . '/' . $time_folder);
    //             Storage::disk('local')->makeDirectory('public/videos/' . $request->user_id . '/thumb');
    //             Storage::disk('local')->makeDirectory('public/videos/' . $request->user_id . '/gif');
    //             Storage::disk('local')->makeDirectory('public/sounds/' . $request->user_id);

    //             $videoFileName = $this->CleanFileNameMp4($request->file('video')->getClientOriginalName());
    //             $request->video->storeAs("public/temp", $time_folder . '.mp4');
    //             Storage::setVisibility("public/temp/" . $time_folder . '.mp4', 'public');

    //             if ($request->sound_id > 0) {
    //                 $sound_id = $request->sound_id;
    //                 $soundName = DB::table("sounds")
    //                     ->select(DB::raw("sound_name,user_id"))
    //                     ->where("sound_id", $request->sound_id)
    //                     ->first();
    //                 if ($soundName->user_id > 0) {
    //                     $soundPath = 'public/sounds/' . $soundName->user_id . '/' . $soundName->sound_name;
    //                 } else {
    //                     $soundPath = 'public/sounds/' . $soundName->sound_name;
    //                 }
    //                 if ($soundName->user_id > 0) {
    //                     $soundPathFile = "public/sounds/" . $soundName->user_id . '/';
    //                 } else {
    //                     $soundPathFile = "public/sounds/";
    //                 }
    //                 $videoUploadPath = storage_path('app/public/videos/' . $request->user_id . '/' . $time_folder . '/' . $videoFileName);
    //                 $videoUploadFolderPath = 'public/videos/' . $request->user_id . '/' . $time_folder;
    //                 $videoThumbPath = storage_path('app/' . $videoPath . '/thumb/' . $time_folder . '.jpg');
    //                 $uploadStatus = Functions::ffmpegUpload(asset(Storage::url('public/temp/' . $time_folder . '.mp4')), storage_path('app/public/videos/' . $request->user_id . '/' . $time_folder . '/' . $videoFileName), asset(Storage::url($soundPath)), storage_path('app/public/sounds/' . $request->user_id . '/' . $time_folder . '.mp3'), storage_path('app/' . $videoPath . '/thumb/' . $time_folder . '.jpg'), $waterMarkPath, $storage_path, $videoPath . '/' . $time_folder, $videoFileName, $audioPath, $time_folder . '.mp3', $videoPath . '/thumb', $time_folder . '.jpg');
    //             } else {
    //                 $videoUploadPath = storage_path('app/public/videos/' . $request->user_id . '/' . $time_folder . '/' . $videoFileName);
    //                 $videoThumbPath = storage_path('app/' . $videoPath . '/thumb/' . $time_folder . '.jpg');
    //                 $videoUploadFolderPath = 'public/videos/' . $request->user_id . '/' . $time_folder;
    //                 $uploadStatus = Functions::ffmpegUpload(asset(Storage::url('public/temp/' . $time_folder . '.mp4')), storage_path('app/public/videos/' . $request->user_id . '/' . $time_folder . '/' . $videoFileName), '', storage_path('app/public/sounds/' . $request->user_id . '/' . $time_folder . '.mp3'), storage_path('app/' . $videoPath . '/thumb/' . $time_folder . '.jpg'), $waterMarkPath, $storage_path, $videoPath . '/' . $time_folder, $videoFileName, $audioPath, $time_folder . '.mp3', $videoPath . '/thumb', $time_folder . '.jpg');
    //                 // dd($uploadStatus);
    //                 if ($uploadStatus['status'] == 'error') {
    //                     // dd(5454);
    //                     return false;
    //                 }
    //                 // $ffprobe = FFMpeg\FFProbe::create();
    //                 $streamCount = $this->ffprobe->streams(asset(Storage::url($videoPath . '/' . $time_folder . '/' . $videoFileName)))->audios()->count();
    //                 //                         $streamCount = $ffprobe->streams(asset(Storage::url($videoPath . '/' .$time_folder.'/'. $videoFileName)));

    //                 if ($streamCount > 0) {
    //                     $duration = $this->ffprobe
    //                         ->streams(storage_path('app/public/sounds/' . $request->user_id . '/' . $time_folder . '.mp3'))
    //                         ->audios()
    //                         ->first()
    //                         ->get('duration');
    //                     // dd($duration);
    //                     $audio_duration = round($duration);

    //                     $track = new GetId3(new File(storage_path('app/public/sounds/' . $request->user_id . '/' . $time_folder . '.mp3')));

    //                     $title = $track->getTitle();
    //                     $album = $track->getAlbum();
    //                     $artist = $track->getArtist();
    //                     if ($storage_path == 's3') {
    //                         unlink(storage_path('app/public/sounds/' . $request->user_id . '/' . $time_folder . '.mp3'));
    //                     }

    //                     $audioData = array(
    //                         'user_id' => $request->user_id,
    //                         'cat_id' => 0,
    //                         'title'     => ($title != null) ? $title : "",
    //                         'album'     => ($album != null) ? $album : "",
    //                         'artist'    => ($artist != null) ? $artist : "",
    //                         'sound_name' => $time_folder . '.mp3',
    //                         // 'tags'     => $hashtags,
    //                         'duration' => $audio_duration,
    //                         'used_times' => 1,
    //                         'created_at' => date('Y-m-d H:i:s')
    //                     );

    //                     $s_id = DB::table('sounds')->insertGetId($audioData);
    //                     $sound_id = $s_id;
    //                 }
    //             }



    //             $v_path = asset(Storage::url($videoPath . '/' . $time_folder . '/' . $videoFileName));

    //             //video duration
    //             // $ffprobe = FFMpeg\FFProbe::create();
    //             $duration = $this->ffprobe
    //                 ->streams($v_path)
    //                 ->videos()
    //                 ->first()
    //                 ->get('duration');


    //             $video_dimensions =  $this->ffprobe
    //                 ->streams($v_path)   // extracts streams informations
    //                 ->videos()                      // filters video streams
    //                 ->first()                       // returns the first video stream
    //                 ->getDimensions();              // returns a FFMpeg\Coordinate\Dimension object
    //             $width = $video_dimensions->getWidth();
    //             $height = $video_dimensions->getHeight();
    //             $aspectRatio = round($width / $height, 2);

    //             // Storage::delete("public/videos/" . $request->user_id.'/'.$videoFileName);

    //             // if($request->sound_id==0 || $request->sound_id==null){
    //             //     $sound_id=0;
    //             // }else{
    //             //     $sound_id=$request->sound_id;
    //             // }

    //             Storage::delete('public/temp/' . $time_folder . '.mp4');
    //             $data = array(
    //                 'user_id'       => $request->user_id,
    //                 'video'         => $time_folder . '/' . $videoFileName,
    //                 'thumb'         => $time_folder . '.jpg',
    //                 'gif'         => $time_folder . '.gif',
    //                 'title' => ($request->title == null) ? '' : $request->title,
    //                 'description' => ($request->description == null) ? '' : strip_tags($request->description),
    //                 'duration'    => $duration,
    //                 'sound_id'     => $sound_id,
    //                 'tags'      => $hashtags,
    //                 'enabled' => 1,
    //                 'aspect_ratio' => $aspectRatio,
    //                 'created_at' => date('Y-m-d H:i:s'),
    //                 'updated_at' => date('Y-m-d H:i:s'),
    //                 'active' => 1,
    //                 'deleted' => 0
    //             );

    //             // $file_path = $videoPath . '/' . $time_folder . '/' . $videoFileName;
    //             // $c_path =  $this->getCleanFileName($time_folder . '/master.m3u8');

    //             $v_id = DB::table('videos')->insertGetId($data);
    //             // $waterMarkPath = "";
    //             // $watermark = DB::table('settings')->first();
    //             // if ($watermark) {
    //             //     $watermark_img = $watermark->watermark;
    //             //     if ($watermark_img != "") {
    //             //         $watermarkImg = $watermark_img;
    //             //         $waterMarkPath = asset(Storage::url('public/uploads/logos/small_' . $watermarkImg));
    //             //     }
    //             // }

    //             // $markArr = [
    //             //     'waterMarkPath' => $waterMarkPath,
    //             //     'user_id' => $request->user_id,
    //             //     'videoFileName' => $videoFileName,
    //             //     'time_folder' => $time_folder,
    //             //     'v_path' => $v_path,
    //             //     'disk' => $storage_path
    //             // ];

    //             // if (\File::exists($videoUploadPath)) {
    //             //     UploadVideoOnCloudFlareStream::dispatch($videoUploadPath, $videoThumbPath, $videoUploadFolderPath, $v_id, $markArr);
    //             // }

    //             // $v_path = asset(Storage::url($videoPath . '/' . $time_folder . '/' . $videoFileName));
    //             // $video_bitrate =  $this->ffprobe
    //             //     ->streams($v_path)
    //             //     ->videos()
    //             //     ->first()
    //             //     ->get('bit_rate') / 1024;
    //             // $video_bitrate = intval($video_bitrate);
    //             // $video = array(
    //             //     'disk'          => $storage_path,
    //             //     'original_name' => $request->video->getClientOriginalName(),
    //             //     'path'          => $file_path,
    //             //     'c_path'        => $c_path,
    //             //     'title'         => $request->title,
    //             //     'video_id'      => $v_id,
    //             //     'user_id'       => $request->user_id,
    //             //     'bitrate'       => $video_bitrate
    //             // );
    //             //dd($video);
    //             // ConvertVideoForStreaming::dispatch($video);
    //             $videoGif = array(
    //                 'video_path'    => $time_folder . '/' . $videoFileName,
    //                 'video_id'      => $v_id,
    //                 'user_id'       => $request->user_id,
    //             );

    //             ConvertGif::dispatch($videoGif);

    //             if ($watermark) {
    //                 $watermark_img = $watermark->watermark;
    //                 if ($watermark_img != "") {

    //                     $video = DB::table('videos')->where('video_id', $v_id)->first();
    //                     AddWatermarkOnVideo::dispatch($video);
    //                 }
    //             }

    //             return $data;
    //         } else {
    //             redirect(config('app.admin_url') . '/videos')->with('error', 'You can\'t leave Video field empty');
    //         }
    //     }
    // }
    private function _form_validation($request)
    {

        $rules = [
            'user_id'          => 'required',
            'video'          => 'required',
        ];
        $messages = [
            'user_id.required'   => 'Username  is required.',
            'video.mimes'   => 'Video Type is invalid',
        ];

        $this->validate($request, $rules, $messages);

        $hashtags = '';
        $storage_path = config('app.filesystem_driver');
        $sound_id = 0;
        if (isset($request->description)) {
            if (stripos($request->description, '#') !== false) {
                $str = $request->description;
                preg_match_all('/#([^\s]+)/', $str, $matches);
                $hashtags = implode(',', $matches[1]);
            } else {
                $hashtags = '';
            }
        }

        if ($request->id > 0) {
            //edit

        } else {
            if ($request->hasFile('video')) {
                // $videoUploadPath = "";
                // $videoThumbPath = "";
                // $videoUploadFolderPath = "";
                $time_folder = time();
                $videoPath = 'public/videos/' . $request->user_id;
                $audioPath = 'public/sounds/' . $request->user_id;
                $waterMarkPath="";
                // $watermark = DB::table('settings')->first();
                // if ($watermark) {
                //     $watermark_img = $watermark->watermark;
                //     if ($watermark_img != "") {
                //         $watermarkImg = $watermark_img;
                //         $waterMarkPath = asset(Storage::url('public/uploads/logos/small_' . $watermarkImg));
                //     }
                // }

                Storage::disk('local')->makeDirectory('public/videos/' . $request->user_id . '/' . $time_folder);
                Storage::disk('local')->makeDirectory('public/videos/' . $request->user_id . '/thumb');
                Storage::disk('local')->makeDirectory('public/videos/' . $request->user_id . '/gif');
                Storage::disk('local')->makeDirectory('public/sounds/' . $request->user_id);

                $videoFileName = $this->CleanFileNameMp4($request->file('video')->getClientOriginalName());
                $request->video->storeAs("public/temp", $time_folder . '.mp4');
                Storage::setVisibility("public/temp/" . $time_folder . '.mp4', 'public');

                $vidoeFilePath = asset(Storage::url('public/temp/' . $time_folder . '.mp4'));
                $audioStorePath = storage_path('app/public/sounds/' . $request->user_id . '/' . $time_folder . '.mp3');
                if ($request->sound_id > 0) {
                    $sound_id = $request->sound_id;
                    $soundName = DB::table("sounds")
                        ->select(DB::raw("sound_name,user_id"))
                        ->where("sound_id", $request->sound_id)
                        ->first();
                    if ($soundName->user_id > 0) {
                        $soundPath = 'public/sounds/' . $soundName->user_id . '/' . $soundName->sound_name;
                    } else {
                        $soundPath = 'public/sounds/' . $soundName->sound_name;
                    }
                    if ($soundName->user_id > 0) {
                        $soundPathFile = "public/sounds/" . $soundName->user_id . '/';
                    } else {
                        $soundPathFile = "public/sounds/";
                    }
                    // $videoUploadPath = storage_path('app/public/videos/' . $request->user_id . '/' . $time_folder . '/' . $videoFileName);
                    // $videoUploadFolderPath = 'public/videos/' . $request->user_id . '/' . $time_folder;
                    // $videoThumbPath = storage_path('app/' . $videoPath . '/thumb/' . $time_folder . '.jpg');

                    $data = array(
                        'user_id'       => $request->user_id,
                        // 'video'         => $time_folder . '/' . $videoFileName,
                        // 'thumb'         => $time_folder . '.jpg',
                        // 'gif'         => $time_folder . '.gif',
                        'title' => ($request->title == null) ? '' : html_entity_decode(htmlspecialchars_decode($request->title)),
                        'description' => ($request->description == null) ? '' : html_entity_decode(strip_tags(htmlspecialchars_decode($request->description))),
                        // 'duration'    => $duration,
                        'sound_id'     => $sound_id,
                        'tags'      => $hashtags,
                        'enabled' => 1,
                        // 'aspect_ratio' => $aspectRatio,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'active' => 0,
                        'deleted' => 0
                    );
    
                    $video_id = DB::table('videos')->insertGetId($data);

                    $dataArr = [
                        'vidoeFilePath' => $vidoeFilePath,
                        'videoStorePath' => storage_path('app/public/videos/' . $request->user_id . '/' . $time_folder . '/' . $videoFileName),
                        'audioFilePath' => asset(Storage::url($soundPath)),
                        'audioStorePath' => $audioStorePath,
                        'thumbStorePath' => storage_path('app/' . $videoPath . '/thumb/' . $time_folder . '.jpg'),
                        'watermarkPath' => $waterMarkPath,
                        'storageDrive' => $storage_path,
                        's3VideoFolder' => $videoPath . '/' . $time_folder,
                        's3VideoFileName' => $videoFileName,
                        's3AudioFolder' => $audioPath,
                        's3AudioFileName' => $time_folder . '.mp3',
                        's3ThumbFolder' => $videoPath . '/thumb',
                        's3ThumbFileName' => $time_folder . '.jpg',
                        'user_id' => $request->user_id,
                        'time_folder' => $time_folder,
                        'video_id' => $video_id,
                        'fileType' => 'V',
                        'sound_id' => $sound_id
                    ];
                    FFMPEGUploadVideo::dispatch($dataArr);
                    // $uploadStatus = Functions::ffmpegUpload(asset(Storage::url('public/temp/' . $time_folder . '.mp4')), storage_path('app/public/videos/' . $request->user_id . '/' . $time_folder . '/' . $videoFileName), asset(Storage::url($soundPath)), storage_path('app/public/sounds/' . $request->user_id . '/' . $time_folder . '.mp3'), storage_path('app/' . $videoPath . '/thumb/' . $time_folder . '.jpg'), $waterMarkPath, $storage_path, $videoPath . '/' . $time_folder, $videoFileName, $audioPath, $time_folder . '.mp3', $videoPath . '/thumb', $time_folder . '.jpg');
                } else {
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

                    $streamCount = $ffprobe->streams($vidoeFilePath)->audios()->count();


                    if ($streamCount > 0) {
                    
                    } else {
                        return false;
                        $response = array("status" => "error", 'msg' => 'video format invalid.Please choose another video.');
                        return $response;
                    }

                    $data = array(
                        'user_id'       => $request->user_id,
                        // 'video'         => $time_folder . '/' . $videoFileName,
                        // 'thumb'         => $time_folder . '.jpg',
                        // 'gif'         => $time_folder . '.gif',
                        'title' => ($request->title == null) ? '' : html_entity_decode(htmlspecialchars_decode($request->title)),
                        'description' => ($request->description == null) ? '' : html_entity_decode(strip_tags(htmlspecialchars_decode($request->description))),
                        // 'duration'    => $duration,
                        'sound_id'     => $sound_id,
                        'tags'      => $hashtags,
                        'enabled' => 1,
                        // 'aspect_ratio' => $aspectRatio,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'active' => 0,
                        'deleted' => 0
                    );
    
                    $video_id = DB::table('videos')->insertGetId($data);
                    
                    $dataArr = [
                        'vidoeFilePath' => $vidoeFilePath,
                        'videoStorePath' => storage_path('app/public/videos/' . $request->user_id . '/' . $time_folder . '/' . $videoFileName),
                        'audioFilePath' => '',
                        'audioStorePath' => $audioStorePath,
                        'thumbStorePath' => storage_path('app/' . $videoPath . '/thumb/' . $time_folder . '.jpg'),
                        'watermarkPath' => $waterMarkPath,
                        'storageDrive' => $storage_path,
                        's3VideoFolder' => $videoPath . '/' . $time_folder,
                        's3VideoFileName' => $videoFileName,
                        's3AudioFolder' => $audioPath,
                        's3AudioFileName' => $time_folder . '.mp3',
                        's3ThumbFolder' => $videoPath . '/thumb',
                        's3ThumbFileName' => $time_folder . '.jpg',
                        'user_id' => $request->user_id,
                        'time_folder' => $time_folder,
                        'video_id' => $video_id,
                        'fileType' => 'V',
                        'sound_id' => $sound_id
                    ];
                    FFMPEGUploadVideo::dispatch($dataArr);

                    // $uploadStatus = Functions::ffmpegUpload(asset(Storage::url('public/temp/' . $time_folder . '.mp4')), storage_path('app/public/videos/' . $request->user_id . '/' . $time_folder . '/' . $videoFileName), '', storage_path('app/public/sounds/' . $request->user_id . '/' . $time_folder . '.mp3'), storage_path('app/' . $videoPath . '/thumb/' . $time_folder . '.jpg'), $waterMarkPath, $storage_path, $videoPath . '/' . $time_folder, $videoFileName, $audioPath, $time_folder . '.mp3', $videoPath . '/thumb', $time_folder . '.jpg');
                    // dd($uploadStatus);
                    // if ($uploadStatus['status'] == 'error') {
                    //     // dd(5454);
                    //     return false;
                    // }
                    // $ffprobe = FFMpeg\FFProbe::create();
                    // $streamCount = $this->ffprobe->streams($vidoeFilePath)->audios()->count();
                    //                         $streamCount = $ffprobe->streams(asset(Storage::url($videoPath . '/' .$time_folder.'/'. $videoFileName)));

                }



                // $v_path = asset(Storage::url($videoPath . '/' . $time_folder . '/' . $videoFileName));

                // $duration = $this->ffprobe
                //     ->streams($v_path)
                //     ->videos()
                //     ->first()
                //     ->get('duration');


                // $video_dimensions =  $this->ffprobe
                //     ->streams($v_path)   // extracts streams informations
                //     ->videos()                      // filters video streams
                //     ->first()                       // returns the first video stream
                //     ->getDimensions();              // returns a FFMpeg\Coordinate\Dimension object
                // $width = $video_dimensions->getWidth();
                // $height = $video_dimensions->getHeight();
                // $aspectRatio = round($width / $height, 2);


                // Storage::delete('public/temp/' . $time_folder . '.mp4');
                // $data = array(
                //     'user_id'       => $request->user_id,
                //     'video'         => $time_folder . '/' . $videoFileName,
                //     'thumb'         => $time_folder . '.jpg',
                //     'gif'         => $time_folder . '.gif',
                //     'title' => ($request->title == null) ? '' : $request->title,
                //     'description' => ($request->description == null) ? '' : strip_tags($request->description),
                //     'duration'    => $duration,
                //     'sound_id'     => $sound_id,
                //     'tags'      => $hashtags,
                //     'enabled' => 1,
                //     'aspect_ratio' => $aspectRatio,
                //     'created_at' => date('Y-m-d H:i:s'),
                //     'updated_at' => date('Y-m-d H:i:s'),
                //     'active' => 1,
                //     'deleted' => 0
                // );

                // $v_id = DB::table('videos')->insertGetId($data);

                // $videoGif = array(
                //     'video_path'    => $time_folder . '/' . $videoFileName,
                //     'video_id'      => $v_id,
                //     'user_id'       => $request->user_id,
                // );

                // ConvertGif::dispatch($videoGif);

                // if ($watermark) {
                //     $watermark_img = $watermark->watermark;
                //     if ($watermark_img != "") {

                //         $video = DB::table('videos')->where('video_id', $v_id)->first();
                //         AddWatermarkOnVideo::dispatch($video);
                //     }
                // }

                return $data;
            } else {
                redirect(config('app.admin_url') . '/videos')->with('error', 'You can\'t leave Video field empty');
            }
        }
    }


    private function getCleanFileName($filename)
    {
        return preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename) . '.m3u8';
    }

    private function CleanFileNameMp4($filename)
    {
        $fname = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename) . '.mp4';
        return str_replace(' ', '-', $fname);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->_form_validation($request);
        //DB::table('videos')->insert($data);
        if (!$data) {
            return back()->withErrors(['A video without audio stream can not be uploaded']);
        }
        return redirect(config('app.admin_url') . '/videos')->with('success', 'Video uploading process running at the backend.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $users = DB::table('users')
            ->select(DB::raw('user_id,username'))
            ->where('active', 1)
            ->where('deleted', 0)
            ->orderBy('user_id', 'ASC')
            ->get();
        $sounds = DB::table('sounds')
            ->select(DB::raw('sound_id,title'))
            ->where('deleted', 0)
            ->orderBy('title', 'ASC')
            ->get();
        return view("admin.categories", compact('users', 'sounds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'edit';
        $users = DB::table('users')
            ->select(DB::raw('user_id,username'))
            ->where('active', 1)
            ->where('deleted', 0)
            ->orderBy('user_id', 'ASC')
            ->get();
        $sounds = DB::table('sounds')
            ->select(DB::raw('sound_id,title'))
            ->where('deleted', 0)
            ->orderBy('title', 'ASC')
            ->get();
        $video = DB::table('videos')->select(DB::raw("*"))->where('video_id', '=', $id)->first();
        // dd( $video);
        return view('admin.videos-create', compact('video', 'id', 'action', 'users', 'sounds'));
    }


    public function view($id)
    {
        $menu = 'Videos';
        $menuUrl = route('admin.videos.index');

        $submenu = 'View Video';
        $submenuUrl = route('admin.videos_view', $id);

        $action = 'view';
        $users = DB::table('users')
            ->select(DB::raw('user_id,username'))
            ->where('active', 1)
            ->where('deleted', 0)
            ->orderBy('user_id', 'ASC')
            ->get();
        $sounds = DB::table('sounds')
            ->select(DB::raw('sound_id,title'))
            ->where('deleted', 0)
            ->orderBy('title', 'ASC')
            ->get();
        $video = DB::table('videos')->select(DB::raw("*"))->where('video_id', '=', $id)->first();
        $cloud_flare_subdomain = config('app.cloud_flare_subdomain');
        return view('admin.videos-create', compact('video', 'id', 'action', 'users', 'sounds', 'menu', 'menuUrl', 'submenu', 'submenuUrl', 'cloud_flare_subdomain'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->_form_validation($request);
        //DB::table('videos')->where('video_id',$id)->update($data);
        return redirect(config('app.admin_url') . '/videos')->with('success', 'Video updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function serverProcessing(Request $request)
    {
        $currentPath = url(config('app.admin_url')) . '/videos/';

        $list = $this->get_datatables($request);
        $data = array();
        $no = $request->start;
        $admin = auth()->user();

        // $cloud_flare_subdomain = config('app.cloud_flare_subdomain');
        foreach ($list as $category) {
            $no++;
            $row = array();
            //<a class="edit" href="'.$currentPath.$category->video_id.'/edit"><i class="fa fa-edit"></i></a>;
            // $row[] = '<a class="view" href="'.$currentPath.$category->video_id.'/'.'view"><i class="fa fa-search"></i></a><a class="delete deleteSelSingle" style="cursor:pointer;" data-val="'.$category->video_id.'"><i class="fa fa-trash"></i></a>';
            $row[] = '<div class="align-center"><input id="cb' . $no . '" name="key_m[]" class="delete_box blue-check" type="checkbox" data-val="' . $category->video_id . '"><label for="cb' . $no . '"></label></div>';
            $row[] = $category->username;
            $row[] = $category->description;
            // if(file_exists('storage/videos/'.$category->user_id.'/'.$category->video)){
            // $exists = Storage::disk(config('app.filesystem_driver'))->exists('public/videos/'.$category->user_id.'/'.$category->video);
            // if($exists){ 
            $html = "<i class='fa fa-play-circle-o video_play' aria-hidden='true'></i>";
            // }else{
            //     $html='';
            // }
            // $row[] = "<div style='position:relative;text-align:center;'>" . $html . "<img src='$cloud_flare_subdomain/$category->cf_video_id/thumbnails/thumbnail.jpg' height=200 data-bs-toggle='modal' data-bs-target='#homeVideo' class='video_thumb' id='$cloud_flare_subdomain/$category->cf_video_id/manifest/video.m3u8'/></div>";
            $row[] = "<div style='position:relative;text-align:center;'>" . $html . "<img src=" . asset(Storage::url('public/videos/' . $category->user_id . '/thumb/' . $category->thumb)) . " height=200 data-bs-toggle='modal' data-bs-target='#homeVideo' class='video_thumb' id='" . asset(Storage::url('public/videos/' . $category->user_id . '/' . $category->video)) . "'/></div>";

            if ($category->active == 1) {
                $active = "checked";
            } else {
                $active = "";
            }
            $row[] = '<input type="checkbox" class="active_toggle" ' . $active . ' data-id="' . $category->video_id . '" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" >';
            if ($category->flag == 1) {
                $checked = "checked";
            } else {
                $checked = "";
            }
            $row[] = '<input type="checkbox" class="flaged_toggle" ' . $checked . ' data-id="' . $category->video_id . '" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" >';

            if ($admin->type == 'A') {
                $row[] = '<a class="view btn btn-success green-bg text-white" href="' . $currentPath . $category->video_id . '/' . 'view"><i class="fa fa-search"></i></a> <a class="delete deleteSelSingle btn btn-danger text-white" style="cursor:pointer;" data-val="' . $category->video_id . '"><i class="fa fa-trash"></i></a>';
            } else {
                $row[] = '';
            }
            $data[] = $row;
        }

        $output = array(
            "draw" => $request->draw,
            "recordsTotal" => $this->count_all($request),
            "recordsFiltered" => $this->count_filtered($request),
            "data" => $data,
        );
        echo json_encode($output);
    }

    private function _get_datatables_query($request)
    {
        $keyword = $request->search['value'];
        $order = $request->order;
        $candidateRS = DB::table('videos as v')
            ->leftJoin('users as u', 'u.user_id', '=', 'v.user_id')
            ->select(DB::raw("v.*,u.username"));

        $strWhere = " v.deleted=0 ";
        $strWhereOr = "";
        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($keyword) // if datatable send POST for search{
                $strWhereOr = $strWhereOr . " $item like '%" . $keyword . "%' or ";
            //$candidateRS = $candidateRS->orWhere($item, 'like', '%' . $keyword . '%') ;
        }
        $strWhereOr = trim($strWhereOr, "or ");
        if ($strWhereOr != "") {
            $candidateRS = $candidateRS->whereRaw($strWhere . " and (" . $strWhereOr . ")");
        } else {
            $candidateRS = $candidateRS->whereRaw($strWhere);
        }


        if (isset($order)) // here order processing
        {
            $candidateRS = $candidateRS->orderBy($this->column_order[$request->order['0']['column']], $request->order['0']['dir']);
        } else if (isset($this->order)) {
            $orderby = $this->order;
            $candidateRS = $candidateRS->orderBy(key($orderby), $orderby[key($orderby)]);
        }

        return $candidateRS;
    }

    function get_datatables($request)
    {
        $candidateRS = $this->_get_datatables_query($request);
        if ($request->length != -1) {
            $candidateRS = $candidateRS->limit($request->length);
            if ($request->start != -1) {
                $candidateRS = $candidateRS->offset($request->start);
            }
        }

        $candidates = $candidateRS->get();
        return $candidates;
    }

    function count_filtered($request)
    {
        $candidateRS = $this->_get_datatables_query($request);
        return $candidateRS->count();
    }

    public function count_all($request)
    {
        $candidateRS = DB::table('videos')->select(DB::raw("count(*) as total"))->where('active', 1)->first();
        return $candidateRS->total;
    }

    public function delete(Request $request)
    {
        $admin = auth()->user();
        if ($admin->type == 'A') {
            $rec_exists = array();
            $del_error = '';
            $ids = explode(',', $request->ids);
            foreach ($ids as $id) {
                $videoRes = DB::table('videos')->select(DB::raw("video,user_id"))->where('video_id', $id)->first();
                $video_name = explode('/', $videoRes->video);
                $folder_name = $videoRes->user_id . '/' . $video_name[0];
                $f_name = explode('.', $video_name[0]);
                $thumb_name = $videoRes->user_id . '/thumb/' . $f_name[0] . '.jpg';
                $gif_name = $videoRes->user_id . '/gif/' . $f_name[0] . '.gif';

                Storage::deleteDirectory("public/videos/" . $folder_name);
                Storage::Delete("public/videos/" . $thumb_name);
                Storage::Delete("public/videos/" . $gif_name);

                // $cf_video_id = DB::table('videos')->where('video_id', $id)->pluck('cf_video_id')->first();
                // if ($cf_video_id) {
                //     Functions::deleteVideoFromCloudFlare($cf_video_id);
                // }
                DB::table('videos')->where('video_id', $id)->delete();
            }

            if ($del_error == 'error') {
                // $request->session()->put('error',$msg );
                return response()->json(['status' => 'error', "rec_exists" => $rec_exists]);
            } else {
                if (count($ids) > 1) {
                    $msg = "Video deleted successfully";
                } else {
                    $msg = "Video deleted successfully";
                }
                $request->session()->put('success', $msg);
                return response()->json(['status' => 'success', "rec_exists" => $rec_exists]);
            }
        }
        return redirect()->back();
    }

    public function copyContent($id)
    {
        $action = 'copy';
        $parent_categories = DB::table('categories')
            ->select(DB::raw('cat_id,cat_name,parent_id'))
            ->where('parent_id', 0)
            ->orderBy('cat_id', 'ASC')
            ->get();
        $categories = DB::table('categories')
            ->select(DB::raw('cat_id,cat_name,parent_id'))
            ->where('parent_id', '!=', 0)
            ->orderBy('cat_id', 'ASC')
            ->get();
        $sound = DB::table('sounds')->select(DB::raw("*"))->where('sound_id', '=', $id)->first();
        return view('admin.sounds-create', compact('id', 'sound', 'action', 'parent_categories', 'categories'));
    }
    public function flaged_video(Request $request)
    {
        // dd($request->all());
        DB::table('videos')->where('video_id', $request->id)->update(['flag' => $request->status, 'enabled' => $request->enabled]);
        if ($request->status == '1') {
            return 'Video Flaged';
        } else {
            return 'Video Unflaged';
        }
    }

    public function active_video(Request $request)
    {
        DB::table('videos')->where('video_id', $request->id)->update(['active' => $request->active]);
        if ($request->active == '1') {
            return 'Video Activated Successfully';
        } else {
            return 'Video Inactivated Successfully!';
        }
    }
}
