<?php 
namespace App\Http\Controllers;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Jobs\UpdateWideColumnForVideos;
use Illuminate\Support\Facades\Storage;

class ScriptController extends Controller
{
    public function moveChatOldToNew(Request $request){

        DB::table('chat_chats')->truncate();
        DB::table('chat_conversations')->truncate();
        DB::table('chat_messages')->truncate();

        $oldChats = DB::table('chats')
                        ->select('*')
						->get();

        if( $oldChats->count() > 0 ) {
            $convId = 0;
            $msgId = 0;
            foreach($oldChats as $key=>$chat) {    
                $convertsationExist = DB::table('chat_conversations')
                                        ->select('*')
                                        ->whereRaw(DB::raw(" (user_from=".$chat->from_id." and user_to=".$chat->to_id.") OR (user_from=".$chat->to_id." and user_to=".$chat->from_id.") "))
                                        ->first();
                if(!$convertsationExist){
                    $convId = DB::table('chat_conversations')->insertGetId(['user_from' => $chat->from_id , 'user_to' => $chat->to_id,'created_at' => date('Y-m-d H:i:s')]);
                }else{
                    $convId= $convertsationExist->id;
                }
                $msgId = DB::table('chat_messages')->insertGetId(['msg' => $chat->msg , 'conversation_id' => $convId,'created_at' => $chat->sent_on]);

                DB::table('chat_chats')->insertGetId(['message_id' => $msgId , 'conversation_id' => $convId,'user_id' => $chat->from_id , 'type' => 0,'created_at' => $chat->sent_on,'read_at' => $chat->read_on]);
                DB::table('chat_chats')->insertGetId(['message_id' => $msgId , 'conversation_id' => $convId,'user_id' => $chat->to_id , 'type' => 1,'created_at' => $chat->sent_on,'read_at' => $chat->read_on]);
            }
        }

        DB::table('settings')->where('setting_id',1)->update(['migrated'=>1]);
        return response()->json(['status' => true]);
        echo "Done";
    }
    public function moveFileLocalToS3()
    {
        // $directory = 'public/videos/5';
        $directory = 'public';

        $files = Storage::disk('local')->allFiles($directory);
        // dd($files);
        foreach ($files as $string) {
            echo ($string);
            echo "<br />";

            // $string = $files[0];
            // $parts = explode('_', $string);
            $reversedParts = explode('/', strrev($string), 2);

            $filename = strrev($reversedParts[0]);
            $folder = strrev($reversedParts[1]);

            $localFile = storage_path('app/' . $folder . '/' . $filename);
            $s3FolderPath = $folder;
            $file = new File($localFile);
            // dd($localFile);
            Storage::disk('s3')->putFileAs($s3FolderPath, $file, $filename);
            Storage::disk('s3')->setVisibility($s3FolderPath . '/' . $filename, 'public');
        }
        dd(333);
    }

    public function setVideosAspectRatio()
    {

        $videos = DB::table("videos")->select(DB::raw("video_id,video,video as video_timer_folder,user_id") )->orderBy('video_id','asc')->get();
        $storage_path=config('app.filesystem_driver');
        foreach ($videos as $video) {

            // $videoPath = 'public/videos/' . $res->user_id;
            // $file_path = $videoPath . '/' . $res->video;
            // $storage_path=config('app.filesystem_driver');

            // $currentVideo = array(
            //     'path'          => $file_path,
            //     'video_id'      => $res->video_id,
            // );
            // UpdateWideColumnForVideos::dispatch($currentVideo);
            
            $split = explode('/',$video->video_timer_folder);
            $timeFolder = $split[0];
            if(isset($split[1])){
               $videoName = $split[1];
                $c_path=  $timeFolder.'/master.m3u8';
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
                UpdateWideColumnForVideos::dispatch($currentVideo);
                echo $video->video_id."<br/>"; 
            }
            
        }
    }
}
