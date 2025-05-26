@extends('layouts.front')

@section('content')
<style>
.btn-blue {
        /* background-color: #1A237E; */
        background-color:#7350c7;
        width: 150px;
        color: #fff;
        border-radius: 2px
    }
    .camera_icon{
        position: relative;
    bottom: -60px;
    left: -40px;
    color: #e84a66;
    font-size: 21px;
    }
    .change_photo_text{
        color: #e84a66;
        font-size: 18px;
    }
    .change_pic{
        cursor:pointer;
    }
    .bg-btn{
        /* background: linear-gradient(50deg, rgb(115,80,199) 0%, rgb(236,74,99) 100%); */
        padding: 10px 0;
    color: #fff;
    border-radius: 2px;
    }

    </style>
<section class="home-4-banner main-banner main-slider" id="banner" style="padding-top:30px;">
	<div class="swiper-container iconic-main-slider home-4-slider iconic-top-slider w-100">
		<div class="swiper-wrapper">
			<div class="swiper-slide">



		</div>
	</div>
    <div id="particles"></div>
</section>    

<div class="card2 card border-0 px-4 py-5">
    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-md-4 col-12 left-profile ">
        <?php if(!empty($user->user_dp)){
            if(strpos($user->user_dp,'fbsbx.com') !== false || strpos($user->user_dp,'googleusercontent.com') !== false || strpos($user->user_dp,'facebook.com') !== false){
                $user_dp=$user->user_dp;
            }else{
                //$exists = Storage::disk(config('app.filesystem_driver'))->exists('public/profile_pic/'.$user->user_id.'/small/'.$user->user_dp);
				//if($exists){ 
                // if(file_exists(public_path('storage/profile_pic').'/'.$user->user_id.'/small/'.$user->user_dp)){
                    $user_dp=asset(Storage::url('public/profile_pic/' . $user->user_id). '/small/' . $user->user_dp);
                // }else{
                //     $user_dp=asset('storage/profile_pic/default.png');
                // } 
            }  
        }else{
            $user_dp=asset('default/default.png');
        } ?>
        
            <img class="rounded-circle change_pic" style="box-shadow: 0px 0px 8px #774fc3;object-fit: cover;object-position: 0% 0px !important;"  src="{{$user_dp}}" alt="" width="150" height="150"/>

            <i class="fa fa-camera camera_icon change_pic"></i> <br />
          
            <div class="change_photo_text pt-3 change_pic">Change Profile Photo</div>
            
            <div class="pt-3"><a href="{{ route('web.removeProfilePic') }}"><i class="fa fa-trash"></i> Remove Profile Photo</a></div>
        </div>
        <div class="col-md-8 col-12">
            <h3 class="text-danger text-center pb-3">Edit Profile</h3>
            @if ($message = Session::get('error'))
                                <div class="alert alert-danger background-danger">
                                    <button type="button" class="close" data-bs-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
            
            <form method="POST" action="{{ route('web.updateUserProfile', $user->user_id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="fname" class="col-md-3 col-form-label text-md-right">{{ __('First Name') }}</label>

                    <div class="col-md-6">
                        <input id="fname" type="text" class="form-control border @error('fname') is-invalid @enderror" name="fname" 
                            value="@if(!empty($user->fname)){{ $user->fname }}@else{{ old('fname') }}@endif" required autocomplete="username" autofocus>

                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-md-3 col-form-label text-md-right">{{ __('Last Name') }}</label>

                    <div class="col-md-6">
                        <input id="lname" type="text" class="form-control border @error('lname') is-invalid @enderror" name="lname" 
                            value="@if(!empty($user->lname)){{ $user->lname }}@else{{ old('lname') }}@endif" autocomplete="username" autofocus>

                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-md-3 col-form-label text-md-right">{{ __('User Name') }}</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control border @error('username') is-invalid @enderror" name="username" 
                            value="@if(!empty($user->username)){{ $user->username }}@else{{ old('username') }}@endif" required autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control border @error('email') is-invalid @enderror" name="email" 
                            value="@if(!empty($user->email)){{ $user->email }}@else{{ old('email') }}@endif" required autocomplete="username" autofocus readonly>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-md-3 col-form-label text-md-right">{{ __('Gender') }}</label>

                    <div class="col-md-6">

                        <select id="gender" style="height: 50px;padding-left: 27px !important;" class="form-control border p-0 @error('gender') is-invalid @enderror" name="gender" autocomplete="gender" autofocus >
                            <option value=''>Select Gender</option>
                            <option value="m" @if($user->gender == 'm') selected="selected" @endif>Male</option>
                            <option value="f" @if($user->gender == 'f') selected="selected" @endif>Female</option>
                            <option value="o" @if($user->gender == 'o') selected="selected" @endif>Others</option>
                        </select>

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-md-3 col-form-label text-md-right">{{ __('Mobile') }}</label>

                    <div class="col-md-6">
                        <input id="mobile" type="text" class="form-control border @error('mobile') is-invalid @enderror" name="mobile" 
                            value="@if(!empty($user->mobile)){{ $user->mobile }}@else{{ old('mobile') }}@endif" autocomplete="username" autofocus>

                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dob" class="col-md-3 col-form-label text-md-right">{{ __('DOB') }}</label>

                    <div class="col-md-6">
                        <input id="dob" type="date" class="form-control border @error('dob') is-invalid @enderror" name="dob" 
                            value="@if(!empty($user->dob)){{ $user->dob }}@else{{ old('dob') }}@endif" autocomplete="dob">

                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row " style="display:none;">
                    <label for="profile_pic" class="col-md-3 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input id="profile_pic" type="file" class="form-control @error('profile_pic') is-invalid @enderror" name="profile_pic" autocomplete="profile_pic">

                        @error('profile_pic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-lg-3 text-center">
                        <button type="submit" class="btn btn-blue bg-btn" style="{{MyFunctions::getTopbarColor()}}">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    
</div>
<script>
$(document).ready(function(){
    $('.change_pic').click(function(){
        $("#profile_pic").trigger('click');
    });
    $('#profile_pic').change(function(){
        readURL(this,'list');
    });
});

function readURL(input,file_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // $('.rounded-circle').html("<img src='" + e.target.result + "' width='40'>"); 
                $('.rounded-circle').prop('src', e.target.result);     
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
