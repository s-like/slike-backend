<?php
namespace App\Http\Controllers\Web;

use App\Helpers\Common\Functions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;
use Dotenv\Result\Success;
use Route;
use Illuminate\Support\Facades\DB;
use Exception;

class PageController extends WebBaseController
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index($slug){
        $content = DB::table("pages")
            ->where('type',$slug)
            ->first();
        return view("web.page",compact('content'));
    }
    public function sendNotification(Request $request){
        // dd($request->all());
        $SERVER_API_KEY = config('app.server_api_key');
        $firebaseToken =['dqmfy7eVSJytKxkGzlYGF6:APA91bGu2FGQgVsrNJgCPNH7q8Z-CVL11XQZEOv2OCJ17mCAbiD1vFeh7wLvzI08zOJvrsJud4oHYpLTMvTz1yU2MY4O46_2ZOxhecB3HiYKkM6vzuk2MLxBbR5qnt0vRu7siARq6Y7U'];
        $json_data = [
                "registration_ids" => $firebaseToken,
                "notification" => [
                    "body" => 'test body',
                    "title" => 'test title',
                    "icon" => 'https://petshorts.s3.eu-central-1.amazonaws.com/public/uploads/logos/ihkkdehfXQcFVOmTcLwkPAeH4jX6LYovYmZpa2fW.png'
                ],
                "data" => [
                    "title" => 'test title',
                    "body" => 'test body',
                    "id" => '1',
                    "type" => 'video',
                    "image" => 'https://petshorts.s3.eu-central-1.amazonaws.com/public/uploads/logos/ihkkdehfXQcFVOmTcLwkPAeH4jX6LYovYmZpa2fW.png',
                    'msg' => 'masssss',
                    "name" => 'nammmeees'
                ],
                "click_action" => 'FLUTTER_NOTIFICATION_CLICK'
            ];
            $data = json_encode($json_data);
            dd($data);
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
            		
            if ($result === FALSE) {
                die('Oops! FCM Send Error: ' . curl_error($ch));
            }
            dd($result);
    }

}