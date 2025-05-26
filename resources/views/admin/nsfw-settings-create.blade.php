@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Video Moderation Settings';
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
        /* padding: 3px 8px 4px 8px; */
    }

    .modal {
        margin-top: 50px;
    }

    .card {
        min-height: 450px;
        margin-top: 0px;
    }
</style>

<div class="row">
    <div class="col-md-3">
        @include('includes.admin.settings')
    </div>
    <div class="col-md-9 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card customers-profile">
                    <h3><?php echo $title; ?></h3>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">

                                <nav>
                                    <div class="nav nav-tabs" id="myTab" role="tablist">
                                        <button class="nav-link <?php echo ($type == 'V') ? 'active' : ''; ?>" id="video_setting_tab" data-bs-toggle="tab" data-bs-target="#video_setting" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> <i class="fa fa-cog"></i> Sight Engine</button>
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
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="video_setting" role="tabpanel" aria-labelledby="video_setting_tab">

                                <!-- <div class="row"> -->
                                <form role="form" action="{{url( config('app.admin_url') .'/nsfw-settings-update')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <label class="panel-title">VIDEO MODERATION API SETTINGS</label>
                                                <div class="text-right">
                                                    <a href="https://sightengine.com/" target="_blank" class="btn btn-primary custom-btn">Get Free API</a>
                                                </div>
                                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                    <label class="control-label title">API Key</label>
                                                    <?php
                                                    if (old('api_key') != '') {
                                                        $api_key = old('api_key');
                                                    } else if (isset($nsfwSettings->api_key) && $nsfwSettings->api_key != '') {
                                                        $api_key = $nsfwSettings->api_key;
                                                    } else {
                                                        $api_key = '';
                                                    }
                                                    ?>
                                                    <input type="text" name="api_key" class="form-control" value="{{$api_key}}">
                                                </div>
                                                <div style="padding-top:15px"></div>
                                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                    <label class="control-label title">API Secret</label>
                                                    <?php
                                                    if (old('api_secret') != '') {
                                                        $api_secret = old('api_secret');
                                                    } else if (isset($nsfwSettings->api_secret) && $nsfwSettings->api_secret != '') {
                                                        $api_secret = $nsfwSettings->api_secret;
                                                    } else {
                                                        $api_secret = '';
                                                    }
                                                    ?>
                                                    <input type="text" name="api_secret" class="form-control" value="{{$api_secret}}">
                                                </div>
                                            </div>
                                            <div style="padding-top:15px"></div>

                                        </div>
                                    </div>
                                    <div class="row model-settings">
                                        <div class="col-lg-12 col-md-12">
                                            <div style="padding-top:15px"></div>
                                            <div class="panel-body">
                                                <label class="panel-title">VIDEO MODERATION SETTINGS</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title col-md-4">Enable Moderation</label>
                                                            <?php
                                                            if (old('status') != '') {
                                                                $status = old('status');
                                                            } else if (isset($nsfwSettings->status) && $nsfwSettings->status == 1) {
                                                                $status_checked = "checked='checked'";
                                                            } else {
                                                                $status_checked = "";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$status_checked}} data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="status" data-size="sm" value=1>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row cloak">
                                                    <div class="col-sm-12">
                                                        <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title col-md-4">Enable Nudity Detection</label>
                                                            <?php
                                                            if (old('nudity') != '') {
                                                                $nudity = old('nudity');
                                                            } else if (isset($nsfwSettings->nudity) &&  $nsfwSettings->nudity == 1) {
                                                                $nudity_checked = "checked='checked'";
                                                            } else {
                                                                $nudity_checked = "";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$nudity_checked}} data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="nudity" data-size="sm" value=1>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title col-md-4">Enable Weapons Alcohol Drugs Detection</label>
                                                            <?php
                                                            if (old('wad') != '') {
                                                                $wad = old('wad');
                                                            } else if (isset($nsfwSettings->wad) &&   $nsfwSettings->wad == 1) {
                                                                $wad_checked = "checked='checked'";
                                                            } else {
                                                                $wad_checked = "";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$wad_checked}} data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="wad" data-size="sm" value=1>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title col-md-4">Offensive Content Detection</label>
                                                            <?php
                                                            if (old('offensive') != '') {
                                                                $offensive = old('offensive');
                                                            } else if (isset($nsfwSettings->offensive) && $nsfwSettings->offensive == 1) {
                                                                $offensive_checked = "checked='checked'";
                                                            } else {
                                                                $offensive_checked = "";
                                                            }
                                                            ?>
                                                            <input type="checkbox" class="flaged_toggle" {{$offensive_checked}} data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="offensive" data-size="sm" value=1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="padding-top:20px"></div>
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">
                                        <input type="hidden" name="type" id="setting_type" value="V">
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


<style type="text/css">
    .model-settings label.control-label.title {
        margin: 20px;
        font-size: 1.1rem;
    }

    .toggle.btn.btn-sm {
        margin-top: 15px;
    }

    .toggle-group label.btn.btn-sm {
        padding-top: 4px !important;
        line-height: 105%;
    }

    .cloak.yes {
        pointer-events: none;
        opacity: 0.3;
    }
</style>
<script type="text/javascript">
    $(function() {
        $('.nav-link').on('click', function() {
            var val = $(this).attr("data-type");
            $('#setting_type').val(val);
        });

        if ($('[name="status"]').is(':checked')) {
            $(".cloak").removeClass("yes");
            $('[name="wad"]').removeAttr("disabled");
            $('[name="offensive"]').removeAttr("disabled");
            $('[name="nudity"]').removeAttr("disabled");
        } else {
            $(".cloak").addClass("yes");
            $('[name="wad"]').prop("disabled");
            $('[name="offensive"]').prop("disabled");
            $('[name="nudity"]').prop("disabled");
        }
        $('[name="status"]').change(function() {
            if ($(this).is(':checked')) {
                $(".cloak").removeClass("yes");
                $('[name="wad"]').removeAttr("disabled");
                $('[name="offensive"]').removeAttr("disabled");
                $('[name="nudity"]').removeAttr("disabled");
            } else {
                $(".cloak").addClass("yes");
                $('[name="wad"]').prop("disabled", true);
                $('[name="offensive"]').prop("disabled", true);
                $('[name="nudity"]').prop("disabled", true);
            }
        });
    });
</script>

@endsection