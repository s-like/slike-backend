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

#fade:hover ~ #boxclose {
  display:none;
}

.test:hover ~ .test2 {
  display: none;
}

body{
  font-family:sans-serif;
  margin:0px;
  padding:0px;
}
.summary{
     display:block;
    position: relative;
    width:90%;
    margin:0 auto;
    padding:20px 0 20px 0;
    text-align:center;
}

.overlay{
  position: fixed;
  top:0px;
  left: 0px;
  height:100%;
  width:100%;
  z-index: 100;
  background-color: rgba(0, 0, 0, 0.9);
  opacity:0.9;
  display:none; 
}


.close{
    position: fixed;
    top:100px;
    right:30px;
    width:16px;
    height:16px;
  z-index:9999;
  display:none;
  cursor: pointer;
  }

.main-vid-box{
  position: fixed;
   width: 100%;
  height:100vh;
  display:none;
  top:100px;
  left:0px;
  z-index: 999;
  background: rgba(0, 0, 0, 0.3);
}


.videoWrapper {
  position: relative;
  z-index:999;
  background-color:#000;
  width:65%;
  height: 100%;
  margin:0 auto;
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
    height: 40px;
    border-radius: 30px;
    margin-right: 4px;
    width: 40px;
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
    height: 358px;
    overflow-y: scroll;
}

.single-comment {
    display: flex;
}
.single-comment.ml-50 {
    margin-left: 50px;
}

