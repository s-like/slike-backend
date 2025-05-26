@extends('layouts.web')

@section('content')
<style>
.card{
    /* background-image: linear-gradient(to bottom right, #ec4a63, #7350c7); */
}
h3,small,h6,label,a{
    /* color:#fff; */
}
.text-danger{
    color:#f9b6c1!important
}
.google-btn{
    background: #cf4332;
    padding: 10px 10px;
    border: 0px;
    color: #fff;
    margin: 10px 0px;
    width:75%;
}
.fb-btn{
    background: #3c66c4;
    padding: 10px 10px;
    border: 0px;
    color: #fff;
    margin: 10px 0px;
    width:75%;
}
</style>
<div class="col-lg-4" ></div>
<div class="col-lg-4 col-12" style="margin-top:10%;">
                <div class="card card0 border-0">
<div class="card2 border-0 px-4">
    <div class="row mb-4 px-3">
        <div class="col-md-12 py-2 text-center">
            <img class="img-fluid" src="<?php echo MyFunctions::getFrontLogo(); ?>">
        </div>
    
        <div class="col-md-12 text-center">
            <h3 class="mb-0 mt-2 pb-3">New Password</h3>
        </div>
      
    </div>
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{!! $error !!}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<form class="form-field-container fdesk-signupform" method='post' action="{{route('web.passwordChanged')}}">
			{{ csrf_field() }}
			<fieldset>
				<div class='row'>
					<input type="hidden" value="<?php echo $id; ?>" name="id">
					<div class='col-md-12'>
						<div class="form-field">
							<?php
							if(old('new_password')!=''){
								$new_password = old('new_password');
							}else{
								$new_password = '';
							}
							?>
							<i class="fa fa-key"></i> <label class="form-placeholder">New Password</label>
							<input type="password" name="new_password" value='{{$new_password}}' class="new-password-form"  autocomplete="off" required>
							
							<div class="error-wrapper"></div>
						</div>
					</div>
					<div class='col-md-12'>
						<div class="form-field">
							<?php
							if(old('confirm_password')!=''){
								$confirm_password = old('confirm_password');
							}else{
								$confirm_password = '';
							}
							?>
							<i class="fa fa-key"></i> <label class="form-placeholder">Confirm Password</label>
							<input type="password" name="confirm_password" value='{{$confirm_password}}' class="confirm-password-form"  autocomplete="off" required>
							
							<div class="error-wrapper"></div>
						</div>
					</div>
				</div>
				<br />
				<input type="submit" value="Submit"  class="btn btn-blue text-center" style="width:100%;height:50px;{{MyFunctions::getTopbarColor()}}">
							<br />
							<br />
			</div>
								
			
	
				
			</fieldset>
		</form>
   
</div>

<br />
                    <!-- <div class="bg-blue bg-blue-bottom">
                    
               Copyright &copy; {{ date('Y') }}. All rights reserved.
                 
            </div> -->
@endsection
