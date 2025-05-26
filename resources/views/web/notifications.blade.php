@extends('layouts.front')

@section('content')

@include('includes.topbar')

<div class="container mb-5">
    <h3 class="m-5 text-danger text-center">Notifications</h3>
        {{-- @foreach ($notifications as $notification)
        @php
            $profileImg = '';
            if(!empty($notification->user_dp)) {
                if($notification->login_type == 'O') {
                $profileImg =  asset('storage/profile_pic/' . $notification->user_id) . '/small/' . $notification->user_dp;
                } else {
                $profileImg = $notification->user_dp; 
                }
            } else {
                $profileImg = asset('default/default.png');
            }
        @endphp
            <div class="row text-left border-bottom mt-2 pb-2">
                 <div class="col-lg-2 col-sm-2 col-2 pt-1 text-center">
                {{-- <img src="{{ $profileImg }}" class="w-50 rounded-circle"> --}}
                {{-- <img onclick="window.location.href='{{ route("web.userProfile", $notification->user_id) }}';" src="{{ $profileImg }}" class="w-50 rounded-circle link">
                </div>
                <div class="col-lg-8 col-sm-8 col-8">
                    <strong class="text-info"><span class="link" onclick="window.location.href='{{ route("web.userProfile", $notification->user_id) }}';">ee{{ $notification->username }}
                    <?php if($notification->verified=='A'){ ?>
								<img src="{{ asset('default/verified-icon-blue.png') }}" alt="" style="width:15px;height:15px;">
							<?php } ?>
                    </span></strong>
                    @if ($notification->notify_total > 1)
														and {{ $notification->notify_total - 1 }} other
                                                    @endif
                    <br />{{ $notification->message }} <br />
                    <small class="text-warning">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($notification->added_on))->diffForHumans() }}</small>
                </div>
            </div>
        @endforeach --}}

        @if (!empty($notifications))
        @foreach ($notifications as $notification)
                @php
                    $profileImg = '';
                    if (!empty($notification->profileImg)) {
                        $profileImg = $notification->profileImg;
                    } else {
                        if(!empty($notification->user_dp)) {
                            if($notification->login_type == 'O') {
                            $profileImg =  asset('storage/profile_pic/' . $notification->user_id) . '/small/' . $notification->user_dp;
                            } else {
                            $profileImg = $notification->user_dp; 
                            }
                        } else {
                            $profileImg = asset('default/default.png');
                        }
                    }
                @endphp
                <div class="col-md-6 col-12 offset-lg-3">
                    <div class="row text-left border-bottom pb-1" style="@if($notification->read == 0)background: beige;@endif">
                        <div class="col-lg-3 col-3 pt-1 text-center">
                            <img width="60px;" onclick="window.location.href='{{ route("web.userProfile", $notification->user_id) }}';" src="{{ $profileImg }}" class="rounded-circle link">
                        </div>
                        <div class="col-lg-9 col-9">
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
                </div>
        @endforeach
        <div class="mt-3 d-flex justify-content-center"> {{ $notifications->links() }} </div>
        @endif
   
</div>
	  
<script type="text/javascript">
</script>

@endsection
