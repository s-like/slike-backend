@extends('layouts.front')

@section('content')

<style>
.alert-section{
	position: absolute;
    right: 0px;
    top: 0px;
    min-width: 330px;
	z-index:999999;
}
.alert-section .close{
	display:block;
	top: 92px;
    right: 20px;
	position:sticky !important;
}
.video-container,.video-section{
	width: 100%;
    min-height: 440px;
    height: 440px;
    object-fit: fill;
    cursor: pointer;
	/* background:#000; */
}
.video_title{
		max-height: 140px;
		overflow-y: scroll;
	}
</style>

@include('includes.topbar')

	<section class="h4-about ">
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block alert-section">
				<button type="button" class="close" data-bs-dismiss="alert">×</button> 
				<strong>{{ $message }}</strong>
				<?php Session::forget('success');?>
			</div>
			@endif
		<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 p-0">
			<?php if($home_data->home_top_background_img!=""){
				$home_top_background_img=asset(Storage::url('public/uploads/'.$home_data->home_top_background_img));
			}else{
				$home_top_background_img=asset('default/background.jpg');
			} 
				?>
				<div class="main_visual" style="background:url('<?php echo $home_top_background_img; ?>') no-repeat center;background-size:cover;">
					<div class="visual_wrap">
						<div class="visual_text">
							<strong>
							{{$home_data->heading}}<br>
							{{$home_data->sub_heading}}<br>
							</strong>
							<p>Download The App</p>
							<div class="down">
							<?php  
									if($home_data->img1!=""){
									$img1=asset(Storage::url('public/uploads/'.$home_data->img1));
								 }else{
								 	$img1=asset('default/google_play.png');
								 } ?>
								<a href="<?php echo $home_data->img1_link; ?>" class="google">
									<img src="<?php echo $img1; ?>" alt="">
								</a>

								<?php 
								if($home_data->img2!=""){
									$img2=asset(Storage::url('public/uploads/'.$home_data->img2));
								 }else{
								 	$img2=asset('default/app_store.png');
								 } ?>
								<a href="<?php echo $home_data->img2_link; ?>" class="app">
									<img src="<?php echo $img2; ?>" alt="">
								</a>
							</div>
						</div>
						<div class="visual_img d-none d-md-block">
							<img src="{{ asset('default/iPhone-X-Template.png') }}" alt="">
							<?php if (isset($homeHeaderVideoUrl) && $homeHeaderVideoUrl!=""){ ?>
							<video src="{{ $homeHeaderVideoUrl }}" loop="" muted="" autoplay=""></video>
							<?php } ?>
							<div class="visual_img_bg"></div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
		<div class="container">

			<hr></hr>
			<div class="row align-items-center">

				<div class="col-lg-12">
					<div class="about-content privacy mb-5">
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-9 col-md-12">
									<h2>Trending Videos</h2>
						<p>Watch the latest videos from our community</p>
						<div class="container-fluid">
						<div class="row" id="slikeVideos">
							@php
							$count=0;
							@endphp
							@foreach ($videos as $video)
								
							<div class="col-lg-4 col-md-6 col-12 video p-2" style="text-align:center;">
								<div style="box-shadow: 0px 2px 8px #ccc;border-radius: 5px;padding:10px;">
									<div class="row container_top_header" onclick="openModal('video_{{$count}}')">
										<div class="col-md-3 col-3 userdp_div" >
										<?php
										if($video->user_dp!=""){
										if(strpos($video->user_dp,'facebook.com') !== false || strpos($video->user_dp,'fbsbx.com') !== false || strpos($video->user_dp,'googleusercontent.com') !== false){ 
											$u_dp=$video->user_dp;
										 }else{
											// $exists = Storage::disk(config('app.filesystem_driver'))->exists('public/profile_pic/'.$video->user_id.'/small/'.$video->user_dp);
											// if($exists){ 
												$u_dp=asset(Storage::url('public/profile_pic').'/'.$video->user_id.'/small/'.$video->user_dp) ;
											//  }else{ 
											// $u_dp= asset('storage/profile_pic/default.png');
											// } 
										}}else{ 
											$u_dp= asset('default/default.png');
											} 
											?>
											<img class="img-fluid" src="<?php echo $u_dp; ?>">
										</div>
										<div class="col-md-9 col-9 text-left pl-0">
											<h5 class="username_div"><?php echo $video->name; ?></h5>
											<div class="title_div"><?php echo (strlen($video->description) > 22 ) ? mb_substr($video->description, 0, 22).'...' : $video->description; ?></div>
										</div>
									</div>
									<div class="video-container">
										<video muted="muted" id="video_{{$count}}" data-toggle="modal" data-target="#SlikeModal"  
											onmouseover="hoverVideo('{{$count}}')" onmouseout="hideVideo('{{$count}}')" class="img-responsive" style="height:100%;border-radius: 8px;background: #000;"
											loop preload="none" onclick="modelbox_open('{{ asset(Storage::url('public/videos/' . $video->user_id . '/' . $video->video )) }}', {{ $video->video_id }}, video_{{$count}})"
											poster="{{ asset(Storage::url('public/videos/' . $video->user_id . '/thumb/' . $video->thumb )) }}">
											<source src="{{ asset(Storage::url('public/videos/' . $video->user_id . '/' . $video->video )) }}" type="video/mp4">
										</video>
									</div>
									<div class="user_name">
										<div>@<?php echo $video->username; ?>
										<?php if($video->verified=='A'){ ?>
											<img src="{{ asset('default/verified-icon-blue.png') }}" alt="" style="width:15px;height:15px;">
										<?php } ?>
										</div>
										<div class="video_view" id="video_view_{{$video->video_id}}" style="{{MyFunctions::getTopbarColor()}}"><i class="fa fa-eye"></i> {{$video->total_views}}</div>
									</div>
									<div class="views row m-1" onclick="openModal('video_{{$count}}')">
										<div class="col-md-6 col-6 text-center" id="video_like_{{$video->video_id}}">
											<i class="fa fa-heart-o" aria-hidden="true"></i> {{ $video->total_likes }}
										</div>
										<div class="col-md-6 col-6 text-center">
											<i class="fa fa-comment-o" aria-hidden="true"></i> {{ $video->total_comments }}
										</div>
									</div>
								</div>
								<!-- <div class="views d-flex">
									<p><i class="fa fa-eye" aria-hidden="true"></i>{{ ' ' . $video->total_views }}</p>
                    				<p class="ml-3"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{ ' ' . $video->total_likes }}</p>
								</div> -->
							</div>		
							@php
								$count++;
							@endphp				 
							@endforeach
							
						</div>
						<div class="loadMore text-center col-12">
								<img src="{{ asset('default/loading.gif') }}" style="width:35px;margin-top:10px;">
							</div>
					</div>			
				</div>
				<div class="col-lg-3 col-md-12">
				@include('includes.leftSidebar')
					
				</div>
			</div>
		</div>

					</div>
				</div>
			</div>
		</div>
		<div class="floating-shapes">
			<span data-parallax='{"x": 150, "y": -20, "rotateZ":500}'><img src="{{ asset('default/fl-shape-1.png') }}" alt=""></span>
			<span data-parallax='{"x": 250, "y": 150, "rotateZ":500}'><img src="{{ asset('default/fl-shape-2.png') }}" alt=""></span>
			<span data-parallax='{"x": -180, "y": 80, "rotateY":2000}'><img src="{{ asset('default/fl-shape-3.png') }}" alt=""></span>
			<span data-parallax='{"x": -20, "y": 180}'><img src="{{ asset('default/fl-shape-4.png') }}" alt=""></span>
			<span data-parallax='{"x": 300, "y": 70}'><img src="{{ asset('default/fl-shape-5.png') }}" alt=""></span>
			<span data-parallax='{"x": 250, "y": 180, "rotateZ":1500}'><img src="{{ asset('default/fl-shape-6.png') }}" alt=""></span>
			<span data-parallax='{"x": 180, "y": 10, "rotateZ":2000}'><img src="{{ asset('default/fl-shape-7.png') }}" alt=""></span>
			<span data-parallax='{"x": 250, "y": -30, "rotateX":2000}'><img src="{{ asset('default/fl-shape-8.png') }}" alt=""></span>
			<span data-parallax='{"x": 60, "y": -100}'><img src="{{ asset('default/fl-shape-9.png') }}" alt=""></span>
			<span data-parallax='{"x": -30, "y": 150, "rotateZ":1500}'><img src="{{ asset('default/fl-shape-10.png') }}" alt=""></span>
		</div>
	</section><!-- about -->

	{{-- <div id="model-Content">
	  <a class="boxclose" id="boxclose" onclick="model_close();"></a>
		

		<div class="row">
			<div class="col-lg-7 p-0">
				<video id="slikeVideo">
					<source src="" type="video/mp4">
					<!--Browser does not support <video> tag -->
				</video>				
			</div>
			<div class="col-lg-5 p-0">
				
			</div>
		</div>

	</div>

	
	  
	  <div id="fade" onClick="model_close();"></div> --}}
  
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
				  <div class="col-md-5 p-3" >
					<div class="card">
					
						{{-- <video id="slikeVideo" class="videoInsert" style="height:100vh;" loop>
							<source src="" type="video/mp4">
							<!--Browser does not support <video> tag -->
						</video> --}}
						<div class="user-top-info">
							<div class="user-profile-info">
								<a class="pjax row" href="">
									<div class="col-md-3 col-3">
										<img src="" alt="" id="user-profile-img">
									</div>
									<div class="col-md-9 col-9 px-2">
										<div class=""><span id="user-profile-info"></span></div>
										<div class="follow_div"></div>
									</div>
								</a>
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
						
									@<span class="video_user_name">ssss</span> 
										<span class="verified_account">
											<img src="{{ asset('default/verified-icon-blue.png') }}" alt="" style="width:15px;height:15px;">
										</span>
										<br>
									<div class="video_view modal_video_view" style="{{MyFunctions::getTopbarColor()}}"><i class="fa fa-eye"></i> <span class="views_count">0</span></div>
									<div class="video_title"></div>
							
							</div>
							{{-- <div class="video-action">
								<a href="javascript:void(0)" class="play" style=""><i class="fa fa-play"></i></a>
							</div> --}}
						</div>
						<div class="modal-video-post-action row">
							<div class="modal-main-action col-md-12">
								<div class="row text-center">
									<div class="col-md-6 col-6"><i id="video-like" class="fa fa-heart-o" onclick="videoLike()" ></i><br />Like </div>
									<div class="col-md-6 col-6"><i id="video-share" class="fa fa-share-square-o ml-2"  data-bs-toggle="popover"></i> <br />Share </div>
									<!-- <div class="col-md-4"><i class="fa fa-ellipsis-h"></i><br /> More </div> -->
								</div>
							</div>
							<div class="col-md-6 text-right">
								<!-- <div class="modal-total-views" id="modal-total-views">
									{{-- 1.3k+ views --}}
								</div>
								<div class="modal-video-date" id="modal-video-date">
									{{-- July 25, 2020 --}}
									{{ date('M d, Y') }}
								</div> -->
							</div>
						</div>
					</div>
				  </div>
				  <!-- <div class="col-md-5 ml-auto"> -->
				  @if (!auth()->guard('web')->check())
				  <div class="col-md-7" style="background-image: url('default/comment-s.jpg');background-size: 100% 100%;">
				  @else
				  	<div class="col-md-7">
				  @endif
				
					{{-- <div class=" d-flex"> --}}
						{{-- @if (auth()->guard('admin')->check())
							<img src="{{ asset('img/author.jpg')}}" class="rounded-circle" style="width: 50px" alt="Cinque Terre"> 
							<div class="pl-2 my-auto">{{ auth()->guard('admin')->user()->name }} </div>
						@else
						<i class="fa fa-sign-in" aria-hidden="true"></i>  Login
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
							@if (auth()->guard('web')->check())
							<h5 style="color:#000;margin: 20px 0px;">Comments</h5>
							@endif
							<input type="hidden" id="video_id" value="">
							<div class="modal-comment-list" id="modal-comment-list">
																									
							</div>
							@if (auth()->guard('web')->check())
							<div class="modal-video-comment mt-1" id="modal-video-comment" style="padding-left: 30px;">
								
								<form action="" id="modal-comment-form" method="POST">
									@csrf
									<div class="d-flex flex-row justify-content-around p-2 border" style="border-radius: 9999px;background-color: #f6f4f4;width: 95%;">
										<input type="text" name="video_comment" class="border-0" id="video_comment" placeholder="Add Your Comment" style="width: 85%;height:30px;background-color: #f6f4f4;padding: 15px;">
										<a href="javascript:void(0)" style="margin:auto"><i class="fa fa-paper-plane-o" aria-hidden="true" onclick="$('#modal-comment-form').submit();"></i></a>
									</div>
								</form>
								<br />
							</div>
							@endif

							@if (!auth()->guard('web')->check())
								<div class="send-comment-area">
									<div class="card">
										<h4>Login To See &<br /> Add Comments</h4>
										<div class="please-login text-center">
											<a href="{{ route('web.login') }}" class="pjax" onclick="profileshow()"><button class="btn model-login-btn" style="{{MyFunctions::getTopbarColor()}}">Login / Register with Email</button></a>
											<a href="{{ route('web.login') }}" class="pjax" onclick="profileshow()"><button class="btn model-google-btn"><img width="16px" src="{{asset('default/Google__G__Logo.png') }}"> &nbsp;Sign In With Google</button></a>
											<!-- <a href="{{ route('web.login') }}" class="pjax" onclick="profileshow()"><button class="btn model-google-btn"><img width="16px" src="{{asset('default/facebook-icon.png') }}"> &nbsp;Sign In With Google</button></a> -->
											<!-- <p>Please <a href="{{ route('web.login') }}" class="pjax" onclick="profileshow()">Login</a> or 
												<a href="{{ route('web.register') }}" class="pjax" onclick="profileshow()">SignUp</a></p> -->
										</div>
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

</script>
	  
<script type="text/javascript">

    // function homefollowUnfollow(userId)
    // {
	// 	alert(userId);
    //     var url = "{{ route('web.followUnfollowUser', ':id') }}";
    //     url = url.replace(':id', userId);
    //     $.ajax({
    //         url : url,
    //         type : 'GET',
    //         datatype : 'json',
    //         success: function(data) {
    //             if (data.success) {
    //                 if(data.follow) {
    //                     $('#followUnfollow').html('Unfollow');
    //                 } else {
    //                     $('#followUnfollow').html('Follow');
    //                 }
    //             }
    //         },
    //         error: function(data) {
    //             if (data.status == 401) {
    //                 window.location.href = "{{ route('web.login') }}";
    //             }
    //         }
    //     });
    // }
	</script>
@endsection