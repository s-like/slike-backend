@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Social Login Settings';
    $readonly = "";
}
?>
<style>
    .panel-body {
        border-radius: 5px;
        padding-left: 20px;
        padding-bottom: 20px;
        padding-right: 20px;
        padding-top: 20px;
        margin-top: 20px;
        box-shadow: 0 0 5px 1px #a9a9a9;
    }

    .panel-title {
        position: absolute;
        background: white;
        margin-top: -30px;
        padding-left: 10px;
        font-weight: bold;
        padding-right: 10px;
        color: #000;
    }

    label.title {
        color: black;
        font-weight: 500;
        font-size: 15px;
    }

    .custom-btn {
        font-size: 13px;
        padding: 3px 8px 4px 8px;
    }

    .modal {
        margin-top: 50px;
    }

    .card {
        min-height: 450px;
        margin-top: 0px;
    }

    .tab_active {
        background: #28a745;
        padding: 2px 8px 3px 8px;
        font-size: 12px;
        color: #fff;
        border-radius: 10px;
    }
</style>

<div class="row">
    <div class="col-md-3">
        @include('includes.admin.settings')
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card customers-profile">
                        <h3><?php echo $title; ?></h3>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                            <nav>
                                    <div class="nav nav-tabs" id="myTab" role="tablist">
                                        <button class="nav-link <?php echo ($type == 'G') ? 'active' : ''; ?>" id="google_setting_tab" data-bs-toggle="tab" data-bs-target="#google_settings" type="button" role="tab" aria-controls="google_settings" data-type="G" aria-selected="true"> <i class="fa fa-globe"></i> Google <?php echo ($socialSettings->google_active == 1) ? '<span class="tab_active">Active</span>' : ''; ?></button>
                                        <button class="nav-link <?php echo ($type == 'FB') ? 'active' : ''; ?>" id="fb_setting_tab" data-bs-toggle="tab" data-bs-target="#fb_settings" type="button" role="tab" aria-controls="fb_settings" data-type="FB" aria-selected="true"> <i class="fa fa-facebook"></i> Facebook <?php echo ($socialSettings->fb_active == 1) ? '<span class="tab_active">Active</span>' : ''; ?></button>
                                    </div>
                                </nav>


                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-bs-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                    <?php Session::forget('success'); ?>
                                </div>
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-bs-dismiss="alert">×</button>
                                    <strong>{!! $message !!}</strong>
                                    <?php Session::forget('error'); ?>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="row"> -->

                        <!-- <div class="row"> -->
                        <form role="form" action="{{url( config('app.admin_url') .'/social-settings-update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="tab-content col-md-12" id="myTabContent">
                                    <div class="row tab-pane fade <?php echo ($type == 'G') ? 'show active' : ''; ?>" id="google_settings" role="tabpanel" aria-labelledby="google_setting_tab">

                                        <div class="col-lg-12 col-md-12">
                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <label class="panel-title">GOOGLE SETTINGS</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Google Client Id</label>
                                                            <?php
                                                            if (old('google_client_id') != '') {
                                                                $google_client_id = old('google_client_id');
                                                            } else if (isset($socialSettings->google_client_id) && $socialSettings->google_client_id != '') {
                                                                $google_client_id = $socialSettings->google_client_id;
                                                            } else {
                                                                $google_client_id = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="google_client_id" class="form-control" value="{{$google_client_id}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Google Client Secret</label>
                                                            <?php
                                                            if (old('google_secret') != '') {
                                                                $google_secret = old('google_secret');
                                                            } else if (isset($socialSettings->google_secret) && $socialSettings->google_secret != '') {
                                                                $google_secret = $socialSettings->google_secret;
                                                            } else {
                                                                $google_secret = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="google_secret" class="form-control" value="{{$google_secret}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Active</label>
                                                            <?php
                                                            if (old('google_active') != '') {
                                                                $google_active = old('google_active');
                                                            } else if (isset($socialSettings->google_active) && $socialSettings->google_active == 1) {
                                                                $google_active = "checked='checked'";
                                                            } elseif (isset($socialSettings->google_active) && $socialSettings->google_active == 0) {
                                                                $google_active = "";
                                                            } else {
                                                                $google_active = "checked='checked'";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$google_active}} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="google_active" data-size="sm" value=1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row tab-pane fade <?php echo ($type == 'FB') ? 'show active' : ''; ?>" id="fb_settings" role="tabpanel" aria-labelledby="fb_setting_tab">

                                        <div class="col-lg-12 col-md-12">
                                            <div class="panel-body">
                                                <label class="panel-title">FACEBOOK SETTINGS</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Facebook Client Id</label>
                                                            <?php
                                                            if (old('facebook_client_id') != '') {
                                                                $facebook_client_id = old('facebook_client_id');
                                                            } else if (isset($socialSettings->facebook_client_id) && $socialSettings->facebook_client_id != '') {
                                                                $facebook_client_id = $socialSettings->facebook_client_id;
                                                            } else {
                                                                $facebook_client_id = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="facebook_client_id" class="form-control" value="{{$facebook_client_id}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Facebook Client Secret</label>
                                                            <?php
                                                            if (old('facebook_secret') != '') {
                                                                $facebook_secret = old('facebook_secret');
                                                            } else if (isset($socialSettings->facebook_secret) && $socialSettings->facebook_secret != '') {
                                                                $facebook_secret = $socialSettings->facebook_secret;
                                                            } else {
                                                                $facebook_secret = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="facebook_secret" class="form-control" value="{{$facebook_secret}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Active</label>
                                                            <?php
                                                            if (old('fb_active') != '') {
                                                                $fb_active = old('fb_active');
                                                            } else if (isset($socialSettings->fb_active) && $socialSettings->fb_active == 1) {
                                                                $fb_active = "checked='checked'";
                                                            } elseif (isset($socialSettings->fb_active) && $socialSettings->fb_active == 0) {
                                                                $fb_active = "";
                                                            } else {
                                                                $fb_active = "checked='checked'";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$fb_active}} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="fb_active" data-size="sm" value=1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="padding-top:20px"></div>
                            <div class="row">
                                <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">
                                <input type="hidden" name="type" id="setting_type" value="G">
                                <div class="col-lg-12 col-md-12" <?php if ($action == 'view') {
                                                                        echo "style='display:none'";
                                                                    } ?>>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    /* .model-settings label.control-label.title{
        margin: 20px;
        font-size: 1.1rem;
    }
  
    .toggle-group label.btn.btn-sm {
        padding-top: 4px !important;
        line-height: 105%;
    }
    .cloak{
       opacity: 0.3;
    }
    .nopad{
        padding:0px; 
    } */
</style>
<script type="text/javascript">
    $(function() {
        $('.nav-link').on('click', function() {
            var val = $(this).attr("data-type");
            $('#setting_type').val(val);
            // alert(val);
            // $("[name='mail_type']").removeAttr("checked");
            // $(id).find("input[type='radio']").attr("checked","checked");
        });
    });
</script>
@endsection