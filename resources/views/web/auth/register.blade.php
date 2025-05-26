@extends('layouts.web')

@section('content')
<style>

h3,small,h6,label,a{
    /* color:#fff; */
}
.text-danger{
    color:#f9b6c1!important
}
/* .grecaptcha-badge { visibility: hidden; } */
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="col-lg-3" ></div>
<div class="col-lg-6" >
                <div class="card card0 border-0">
<div class="card2 border-0 px-4 py-5">
<div class="row mb-4 px-3">
        <div class="col-md-12 py-2 text-center">
            <img class="img-fluid" src=" <?php echo MyFunctions::getFrontLogo(); ?>">
        </div>
        </div>
    <h3 class="text-center pb-3">Register</h3>
  
@if ($message = Session::get('success'))
                        <div class="alert alert-success background-success">
                            <button type="button" class="close" data-bs-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
    @if ($message = Session::get('error'))
                        <div class="alert alert-danger background-danger">
                            <button type="button" class="close" data-bs-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
    <form method="POST" action="{{ route('web.registerUser') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <div class="col-md-6">
                <div class="row">
                    <label for="fname" class="col-md-12 col-form-label">{{ __('First Name') }}</label>

                    <div class="col-md-12">
                        <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="username" autofocus>

                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <label for="lname" class="col-md-12 col-form-label">{{ __('Last Name') }}</label>

                    <div class="col-md-12">
                        <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" autocomplete="username" autofocus>

                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <label for="username" class="col-md-12 col-form-label">{{ __('User Name') }}</label>

                    <div class="col-md-12">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <label for="email" class="col-md-12 col-form-label">{{ __('Email') }}</label>

                    <div class="col-md-12">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="username" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="row">
                    <label for="gender" class="col-md-12 col-form-label">{{ __('Gender') }}</label>

                    <div class="col-md-12">

                        <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus >
                            <option value=''>Select Gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Others</option>
                        </select>

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-6">
                <div class="row">
                    <label for="mobile" class="col-md-12 col-form-label">{{ __('Mobile') }}</label>

                    <div class="col-md-12">
                        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="username" autofocus>

                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-6">
                <div class="row">
                    <label for="dob" class="col-md-12 col-form-label">{{ __('DOB') }}</label>

                    <div class="col-md-12">
                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob">

                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div> -->
            <div class="col-md-6">
                <div class="row">
                    <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <div class="input-group" id="show_hide_password">
                            <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <div class="input-group-text">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirm Password') }}</label>

                    <div class="col-md-12">
                        <div class="input-group" id="show_hide_password">
                            <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <div class="input-group-text">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($recaptcha){ ?>
            <div class="col-md-6">
            <div class="g-recaptcha" data-sitekey="{{ config('app.google_captcha_site_key')}}"></div>
                <!-- <input type="hidden" name="recaptcha" id="recaptcha"> -->
            </div>
            <?php } ?>
            <!-- <div class="col-md-6">
                <div class="row">
                    <label for="profile_pic" class="col-md-12 col-form-label">{{ __('Image') }}</label>

                    <div class="col-md-12">
                        <input id="profile_pic" type="file" class="form-control @error('profile_pic') is-invalid @enderror" name="profile_pic" value="{{ old('profile_pic') }}" autocomplete="profile_pic">

                        @error('profile_pic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div> -->
           
        </div>
      

        <div class=" row ">
            <div class="col-md-6">
                <button type="submit" class="btn btn-blue text-center" style="{{MyFunctions::getTopbarColor()}}">
                    {{ __('Register') }}
                </button>
            </div>
            <div class="col-md-6">
                <small class="font-weight-bold">Have an account? <a class="text-danger " 
                href="{{ route('web.login') }}">Login</a></small> 
            </div>
        </div>
    </form>
    
</div>
<br/>
                    <!-- <br/> -->
                    
                    <!-- <div class="bg-blue bg-blue-bottom">
                    
               Copyright &copy; {{ date('Y') }}. All rights reserved.
                 
            </div> -->
            <!-- <script src="https://www.google.com/recaptcha/api.js?render=6LeebnkaAAAAAMrq3PHrOm9HTBSOt3LSlWKHUZWs"></script>
<script>
         grecaptcha.ready(function() {
             grecaptcha.execute('6LeebnkaAAAAAMrq3PHrOm9HTBSOt3LSlWKHUZWs').then(function(token) {
                if (token) {
                  document.getElementById('recaptcha').value = token;
                }
             });
         });
</script> -->
@endsection
