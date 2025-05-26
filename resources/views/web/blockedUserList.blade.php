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
					<div>
					
					<div class="container-fluid">
						
						<div class="row">
							<div class="col-lg-9">
									<h3>Blocked Users</h3><br />

									<div id="block">
										<?php
										if(count($blockList)>0){
										foreach($blockList as $block){ ?>
											
											<div class="card">
												<div class="card-body">
												<?php 
												if($block->user_dp!=""){
													if(strpos($block->user_dp,'facebook.com') !== false || strpos($block->user_dp,'fbsbx.com') !== false || strpos($block->user_dp,'googleusercontent.com') !== false){ 
														$u_dp=$block->user_dp;
														}else{
															$u_dp=asset(Storage::url('public/profile_pic').'/'.$block->user_id.'/small/'.$block->user_dp) ;
															
														} 
													}else{ 
														$u_dp= asset('default/default.png');
													} ?>
												<img src="{{$u_dp}}" class="avatar_img float-left rounded-circle">
												<div class="message">
													<h5 class="card-title"><a href="{{ route('web.userProfile', $block->user_id) }}">{{ $block->fname.' '.$block->lname }} <?php if($block->verified=='A'){ ?>
														<img src="{{ asset('default/verified-icon-blue.png') }}" alt="" style="width:15px;height:15px;">
													<?php } ?></a></h5>
													<h6 class="card-subtitle mb-2 text-muted">{{ '@' . $block->username }}</h6>
													<?php if($block->user_id != auth()->guard('web')->user()->user_id){ 
														 ?>
														<span class="block_btn text-white" data-id="<?php echo $block->user_id; ?>" style="{{MyFunctions::getTopbarColor()}}">Unblock</span>
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
													<h6>No result found...</h6>
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