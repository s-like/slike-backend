@extends('layouts.front')

@section('content')
<style>
 .bg-btn{
        /* background: linear-gradient(50deg, rgb(115,80,199) 0%, rgb(236,74,99) 100%); */
		
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
						<div class="row">
							<div class="col-lg-9">
									<h2>Change Password</h2><br />
                                <div class="container-fluid">
									@if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
    					@endif
                                    @if ($message = Session::get('error'))
                                <div class="alert alert-danger background-danger">
                                    <button type="button" class="close" data-bs-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
            
            <form method="POST" action="{{ route('web.updatePassword') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="fname" class="col-md-4 col-form-label text-left">{{ __('Old Password') }}</label>
        
                    <div class="col-md-6 text-left">
						<input id="old_password" type="password" class="form-control border @error('old_password') is-invalid @enderror" name="old_password" 
								value="{{ old('old_password') }}" required autocomplete="old_password" autofocus>
        
                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-left">{{ __('New Password') }}</label>
		
					<div class="col-md-6">
						<input id="password" type="password" class="form-control border @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
		
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
		
				<div class="form-group row">
					<label for="password-confirm" class="col-md-4 col-form-label text-left">{{ __('Confirm Password') }}</label>
		
					<div class="col-md-6">
						<input id="password-confirm" type="password" class="form-control border link" name="password_confirmation" required autocomplete="new-password">
					</div>
				</div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn bg-btn" style="{{MyFunctions::getTopbarColor()}}">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
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