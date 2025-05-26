<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendVideoNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $video_id=$this->data['video_id'];
        $user_id=$this->data['user_id'];
          // notification
          $video = DB::table('videos')->where('video_id', $video_id)->first();
          // $users = DB::table("users as u")->select(DB::raw("GROUP_CONCAT(u.user_id) as user_ids"))
          $users = DB::table("users as u")
              ->leftJoin('follow as f', function ($join) {
                  $join->on('u.user_id', '=', 'f.follow_to');
                  // ->where('f.follow_by',$request->login_id);
              })
              ->leftJoin('follow as f2', function ($join) use ($user_id) {
                  $join->on('u.user_id', '=', 'f2.follow_to')
                      ->where('f2.follow_by', $user_id);
              });
          if ($user_id > 0) {
              $users = $users->leftJoin('blocked_users as bu', function ($join) use ($user_id) {
                  $join->on('u.user_id', '=', 'bu.user_id');
                  $join->where("bu.blocked_by", $user_id);
                  // $join->whereRaw(DB::raw(" ( bu.blocked_by=" . $user_id . " )"));
              });
  
              $users = $users->leftJoin('blocked_users as bu2', function ($join) use ($user_id) {
                  $join->on('u.user_id', '=', 'bu2.blocked_by');
                  $join->where("bu2.user_id", $user_id);
                  // $join->whereRaw(DB::raw(" (  bu2.user_id=" . $user_id . " )"));
              });
  
              $users = $users->whereRaw(' bu.block_id is null and bu2.block_id is null ');
          }
          $users = $users->where('f.follow_to', '<>', $user_id);
          $users = $users->where('f.follow_by', $user_id)
              ->where("u.deleted", 0)
              ->where("u.active", 1);
  
          $users = $users->orderBy('u.user_id', 'desc');
          // $users = $users->first();
          $users = $users->get()->pluck('user_id')->toArray();
  
          $userRec = User::find($user_id);
          $title = $userRec->fname . ' ' . $userRec->lname;
          $body = 'Upload new video ' . $video->description;
          $videoPath = 'public/videos/' . $user_id;
          $videoThumbPath = storage_path('app/' . $videoPath . '/thumb/' . $video->thumb);
          $img = $videoThumbPath;
          $SERVER_API_KEY = config('app.server_api_key');
          if (count($users) > 0) {
              // dd($users);
              // $user_ids = explode(',', $users->user_ids);
              $user_ids = $users;
              // dd($user_ids);
              $firebaseToken = User::where('fcm_token', '<>', '')->whereIn('user_id', $user_ids)->pluck('fcm_token')->all();
              // }
              
              $json_data = [
                  "registration_ids" => $firebaseToken,
                  "notification" => [
                      "body" => $body,
                      "title" => $title,
                      "icon" => $img
                  ],
                  "data" => [
                      "title" => $title,
                      "body" => $body,
                      "id" => $video_id,
                      "type" => 'video',
                      "image" => $img,
                      'msg' => 'masssss',
                      "name" => 'nammmeees'
                  ],
                  "click_action" => 'FLUTTER_NOTIFICATION_CLICK'
              ];
              $data = json_encode($json_data);
              // dd($data);
              //FCM API end-point
              $url = 'https://fcm.googleapis.com/fcm/send';
              //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
              // $server_key = 'YOUR_KEY';
              //header with content_type api key
              $headers = array(
                  'Content-Type:application/json',
                  'Authorization:key=' . $SERVER_API_KEY
              );
              //CURL request to route notification to FCM connection server (provided by Google)
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
              $result = curl_exec($ch);
              // 			dd($result);
              if ($result === FALSE) {
                  die('Oops! FCM Send Error: ' . curl_error($ch));
              }
          }
          //end notification
  
  
          // video uploaded notification
          $myToken = User::where('fcm_token', '<>', '')->where('user_id', $user_id)->pluck('fcm_token')->all();
          \Log::info($myToken);
          if (count($myToken) > 0) {
              // $title = auth()->guard('api')->user()->fname . ' ' . auth()->guard('api')->user()->lname;
              $body = 'Your video uploaded successfully!';
  
              $json_data = [
                  "registration_ids" => $myToken,
                  "notification" => [
                      "body" => $body,
                      "title" => $title,
                      "icon" => $img
                  ],
                  "data" => [
                      "title" => $title,
                      "body" => $body,
                      "id" => $video_id,
                      "type" => 'video',
                      "image" => $img,
                      'msg' => 'masssss',
                      "name" => 'nammmeees'
                  ],
                  "click_action" => 'FLUTTER_NOTIFICATION_CLICK'
              ];
              $data = json_encode($json_data);
              // dd($data);
              //FCM API end-point
              $url = 'https://fcm.googleapis.com/fcm/send';
              //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
              // $server_key = 'YOUR_KEY';
              //header with content_type api key
              $headers = array(
                  'Content-Type:application/json',
                  'Authorization:key=' . $SERVER_API_KEY
              );
              //CURL request to route notification to FCM connection server (provided by Google)
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
              $result = curl_exec($ch);
              // 			dd($result);
              if ($result === FALSE) {
                  die('Oops! FCM Send Error: ' . curl_error($ch));
              }
          }
          // end video uploaded notification
    }
}
