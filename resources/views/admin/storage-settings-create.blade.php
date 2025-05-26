@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Storage Settings';
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
                                        <button class="nav-link <?php echo ($type == 'S') ? 'active' : ''; ?>" id="storage_setting_tab" data-bs-toggle="tab" data-bs-target="#storage_settings" type="button" role="tab" aria-controls="storage_settings" aria-selected="true" data-type="S"> <i class="fa fa-globe"></i> Storage</button>

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
                        <form role="form" action="{{url( config('app.admin_url') .'/storage-settings-update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="tab-content col-md-12" id="myTabContent">
                                    <div class="row tab-pane fade <?php echo ($type == 'S') ? 'show active' : ''; ?>" id="storage_settings" role="tabpanel" aria-labelledby="storage_setting_tab">

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
                                                            if (old('driver') != '') {
                                                                $driver = old('driver');
                                                            } else if (isset($storageSettings->driver) && $storageSettings->driver != '') {
                                                                $driver = $storageSettings->driver;
                                                            } else {
                                                                $driver = '';
                                                            }
                                                            ?>
                                                            <?php foreach ($storageDriver as $sdrive) { ?>
                                                                <label class="col-md-4 radio-container <?php echo ($sdrive->driver == 's3') ? 's3_radio' : ''; ?> ">{{$sdrive->driver}}
                                                                    <input type="radio" <?php echo ($sdrive->active == 1) ? 'checked="checked"' : ''; ?> value="{{$sdrive->driver_id}}" name="driver">
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


                                            <div class="panel-body s3_div" style="padding-bottom: 32px;<?php echo ($activeDriver == 's3') ? 'display:block' : 'display:none'; ?>">
                                                <label class="panel-title">S3 DETAIL</label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">AWS ACCESS KEY ID</label>
                                                            <?php
                                                            if (old('access_key_id') != '') {
                                                                $access_key_id = old('access_key_id');
                                                            } else if (isset($storageSettings->access_key_id) && $storageSettings->access_key_id != '') {
                                                                $access_key_id = $storageSettings->access_key_id;
                                                            } else {
                                                                $access_key_id = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="access_key_id" class="form-control" value="{{$access_key_id}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">AWS SECRET ACCESS KEY</label>
                                                            <?php
                                                            if (old('secret_access_key') != '') {
                                                                $secret_access_key = old('secret_access_key');
                                                            } else if (isset($storageSettings->secret_access_key) && $storageSettings->secret_access_key != '') {
                                                                $secret_access_key = $storageSettings->secret_access_key;
                                                            } else {
                                                                $secret_access_key = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="secret_access_key" class="form-control" value="{{$secret_access_key}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">AWS DEFAULT REGION</label>
                                                            <?php
                                                            if (old('region') != '') {
                                                                $region = old('region');
                                                            } else if (isset($storageSettings->region) && $storageSettings->region != '') {
                                                                $region = $storageSettings->region;
                                                            } else {
                                                                $region = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="region" class="form-control" value="{{$region}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">AWS BUCKET</label>
                                                            <?php
                                                            if (old('bucket') != '') {
                                                                $bucket = old('bucket');
                                                            } else if (isset($storageSettings->bucket) && $storageSettings->bucket != '') {
                                                                $bucket = $storageSettings->bucket;
                                                            } else {
                                                                $bucket = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="bucket" class="form-control" value="{{$bucket}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title">AWS URL</label>
                                                            <?php
                                                            if (old('url') != '') {
                                                                $url = old('url');
                                                            } else if (isset($storageSettings->url) && $storageSettings->url != '') {
                                                                $url = $storageSettings->url;
                                                            } else {
                                                                $url = '';
                                                            }
                                                            ?>
                                                            <input type="text" name="url" class="form-control" value="{{$url}}">
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
                                <input type="hidden" name="type" id="setting_type" value="S">
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

</style>
<script type="text/javascript">
    $(function() {
        $('.nav-link').on('click', function() {
            var val = $(this).attr("data-type");
            $('#setting_type').val(val);
        });
        $('.radio-container').on('click', function() {
            $('.s3_div').hide();
        });
        $('.s3_radio').on('click', function() {
            $('.s3_div').show();
        });
    });
</script>
@endsection