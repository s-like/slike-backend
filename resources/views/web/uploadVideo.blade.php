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
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@include('includes.topbar')
	<section class="h4-about s-padding ">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<div class="about-content privacy">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-9">
									<h2>Upload Videos</h2><br />
                                <div class="container-fluid">
                                    @if ($message = Session::get('error'))
									<div class="alert alert-danger background-danger">
										<button type="button" class="close" data-bs-dismiss="alert">×</button> 
										<strong>{{ $message }}</strong>
									</div>
									@endif
            
									<form method="post" action="{{ route('web.insertVideo') }}" enctype="multipart/form-data"
												class="dropzone text-center" id="dropzone">
										@csrf
										<div class="dz-message" data-dz-message><span>
										<div class="upload-icon">
											<i class="fa fa-cloud-upload" aria-hidden="true"></i></div><br />	
											Drop or Select file to upload</span>
										</div>
								
									</form>
									<br />
									<div class="col-md-12 alert alert-success" style="display:none;">Video Upload successfully</div>
									<div class="col-md-12 alert alert-error alert-danger" style="display:none;"></div>
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script>


$(function() {
        Dropzone.options.dropzone = {
			maxFilesize: 209715200,
			acceptedFiles: "video/*",
			addRemoveLinks: true,
			timeout: 1800000,
			maxFiles: 1,
			error: function (file, response) {
				file.previewElement.classList.add("dz-error");
			},
            success: function(file, response){
				console.log(response);
				if(response.status=="success"){
    				var id=response.v_id;
    				$(".alert-success").show();
    				
    				var url = '{{ route("web.video-info-update", ":id") }}';
    				url = url.replace(':id', id);
    				
    				window.location = url;
				}else{
				    $(".alert-error").show();
				     $(".alert-error").text(response.msg);
				     setTimeout(function(){
				        //   $(".alert-error").hide();
				          window.location.reload();
				     },10000);
				}
            }
        };
    });

    
        
    
</script>
@endsection