@extends('layouts.front')

@section('content')
<style>
.upload-icon{
	font-size: 54px;
    text-align: center;
    color: #7950c2;
	margin-top: 20px;
}
.dz-message{
	color: #eb4a64;
    margin: 0;
    margin-bottom: 40px;
	
}
.bg-btn {
    /* background: linear-gradient(50deg, rgb(115,80,199) 0%, rgb(236,74,99) 100%); */
    padding: 10px 0;
    color: #fff;
    border-radius: 2px;
}
select.form-control:not([size]):not([multiple]){
    height:auto !important;
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
									<h2>Video Detail</h2><br />
                                <div class="container-fluid">
                                    @if ($message = Session::get('error'))
                                <div class="alert alert-danger background-danger">
                                    <button type="button" class="close" data-bs-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
            
            <form method="POST" action="{{ route('web.video-info-submit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="fname" class="col-md-4 col-form-label text-left">{{ __('Description') }}</label>
                <?php if(old('description')){
                        $description=old('description');
                    }elseif(isset($video_detail->description)){
                        $description= $video_detail->description;
                    }else{
                        $description= "";
                    }
                ?>
                    <div class="col-md-6 text-left">
                        <!-- <input id="description" type="text" class="form-control border @error('description') is-invalid @enderror" name="description" value="{{ $description }}" required autocomplete="description" autofocus> -->
                        <textarea id="description" class="form-control border @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ $description }}</textarea>
        
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
			
				<div class="form-group row">
                    <label for="fname" class="col-md-4 col-form-label text-left">{{ __('Tags') }}</label>
                        <?php if(old('tags')){
                            $tags=old('tags');
                        }elseif(isset($video_detail->tags)){
                                $tags=$video_detail->tags;
                        }else{
                            $tags="";
                        }
                        ?>
                    <div class="col-md-6 text-left">

                        <input id="tags" type="text" class="form-control border @error('tags') is-invalid @enderror" name="tags" value="{{ $tags }}" autocomplete="tags" autofocus>
        
                        @error('tags')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-md-4 col-form-label text-left">{{ __('Visible') }}</label>
                        <?php 
                        if(old('privacy')){
                            $privacy=old('privacy');
                        }elseif(isset($video_detail->privacy)){
                                $privacy=$video_detail->privacy;
                        }else{
                            $privacy="0";
                        }
                        ?>
                    <div class="col-md-6 text-left">
                        <select class="form-control border" name="privacy">
                            <option value="0" <?php echo ($privacy==0) ? 'selected' : ''; ?> >Public</option>
                            <option value="1" <?php echo ($privacy==1) ? 'selected' : ''; ?> >Only Me</option>
                            <option value="2" <?php echo ($privacy==2) ? 'selected' : ''; ?> >Only Followers</option>
                        </select>
                        
                        @error('privacy')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
				<input type="hidden" name="id" value="{{ $id }}">
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4 text-center">
                        <button type="submit" class="btn btn-blue bg-btn" style="{{MyFunctions::getTopbarColor()}}">
                            {{ __('Upload') }}
                        </button>
                    </div>
                </div>
            </form>
<br />
<br />
                                </div>
								
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