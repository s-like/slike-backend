@extends('layouts.front')

@section('content')
<style>
 .bg-btn{
        background: linear-gradient(50deg, rgb(115,80,199) 0%, rgb(236,74,99) 100%);
		
		padding: 10px 0;
    color: #fff;
    border-radius: 2px;
    }
</style>
@include('includes.topbar')
	<section class="h4-about s-padding ">
		
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-12">
					<div class="about-content privacy">
					
					<div class="container-fluid">
						<?php if($content){ ?>
						<div class="row">
							<div class="col-lg-12 text-center">
								<h2>{{ $content->title}}</h2>
							</div>
							<div class="col-lg-12 text-justify">
								<?php echo $content->content; ?>
							</div>
						</div>
						<?php }else{ ?>
							<div class="col-lg-12 text-center">
								<h2>No Content</h2>
							</div>
							<?php } ?>
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