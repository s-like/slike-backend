<?php

namespace App\Http\Controllers\API;

use Notification;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\Common\Functions;
use Illuminate\Support\Facades\DB;
use App\Events\StreamSendGiftEvent;
use App\Http\Controllers\Controller;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use AmrShawky\LaravelCurrency\Facade\Currency;

class GiftsController extends Controller
{
    public function _error_string($errArray)
    {
        $error_string = '';
        foreach ($errArray as $key) {
            $error_string .= $key . "\n";
        }
        return $error_string;
    }

    public function list(Request $request)
    {
        $path = asset(Storage::url('gifts'));
        $gifts = DB::table('gifts')->select(DB::raw('id,name,concat("' . $path . '","/",icon) as icon,coins'))->paginate(10);
        return response()->json(['status' => true, 'data' => $gifts->items()]);
    }

    public function sendGift(Request $request)
    {
        $limit = 10;
        $user_id = 0;
        if (auth()->guard('api')->user()) {

            $validator = Validator::make($request->all(), [
                'gift_id' => 'required',
                'video_id' => 'required'
            ], [
                'gift_id.required' => 'You can\'t leave gift id field empty',
                'video_id.required' => 'You can\'t leave video id field empty'
            ]);

            if (!$validator->passes()) {
                return response()->json(['status' => 'error', 'msg' => $this->_error_string($validator->errors()->all())]);
            } else {
                $user = auth()->guard('api')->user();
                $user_id = auth()->guard('api')->user()->user_id;
                $gift_id = $request->gift_id;
                $video_id = $request->video_id;

                $gift = DB::table('gifts')->where('id', $gift_id)->first();
                $video = DB::table('videos')->where('video_id', $video_id)->first();
                $video_user_id = $video->user_id;
                $videoUser=DB::table('users')->where('user_id',$video_user_id)->first();
                if ($user->wallet_amount >= $gift->coins) {

                    DB::table('wallet_history')->insert([
                        'coins' => $gift->coins,
                        'type' => 'D',
                        'status' => "You sent a gift on <b> ".$videoUser->username."'s </b> video",
                        'user_id' => $user_id,
                        'created_at' => date('Y-m-d H:i:s'), 
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                    DB::table('wallet_history')->insert([
                        'coins' => $gift->coins,
                        'type' => 'C',
                        'status' => "<b> ".$user->username . " </b> sent you a gift on your video",
                        'user_id' => $video_user_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);

                    DB::table('video_gifts')->insert([
                        'from_id' => $user_id,
                        'to_id' => $video_user_id,
                        'video_id' => $video_id,
                        'gift_id' => $gift_id,
                        'coins' => $gift->coins,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                    DB::table('users')->where('user_id', $user_id)->decrement('wallet_amount', $gift->coins);
                    DB::table('users')->where('user_id', $video_user_id)->increment('wallet_amount', $gift->coins);
                    $wallet_amount = DB::table('users')->where('user_id', $user_id)->first()->wallet_amount;

                    // send notification
                    $not_data['added_on'] = date("Y-m-d H:i:s");
                    $not_data['notify_to'] = $video_user_id;
                    $not_data['message'] = $user->username . " sent you a gift";
                    $not_data['type'] = "G";
                    $not_data['video_id'] = $video_id;
                    $not_data['notify_by'] = $user_id;
                    DB::table('notifications')->insert($not_data);

                    $rs_post = DB::table('users')->where('user_id', $video_user_id)->first();
                    try{
                        if ($rs_post->fcm_token && $rs_post->fcm_token != "" && $rs_post->fcm_token != null) {
                            $title = "NEW GIFT RECEIVED";
                            $message = $user->username . " sent you a gift";
                            $fcmTokens = [$rs_post->fcm_token];
                            $image = asset(Storage::url('gifts')) . '/' . $gift->icon;
                            $param = ['id' => strval($video_id), 'type' => 'gift', 'image' => $image, 'to_id' => strval($video_user_id), 'from_id' => strval($user_id)];
                            // Notification::send(null, new UserNotification($title, $message, $image, $param, $fcmTokens));
                            $user=User::where('user_id',$rs_post->user_id)->first();  
                            $user->notify(new UserNotification($title, $message, $image, $param));
                        }
                    } catch (\Exception $e) {
                    }

                    // end notification
                    return response()->json(['status' => true, 'msg' => 'Gift sent!', 'wallet_amount' => $wallet_amount]);
                } else {
                    return response()->json(['status' => false, 'msg' => 'Insufficent Coins!']);
                }
            }
        } else {
            return response()->json(['status' => false, 'msg' => 'Unauthorized user']);
        }
    }

    public function sendStreamGift(Request $request)
    {
        $limit = 10;
        $user_id = 0;
        if (auth()->guard('api')->user()) {

            $validator = Validator::make($request->all(), [
                'gift_id' => 'required',
                'stream_id' => 'required'
            ], [
                'gift_id.required' => 'You can\'t leave gift id field empty',
                'stream_id.required' => 'You can\'t leave stream id field empty'
            ]);

            if (!$validator->passes()) {
                return response()->json(['status' => 'error', 'msg' => $this->_error_string($validator->errors()->all())]);
            } else {
                $user = auth()->guard('api')->user();
                $user_id = auth()->guard('api')->user()->user_id;
                $gift_id = $request->gift_id;
                $stream_id = $request->stream_id;

                $gift = DB::table('gifts')->where('id', $gift_id)->first();
                $giftImage = asset(Storage::url('gifts')) . '/' . $gift->icon;
                $stream = DB::table('streams')->where('id', $stream_id)->first();
                $stream_user_id = $stream->user_id;
                $streamUser=DB::table('users')->where('user_id',$stream_user_id)->first();
                if ($user->wallet_amount >= $gift->coins) {

                    DB::table('wallet_history')->insert([
                        'coins' => $gift->coins,
                        'type' => 'D',
                        'status' => "You sent a gift on <b> ".$streamUser->username."'s </b> live stream",
                        'user_id' => $user_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                    DB::table('wallet_history')->insert([
                        'coins' => $gift->coins,
                        'type' => 'C',
                        'status' => "<b> ".$user->username . " </b> sent you a gift on your live stream",
                        'user_id' => $stream_user_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);

                    DB::table('video_gifts')->insert([
                        'from_id' => $user_id,
                        'to_id' => $stream_user_id,
                        'video_id' => $stream_id,
                        'gift_id' => $gift_id,
                        'coins' => $gift->coins,
                        'type' => 'S',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                    DB::table('users')->where('user_id', $user_id)->decrement('wallet_amount', $gift->coins);
                    DB::table('users')->where('user_id', $stream_user_id)->increment('wallet_amount', $gift->coins);
                    $wallet_amount = DB::table('users')->where('user_id', $user_id)->first()->wallet_amount;

                    // send notification
                    $not_data['added_on'] = date("Y-m-d H:i:s");
                    $not_data['notify_to'] = $stream_user_id;
                    $not_data['message'] = $user->username . " sent you a gift on your live stream";
                    $not_data['type'] = "G";
                    $not_data['video_id'] = $stream_id;
                    $not_data['notify_by'] = $user_id;
                    DB::table('notifications')->insert($not_data);
                    
                    
                    // $not_data['created_on'] = date("Y-m-d H:i:s");
                    // $not_data['notify_to'] = $stream_user_id;
                    // $not_data['title'] = $user->username . " sent you a gift on your live stream";
                    // $not_data['message'] = "my-gifts";
                    // $not_data['video_id'] = $stream_id;
                    // $not_data['notify_by'] = $user_id;
                    // DB::table('notifications')->insert($not_data);

                    $rs_post = DB::table('users')->where('user_id', $stream_user_id)->first();
                    try{
                        if ($rs_post->fcm_token && $rs_post->fcm_token != "" && $rs_post->fcm_token != null) {
                            $title = "NEW GIFT RECEIVED";
                            $message = $user->username . " sent you a gift on your live stream";
                            $fcmTokens = [$rs_post->fcm_token];
                            $image = asset(Storage::url('gifts')) . '/' . $gift->icon;
                            $param = ['id' => strval($stream_id), 'type' => 'live-gift', 'image' => $image, 'to_id' => strval($stream_user_id), 'from_id' => strval($user_id)];
                            // Notification::send(null, new UserNotification($title, $message, $image, $param, $fcmTokens));
                            $user=User::where('user_id',$rs_post->user_id)->first();  
                            $user->notify(new UserNotification($title, $message, $image, $param));
                        }
                    } catch (\Exception $e) {
                    }
                    $commentedOn = date('Y-m-d H:i:s');

                    $content['title'] = $user->username . " sent you a gift on your live stream";
                    $content['type'] = 'G';
                    $content['time'] = \Carbon\Carbon::parse($commentedOn)->diffForHumans();
                    $content['stream_id'] = $stream_id;
                    $content['gift_id'] = $gift_id;
                    $content['image'] = $giftImage;
                    $content['coins'] = $gift->coins;
                    $content['username'] = $user->username;
                    $content['user_id'] = $user->user_id;
                    $content['added_on'] = $commentedOn;
                    broadcast(new StreamSendGiftEvent($content));

                    // end notification
                    return response()->json(['status' => true, 'msg' => 'Gift sent!', 'wallet_amount' => $wallet_amount]);
                } else {
                    return response()->json(['status' => false, 'msg' => 'Insufficent Coins!']);
                }
            }
        } else {
            return response()->json(['status' => false, 'msg' => 'Unauthorized user']);
        }
    }

    public function myGifts(Request $request)
    {
        $user = auth()->guard('api')->user();
        // dd($user);
        if ($user) {
            $user_id = $user->user_id;

            $defaulProfile = asset('assets/images/profile.png');
            $videoStoragePath = asset(Storage::url('public/videos'));
            $defaultFile = Storage::url("public/videos");
            $profilePath = asset(Storage::url("public/profile_pic"));

            $giftPath = asset(Storage::url('gifts'));

            $gifts = DB::table('video_gifts as g')
                ->leftJoin('videos as v', 'v.video_id', 'g.video_id')
                ->join('gifts as gf', 'gf.id', 'g.gift_id')
                ->leftJoin('users as u', 'u.user_id', 'g.from_id')
                ->select(DB::raw("g.*,concat('" . $giftPath . "','/',gf.icon) as gift_icon,
                v.video_id as video_id,
                ifnull(case when thumb='' then '' else concat('".$videoStoragePath."/',v.user_id,'/thumb/',thumb) end,'')
                as file,
                CASE WHEN g.type='V' THEN 'Video' ELSE concat(u.username,' sent you a gift') END as title,g.type as type,u.username,
                case when u.user_dp!='' THEN case when INSTR(u.user_dp,'https://') > 0 THEN u.user_dp ELSE concat('".$profilePath."/',u.user_id,'/',u.user_dp) END ELSE '" . $defaulProfile . "' END as profile_pic
            "))->where('to_id', $user_id)
                // ->whereRaw(DB::raw("(g.type='S' OR g.type='V')"))
                ->orderBy("id", "desc");
            $total = $gifts->get()->count();
            $gifts = $gifts->paginate(10);
            return response()->json(['status' => true, 'data' => $gifts->items(), 'total' => $total]);
        } else {
            return response()->json(['status' => false, 'msg' => 'Unauthorized user']);
        }
    }

    public function sentGifts(Request $request)
    {
        $user = auth()->guard('api')->user();
        if ($user) {
            $user_id = $user->user_id;

            $defaulProfile = asset('assets/images/profile.png');

            $defaultFile = Storage::url("videos");
            $profilePath = Storage::url("profile_pic");

            $giftPath = asset(Storage::url('gifts'));

            $gifts = DB::table('video_gifts as g')
                ->leftJoin('videos as p', 'p.post_id', 'g.post_id')
                ->join('gifts as gf', 'gf.id', 'g.gift_id')
                ->leftJoin('users as u', 'u.user_id', 'g.to_id')
                ->select(DB::raw("g.*,concat('" . $giftPath . "','/',gf.icon) as gift_icon,
                p.post_id as post_id,
                CASE WHEN p.type='V' then concat('" . $defaultFile . "','/',g.to_id,'/thumb/',REPLACE(p.file,'.mp4','.jpg'))
                ELSE '" . $defaulProfile . "' END
                as file,
                CASE WHEN g.type='V' THEN 'Post' ELSE concat('You sent a gift to ',u.username) END as title,p.added_on as added_on,g.type as type,u.username,
                case when u.profile_pic!='' THEN case when INSTR(u.profile_pic,'https://') > 0 THEN u.profile_pic ELSE concat('".$profilePath."/',u.user_id,'/',u.profile_pic) END ELSE '" . $defaulProfile . "' END as profile_pic
            "))->where('from_id', $user_id)
                ->where('g.type', 'V')->orderBy("id", "desc");
            $total = $gifts->get()->count();
            $gifts = $gifts->paginate(10);
            return response()->json(['status' => true, 'data' => $gifts->items(), 'total' => $total]);
        } else {
            return response()->json(['status' => false, 'msg' => 'Unauthorized user']);
        }
    }
}
