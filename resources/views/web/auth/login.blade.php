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
.a_msg:hover{
    text-decoration:none;
}
</style>
<div class="col-lg-4" ></div>
<div class="col-lg-4 col-12" >
                <div class="card card0 border-0">
<div class="card2 border-0 px-4">
    <div class="row mb-4 px-3">
        <div class="col-md-12 py-2 text-center">
            <img class="img-fluid" src="<?php echo MyFunctions::getFrontLogo(); ?>">
        </div>
    
        <div class="col-md-12 text-center">
            <h3 class="mb-0 mt-2 pb-3">Sign in with</h3>
        </div>
      
    </div>
    
    @if ($message = Session::get('error'))
        <div class="alert alert-danger background-danger">
            <button type="button" class="close" data-bs-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
            @if (session('verified'))
            <div>
                <a class="a_msg" href="{{ route('web.login-email-verify',['email' => old('email')])}}">Click here to verify Your Email</a>
            </div>
            @endif
        </div>
    @endif
    
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form method="POST" action="{{ route('web.loginUser') }}">
        {{ csrf_field() }}
        <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Email Address</h6>
            </label> <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address"> 
            @if ($errors->has('email'))
            <span class="help-block text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="row px-3 form-group">
            <label class="mb-1">
                <h6 class="mb-0 text-sm">Password</h6>
            </label> 
            <div class="input-group" id="show_hide_password">
                <input class="form-control"type="password" name="password" placeholder="Enter password">
                <div class="input-group-text">
                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                </div>
            </div>
            @if ($errors->has('password'))
            <span class="help-block text-danger">{{ $errors->first('password') }}</span>
            @endif  
        </div>
        <div class="row px-3 mb-4">
            <div class="col-md-6 col-sm-12 custom-control custom-checkbox"> 
                <input id="chk1" type="checkbox" name="remember" class="custom-control-input"> 
                <label for="chk1" class="custom-control-label text-sm">Remember me</label> 
                
            </div> 
            <div class="col-md-6 col-sm-12">
                <a href="{{ route('web.password.reset')}}" class="ml-auto mb-0 text-sm">Forgot Password?</a>
            </div>
            </div>
        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center" style="width:100%;{{MyFunctions::getTopbarColor()}}">Login</button> </div>
    </form>
    <?php if($mailSet>0){ ?>
        <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger " 
            href="{{ route('web.register') }}">Register</a></small> </div>
    <?php } ?>
</div>
<?php $social=MyFunctions::checkSocialLogin(); 
if($social['google_active']==1 || $social['fb_active']==1){ ?>
    <div class="row px-3 mb-4">
        <div class="line"></div> <small class="or text-center">Or</small>
        <div class="line"></div>
    </div>

  <div class="col-md-12 text-center">

    <div class="row">
    <?php if($social['google_active']==1) { ?>
        <div class="col-md-12 col-sm-12">
            <button class="google-btn" onclick="window.location.href='{{ route('web.googleLogin') }}'"><i class="fa fa-google"></i> &nbsp; Sign In With Google</button>
        </div>
        <?php }
        if($social['fb_active']==1) {  ?>
        <div class="col-md-12 col-sm-12">
            <button class="fb-btn" onclick="window.location.href='{{ route('web.facebookLogin') }}'"><i class="fa fa-facebook"></i> &nbsp; Sign In With Facebook</button>
        </div>
        <?php } ?>
    </div>
            <!-- <div class="twitter text-center mr-0">
                <div class="fa fa-google" onclick="window.location.href='{{ route('web.googleLogin') }}'"></div>
            </div>
             <div class="facebook text-center">
                <div class="fa fa-facebook" onclick="window.location.href='{{ route('web.facebookLogin') }}'"></div>
            </div>  -->
    </div>
<?php } ?>
<br />
                    <!-- <div class="bg-blue bg-blue-bottom">
                    
               Copyright &copy; {{ date('Y') }}. All rights reserved.
                 
            </div> -->
@endsection
