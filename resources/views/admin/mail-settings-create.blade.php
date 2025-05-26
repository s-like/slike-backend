@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Mail Settings';
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
    <div class="col-lg-3">
        @include('includes.admin.settings')
    </div>

    <div class="col-lg-9">
        <div class="card customers-profile">
            <h3><?php echo $title; ?></h3>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <nav>
                        <div class="nav nav-tabs" id="myTab" role="tablist">
                            <?php foreach ($mailTypes as $mailType) {
                                $idName = strtolower(str_replace(" ", "", $mailType->name));
                            ?>
                                <button class="nav-link <?php echo ($mailType->mail_type == $type) ? 'active' : ''; ?>" id="<?php echo $idName; ?>_mail_setting_tab" data-bs-toggle="tab" data-bs-target="#<?php echo $idName; ?>_mail_settings" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-envelope"></i> <?php echo $mailType->name; ?> <?php echo ($mailType->active == 1) ? '<span class="tab_active">Active</span>' : ''; ?></button>
                            <?php } ?>
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
            <div class="tab-content contact-detail col-md-12" id="myTabContent">
                <div class="row tab-pane fade <?php echo ($type == 'SG') ? 'show active' : ''; ?>" id="sendgrid_mail_settings" role="tabpanel" aria-labelledby="sendgrid_mail_setting_tab">
                    <form role="form" action="{{url( config('app.admin_url') .'/mail-settings-update')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-lg-6 col-md-6" style="padding-bottom: 25px">
                            <div style="padding-top:25px"></div>
                            <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                <label class="control-label title col-md-3 nopad">From Email</label>
                                <?php
                                if (old('from_email') != '') {
                                    $from_email = old('from_email');
                                } else if (isset($SGmailSettings->from_email) && $SGmailSettings->from_email != '') {
                                    $from_email = $SGmailSettings->from_email;
                                } else {
                                    $from_email = '';
                                }
                                ?>
                                <input type="text" name="from_email" class="form-control col-md-6" value="{{$from_email}}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="panel-body widget_code sg" style="padding-bottom: 32px;">
                                <label class="panel-title">SENDGRID API SETTINGS </label>
                                <input type="radio" style="display: none" name="mail_type" value='SG' <?php echo ($type == 'SG') ? 'checked' : ''; ?>>
                                <input type="hidden" name="mail_driver" class="form-control" value="sendgrid">
                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                    <label class="control-label title">API Key</label>
                                    <?php
                                    if (old('api_key') != '') {
                                        $api_key = old('api_key');
                                    } else if (isset($SGmailSettings->api_key) && $SGmailSettings->api_key != '') {
                                        $api_key = $SGmailSettings->api_key;
                                    } else {
                                        $api_key = '';
                                    }
                                    ?>
                                    <input type="text" name="api_key" class="form-control" value="{{$api_key}}">
                                </div>

                            </div>
                            <div style="padding-top:25px"></div>
                            <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">
                            <div class="col-lg-12 col-md-12" <?php if ($action == 'view') {
                                                                    echo "style='display:none'";
                                                                } ?>>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row tab-pane fade <?php echo ($type == 'SM') ? 'show active' : ''; ?>" id="smtp_mail_settings" role="tabpanel" aria-labelledby="smtp_mail_setting_tab">
                    <form role="form" action="{{url( config('app.admin_url') .'/mail-settings-update')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-lg-6 col-md-6" style="padding-bottom: 25px">
                            <div style="padding-top:25px"></div>
                            <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                <label class="control-label title col-md-3 nopad">From Email</label>
                                <?php
                                if (old('from_email') != '') {
                                    $from_email = old('from_email');
                                } else if (isset($SMmailSettings->from_email) && $SMmailSettings->from_email != '') {
                                    $from_email = $SMmailSettings->from_email;
                                } else {
                                    $from_email = '';
                                }
                                ?>
                                <input type="text" name="from_email" class="form-control col-md-6" value="{{$from_email}}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="panel-body widget_code smtp " style="padding-bottom: 32px;">
                                <label class="panel-title">SMTP SETTINGS</label>
                                <input type="radio" style="display: none" name="mail_type" value='SM' <?php echo ($type == 'SM') ? 'checked' : ''; ?>>
                                <input type="hidden" name="mail_driver" class="form-control" value="smtp">
                                <div style="padding-top:25px"></div>
                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                    <label class="control-label title">Mail Host</label>
                                    <?php
                                    if (old('mail_host') != '') {
                                        $mail_host = old('mail_host');
                                    } else if (isset($SMmailSettings->mail_host) && $SMmailSettings->mail_host != '') {
                                        $mail_host = $SMmailSettings->mail_host;
                                    } else {
                                        $mail_host = '';
                                    }
                                    ?>
                                    <input type="text" name="mail_host" class="form-control" value="{{$mail_host}}">
                                </div>
                                <div style="padding-top:25px"></div>
                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                    <label class="control-label title">Mail Port</label>
                                    <?php
                                    if (old('mail_port') != '') {
                                        $mail_port = old('mail_port');
                                    } else if (isset($SMmailSettings->mail_port) && $SMmailSettings->mail_port != '') {
                                        $mail_port = $SMmailSettings->mail_port;
                                    } else {
                                        $mail_port = '';
                                    }
                                    ?>
                                    <input type="text" name="mail_port" class="form-control" value="{{$mail_port}}">
                                </div>
                                <div style="padding-top:25px"></div>
                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                    <label class="control-label title">Mail Username</label>
                                    <?php
                                    if (old('mail_username') != '') {
                                        $mail_username = old('mail_username');
                                    } else if (isset($SMmailSettings->mail_username) && $SMmailSettings->mail_username != '') {
                                        $mail_username = $SMmailSettings->mail_username;
                                    } else {
                                        $mail_username = '';
                                    }
                                    ?>
                                    <input type="text" name="mail_username" class="form-control" value="{{$mail_username}}">
                                </div>
                                <div style="padding-top:25px"></div>
                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                    <label class="control-label title">Mail Password</label>
                                    <?php
                                    if (old('mail_password') != '') {
                                        $mail_password = old('mail_password');
                                    } else if (isset($SMmailSettings->mail_password) && $SMmailSettings->mail_password != '') {
                                        $mail_password = $SMmailSettings->mail_password;
                                    } else {
                                        $mail_password = '';
                                    }
                                    ?>
                                    <input type="password" name="mail_password" class="form-control" value="{{$mail_password}}">
                                </div>
                                <div style="padding-top:25px"></div>
                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                    <label class="control-label title">Mail Encryption</label>
                                    <?php
                                    if (old('mail_Encryption') != '') {
                                        $mail_encryption = old('mail_encryption');
                                    } else if (isset($SMmailSettings->mail_encryption) && $SMmailSettings->mail_encryption != '') {
                                        $mail_encryption = $SMmailSettings->mail_encryption;
                                    } else {
                                        $mail_encryption = '';
                                    }
                                    ?>
                                    <input type="text" name="mail_encryption" class="form-control" value="{{$mail_encryption}}">
                                </div>
                            </div>
                            <div style="padding-top:25px"></div>
                            <div class="row">
                                <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">
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

        /* .cloak{
       
        opacity: 0.3;
    } */
        .nopad {
            padding: 0px;
        }
    </style>
    <script type="text/javascript">
        $(function() {

            $('.nav-link').on('click', function() {
                var id = $(this).attr("data-bs-target");
                $("[name='mail_type']").removeAttr("checked");
                $(id).find("input[type='radio']").prop("checked", true);
            });
        });
    </script>
    @endsection