.single-comment img {
    height: 40px;
    border-radius: 30px;
    margin-right: 10px;
    width: 40px;
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

.modal-video-post-action {
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 8px 19px;
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
    height: 590px;
    background-color: #001721;
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

.modal-video-date {
    color: #7c7b7b;
    font-weight: 500;
}

.video-section video {
    width: 100%;
    height: 590px;
    background-color: #001721;
}

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

</style>

@include('includes.topbar')
	<section class="h4-about s-padding ">
		
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-12">
					<div class="about-content privacy">
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-9">
									<h2>Trending Videos</h2>
						<p>Watch the latest videos from our community</p>
						<div class="container-fluid">
						<div class="row" id="slikeVideos">
							@php
								$count=0;
							@endphp
							@foreach ($videos as $video)
								
							<div class="col-lg-4 video" style="max-height: 500px;text-align:center;">
								<video muted="muted" id="video_{{$count}}" data-bs-toggle="modal" data-bs-target="#SlikeModal"  
									onmouseover="hoverVideo('{{$count}}')" onmouseout="hideVideo('{{$count}}')" class="img-responsive" 
									loop preload="none" onclick="modelbox_open('{{ asset('storage/videos/' . $video->user_id . '/' . $video->video ) }}', {{ $video->video_id }})"
									poster="{{ asset('storage/videos/' . $video->user_id . '/thumb/' . $video->thumb ) }}">
									<source src="{{ asset('storage/videos/' . $video->user_id . '/' . $video->video ) }}" type="video/mp4">
								</video>
								<div class="views"><p><i class="fa fa-eye" aria-hidden="true"></i>{{ ' ' . $video->total_views }}</p></div>
							</div>		
							@php
								$count++;
							@endphp				 
							@endforeach
							
						</div>
						</div>
								
							</div>
							<div class="col-lg-3">
							<div class="video-rightbar-main">
								<h3>Suggested Accounts</h3>
								<div class="video-profile-tab">
									<img src="img/author2.jpg" alt="" />
									<h4>Sandy Sani</h4>
									<h5>@sandysani</h5>
								</div>
								
								<div class="video-profile-tab">
									<img src="img/author2.jpg" alt="" />
									<h4>Sandy Sani</h4>
									<h5>@sandysani</h5>
								</div>
								
								<div class="video-profile-tab">
									<img src="img/author2.jpg" alt="" />
									<h4>Sandy Sani</h4>
									<h5>@sandysani</h5>
								</div>
								
								<div class="video-profile-tab">
									<img src="img/author2.jpg" alt="" />
									<h4>Sandy Sani</h4>
									<h5>@sandysani</h5>
								</div>
								
								<div class="video-profile-tab">
									<img src="img/author2.jpg" alt="" />
									<h4>Sandy Sani</h4>
									<h5>@sandysani</h5>
								</div>
							</div>
							
							<div class="video-rightbar-main">
								<h3>Sponsored</h3>
								<div class="sponsored">
								<img src="{{asset('default/unify-logo.png')}}" alt="" />
								<h3>Unify SoftTech</h3>
								<a href="#">www.slike.com</a>
								</div>
							</div>
							
							<div class="video-sm">
								<ul>
									<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
								</ul>
							</div>
							</div>
						</div>
					</div>

					</div>
				</div>
			</div>
		</div>
		<div class="floating-shapes">
			<span data-parallax='{"x": 150, "y": -20, "rotateZ":500}'><img src="default/fl-shape-1.png" alt=""></span>
			<span data-parallax='{"x": 250, "y": 150, "rotateZ":500}'><img src="default/fl-shape-2.png" alt=""></span>
			<span data-parallax='{"x": -180, "y": 80, "rotateY":2000}'><img src="default/fl-shape-3.png" alt=""></span>
			<span data-parallax='{"x": -20, "y": 180}'><img src="default/fl-shape-4.png" alt=""></span>
			<span data-parallax='{"x": 300, "y": 70}'><img src="default/fl-shape-5.png" alt=""></span>
			<span data-parallax='{"x": 250, "y": 180, "rotateZ":1500}'><img src="default/fl-shape-6.png" alt=""></span>
			<span data-parallax='{"x": 180, "y": 10, "rotateZ":2000}'><img src="default/fl-shape-7.png" alt=""></span>
			<span data-parallax='{"x": 250, "y": -30, "rotateX":2000}'><img src="default/fl-shape-8.png" alt=""></span>
			<span data-parallax='{"x": 60, "y": -100}'><img src="default/fl-shape-9.png" alt=""></span>
			<span data-parallax='{"x": -30, "y": 150, "rotateZ":1500}'><img src="default/fl-shape-10.png" alt=""></span>
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
	  <div class="modal-content" style="position: relative; height:100%; margin-top:10%">
		
		<div class="modal-body p-0">
			<div class="container-fluid">
				<div class="row">
				  <div class="col-md-7" style="background-color: #001721">
					{{-- <video id="slikeVideo" class="videoInsert" style="height:100vh;" loop>
						<source src="" type="video/mp4">
						<!--Browser does not support <video> tag -->
					</video> --}}
					<div class="video-section" onclick="play()">
						<video id="slikeVideo" autoplay="" loop>
							<source src="" type="video/mp4">
						</video>
						{{-- <div class="video-action">
							<a href="javascript:void(0)" class="play" style=""><i class="fa fa-play"></i></a>
						</div> --}}
					</div>
				  </div>
				  <div class="col-md-5 ml-auto">
					{{-- <div class=" d-flex"> --}}
						{{-- @if (auth()->guard('admin')->check())
							<img src="{{ asset('img/author.jpg')}}" class="rounded-circle" style="width: 50px" alt="Cinque Terre"> 
							<div class="pl-2 my-auto">{{ auth()->guard('admin')->user()->name }} </div>
						@else
						<i class="fa fa-sign-in" aria-hidden="true"></i>  Login
						@endif --}}
						<div class="modal-right-section">
							<div class="user-top-info">
								<div class="user-profile-info">
									<a class="pjax" href="https://tongtang.lpress.xyz/user/creative-it" onclick="profileshow()">
										 <img src="https://tongtang.lpress.xyz/uploads/profile10.png" alt="">@<span id="user-profile-info"></div></a>
								</div>
								<div class="arrow-button">
									<a href="javascript:void(0)" onclick="ellipsis_open('bn')"><i class="fa fa-ellipsis-h"></i></a>
								</div>
							</div>
							<div class="modal-comment-list" id="modal-comment-list">
								{{-- <div class="single-comment">
									<a class="pjax" href="https://tongtang.lpress.xyz/user/arafath" onclick="profileshow()">
										<img src="https://tongtang.lpress.xyz/uploads/2020-09-15-5f60c116e410c.jpg" alt="">
									</a>
									<span> 
										<a class="pjax" href="https://tongtang.lpress.xyz/user/arafath" onclick="profileshow()">arafatartr</a>nice 
										<div class="comment-info">
											<span>15th <span id="comment_like_count347" class="likes"> 0likes</span><a href="javascript:void(0)" onclick="reply('347','arafatartr','77')">Reply</a></span>
										</div>
									</span>
									<input type="hidden" id="comment_like_url" value="https://tongtang.lpress.xyz/comment_like">
									<div class="favourite-icon">
											<a href="https://tongtang.lpress.xyz/login" class="pjax" onclick="profileshow()"><i id="like" class="fa fa-heart"></i></a>
									</div>
								</div> --}}
																		
							</div>
							<div class="modal-video-post-action">
								<div class="modal-main-action">
															<a href="https://tongtang.lpress.xyz/login" class="pjax" onclick="profileshow()"><i id="like" class="fa fa-heart"></i></a>
																					<a href="https://tongtang.lpress.xyz/login" class="pjax" onclick="profileshow()"><label for="comment"><i class="fa fa-comment"></i></label></a>
															<a href="javascript:void(0)" onclick="share('bn')"><i class="fa fa-paper-plane"></i></a>
															<a href="https://tongtang.lpress.xyz/login" class="pjax f-right" onclick="profileshow()"><i class="fa fa-flag"></i></a>
														</div>
								<div class="modal-total-views" id="modal-total-views">
									{{-- 1.3k+ views --}}
								</div>
								<div class="modal-video-date">
									{{-- July 25, 2020 --}}
									{{ date('M d, Y') }}
								</div>
							</div>
							<input type="hidden" id="like_url" value="https://tongtang.lpress.xyz/like">
							<div class="send-comment-area">
													<div class="please-login text-center">
									<p>Please <a href="https://tongtang.lpress.xyz/login" class="pjax" onclick="profileshow()">Login</a> or <a href="https://tongtang.lpress.xyz/register" class="pjax" onclick="profileshow()">SignUp</a></p>
								</div>
												</div>
						</div>
					</div>
				  {{-- </div> --}}
				</div>
				{{-- <div class="row">
				  <div class="col-md-3 ml-auto">.col-md-3 .ml-auto</div>
				  <div class="col-md-2 ml-auto">.col-md-2 .ml-auto</div>
				</div>
				<div class="row">
				  <div class="col-md-6 ml-auto">.col-md-6 .ml-auto</div>
				</div>
				<div class="row">
				  <div class="col-sm-9">
					Level 1: .col-sm-9
					<div class="row">
					  <div class="col-8 col-sm-6">
						Level 2: .col-8 .col-sm-6
					  </div>
					  <div class="col-4 col-sm-6">
						Level 2: .col-4 .col-sm-6
					  </div>
					</div>
				  </div>
				</div> --}}
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

@endsection