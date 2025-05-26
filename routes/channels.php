<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Conversation;
use App\Models\StreamUser;
use App\Models\Stream;
use App\User;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function ($user) {
    return ['id' => $user->user_id, 'name' => $user->fname];
});


Broadcast::channel('chat.{conversation}', function ($user, Conversation $conversation) {

    if($user->user_id == $conversation->user_from || $user->user_id == $conversation->user_to )
    {
        return true;
    }
    return false;
});

Broadcast::channel('stream', function ($user) {
    return ['id' => $user->user_id];
});

Broadcast::channel('stream.{stream}', function ($user,Stream $stream) {
    // return ['user_id' => $user->user_id, 'stream' => $stream->id];
    $res=StreamUser::where('user_id',$user->user_id)->where('stream_id',$stream->id)->exists();
    if($res){
        return true;
    }
    return false;
});
