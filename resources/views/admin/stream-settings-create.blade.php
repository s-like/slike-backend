@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Stream Settings';
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

    /* The container */
    .radio-container {
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding-left: 30px;
        position: relative;
        color: #000;
    }

    /* Hide the browser's default radio button */
    .radio-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;

    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 3px;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .radio-container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .radio-container input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .radio-container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .radio-container .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
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
                                        <button class="nav-link active" id="stream_setting_tab" data-bs-toggle="tab" data-bs-target="#stream_settings" type="button" role="tab" aria-controls="stream_settings" aria-selected="true" data-type="S"> <i class="fa fa-globe"></i> Stream</button>

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
                        <form role="form" action="{{url( config('app.admin_url') .'/stream-settings-update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="tab-content col-md-12" id="myTabContent">
                                    <div class="row tab-pane fade show active" id="stream_settings" role="tabpanel" aria-labelledby="stream_setting_tab">

                                        <div class="col-lg-12 col-md-12">
                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <!-- <label class="panel-title">STORAGE SETTINGS</label> -->
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:25px"></div>
                                                        <!-- <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                               
                                                            </div> -->
                                                        <div class="form-group label-floating">
                                                            <?php
                                                            // if (old('driver') != '') {
                                                            //     $driver = old('driver');
                                                            // } else if (isset($streamSettings->driver) && $streamSettings->driver != '') {
                                                            //     $driver = $streamSettings->driver;
                                                            // } else {
                                                            //     $driver = '';
                                                            // }
                                                            ?>
                                                            <?php foreach ($streamSettings as $ss) {
                                                            ?>
                                                                <label class="col-md-4 radio-container type_radio" id="div_{{ $ss->type }}" url="{{ route('admin.stream_settings',['type'=>$ss->type]) }}">{{$ss->name}}
                                                                    <input type="radio" <?php echo ($type == $ss->type) ? 'checked="checked"' : ''; ?> value="{{$ss->type}}" name="type" class="r_type">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            <?php } ?>
                                                            <!--                                                                
                                                                 <label class="col-md-4 radio-container s3_radio">S3
                                                                     <input type="radio" <?php //echo ($driver=='s3') ? 'checked="checked"' : ''; 
                                                                                            ?> value="s3" name="driver">
                                                                    <span class="checkmark"></span>
                                                                 </label> -->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="panel-body comm-div div_AM" style="padding-bottom: 32px;">
                                                <label class="panel-title">Ant Media</label>
                                                <div class="row">
                                                    <div class="col-sm-6 col-12">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Live Server Root</label>
                                                            <?php $anMedia = $streamSettings[0];
                                                            if (old('live_server_root') != '') {
                                                                $live_server_root = old('live_server_root');
                                                            } else if (isset($anMedia->live_server_root) && $anMedia->live_server_root != '') {
                                                                $live_server_root = $anMedia->live_server_root;
                                                            } else {
                                                                $live_server_root = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="live_server_root" class="form-control" value="{{$live_server_root}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Active</label>
                                                            <?php
                                                             $am_active = "";
                                                            if (old('am_active') != '') {
                                                                $am_active = old('am_active');
                                                            } else if (isset($anMedia->active) && $anMedia->active == 1) {
                                                                $am_active = "checked='checked'";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$am_active}} data-bs-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="am_active" data-size="sm" value=1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel-body comm-div div_A" style="padding-bottom: 32px;">
                                                <label class="panel-title">Agora</label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">APP ID</label>
                                                            <?php $aMedia = $streamSettings[1];
                                                            if (old('app_id') != '') {
                                                                $app_id = old('app_id');
                                                            } else if (isset($aMedia->app_id) && $aMedia->app_id != '') {
                                                                $app_id = $aMedia->app_id;
                                                            } else {
                                                                $app_id = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="app_id" class="form-control" value="{{$app_id}}">
                                                        </div>
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">APP Certificate</label>
                                                            <?php
                                                            if (old('app_certificate') != '') {
                                                                $app_certificate = old('app_certificate');
                                                            } else if (isset($aMedia->app_certificate) && $aMedia->app_certificate != '') {
                                                                $app_certificate = $aMedia->app_certificate;
                                                            } else {
                                                                $app_certificate = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="app_certificate" class="form-control" value="{{$app_certificate}}">
                                                        </div>
                                                        <div class="col-sm-12">
                                                        <div style="padding-top:15px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">Active</label>
                                                            <?php
                                                             $a_active = "";
                                                            if (old('a_active') != '') {
                                                                $a_active = old('a_active');
                                                            } else if (isset($aMedia->active) && $aMedia->active == 1) {
                                                                $a_active = "checked='checked'";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$a_active}} data-bs-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" name="a_active" data-size="sm" value=1>
                                                        </div>
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
                                
                                <div class="col-lg-12 col-md-12" >
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

<script type="text/javascript">
    $(function() {
        $('.comm-div').hide();

        cl=$("input[name='type']:checked").parent().attr('id');
        $('.'+cl).show();

        $('.nav-link').on('click', function() {
            var val = $(this).attr("data-type");
            $('#setting_type').val(val);
        });
        // $('.radio-container').on('click', function() {
        //     $('.s3_div').hide();
        // });
        // $('.s3_radio').on('click', function() {
        //     $('.s3_div').show();
        // });

    });
    $('.type_radio').on('click', function() {
        // cl = $(this).attr('id');
        // $('.comm-div').hide();
        // $('.' + cl).show();

        url=$(this).attr('url');
        window.location=url;

    });
</script>
@endsection