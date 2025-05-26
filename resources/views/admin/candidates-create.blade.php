@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Edit User';
    $readonly = "";
} else if ($action == 'add') {
    $title = 'Add User';
    $readonly = "";
} else if ($action == 'view') {
    $title = 'View User';
    $readonly = 'readonly';
} else {
    $title = 'Copy User';
    $readonly = "";
}

$currentPath = url(config('app.admin_url')) . '/candidates/';

?>

<div class="col-lg-12">
    <div class="card customers-profile">
        <h3><?php echo $title; ?></h3>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <ul class="row nav nav-tabs md-tabs" role="tablist">
                    <li class="col-md-6 nav-item">
                        <a class="nav-link active" href="<?php echo $currentPath . $action . '/' . $id ?>"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;General</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item col-md-6">
                        <a class="nav-link" href="<?php echo $currentPath . $action . '/videos/' . $id ?>"><i class="fa fa-caret-square-o-right" aria-hidden="true"></i> &nbsp;Videos</a>
                        <div class="slide"></div>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        if ($action == 'edit') { ?>
            <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/candidates/'.$id)}}" method="post">
                {{ method_field('PUT') }}
            <?php } else { ?>
                <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/candidates')}}" method="post">
                <?php } ?>
                {{ csrf_field() }}
                <div class="row">

                    <div class="col-lg-12 ">
                        <div class="padding20">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label for="username" class="control-label"> <small class="req text-danger">* </small>Username</label>

                                        <?php
                                        if (old('username') != '') {
                                            $username = old('username');
                                        } else if (isset($candidate->username) && $candidate->username != '') {
                                            $username = $candidate->username;
                                        } else {
                                            $username = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" {{$readonly}}>
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label class="control-label">First Name <small class="req text-danger">*</small></label>

                                        <?php
                                        if (old('fname') != '') {
                                            $fname = old('fname');
                                        } else if (isset($candidate->fname) && $candidate->fname != '') {
                                            $fname = $candidate->fname;
                                        } else {
                                            $fname = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" {{$readonly}}>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label class="control-label">Last Name <small class="req text-danger">*</small></label>

                                        <?php
                                        if (old('lname') != '') {
                                            $lname = old('lname');
                                        } else if (isset($candidate->lname) && $candidate->lname != '') {
                                            $lname = $candidate->lname;
                                        } else {
                                            $lname = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" {{$readonly}}>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label class="control-label">Email <small class="req text-danger">*</small></label>
                                        <?php
                                        if (old('email') != '') {
                                            $email = old('email');
                                        } else if (isset($candidate->email) && $candidate->email != '') {
                                            $email = $candidate->email;
                                        } else {
                                            $email = '';
                                        }
                                        ?>
                                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" {{$readonly}}>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label class="control-label">Gender <small class="req text-danger">*</small></label>

                                        <?php
                                        if (old('gender') != '') {
                                            $gender = old('gender');
                                        } else if (isset($candidate->gender) && $candidate->gender != '') {
                                            $gender = $candidate->gender;
                                        } else {
                                            $gender = '';
                                        }
                                        if ($gender == 'f') {
                                            $gender = 'Female';
                                        } elseif ($gender == 'm') {
                                            $gender = 'Male';
                                        } else {
                                            $gender = 'Other';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="gender" value="<?php echo $gender; ?>" {{$readonly}}>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label class="control-label">DOB <small class="req text-danger">*</small></label>
                                        <?php
                                        if (old('dob') != '') {
                                            $dob = old('dob');
                                        } else if (isset($candidate->dob) && $candidate->dob != '') {
                                            $dob = $candidate->dob;
                                        } else {
                                            $dob = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="dob" value="<?php echo date('d F,Y', strtotime($dob)); ?>" {{$readonly}}>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <br />
                                    <div class="fld">
                                        <label class="control-label">Profile Pic <small class="req text-danger">*</small></label> &nbsp; 
                                        <?php
                                        if ($candidate->user_dp != "") {
                                            if (strpos($candidate->user_dp, 'facebook.com') !== false || strpos($candidate->user_dp, 'fbsbx.com') !== false || strpos($candidate->user_dp, 'googleusercontent.com') !== false) {
                                                $u_dp = $candidate->user_dp;
                                            } else {
                                                // $exists = Storage::disk(config('app.filesystem_driver'))->exists('public/profile_pic/'.$candidate->user_id.'/small/'.$candidate->user_dp);
                                                // if($exists){ 
                                                $u_dp = asset(Storage::url('public/profile_pic') . '/' . $candidate->user_id . '/small/' . $candidate->user_dp);
                                                // }else{ 
                                                // $u_dp= asset('storage/profile_pic/default.png');
                                                // } 
                                            }
                                        } else {
                                            $u_dp = asset('default/default.png');
                                        }
                                        ?>
                                        <img src="<?php echo $u_dp ?>" alt="user image" width="100px">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="c-invoice" <?php if ($action == 'view') {
                                            echo "style='display:none'";
                                        } ?>>
                    <button type="submit" class="btn btn-info button-green b-shadow">Save</button>
                </div>
                </form>
    </div>
    <!-- new-card -->
    <br>
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endsection