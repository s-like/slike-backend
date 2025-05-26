@extends('layouts.front')

@section('content')
<style>
 .bg-btn{
        /* background: linear-gradient(50deg, rgb(115,80,199) 0%, rgb(236,74,99) 100%); */
		
		padding: 10px 0;
    color: #fff;
    border-radius: 2px;
    }
	.card .card-body .message {
		padding-left: 80px;
		text-align: left;
	}
.avatar_img{
	width: 57px;
	/* width: 7%; */
}
.card .card-body .actions {
  margin-top: 5px;
}
</style>
@include('includes.topbar')
	<section class="h4-about s-padding ">
		
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-12">
					<div class="">
					
					<div class="container-fluid">
							<div class="row m-3 mb-5 user_profile_top">
							<div class="col-md-3">
							<?php if(!empty($userInfo->user_dp)){
								if(strpos($userInfo->user_dp,'fbsbx.com') !== false || strpos($userInfo->user_dp,'googleusercontent.com') !== false){
									$user_dp=$userInfo->user_dp;
								}else{
									// $exists = Storage::disk(config('app.filesystem_driver'))->exists('public/profile_pic/'.$userInfo->user_id.'/small/'.$userInfo->user_dp);
									//dd(Storage::url('public/profile_pic/' . $userInfo->user_id). '/small/' . $userInfo->user_dp);
									// if($exists){ 
									// if(file_exists(public_path('storage/profile_pic').'/'.$userInfo->user_id.'/small/'.$userInfo->user_dp)){
										$user_dp=asset(Storage::url('public/profile_pic/' . $userInfo->user_id). '/small/' . $userInfo->user_dp);
									// }else{
									//     $user_dp=asset('storage/profile_pic/default.png');
									// } 
								}  
							}else{
								$user_dp=asset('default/default.png');
							} ?>
								<img class="rounded-circle" style="box-shadow: 0px 0px 6px #774fc3;" src="{{ $user_dp }}" alt="" width="150" height="150"/>
							</div>
							<div class="col-md-9 pt-2 p-0">
								<div class="">
									<h3 style="text-transform: capitalize;">{{ $userInfo->fname }} {{ $userInfo->lname }}</h3> 
								
								</div>
								<h5 style="color:#aaa">{{ '@'.$userInfo->username }}  <?php if($userInfo->verified=='A'){ ?>
												<img src="{{ asset('default/verified-icon-blue.png') }}" alt="" style="width:15px;height:15px;">
											<?php } ?></h5> 
								<div class="row mb-3"> 
									<div class="col-lg-3 col-3"><strong>{{ !empty($userInfo->total_videos) ? $userInfo->total_videos : '0' }}</strong> videos</div>
									<div class="col-lg-3 col-3"><strong>{{ !empty($userInfo->total_likes) ? $userInfo->total_likes : '0' }}</strong> likes</div>
									<div class="col-lg-3 col-3"><a href="{{ route('web.followers-list',$userInfo->user_id)}}" style="color:#5f6368;cursor:pointer"><strong>{{ $followers }}</strong> followers</a></div>
									<div class="col-lg-3 col-3"><a href="{{ route('web.following-list',$userInfo->user_id)}}" style="color:#5f6368;cursor:pointer"><strong>{{ $following }}</strong> following</a></div>
								</div>
								<div class="row">
									<div class="col-md-3 ">
										@if (auth()->guard('web')->check())
											@if (auth()->guard('web')->user()->user_id == $userInfo->user_id)
												<a class="btn btn-blue bg-btn text-white" href="{{ route('web.editUserProfile', $userInfo->user_id) }}" style="{{MyFunctions::getTopbarColor()}};min-width: 110px;padding:6px 0px;"><i class="fa fa-edit"></i> Edit Profile</a>
											@endif
										@endif
										@if ($canFollow)
											<a class="btn bg-btn text-white" onclick="followUnfollow('{{ $userInfo->user_id }}')" style="min-width: 110px;padding:6px 0px;{{MyFunctions::getTopbarColor()}}">
												<span id="followUnfollowIcon">
													<?php if(!$followed){ ?>
													<i class="fa fa-user-plus"></i>
													<?php }else{ ?>
														<i class="fa fa-user-times"></i>
													<?php } ?>
												</span>
												<span id="followUnfollow">
												@if(!$followed) Follow @else Unfollow @endif</span>
											</a>
										@endif
									</div>
									@if (auth()->guard('web')->check())
										@if (auth()->guard('web')->user()->user_id != $userInfo->user_id)
											<div class="col-md-3">
												<a onclick="blockUnblock('{{ $userInfo->user_id }}')" class="btn bg-btn text-white" style="min-width: 110px;padding:6px 0px;{{MyFunctions::getTopbarColor()}}">
												<span id="blockUnblockIcon">
												<?php if(!$blocked){ ?>
													<i class="fa fa-ban"></i>
												<?php }else{ ?>
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
							<div class="col-lg-9">
									<h3>Following</h3><br />

									<div id="follow">
										<?php
										if(Count($followingList)>0){
										foreach($followingList as $follower){ ?>
											
											<div class="card">
												<div class="card-body">
												<?php 
												if($follower->user_dp!=""){
													if(strpos($follower->user_dp,'facebook.com') !== false || strpos($follower->user_dp,'fbsbx.com') !== false || strpos($follower->user_dp,'googleusercontent.com') !== false){ 
														$u_dp=$follower->user_dp;
														}else{
															$u_dp=asset(Storage::url('public/profile_pic').'/'.$follower->user_id.'/small/'.$follower->user_dp) ;
															
														} 
													}else{ 
														$u_dp= asset('default/default.png');
													} ?>
												<img src="{{$u_dp}}" class="avatar_img float-left rounded-circle">
												<div class="message">
													<h5 class="card-title"><a class="pjax" href="{{ route('web.userProfile', $follower->user_id) }}">{{ $follower->fname.' '.$follower->lname }} <?php if($follower->verified=='A'){ ?>
														<img src="{{ asset('default/verified-icon-blue.png') }}" alt="" style="width:15px;height:15px;">
													<?php } ?></a></h5>
													<h6 class="card-subtitle mb-2 text-muted">{{ '@' . $follower->username }}</h6>
													<?php if($follower->user_id!= auth()->guard('web')->user()->user_id){ ?>
														<span class="follow_btn" data-id="<?php echo $follower->user_id; ?>" style="{{MyFunctions::getTopbarColor()}}">
															<?php if($follower->follow>0){
																echo "Unfollow";
															}else{
																echo "Follow";
															} ?>
														</span>
													<?php } ?>
													<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
												</div>
												<!-- <div class="actions">
													<a href="#" class="card-link">Like</a>
													<a href="#" class="card-link">Reply</a>
													<a href="#" class="card-link">Share</a>
												</div> -->
												</div>
											</div>
										<?php }
									}else{ ?>				
										<div class="card">
											<div class="card-body">
												<h6>No following...</h6>
											</div>
										</div>
									<?php } ?>
									</div>

									<div class="loadMore text-center col-12">
										<img src="{{ asset('default/loading.gif') }}" style="width:35px;margin-top:10px;">
									</div>
								<br/>
							</div>
							
							<div class="col-lg-3">
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

@endsection