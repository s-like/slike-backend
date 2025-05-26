@extends('layouts.front')

@section('content')

<style>
    #fade {
        display: none;
        position: fixed;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index: 1001;
        -moz-opacity: 0.8;
        opacity: .80;
        filter: alpha(opacity=80);
    }

    #model-Content {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        max-width: 600px;
        max-height: 360px;
        margin-left: -300px;
        margin-top: -180px;
        border: 2px solid #FFF;
        background: #FFF;
        z-index: 1002;
        overflow: visible;
    }

    #boxclose {
        float: right;
        cursor: pointer;
        color: #fff;
        border: 1px solid #AEAEAE;
        border-radius: 3px;
        background: #222222;
        font-size: 31px;
        font-weight: bold;
        display: inline-block;
        line-height: 0px;
        padding: 11px 3px;
        position: absolute;
        right: 2px;
        top: 2px;
        z-index: 1002;
        opacity: 0.9;
    }

    .boxclose:before {
        content: "×";
    }

    #fade:hover~#boxclose {
        display: none;
    }

    .test:hover~.test2 {
        display: none;
    }

    body {
        font-family: sans-serif;
        margin: 0px;
        padding: 0px;
    }

    .summary {
        display: block;
        position: relative;
        width: 90%;
        margin: 0 auto;
        padding: 20px 0 20px 0;
        text-align: center;
    }

    .overlay {
        position: fixed;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 100%;
        z-index: 100;
        background-color: rgba(0, 0, 0, 0.9);
        opacity: 0.9;
        display: none;
    }


    .close {
        position: fixed;
        top: 100px;
        right: 30px;
        width: 16px;
        height: 16px;
        z-index: 9999;
        display: none;
        cursor: pointer;
    }

    .main-vid-box {
        position: fixed;
        width: 100%;
        height: 100vh;
        display: none;
        top: 100px;
        left: 0px;
        z-index: 999;
        background: rgba(0, 0, 0, 0.3);
    }


    .videoWrapper {
        position: relative;
        z-index: 999;
        background-color: #000;
        width: 65%;
        height: 100%;
        margin: 0 auto;
    }

    .videoWrapper video {
        position: relative;
        top: 0;
        left: 0;
        z-index: 999;
        width: 100% !important;
        height: 100% !important;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border-width: 40px;
        border-style: solid;
        border-color: transparent;
    }


    .user-profile-info img {
        height: 30px;
        border-radius: 20px;
        margin-right: 4px;
        width: 30px;
    }

    .user-profile-info a {
        color: #3c3a3a;
        font-weight: 500;
        font-size: 16px;
    }

    .arrow-button {
        margin-left: auto;
        justify-content: center;
        display: flex;
        align-items: center;
    }

    .modal-comment-list {
        padding: 17px 19px;
        /* height: 358px;
    overflow-y: scroll; */
    }

    .single-comment {
        display: flex;
    }

    .single-comment.ml-50 {
        margin-left: 50px;
    }

    .single-comment img {
        height: 30px;
        border-radius: 20px;
        margin-right: 10px;
        width: 30px;
    }

    .single-comment {
        margin-bottom: 20px;
        position: relative;
    }

    .single-comment span a {
        color: #262626;
        font-weight: 600;
        margin-right: 5px;
        font-size: 16px;
    }

    .single-comment span {
        font-size: 15px;
        font-weight: 500;
        color: #565656;
        margin-right: 40px;
    }

    .user-top-info {
        width: 100%;
        display: flex;
        padding: 17px 19px;
        border-bottom: 1px solid #f0eaea;
    }

    .comment-info span {
        color: #666;
    }

    .comment-info span a {
        color: #666;
        font-size: 15px;
        font-weight: 500;
    }

    .favourite-icon {
        position: absolute;
        top: 2px;
        right: 0;
    }

    .favourite-icon a i {
        color: #8c8a8a;
    }

    .modal-total-views {
        display: inline;
        padding: 4px 12px;
        margin-bottom: 14px;
        background: var(--red);
        border-radius: 6px;
        color: #FFF;
        font-size: 14px;
    }

    .modal-video-post-action {
        /* border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd; */
        padding: 8px 19px;
    }

    .modal-video-date {
        color: #ccc;
        /* font-weight: 500; */
        font-size: 12px;
        margin-top: 9px;
    }

    .modal-video-post-action i {
        font-size: 27px;
        color: #9e9fa0;
        /* color:#794fc2; */
    }

    .modal-main-action {
        font-size: 14px;
    }

    .video-action a {
        color: #fff;
        font-size: 65px;
    }

    .video-section a i.fas.fa-pause {
        opacity: 0;
        transition: .3s;
    }

    .video-section:hover i.fas.fa-pause {
        opacity: 1 !important;
        transition: .3s;
    }

    .video-section video {
        width: 100%;
        /* height: 590px;
    background-color: #001721; */
    }

    .video-section {
        position: relative;
        cursor: pointer;
    }

    .video-action {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* .modal-video-date {
    color: #7c7b7b;
    font-weight: 500;
} */

    /* .video-section video {
    width: 100%;
    height: 590px;
    background-color: #001721;
} */

    .video-section {
        position: relative;
        cursor: pointer;
    }

    .video-section a i.fas.fa-pause {
        opacity: 0;
        transition: .3s;
    }

    .video-section:hover i.fas.fa-pause {
        opacity: 1 !important;
        transition: .3s;
    }

    .modal-main-action i.fa-heart-o,
    .modal-main-action i.fa-paper-plane-o,
    .modal-main-action i.fa-paper-plane {
        cursor: pointer;
    }

    /* .modal-main-action i.fa-heart {
	color: red;
	cursor: pointer;
} */
    .modal-main-action i.fa-heart {
        /* background: -webkit-gradient(50deg, rgb(115,80,199) 0%, rgb(236,74,99) 100%) !important; */
        /* background-image: linear-gradient(45deg, #f3ec78, #af4261); */
        /* background-color:#fff; */
        /* color: red; */
        /* background: -webkit-gradient(linear, left top, left bottom, from(#ec4a63), to(#7350c7));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent; */
        cursor: pointer;
    }

    .modal-video-comment i {
        cursor: pointer;
    }

    .popover-header {
        background: blue;
        height: 40px;
    }

    .modal-main-action i.fa-share-square-o,
    .btn-sm {
        cursor: pointer;
    }

    .btn-blue {
        /* background-color: #1A237E; */
        background-color: #7350c7;
        padding: 10px 0;
        color: #fff;
        border-radius: 2px
    }

    .modal .card {
        border-radius: 10px;
        box-shadow: 0px 0px 6px #ccc;
    }

    textarea:focus,
    input:focus {
        outline: none;
    }

    .user_name {
        text-align: left;
        position: absolute;
        bottom: 65px;
        /* left: 34px; */
        color: #fff;
    }

    .video_view,
    .modal_video_view {
        display: inline-block;
        /* background: #7a4fc1; */
        padding: 2px 10px;
        border-radius: 15px;
        font-size: 14px;
        margin-top: 5px;
        margin-bottom: 5px;
        /* background: linear-gradient(50deg, rgb(115,80,199) 0%, rgb(236,74,99) 100%); */
    }

    .modal_user_name {
        text-align: left;
        position: absolute;
        bottom: 20px;
        /* left: 10px; */
        color: #fff;
        width: 100%;
        background: #00000029;
        padding: 10px 15px;
    }

    #user-profile-info {
        text-transform: capitalize;
    }

    .bg-btn {
        /* background: linear-gradient(50deg, rgb(115,80,199) 0%, rgb(236,74,99) 100%); */
        padding: 10px 0;
        color: #fff;
        border-radius: 2px;
    }

    .video-container,
    .video-section {
        width: 100%;
        min-height: 465px;
        height: 465px;
        object-fit: fill;
        cursor: pointer;

    }

    .video_title {
        max-height: 140px;
        overflow-y: scroll;
    }

    #delete-btn {
        display: none;
    }

    #delete-btn-m {
        display: none;
    }

    .container_top_header .dropdown-menu {
        min-width: 60px !important;
        left: -40px !important;
    }
