<?php

namespace App\Http\Controllers\API;

use Auth;
use Mail;
use App\User;
use DateTime;
use App\Models\Comment;
use App\Models\StreamUser;
use App\Events\StreamEvent;
use Illuminate\Http\Request;
use App\Events\StreamExitEvent;
use App\Events\StreamJoinEvent;
use App\Helpers\Common\Functions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Events\StreamNewCommentEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StreamController extends Controller
{
    private function _error_string($errArray)
    {
        $error_string = '';
        foreach ($errArray as $key) {
            $error_string .= $key . "\n";
        }
        return $error_string;
    }
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','leavingLiveUser']]);
    }


    public function start(Request $request)
    {
        if (auth()->guard('api')->user()) {
            $validator = Validator::make($request->all(), [
                'stream_name'          => 'required',
            ], [
                'stream_name.required'    => 'Stream Name is required',
            ]);

            if (!$validator->passes()) {
                return response()->json(['status' => 'error', 'msg' => $this->_error_string($validator->errors()->all())]);
            } else {
                $user_id = auth()->guard('api')->user()->user_id;
                $stream_id = DB::table('streams')->insertGetId([
                    'user_id' => $user_id,
                    'name' => $request->stream_name,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                $streamUser = new StreamUser();
                $streamUser->user_id = $user_id;
                $streamUser->stream_id = $stream_id;
                $streamUser->save();

                DB::table('users')->where('user_id', $user_id)
                    ->update([
                        'live' => 1
                    ]);

                broadcast(new StreamEvent($stream_id, $user_id));

                // notification                
                $users = DB::table("users as u")->select(DB::raw("GROUP_CONCAT(f.follow_by) as user_ids"))
                    ->join('follow as f', function ($join) use ($request, $user_id) {
                        $join->on('u.user_id', '=', 'f.follow_to')
                        ->where('f.follow_to', $user_id);
                    })
                    ->join('follow as f2', function ($join) use ($request, $user_id) {
                        $join->on('u.user_id', '=', 'f2.follow_by')
                            ->where('f2.follow_by', $user_id);
                    })   
                    ->leftJoin('blocked_users as bu', function ($join) use ($request, $user_id) {
                        $join->on('u.user_id', '=', 'bu.user_id');
                        $join->where('bu.blocked_by', $user_id);
                    })
                    ->leftJoin('blocked_users as bu2', function ($join) use ($request, $user_id) {
                        $join->on('u.user_id', '=', 'bu2.blocked_by');
                        $join->where('bu2.user_id', $user_id);
                    })
                    ->whereNULL('bu.block_id')->whereNULL('bu2.block_id');
                $users = $users->where('f.follow_to', $user_id);
                $users = $users->where('f.follow_by', '<>', $user_id);
                $users = $users->where("u.deleted", 0)->where("u.active", 1);
                $users = $users->groupBy('u.user_id');
                $users = $users->orderBy('u.user_id', 'desc');
                $users = $users->first();

                $title = auth()->guard('api')->user()->fname . ' ' . auth()->guard('api')->user()->lname;
                $body = 'started live';
                $img = '';

                // $file_path = '';
                // $small_file_path = '';
                $user = auth()->guard('api')->user();
                if ($user->user_dp != '' && $user->user_dp != null) {
                    if (stripos($user->user_dp, 'https://') !== false) {
                        $img = $user->user_dp;
                    } else {
                        $img = asset(Storage::url('public/profile_pic/' . $user->user_id . "/" . $user->user_dp));
                    }
                }
                
                $firebaseToken=false;
                if ($users) {
                    
                    $user_ids = explode(',', $users->user_ids);
                    $firebaseToken = User::where('fcm_token', '<>', '')->whereIn('user_id', $user_ids)->pluck('fcm_token')->all();
                }
                $SERVER_API_KEY = config('app.server_api_key');
                if($firebaseToken){
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
                            "id" => $stream_id,
                            "type" => 'stream',
                            "stream_name" => $request->stream_name,
                            "image" => $img,
                            "stream_user_id" => $user_id,
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
                //	return $result;

                //end notification

                return response()->json(['status' => 'success', 'msg' => 'Streaming start', 'stream_id' => $stream_id]);
            }
        }
    }
    
    public function join(Request $request)
    {
        if (auth()->guard('api')->user()) {
            $validator = Validator::make($request->all(), [
                'stream_id'          => 'required',
            ], [
                'stream_id.required'    => 'Stream is required',
            ]);

            if (!$validator->passes()) {
                return response()->json(['status' => 'error', 'msg' => $this->_error_string($validator->errors()->all())]);
            } else {
                $user_id = auth()->guard('api')->user()->user_id;
                $stream_id = $request->stream_id;
                $userDpPath = asset(Storage::url('public/profile_pic'));

                $stream = DB::table('streams')->where('id', $stream_id)->first();
                $user = DB::table('users as u')->select(\DB::raw("u.user_id,
                case when u.user_dp !='' THEN case when INSTR(u.user_dp,'https://') > 0 THEN u.user_dp ELSE concat('" . $userDpPath . "/',u.user_id,'/small/',u.user_dp)  END ELSE '' END as user_dp,
                concat('@',u.username) as username,u.fname,u.lname,IF(uv.verified='A', true, false) as isVerified,ifnull(f.follow_id,0) as isFollowing"))
                    ->leftJoin('user_verify as uv', function ($join) {
                        $join->on('uv.user_id', '=', 'u.user_id')
                            ->where('uv.verified', 'A');
                    })
                    ->leftJoin('follow as f', function ($join) use ($request, $user_id) {
                        $join->on('u.user_id', '=', 'f.follow_to')
                            ->where('f.follow_by', $user_id);
                    })->where('u.user_id', $stream->user_id)
                    ->first();

                $streamUser = new StreamUser();
                $streamUser->user_id = $user_id;
                $streamUser->stream_id = $stream_id;
                $streamUser->save();

                $userDpPath = asset(Storage::url('public/profile_pic'));
                $member = StreamUser::select(\DB::raw("u.user_id,
                case when u.user_dp !='' THEN case when INSTR(u.user_dp,'https://') > 0 THEN u.user_dp ELSE concat('" . $userDpPath . "/',u.user_id,'/',u.user_dp)  END ELSE '' END as user_dp,
                concat('@',u.username) as username"))
                    ->join('users as u', 'stream_users.user_id', 'u.user_id')
                    ->where('stream_id', $stream_id)
                    ->where('u.user_id', $user_id)->first();

                $memberData['user_id'] = $member->user_id;
                $memberData['username'] = $member->username;
                $memberData['user_dp'] = $member->user_dp;
                \Log::info($stream_id." -- ".$user_id);
                broadcast(new StreamEvent($stream_id, $user_id));
                \Log::info("Yes Bank");
                broadcast(new StreamJoinEvent($stream_id, $memberData));
                
                $comments = Comment::select(DB::raw("comments.*,concat('@',u.username) as username,case when u.user_dp !='' THEN case when INSTR(u.user_dp,'https://') > 0 THEN u.user_dp ELSE concat('" . $userDpPath . "/',u.user_id,'/small/',u.user_dp)  END ELSE '' END as pic"))
                        ->join('users as u','u.user_id','comments.user_id')
                        ->where('comments.stream_id',$stream_id)
                        ->where('stream_id',$stream_id)
                        ->orderBy('comment_id',"desc")
                        ->paginate();
                $user_ids= StreamUser::where('stream_id',$stream_id)->where('user_id',"<>",$user_id)->get()->pluck('user_id');
                
                $gifts = DB::table('video_gifts as pg')
                    ->select(DB::raw("pg.id,pg.coins"))
                    ->join('gifts as g', function ($q) {
                        $q->on('g.id', 'pg.gift_id');
                            
                    })->where('type', 'S')->where('video_id',$stream_id);
                    
                $total_gifts=$gifts->get()->count();
                $total_coins=$gifts->get()->sum('coins');
                
                return response()->json(['status' => 'success', 'msg' => 'Stream Joined', 'stream_id' => $stream_id, 'comments' => $comments, 'viewers' => $user_ids,'user' => $user, 'total_gifts' => $total_gifts, 'total_coins' => $total_coins]);
            }
        }
    }

    public function exit(Request $request)
    {
        if (auth()->guard('api')->user()) {
            $validator = Validator::make($request->all(), [
                'stream_id'          => 'required',
            ], [
                'stream_id.required'    => 'Stream is required',
            ]);

            if (!$validator->passes()) {
                return response()->json(['status' => 'error', 'msg' => $this->_error_string($validator->errors()->all())]);
            } else {
                $user_id = auth()->guard('api')->user()->user_id;
                $stream_id = $request->stream_id;

                StreamUser::where('user_id', $user_id)
                    ->where('stream_id', $stream_id)->delete();

                    $userDpPath = asset(Storage::url('public/profile_pic'));
                    $member = User::select(\DB::raw("user_id,
                    case when user_dp !='' THEN case when INSTR(user_dp,'https://') > 0 THEN user_dp ELSE concat('" . $userDpPath . "/',user_id,'/',user_dp)  END ELSE '' END as user_dp,
                    concat('@',username) as username"))
                        ->where('user_id', $user_id)->first();
    
                    $memberData['user_id'] = $member->user_id;
                    $memberData['username'] = $member->username;
                    $memberData['user_dp'] = $member->user_dp;
                    broadcast(new StreamExitEvent($request->stream_id, $memberData));

                return response()->json(['status' => 'success', 'msg' => 'Exist from Stream', 'stream_id' => $stream_id]);
            }
        }
    }

    public function stop(Request $request)
    {
        if (auth()->guard('api')->user()) {
            $validator = Validator::make($request->all(), [
                'stream_id'          => 'required',
            ], [
                'stream_id.required'    => 'Stream Id is required',
            ]);

            if (!$validator->passes()) {
                return response()->json(['status' => 'error', 'msg' => $this->_error_string($validator->errors()->all())]);
            } else {
                $user_id = auth()->guard('api')->user()->user_id;
                DB::table('streams')->where([
                    'id' => $request->stream_id,
                    'user_id' => $user_id
                ])->update([
                    'status' => 0
                ]);

                DB::table('users')->where('user_id', $user_id)
                    ->update([
                        'live' => 0
                    ]);
                return response()->json(['status' => 'success', 'msg' => 'Stream Stop']);
            }
        }
    }

    // public function liveStreamsList(Request $request)
    // {
      
    //     if (auth()->guard('api')->user()) {
    //        $login_id = auth()->guard('api')->user()->user_id;
    //        $streams =  \DB::table('streams')->select(DB::raw("max(id) as id"))->where('status', 1)->groupBy("user_id")->get()->pluck("id")->toArray();
    //        if(count($streams)>0) {
    //             $userDpPath = asset(Storage::url('public/profile_pic'));
    //             $limit = 10;
    //             $users = DB::table("users as u")->select(DB::raw("u.user_id,ss.name as stream_name,ss.id as stream_id,
    //             	case when u.user_dp !='' THEN case when INSTR(u.user_dp,'https://') > 0 THEN u.user_dp ELSE concat('" . $userDpPath . "/',u.user_id,'/',u.user_dp)  END ELSE '' END as user_dp,
    //             	concat('@',u.username) as username,u.fname,u.lname,u.email"))
    //             ->join('streams as ss', 'ss.user_id', 'u.user_id');
    //             if ($login_id > 0) {
    //                 $users = $users->leftJoin('blocked_users as bu', function ($join) use ($request, $login_id) {
    //                     $join->on('u.user_id', '=', 'bu.user_id');
    //                     $join->where('bu.blocked_by', $login_id);
    //                 });
    
    //                 $users = $users->leftJoin('blocked_users as bu2', function ($join) use ($request, $login_id) {
    //                     $join->on('u.user_id', '=', 'bu2.blocked_by');
    //                     $join->where('bu2.user_id', $login_id);
    //                 });
    
    //                 $users = $users->whereNULL('bu.block_id')->whereNULL('bu2.block_id');
    //             }
    //             $users = $users->whereIn('ss.id', $streams)
    //             ->where('u.live', 1)
    //             ->where("u.deleted", 0)
    //             ->where("u.active", 1);
                
    //             if (isset($request->search) && $request->search != "") {
    //                 $search = $request->search;
    //                 $users = $users->whereRaw("((u.username like '%" . $search . "%') or (u.fname like '%" . $search . "%') or (u.lname like '%" . $search . "%'))");
    //             }
                
    //             // $users = $users->groupBy('ss.user_id');
    //             $users = $users->orderBy('u.user_id', 'desc');
    //             $total_records = count($users->get());
    //             $users = $users->paginate($limit)->items();
                
    //             $response = array("status" => 'success', 'data' => $users, 'total_records' => $total_records);   
    //        } else {
    //            return response()->json([
    //                 "status" => false, 'data' => [], 'total_records' => 0
    //             ]);
    //        }
            
    //     } else {
    //         return response()->json([
    //             "status" => false, "msg" => "Unauthorized user!"
    //         ]);
    //     }

    //     return response()->json($response);
    // }

    public function liveStreamsList(Request $request)
    {
      
        if (auth()->guard('api')->user()) {
            $login_id = auth()->guard('api')->user()->user_id;

            $setting=DB::table('app_settings')->select('show_live_stream')->first();
            $loggedInUserFollowers=array();

            // 0:all, 1:only followlers
            if($setting->show_live_stream == 1){
                $loggedInUserFollowers = \DB::table('users as u')
                            ->select("f.follow_by as user_id")
                            ->join('follow as f', function ($join) use ($request, $login_id) {
                                $join->on('u.user_id', '=', 'f.follow_to')
                                ->where('f.follow_to', $login_id);
                            })
                            ->join('follow as f2', function ($join) use ($request, $login_id) {
                                $join->on('u.user_id', '=', 'f2.follow_by')
                                    ->where('f2.follow_by', $login_id);
                            })    
                            ->leftJoin('blocked_users as bu', function ($join) use ($request, $login_id) {
                                $join->on('u.user_id', '=', 'bu.user_id');
                                $join->where('bu.blocked_by', $login_id);
                            })
                            ->leftJoin('blocked_users as bu2', function ($join) use ($request, $login_id) {
                                $join->on('u.user_id', '=', 'bu2.blocked_by');
                                $join->where('bu2.user_id', $login_id);
                            })
                            ->whereNULL('bu.block_id')->whereNULL('bu2.block_id')
                            ->get()
                            ->pluck("user_id")
                            ->toArray();
            }
            if( count($loggedInUserFollowers) > 0 ) {
                $streams =  \DB::table('streams')->select(DB::raw("max(id) as id"))->where('status', 1)->whereIn('user_id',$loggedInUserFollowers)->groupBy("user_id")->get()->pluck("id")->toArray();
            }else{
                $streams =  \DB::table('streams')->select(DB::raw("max(id) as id"))->where('status', 1)->groupBy("user_id")->get()->pluck("id")->toArray();
            }
               if(count($streams)>0) {
                    $userDpPath = asset(Storage::url('public/profile_pic'));
                    $limit = 10;
                    $users = DB::table("users as u")->select(DB::raw("u.user_id,ss.name as stream_name,ss.id as stream_id,
                    	case when u.user_dp !='' THEN case when INSTR(u.user_dp,'https://') > 0 THEN u.user_dp ELSE concat('" . $userDpPath . "/',u.user_id,'/',u.user_dp)  END ELSE '' END as user_dp,
                    	concat('@',u.username) as username,u.fname,u.lname,u.email"))
                    ->join('streams as ss', 'ss.user_id', 'u.user_id')
                    ->whereIn('ss.id', $streams)
                    ->where('u.live', 1)
                    ->where("u.deleted", 0)
                    ->where("u.active", 1);
                    
                    if (isset($request->search) && $request->search != "") {
                        $search = $request->search;
                        $users = $users->whereRaw("((u.username like '%" . $search . "%') or (u.fname like '%" . $search . "%') or (u.lname like '%" . $search . "%'))");
                    }
                    
                    // $users = $users->groupBy('ss.user_id');
                    $users = $users->orderBy('u.user_id', 'desc');
                    $total_records = count($users->get());
                    $users = $users->paginate($limit)->items();
                    
                    $response = array("status" => 'success', 'data' => $users, 'total_records' => $total_records);   
               } else {
                   return response()->json([
                        "status" => false, 'data' => [], 'total_records' => 0
                    ]);
               }
            // } else {
            //     return response()->json([
            //         "status" => false, 'data' => [], 'total_records' => 0
            //     ]);
            // }
        } else {
            return response()->json([
                "status" => false, "msg" => "Unauthorized user!"
            ]);
        }

        return response()->json($response);
    }
    


    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stream_id'    => 'required',
            'comment' => 'required',
        ], [
            'stream_id.required'      => 'Stream id is required',
            'comment.required'      => 'Comment is required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 'error', 'msg' => $this->_error_string($validator->errors()->all())]);
        } else {

            if (auth()->guard('api')->user()) {

                $user_id = auth()->guard('api')->user()->user_id;
                $stream_id = $request->stream_id;

                $isExists = StreamUser::where('stream_id', $stream_id)->where('user_id', $user_id)->first();
                if ($isExists) {
                    $commentedOn = date('Y-m-d H:i:s');
                    $comment = $request->comment;
                    $comment_id = DB::table('comments')->insertGetId([
                                        'user_id' => $user_id,
                                        'stream_id' => $stream_id,
                                        'comment' => $comment,
                                        'active' => 1,
                                        'type' => 'S',
                                        'video_id' => 0,
                                        'added_on' => $commentedOn,
                                    ]);
                    
                    $userDpPath = asset(Storage::url('public/profile_pic'));
                    $user = DB::table("users as u")->select(DB::raw("u.user_id,
					case when u.user_dp !='' THEN case when INSTR(u.user_dp,'https://') > 0 THEN u.user_dp ELSE concat('" . $userDpPath . "/',u.user_id,'/',u.user_dp)  END ELSE '' END as user_dp,
					concat('@',u.username) as username"))
                        ->where('user_id', $user_id)->first();

                    $content['comment'] = $comment;
                    $content['type'] = 'S';
                    $content['time'] = \Carbon\Carbon::parse($commentedOn)->diffForHumans();
                    $content['stream_id'] = $stream_id;
                    $content['comment_id'] = $comment_id;
                    $content['user_dp'] = $user->user_dp;
                    $content['username'] = $user->username;
                    $content['user_id'] = $user->user_id;
                    $content['added_on'] = $commentedOn;
                    broadcast(new StreamNewCommentEvent($content));
                    return response()->json(['status' => 'success', 'msg' => 'Comment Successfully', 'comment_id' => $comment_id]);
                }
            } else {
                return response()->json([
                    "status" => "error", "msg" => "Unauthorized user!"
                ]);
            }
        }
    }
    public function leavingLiveUser(Request $request)
    {
        \Log::info($request);
        // dd($request->all());
        $event=$request->events[0];
        if($event['name']=="member_removed" && $event['channel']=="presence-chat" ){
            $user_id=$event['user_id'];
            $stream = DB::table('streams')->where('user_id',$user_id)->orderBy('id',"desc")->first();
            $subscribedUser = DB::table('stream_users')->where('user_id',$user_id)->orderBy('id',"desc")->first();
            if($subscribedUser){
                $userDpPath = asset(Storage::url('public/profile_pic'));
                $member = User::select(\DB::raw("user_id,
                case when user_dp !='' THEN case when INSTR(user_dp,'https://') > 0 THEN user_dp ELSE concat('" . $userDpPath . "/',user_id,'/small/',user_dp)  END ELSE '' END as user_dp,
                concat('@',username) as username,fname,lname"))
                    ->where('user_id', $user_id)->first();
                $memberData['user_id'] = $member->user_id;
                $memberData['username'] = $member->username;
                $memberData['user_dp'] = $member->user_dp;
                broadcast(new StreamExitEvent($subscribedUser->stream_id, $memberData));
                StreamUser::where('user_id', $user_id)
                    ->where('stream_id', $subscribedUser->stream_id)->delete();

            }
            DB::table('streams')->where('user_id',$user_id)->update(['status'=>0]);
            DB::table('users')->where('user_id', $user_id)
            ->update([
                'live' => 0
            ]);
        }
    }
}
