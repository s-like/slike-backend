<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class StreamUser extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function stream()
    {
        return $this->belongsTo(Stream::class,'stream_id','id');
    }
}
