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
<div class="col-lg-3" ></div>
<div class="col-lg-6 col-12" >
                <div class="card card0 border-0">
<div class="card2 border-0 px-4">
    <div class="row mb-4 px-3">
        <div class="col-md-12 py-2 text-center">
            <img class="img-fluid" src="<?php echo MyFunctions::getFrontLogo(); ?>">
        </div>
    
        <div class="col-md-12 text-center">
        <div class="col-12 left-profile ">
        <?php 
        // if(!empty($user->user_dp)){
        //     if(strpos($user->user_dp,'fbsbx.com') !== false || strpos($user->user_dp,'googleusercontent.com') !== false){
        //         $user_dp=$user->user_dp;
        //     }else{
        //         $user_dp=asset(Storage::url('public/profile_pic/' . $user->user_id). '/small/' . $user->user_dp);
               
        //     }  
        // }else{
            if(!empty($user_data['user_dp']) || isset($user_data['user_dp'])){
                $user_dp = $user_data['user_dp'];
            }else{
            $user_dp=asset('default/default.png');
        // }
        
            }
            // echo $user['user_dp'];
            ?>
        
            <img class="rounded-circle change_pic" style="box-shadow: 0px 0px 8px #774fc3;object-fit: cover;object-position: 0% 0px !important;"  src="{{$user_dp}}" alt="" width="150" height="150"/>

            <i class="fa fa-camera camera_icon change_pic"></i> <br />
          
            <div class="change_photo_text pt-3 change_pic">Change Profile Photo</div>
            
        </div>
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
    <form method="POST" action="{{ route('web.socialRegister') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Username</h6>
                <?php 
                    if(isset($user_data['username'])){
                        $username=$user_data['username'];
                    }elseif(old('username')){
                        $username=old('username');
                    }else{
                        $username="";
                    } ?>
            </label> <input class="mb-4" type="text" value="{{$username}}" name="username" placeholder="Enter Username" required> 
            @if ($errors->has('username'))
            <span class="help-block text-danger">{{ $errors->first('username') }}</span>
            @endif
        </div>
        <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Email</h6>
                <?php 
                    if(isset($user_data['email'])){
                        $email=$user_data['email'];
                    }elseif(old('email')){
                        $email=old('email');
                    }else{
                        $email="";
                    } ?>
            </label> <input class="mb-4" type="email" value="{{$email}}" name="email" placeholder="Enter Username" required <?php echo ($email!="") ? 'readonly' : '' ; ?>> 
            @if ($errors->has('email'))
            <span class="help-block text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Password</h6>
            </label> <input type="password" name="password" placeholder="Enter password" required> 
            @if ($errors->has('password'))
            <span class="help-block text-danger">{{ $errors->first('password') }}</span>
            @endif  
        </div>
        <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Confirm Password</h6>
            </label> <input type="password" name="confirm_password" placeholder="Enter Confirm password" required> 
            @if ($errors->has('confirm_password'))
            <span class="help-block text-danger">{{ $errors->first('confirm_password') }}</span>
            @endif  
        </div>
        <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">DOB</h6>
            </label> 
            <?php 
            if(isset($user_data['dob'])){
                $dob=$user_data['dob'];
            }elseif(old('dob')){
                $dob=old('dob');
            }else{
                $dob="";
            } ?>
            <input id="dob" type="date" name="dob" value="{{$dob}}" autocomplete="dob" required>
            @if ($errors->has('dob'))
            <span class="help-block text-danger">{{ $errors->first('dob') }}</span>
            @endif  
        </div>
        <div style="display:none">
            <input id="profile_pic" type="file" class="form-control" name="profile_pic" value="">
            <input type="hidden" name="old_profile_pic" value="{{$user_dp}}">
            <?php  
            // if(isset($user_data['email'])){ 
            //     $email=$user_data['email'];
            // }elseif(old('email')){
            //     $email=old('email');
            // }else{
            //     $email="";
            // }
            
            if(isset($user_data['login_type'])){ 
                $login_type=$user_data['login_type'];
            }elseif(old('login_type')){
                $login_type=old('login_type');
            }else{
                $login_type="";
            }

            if(isset($user_data['fname'])){ 
                $fname=$user_data['fname'];
            }elseif(old('fname')){
                $fname=old('fname');
            }else{
                $fname="";
            }

            if(isset($user_data['lname'])){ 
                $lname=$user_data['lname'];
            }elseif(old('fname')){
                $lname=old('lname');
            }else{
                $lname="";
            }
            ?>
            <!-- <input id="email" type="text" class="form-control" name="email" value="{{$email}}"> -->
            <input id="login_type" type="text" class="form-control" name="login_type" value="{{$login_type}}">
            <input type="text" name="fname" value="{{$fname}}">
            <input type="text" name="lname" value="{{$lname}}">
        </div>
        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center" style="width:100%;{{MyFunctions::getTopbarColor()}}">Login</button> </div>
    </form>
    
</div>

<br />
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
