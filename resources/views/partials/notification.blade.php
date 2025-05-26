{{-- <div class="row text-left">
    <div class="col-lg-3 col-sm-3 col-3 pt-1 text-center">
        <img onclick="window.location.href='{{ route("web.userProfile", $notifyUserId) }}';" src="{{ $profileImg }}" class="w-50 rounded-circle link">
    </div>
    <div class="col-lg-8 col-sm-8 col-8">
            <strong class="text-info"><span class="link" onclick="window.location.href='{{ route("web.userProfile", $notifyUserId) }}';">{{ $notifyUserName }}</span></strong>
        <br />{{ $msg }} <br />
        <small class="text-warning">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($date))->diffForHumans() }}</small>
        @if ($type == 'F')
        <div onclick="window.location.href='{{ route('web.userProfile', $notify_to) }}'" style="position: absolute;top: 0px;height: 86%;width: 100%;z-index: 100;margin-top: 8%;"></div>
        @else
            {{-- <div onclick="window.location.href='{{ route('web.home', ['videoId' => $video_id]) }}'" style="position: absolute;top: 0px;height: 86%;width: 100%;z-index: 100;margin-top: 8%;"></div> --}}
            {{-- <div onclick="window.location.href='{{ route('web.home', ['videoId' => $video_id]) }}'" style="position: absolute;top: 0px;height: 86%;width: 100%;z-index: 100;margin-top: 8%;"></div>
        @endif
    </div>
</div><hr> --}}

<?php if (!empty($notifications)) { 
				foreach ($notifications as $notification) { 
			
				$profileImg = '';
			 if (!empty($notification->profileImg)) {
					$profileImg = $notification->profileImg;
				} else {
					if(!empty($notification->user_dp)) {
						if(strpos($notification->user_dp,'facebook.com') !== false || strpos($notification->user_dp,'fbsbx.com') !== false || strpos($notification->user_dp,'googleusercontent.com') !== false){ 
							$profileImg=$notification->user_dp;
						}else{
							// $exists = Storage::disk(config('app.filesystem_driver'))->exists('public/profile_pic/'.$notification->user_id.'/small/'.$notification->user_dp);
							// if($exists){ 
								$profileImg=asset(Storage::url('public/profile_pic').'/'.$notification->user_id.'/small/'.$notification->user_dp);
							// }else{ 
							// 	$profileImg= asset('storage/profile_pic/default.png');
							// } 
					}
					//  if($notification->login_type == 'O') {
					// 	$profileImg =  asset('storage/profile_pic/' . $notification->user_id) . '/small/' . $notification->user_dp;
					// 	} else {
					// 	$profileImg = $notification->user_dp; 
					// 	}
					} else {
						$profileImg = asset('default/default.png');
					}
				 } ?>
			
				<div class="row text-left border-bottom pb-1 notificationBlock" style="@if($notification->read == 0)background: beige;@endif">
					<div class="col-lg-3 col-sm-3 col-3 pt-1 text-center">
						<img onclick="window.location.href='{{ route("web.userProfile", $notification->user_id) }}';" src="{{ $profileImg }}" class="w-50 rounded-circle link">
					</div>
					<div class="col-lg-8 col-sm-8 col-8">
						{{-- <a href="{{ route('web.home') }}"> --}}
							<strong class="text-info"><span class="link" onclick="window.location.href='{{ route("web.userProfile", $notification->user_id) }}';">{{ $notification->username }} 
							<?php if($notification->verified=='A'){ ?>
								<img src="{{ asset('default/verified-icon-blue.png') }}" alt="" style="width:15px;height:15px;">
							<?php } ?></span></strong>
						{{-- </a> --}}
						@if ($notification->notify_total > 1)
							and {{ $notification->notify_total - 1 }} other
						@endif
						<br />{{ $notification->message }} <br />
						<small class="text-warning">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($notification->added_on))->diffForHumans() }}</small>
						@if ($notification->type == 'F')
						<div onclick="window.location.href='{{ route('web.userProfile', ['id' => $notification->notify_to, 'notify_ids' => $notification->notify_ids]) }}'" style="position: absolute;top: 0px;height: 70%;width: 100%;z-index: 100;margin-top: 8%;"></div>
						@else
							<div onclick="window.location.href='{{ route('web.home', ['videoId' => $notification->video_id, 'notify_ids' => $notification->notify_ids]) }}'" style="position: absolute;top: 0px;height: 70%;width: 100%;z-index: 100;margin-top: 8%;"></div>
						@endif
					</div>
				</div>
			<?php 	}
} ?>