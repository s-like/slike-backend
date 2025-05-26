<?php if(count($comments)>0){ ?>
@foreach ($comments as $comment)

    <div class="single-comment">
        <a class="pjax" href="{{ route('web.userProfile', $comment->user_id) }}">
            <?php 
            if($comment->user_dp!=""){
                if(strpos($comment->user_dp,'facebook.com') !== false || strpos($comment->user_dp,'fbsbx.com') !== false || strpos($comment->user_dp,'googleusercontent.com') !== false){ 
                    $u_dp=$comment->user_dp;
                    }else{
                        // $exists = Storage::disk(config('app.filesystem_driver'))->exists('public/profile_pic/'.$comment->user_id.'/small/'.$comment->user_dp);
                        // if($exists){ 
                            $u_dp=asset(Storage::url('public/profile_pic').'/'.$comment->user_id.'/small/'.$comment->user_dp) ;
                        // }else{ 
                        // $u_dp= asset('storage/profile_pic/default.png');
                        // } 
                    } 
                }else{ 
                    $u_dp= asset('default/default.png');
                } ?>
            <img src="{{ $u_dp }}" alt="">
        </a>
        <span> 
            <a class="pjax" href="{{ route('web.userProfile', $comment->user_id) }}">
                {{ '@' . $comment->username }}
                <?php if($comment->verified=='A'){ ?>
                    <img src="{{ asset('default/verified-icon-blue.png') }}" alt="" style="width:15px;height:15px;">
                <?php } ?>
            </a> 
                <br />{{ $comment->comment }} <br />
                <span style="font-size: 10px;">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($comment->updated_on))->diffForHumans() }}</span>
           
        </span>
    </div>
    
@endforeach
        <?php }
        
        else{ ?>
            <h6 class="text-center" id="no_comment">No Comment... {{$morePages}}</h6> 
        <?php } ?>