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
            <img class="img-fluid"  src="<?php echo MyFunctions::getFrontLogo(); ?>">
        </div>
    
        <div class="col-md-12 text-center">
            <h3 class="mb-0 mt-2 pb-3">Reset Password</h3>
        </div>
      
    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('web.password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-blue text-center" style="width:100%;height:50px;{{MyFunctions::getTopbarColor()}}">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
   
</div>

<br />
                    <!-- <div class="bg-blue bg-blue-bottom">
                    
               Copyright &copy; {{ date('Y') }}. All rights reserved.
                 
            </div> -->
@endsection