</style>

@include('includes.topbar')
<section class="h4-about s-padding ">
    <div class="container">
        <div class="row m-3 mb-5 user_profile_top">
            <div class="col-md-3">
                <?php if (!empty($userInfo->user_dp)) {
                    if (strpos($userInfo->user_dp, 'fbsbx.com') !== false || strpos($userInfo->user_dp, 'googleusercontent.com') !== false || strpos($userInfo->user_dp, 'facebook.com') !== false) {
                        $user_dp = $userInfo->user_dp;
                    } else {
                        // $exists = Storage::disk(config('app.filesystem_driver'))->exists('public/profile_pic/'.$userInfo->user_id.'/small/'.$userInfo->user_dp);
                        //dd(Storage::url('public/profile_pic/' . $userInfo->user_id). '/small/' . $userInfo->user_dp);
                        // if($exists){ 
                        // if(file_exists(public_path('storage/profile_pic').'/'.$userInfo->user_id.'/small/'.$userInfo->user_dp)){
                        $user_dp = asset(Storage::url('public/profile_pic/' . $userInfo->user_id) . '/small/' . $userInfo->user_dp);
                        // }else{
                        //     $user_dp=asset('storage/profile_pic/default.png');
                        // } 
                    }
                } else {
                    $user_dp = asset('default/default.png');
                } ?>
                <img class="rounded-circle" style="box-shadow: 0px 0px 6px #774fc3;" src="{{ $user_dp }}" alt="" width="150" height="150" />
            </div>
            <div class="col-md-9 pt-2 p-0">
                <div class="">
                    <h3 style="text-transform: capitalize;">{{ $userInfo->fname }} {{ $userInfo->lname }}</h3>

                </div>
                <h5 style="color:#aaa">{{ '@'.$userInfo->username }} <?php if ($userInfo->verified == 'A') { ?>
                        <img src="{{ asset('default/verified-icon-blue.png') }}" alt="" style="width:15px;height:15px;">
                    <?php } ?>
                </h5>
                <div class="row mb-3">
                    <div class="col-lg-3 col-3"><strong>{{ !empty($userInfo->total_videos) ? $userInfo->total_videos : '0' }}</strong> videos</div>
                    <div class="col-lg-3 col-3"><strong>{{ !empty($userInfo->total_likes) ? $userInfo->total_likes : '0' }}</strong> likes</div>
                    <div class="col-lg-3 col-3"><a href="{{ route('web.followers-list',$userInfo->user_id)}}" style="color:#5f6368;cursor:pointer"><strong>{{ $followers }}</strong> followers</a></div>
                    <div class="col-lg-3 col-3"><a href="{{ route('web.following-list',$userInfo->user_id)}}" style="color:#5f6368;cursor:pointer"><strong>{{ $following }}</strong> following</a></div>
                </div>
                <div class="row">
                    @if(!$blocked)
                    <div class="col-md-3 ">
                        @if (auth()->guard('web')->check())
                        @if (auth()->guard('web')->user()->user_id == $userInfo->user_id)
                        <a class="btn btn-blue bg-btn text-white" href="{{ route('web.editUserProfile', $userInfo->user_id) }}" style="{{MyFunctions::getTopbarColor()}};min-width: 110px;padding:6px 0px;"><i class="fa fa-edit"></i> Edit Profile</a>
                        @endif
                        @endif
                        @if ($canFollow && $blockedTo==false)
                        <a class="btn bg-btn text-white" onclick="followUnfollow('{{ $userInfo->user_id }}')" style="min-width: 110px;padding:6px 0px;{{MyFunctions::getTopbarColor()}}">
                            <span id="followUnfollowIcon">
                                <?php if (!$followed) { ?>
                                    <i class="fa fa-user-plus"></i>
                                <?php } else { ?>
                                    <i class="fa fa-user-times"></i>
                                <?php } ?>
                            </span>
                            <span id="followUnfollow">
                                @if(!$followed) Follow @else Unfollow @endif</span>
                        </a>
                        @endif
                    </div>
                    @endif
                    @if (auth()->guard('web')->check())
                    @if (auth()->guard('web')->user()->user_id != $userInfo->user_id && $blockedTo==false)
                    <div class="col-md-3">
                        <a onclick="blockUnblock('{{ $userInfo->user_id }}')" class="btn bg-btn text-white" style="min-width: 110px;padding:6px 0px;{{MyFunctions::getTopbarColor()}}">
                            <span id="blockUnblockIcon">
                                <?php if (!$blocked) { ?>
                                    <i class="fa fa-ban"></i>
                                <?php } else { ?>
                                    <i class="fa fa-check-circle"></i>
                                <?php } ?>
                            </span>
                            <span id="blockUnblock">
                                @if(!$blocked) Block @else Unblock @endif
                            </span>
                        </a>
                    </div>
                    @endif
                    @endif
                </div>
            </div>

        </div>
        <hr>
        <div class="row">
            @if ($videos->count() > 0 && !$blocked && $blockedTo==false)
            <div class="col-lg-10 col-10">
                <h2>Videos</h2>

            </div>
            <div class="col-lg-2 col-2 text-center">
                @if (auth()->guard('web')->check())
                @if (auth()->guard('web')->user()->user_id == $userInfo->user_id)

                <a class=" btn btn-blue bg-btn text-white " id="delete-btn" onclick="deleteVideo()" style="{{MyFunctions::getTopbarColor()}}"><i class="fa fa-trash"></i> Delete Selected</a>
                <a class=" d-lg-none m_select_delete " id="delete-btn-m" onclick="deleteVideo()"><i class="fa fa-trash"></i></a>

                <!-- <a class="d-none d-lg-inline-block btn btn-blue bg-btn text-white" onclick="deleteVideo()" style="{{MyFunctions::getTopbarColor()}}"><i class="fa fa-trash"></i> Delete Selected</a>
                    <a class="d-block d-lg-none m_select_delete" onclick="deleteVideo()"><i class="fa fa-trash"></i></a> -->

                @endif
                @endif
            </div>
            @else
            <h3>No Videos Found</h3>
            @endif
        </div>
        <div class="alert alert-success col-md-6" style="display:none;">Video Delete Successfully</div>
        <div class="row" id="slikeVideos" style="padding-bottom: 10%;">
            @php
            $count=0;
            @endphp
            <?php $x = 1; ?>
            @if(!$blocked && $blockedTo==false)
            @foreach ($videos as $video)
            <div class="col-lg-3 col-md-6 col-12 video p-2" style="text-align:center;">
                <div style="box-shadow: 0px 2px 8px #ccc;border-radius: 5px;padding:10px;">
                    <div class="row container_top_header">
                        <div class="col-md-3 col-3 userdp_div" onclick="openModal('video_{{$count}}')">
                            <?php
                            if ($userInfo->user_dp != "") {
                                if (strpos($userInfo->user_dp, 'facebook.com') !== false || strpos($userInfo->user_dp, 'fbsbx.com') !== false || strpos($userInfo->user_dp, 'googleusercontent.com') !== false) {
                                    $u_dp = $userInfo->user_dp;
                                } else {
                                    // $exists = Storage::disk(config('app.filesystem_driver'))->exists('public/profile_pic/'.$userInfo->user_id.'/small/'.$userInfo->user_dp);
                                    // 	if($exists){ 
                                    // if(file_exists(public_path('storage/profile_pic').'/'.$userInfo->user_id.'/small/'.$userInfo->user_dp)){ 
                                    $u_dp = asset(Storage::url('public/profile_pic') . '/' . $userInfo->user_id . '/small/' . $userInfo->user_dp);
                                    //         }else{ 
                                    //     $u_dp= asset('storage/profile_pic/default.png');
                                    // } 
                                }
                            } else {
                                $u_dp = asset('default/default.png');
                            } ?>
                            <img class="img-fluid" src="<?php echo $u_dp; ?>">
                        </div>
                        <div class="col-md-8 col-8 text-left pl-0">
                            <div class="row">
                                <div class="col-md-11 col-11" onclick="openModal('video_{{$count}}')">
                                    <h5 class="username_div"><?php echo $userInfo->fname . ' ' . $userInfo->lname; ?></h5>
                                </div>
                                <div class="col-md-1 col-1 p-0 text-center">
                                    @if (auth()->guard('web')->user()->user_id == $userInfo->user_id)
                                    <div class="dropdown">
                                        <i class="fa fa-ellipsis-v dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 4px;"></i>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('web.video-info-update',['id' => $video->video_id])}}">Edit</a>
                                        </div>
                                    </div>
                                    <!-- <i class="fa fa-edit" style="margin-top: 4px;"></i> -->
                                    @endif
                                </div>
                                <div class="col-md-11 col-11" onclick="openModal('video_{{$count}}')">
                                    <div class="title_div"><?php echo (strlen($video->description) > 20) ? mb_substr($video->description, 0, 20) . '...' : $video->description;  ?></div>
                                </div>
                                <div class="col-md-1 col-1 p-0">
                                    @if (auth()->guard('web')->user()->user_id == $userInfo->user_id)
                                    <input type="checkbox" name="chk[]" value="{{ $video->video_id }}" class="checkbox_{{ $x }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-1 col-1 p-0">
                            @if (auth()->guard('web')->user()->user_id == $userInfo->user_id)

                                <i class="fa fa-ellipsis-v"></i>
                                <input type="checkbox" value="{{ $video->video_id }}" class="checkbox_{{ $x }}">
                               
                            @endif
                            
                        </div> -->
                    </div>
                    <div class="video-container">
                        <video muted="muted" id="video_{{$count}}" data-toggle="modal" data-target="#SlikeModal" onmouseover="hoverVideo('{{$count}}')" onmouseout="hideVideo('{{$count}}')" class="" style="width:100%;height:100%;background: #000;border-radius: 8px;" loop preload="none" onclick="modelbox_open('{{ asset(Storage::url('public/videos/' . $video->user_id . '/' . $video->video )) }}', {{ $video->video_id }})" poster="{{ asset(Storage::url('public/videos/' . $video->user_id . '/thumb/' . $video->thumb )) }}">
                            <source src="{{ asset(Storage::url('public/videos/' . $video->user_id . '/' . $video->video )) }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="user_name">
                        <div>@<?php echo $userInfo->username; ?></div>
                        <div class="video_view" id="video_view_{{$video->video_id}}" style="{{MyFunctions::getTopbarColor()}}"><i class="fa fa-eye"></i> {{$video->total_views}}</div>
                    </div>
                    <!-- <div class="views d-flex">
                   <p class="ml-3"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{ ' ' . $video->total_likes }}</p>
                    @if (auth()->guard('web')->user()->user_id == $userInfo->user_id)
                    <p class="ml-auto pr-4 text-right"><input type="checkbox" value="{{ $video->video_id }}" class="checkbox_{{ $x }}"></p>
                    @endif
                </div> -->
                    <div class="views row m-1" onclick="openModal('video_{{$count}}')">
                        <div class="col-md-6 col-6 text-center" id="video_like_{{$video->video_id}}">
                            <i class="fa fa-heart-o" aria-hidden="true"></i> {{ $video->total_likes }}
                        </div>
                        <div class="col-md-6 col-6 text-center">
                            <i class="fa fa-comment-o" aria-hidden="true"></i> {{ $video->total_comments }}
                        </div>
                    </div>
                </div>
            </div>
            @php
            $count++;
            @endphp
            <?php $x++; ?>
            @endforeach
            @endif
        </div>
        <div class="loadMore text-center col-12">
            <img src="{{ asset('default/loading.gif') }}" style="width:35px;margin-top:10px;">
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade mx-auto" id="SlikeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="position: relative; height:100%; margin-top:10%;z-index: 99999;">

            <div class="modal-body p-0">
                <div class="container-fluid">
                    <div class="row">
                        <button type="button" class="close d-lg-none d-block" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="col-md-5 p-3">
                            <div class="card">
                                {{-- <video id="slikeVideo" class="videoInsert" style="height:100vh;" loop>
                            <source src="" type="video/mp4">
                            <!--Browser does not support <video> tag -->
                        </video> --}}
                                <div class="user-top-info">
                                    <div class="user-profile-info">
                                        <a class="pjax" href="">
                                            <img src="" alt="" id="user-profile-img"><span id="user-profile-info"></span></a>
                                    </div>
                                    <!-- <div class="arrow-button">
									<a href="javascript:void(0)" onclick="ellipsis_open('bn')"><i class="fa fa-ellipsis-h"></i></a>
								</div> -->
                                </div>
                                <div class="video-section" onclick="play()">
                                    <div class="ModelCtrlBtn"><i class="fa fa-pause" id="ctrlIcon"></i></div>
                                    <video id="slikeVideo" autoplay="" loop style="height:100%;background: #000;" onclick="modelVideo()" onmouseover="showIcon()" onmouseout="hideIcon()">
                                        <source src="" type="video/mp4">
                                    </video>
                                    <div class="modal_user_name">
                                        @<span class="video_user_name">ssss</span><br>
                                        <div class="modal_video_view" style="{{MyFunctions::getTopbarColor()}}"><i class="fa fa-eye"></i> <span class="views_count">0</span></div>
                                        <div class="video_title"></div>
                                    </div>
                                    {{-- <div class="video-action">
                                <a href="javascript:void(0)" class="play" style=""><i class="fa fa-play"></i></a>
                            </div> --}}
                                </div>
                                <div class="modal-video-post-action row">
                                    <div class="modal-main-action col-md-12">
                                        <div class="row text-center">
                                            <?php //if($userLikedVideo==false){ 
                                            ?>
                                            <div class="col-md-6 col-6"><i id="video-like" class="fa fa-heart-o" onclick="videoLike()"></i> <br />Like </div>
                                            <?php  //}else{ 
                                            ?>
                                            <!-- <i id="video-like" class="fa fa-heart" onclick="videoLike()"></i> -->
                                            <?php //} 
                                            ?>
                                            <div class="col-md-6 col-6"><i id="video-share" class="fa fa-share-square-o" data-bs-toggle="popover"></i> <br /> Share </div>
                                            <!-- <div class="col-md-4"><i class="fa fa-ellipsis-h" ></i> <br />More </div>  -->
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 text-right">
                                <div class="modal-total-views" id="modal-total-views">
                                    {{-- 1.3k+ views --}}
                                </div>
                                <div class="modal-video-date" id="modal-video-date">
                                    {{-- July 25, 2020 --}}
                                    {{ date('M d, Y') }}
                                </div>
                            </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            {{-- <div class=" d-flex"> --}}
                            {{-- @if (auth()->guard('admin')->check())
							<img src="{{ asset('img/author.jpg')}}" class="rounded-circle" style="width: 50px" alt="Cinque Terre">
                            <div class="pl-2 my-auto">{{ auth()->guard('admin')->user()->name }} </div>
                            @else
                            <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                            @endif --}}
                            <div class="modal-right-section">
                                <!-- <div class="user-top-info">
								<div class="user-profile-info">
									<a class="pjax" href="">
										 <img src="" alt="" id="user-profile-img">@<span id="user-profile-info"></span></a>
								</div>
								<div class="arrow-button">
									<a href="javascript:void(0)" onclick="ellipsis_open('bn')"><i class="fa fa-ellipsis-h"></i></a>
								</div>
							</div> -->
                                <h5 style="color:#000;margin: 20px 0px;">Comments</h5>
                                <input type="hidden" id="video_id" value="">
                                <div class="modal-comment-list" id="modal-comment-list">


                                </div>
                                <div class="modal-video-comment mt-1" id="modal-video-comment" style="padding-left: 30px;">
                                    <form action="" id="modal-comment-form" method="POST">
                                        @csrf
                                        <div class="d-flex flex-row justify-content-around p-2 border" style="border-radius: 9999px;background-color: #f6f4f4;width: 95%;">
                                            <input type="text" name="video_comment" class="border-0" placeholder="Add Your Comment" id="video_comment" style="width: 85%;height:30px;background-color: #f6f4f4;padding: 15px;">
                                            <a href="javascript:void(0)" style="margin:auto"><i class="fa fa-paper-plane-o" aria-hidden="true" onclick="$('#modal-comment-form').submit();"></i></a>
                                        </div>
                                        <!-- <div class="d-flex flex-row justify-content-around p-2 border" style="border-radius: 9999px;background-color: #f6f4f4;width: 95%;">
										<input type="text" name="video_comment" class="border-0" id="video_comment" placeholder="Add Your Comment" style="width: 85%;height:30px;background-color: #f6f4f4;padding: 15px;">
										<a href="javascript:void(0)" style="margin:auto"><i class="fa fa-paper-plane-o" aria-hidden="true" onclick="$('#modal-comment-form').submit();"></i></a>
									</div> -->
                                    </form>
                                    <br />
                                </div>

                                @if (!auth()->guard('web')->check())
                                <div class="send-comment-area">
                                    <div class="please-login text-center">
                                        <p>Please <a href="{{ route('web.login') }}" class="pjax" onclick="profileshow()">Login</a> or
                                            <a href="{{ route('web.register') }}" class="pjax" onclick="profileshow()">SignUp</a>
                                        </p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Save changes</button>
		</div> --}}
        </div>
    </div>
</div>


<script type="text/javascript">
    // $(document).ready(function(){

    // if($('.success-toast').length>0){
    //     setTimeout(() => {
    //         $('.success-toast').slideUp();
    //     }, 4000);
    // }
    $(document).click('input:checkbox', function() {
        // $('input:checkbox').on('click',function(){
        if ($('input[name="chk[]"]:checked').length > 0) {
            $('#delete-btn').css({
                'display': 'block'
            });
        } else {
            $('#delete-btn').hide({
                'display': 'none'
            });
        }
    });
    // });


    function deleteVideo() {
        var video_ids = [];
        $('input:checkbox').filter(':checked').each(function() {
            video_ids.push($(this).val());
        });
        $.ajax({
            type: "POST",
            url: "{{ route('web.deleteVideo') }}",
            data: {
                '_token': "{{ csrf_token() }}",
                'videos': video_ids,
            },
            dataType: "json",
            success: function(response) {
                // checkbox_
                $('.alert-success').show();
                setTimeout(() => {
                    location.reload();
                }, 2000);

            }
        });
    }
</script>

@endsection