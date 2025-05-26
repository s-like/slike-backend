@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('css/colorpicker/jquery.minicolors.css')}}">
<?php
if ($action == 'edit') {
    $title = 'App Login Settings';
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

    .main_cat .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 0px solid #aaa;
        border-radius: 0px;
        width: 100%;
        padding: 5px;
    }

    .main_cat .select2-container--default .select2-selection--single .select2-selection__rendered {
        background: #fff;
        padding: 5px;
        height: 40px;
        border: 1px solid #ccc;
    }

    .main_cat .select2-selection__choice,
    .main_cat .select2-selection__choice__remove {
        color: #fff;
    }

    .select2-container {
        width: 100% !important;
    }
</style>

<div class="row">
    <div class="col-md-3 pr-0">
        @include('includes.admin.settings')
    </div>
    <div class="col-md-9 pl-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card customers-profile">
                    <h3><?php echo $title; ?></h3>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <nav>
                                    <div class="nav nav-tabs" id="myTab" role="tablist">
                                        <button class="nav-link <?php echo ($type == 'A') ? 'active' : ''; ?>" id="api_setting_tab" data-bs-toggle="tab" data-bs-target="#api_settings" type="button" role="tab" aria-controls="api_settings" aria-selected="true" data-type="A"> <i class="fa fa-globe"></i> App API</button>
                                        <button class="nav-link <?php echo ($type == 'L') ? 'active' : ''; ?>" id="login_setting_tab" data-bs-toggle="tab" data-bs-target="#login_settings" type="button" role="tab" aria-controls="login_settings" aria-selected="true" data-type="L"> <i class="fa fa-sign-in"></i> Login</button>
                                        <button class="nav-link <?php echo ($type == 'G') ? 'active' : ''; ?>" id="general_setting_tab" data-bs-toggle="tab" data-bs-target="#general_settings" type="button" role="tab" aria-controls="general_settings" aria-selected="true" data-type="G"> <i class="fa fa-cog"></i> General</button>
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

                        <div class="row">
                            <div class="tab-content col-md-12" id="myTabContent">

                                <div class="row tab-pane fade <?php echo ($type == 'A') ? 'show active' : ''; ?>" id="api_settings" role="tabpanel" aria-labelledby="api_setting_tab">
                                    <form role="form" action="{{url( config('app.admin_url') .'/app-settings-update')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="col-lg-12 col-md-12">
                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <label class="panel-title">API SETTINGS</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">API User</label>
                                                            <?php
                                                            if (old('api_user') != '') {
                                                                $api_user = old('api_user');
                                                            } else if (isset($appSettings->api_user) && $appSettings->api_user != '') {
                                                                $api_user = $appSettings->api_user;
                                                            } else {
                                                                $api_user = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="api_user" class="form-control" value="{{$api_user}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">API Key</label>
                                                            <?php
                                                            if (old('api_key') != '') {
                                                                $api_key = old('api_key');
                                                            } else if (isset($appSettings->api_key) && $appSettings->api_key != '') {
                                                                $api_key = $appSettings->api_key;
                                                            } else {
                                                                $api_key = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="api_key" class="form-control" value="{{$api_key}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <label class="panel-title">Gemini AI API Key</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Key</label>
                                                            <?php
                                                            if (old('gemini_api_key') != '') {
                                                                $gemini_api_key = old('gemini_api_key');
                                                            } else if (isset($appSettings->gemini_api_key) && $appSettings->gemini_api_key != '') {
                                                                $gemini_api_key = $appSettings->gemini_api_key;
                                                            } else {
                                                                $gemini_api_key = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="gemini_api_key" class="form-control" value="{{$gemini_api_key}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding-top:20px"></div>
                                        <div class="row">
                                            <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">
                                            <input type="hidden" name="type" id="setting_type" value="A">
                                            <div class="col-lg-12 col-md-12" <?php if ($action == 'view') {
                                                                                    echo "style='display:none'";
                                                                                } ?>>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>




                                <!-- login  -->
                                <div class="row tab-pane fade <?php echo ($type == 'L') ? 'show active' : ''; ?>" id="login_settings" role="tabpanel" aria-labelledby="login_setting_tab">
                                    <form role="form" action="{{url( config('app.admin_url') .'/app-login-settings-update')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="col-lg-12 col-md-12">
                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <label class="panel-title">App Login SETTINGS</label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Logo</label>
                                                            <?php
                                                            if (old('logo') != '') {
                                                                $logo = old('logo');
                                                            } else if (isset($appLoginSettings->logo) && $appLoginSettings->logo != '') {
                                                                $logo = $appLoginSettings->logo;
                                                            } else {
                                                                $logo = '';
                                                            }
                                                            ?>
                                                            @if($action!='view')
                                                            <input type="file" name="logo" class="form-control col-md-6">
                                                            @endif
                                                            <input type="hidden" class="form-control" name="old_logo" value="<?php echo $logo; ?>" readonly>
                                                            @if($logo!="")
                                                            <img src="<?php echo asset(Storage::url('public/uploads/logos/' . $logo)); ?>" width="130px">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Background Image</label>
                                                            <?php
                                                            if (old('background_img') != '') {
                                                                $background_img = old('background_img');
                                                            } else if (isset($appLoginSettings->background_img) && $appLoginSettings->background_img != '') {
                                                                $background_img = $appLoginSettings->background_img;
                                                            } else {
                                                                $background_img = '';
                                                            }
                                                            ?>
                                                            @if($action!='view')
                                                            <input type="file" name="background_img" class="form-control col-md-6">
                                                            @endif
                                                            <input type="hidden" class="form-control" name="old_background_img" value="<?php echo $background_img; ?>" readonly>
                                                            @if($background_img!="")
                                                            <img src="<?php echo asset(Storage::url('public/uploads/background_img/' . $background_img)); ?>" height="100px">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Title</label>
                                                            <?php
                                                            if (old('title') != '') {
                                                                $title = old('title');
                                                            } else if (isset($appLoginSettings->title) && $appLoginSettings->title != '') {
                                                                $title = $appLoginSettings->title;
                                                            } else {
                                                                $title = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="title" class="form-control" value="{{$title}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Description</label>
                                                            <?php
                                                            if (old('description') != '') {
                                                                $description = old('description');
                                                            } else if (isset($appLoginSettings->description) && $appLoginSettings->description != '') {
                                                                $description = $appLoginSettings->description;
                                                            } else {
                                                                $description = '';
                                                            }
                                                            ?>
                                                            <textarea name="description" class="form-control">{{$description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">FB Login</label> &nbsp;&nbsp;
                                                            <?php
                                                            if (old('fb_login') != '') {
                                                                $fb_login = old('fb_login');
                                                            } else if (isset($appLoginSettings->fb_login) && $appLoginSettings->fb_login == 1) {
                                                                $fb_login = "checked='checked'";
                                                            } elseif (isset($appLoginSettings->fb_login) && $appLoginSettings->fb_login == 0) {
                                                                $fb_login = "";
                                                            } else {
                                                                $fb_login = "checked='checked'";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$fb_login}} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="fb_login" data-size="sm" value=1>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Google Login</label> &nbsp;&nbsp;
                                                            <?php
                                                            if (old('google_login') != '') {
                                                                $google_login = old('google_login');
                                                            } else if (isset($appLoginSettings->google_login) && $appLoginSettings->google_login == 1) {
                                                                $google_login = "checked='checked'";
                                                            } elseif (isset($appLoginSettings->google_login) && $appLoginSettings->google_login == 0) {
                                                                $google_login = "";
                                                            } else {
                                                                $google_login = "checked='checked'";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$google_login}} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="google_login" data-size="sm" value=1>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Apple Login</label> &nbsp;&nbsp;
                                                            <?php
                                                            if (old('apple_login') != '') {
                                                                $apple_login = old('apple_login');
                                                            } else if (isset($appLoginSettings->apple_login) && $appLoginSettings->apple_login == 1) {
                                                                $apple_login = "checked='checked'";
                                                            } elseif (isset($appLoginSettings->apple_login) && $appLoginSettings->apple_login == 0) {
                                                                $apple_login = "";
                                                            } else {
                                                                $apple_login = "checked='checked'";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$apple_login}} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="apple_login" data-size="sm" value=1>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Privacy Policy and Terms Description</label>
                                                            <?php
                                                            if (old('privacy_policy') != '') {
                                                                $privacy_policy = old('privacy_policy');
                                                            } else if (isset($appLoginSettings->privacy_policy) && $appLoginSettings->privacy_policy != '') {
                                                                $privacy_policy = $appLoginSettings->privacy_policy;
                                                            } else {
                                                                $privacy_policy = '';
                                                            }
                                                            ?>
                                                            <textarea name="privacy_policy" id="privacy_policy" class="form-control">{{$privacy_policy}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding-top:20px"></div>
                                        <div class="row">
                                            <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">
                                            <input type="hidden" name="type" id="setting_type" value="L">
                                            <div class="col-lg-12 col-md-12" <?php if ($action == 'view') {
                                                                                    echo "style='display:none'";
                                                                                } ?>>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- general -->
                                <div class="row tab-pane fade <?php echo ($type == 'G') ? 'show active' : ''; ?>" id="general_settings" role="tabpanel" aria-labelledby="general_setting_tab">
                                    <form role="form" action="{{url( config('app.admin_url') .'/app-general-settings-update')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="col-lg-12 col-md-12">
                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <label class="panel-title">GENERAL SETTINGS</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group row ">
                                                            <label class="col-4 control-label title">Video Time Limits</label>
                                                            <?php
                                                            if (isset($appGeneralSettings->video_time_limit) && $appGeneralSettings->video_time_limit != '') {
                                                                $video_time = $appGeneralSettings->video_time_limit;
                                                                $video_time_limit = explode(',', $video_time);
                                                            } else {
                                                                $video_time_limit = array();
                                                            }
                                                            ?>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="video_time_limit[]" id="video_time_limit" multiple required>
                                                                    <option disabled>Please enter value</option>
                                                                    <?php foreach ($video_time_limit as $val) { ?>
                                                                        <option value="<?php echo $val; ?>" selected><?php echo $val; ?></option>
                                                                    <?php } ?>
                                                                    <!-- <option <?php //echo (in_array("15", $video_time_limit)) ? 'selected' : ''; 
                                                                                    ?> value="15">15 sec</option>
                                                                                <option <?php //echo (in_array("30", $video_time_limit)) ? 'selected' : ''; 
                                                                                        ?> value="30">30 sec</option>
                                                                                <option <?php //echo (in_array("45", $video_time_limit)) ? 'selected' : ''; 
                                                                                        ?> value="45">45 sec</option>
                                                                                <option <?php //echo (in_array("60", $video_time_limit)) ? 'selected' : ''; 
                                                                                        ?> value="60">60 sec</option> -->
                                                                </select>
                                                                <p style="color:red"><b>Note: </b> you can set multiple duration allowed for video recording in the app. Please set upto 5 Values in seconds. Max value allowed is 300 seconds.</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Show Live Stream</label> &nbsp;&nbsp;
                                                            <?php
                                                            if (old('show_live_stream') != '') {
                                                                $show_live_stream = old('show_live_stream');
                                                            } else if (isset($appLoginSettings->show_live_stream) && $appLoginSettings->show_live_stream == 1) {
                                                                $show_live_stream = "checked='checked'";
                                                            } elseif (isset($appLoginSettings->show_live_stream) && $appLoginSettings->show_live_stream == 0) {
                                                                $show_live_stream = "";
                                                            } else {
                                                                $show_live_stream = "checked='checked'";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$show_live_stream}} data-toggle="toggle" data-on="Followers" data-off="All" data-onstyle="success" data-offstyle="danger" name="show_live_stream" data-width="100" value=1>
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
        </div>
    </div>
</div>


<style type="text/css">
    .model-settings label.control-label.title {
        margin: 20px;
        font-size: 1.1rem;
    }

    .toggle.btn.btn-sm {
        /*margin-top: 15px;*/
    }

    .toggle-group label.btn.btn-sm {
        padding-top: 4px !important;
        line-height: 105%;
    }

    .cloak {
        /*pointer-events: none;*/
        opacity: 0.3;
    }

    .nopad {
        padding: 0px;
    }

    #privacy_policy {
        visibility: visible !important;
    }
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
        $('#video_time_limit').select2({
            tags: true,
            minimumInputLength: 2,
            maximumInputLength: 3,
            maximumSelectionLength: 5,
            minimumInputLength: 1
        });
        tinyMCE.remove('#privacy_policy');
    });
</script>

@endsection