@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Settings';
    $readonly = "";
}
?>
<style>
    .card {
        min-height: 450px;
        margin-top: 0px;
    }
    .fld label {
        margin-top: 0;
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
                            <button class="nav-link <?php echo ($type == "G") ? 'active' : ''; ?>" id="g_Setting_tab" data-bs-toggle="tab" data-bs-target="#g_settings" type="button" role="tab" data-type="G" aria-controls="nav-home" aria-selected="true"> <i class="fa fa-cog"></i> General </button>
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
            <div class="contact-detail">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="g_settings" role="tabpanel" aria-labelledby="g_Setting_tab">
                        <form role="form" action="{{url( config('app.admin_url') .'/settings-update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="fld">
                                        <label class="control-label"> <small class="req text-danger">* </small>Company Name</label>
                                        <?php
                                        if (old('site_name') != '') {
                                            $site_name = old('site_name');
                                        } else if (isset($settings->site_name) && $settings->site_name != '') {
                                            $site_name = $settings->site_name;
                                        } else {
                                            $site_name = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="site_name" value="<?php echo $site_name; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="fld">
                                        <label class="control-label"> <small class="req text-danger">* </small>Address</label>
                                        <?php
                                        if (old('site_address') != '') {
                                            $site_address = old('site_address');
                                        } else if (isset($settings->site_address) && $settings->site_address != '') {
                                            $site_address = $settings->site_address;
                                        } else {
                                            $site_address = '';
                                        }
                                        ?>
                                        <textarea name="site_address" class="form-control">{{$site_address}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="fld">
                                        <label class="control-label"> <small class="req text-danger">* </small>Phone</label>
                                        <?php
                                        if (old('site_phone') != '') {
                                            $site_phone = old('site_phone');
                                        } else if (isset($settings->site_phone) && $settings->site_phone != '') {
                                            $site_phone = $settings->site_phone;
                                        } else {
                                            $site_phone = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="site_phone" value="<?php echo $site_phone; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="fld">
                                        <label class="control-label"> <small class="req text-danger">* </small>Email</label>
                                        <?php
                                        if (old('site_email') != '') {
                                            $site_email = old('site_email');
                                        } else if (isset($settings->site_email) && $settings->site_email != '') {
                                            $site_email = $settings->site_email;
                                        } else {
                                            $site_email = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="site_email" value="<?php echo $site_email; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="fld">
                                        <label class="control-label"> <small class="req text-danger">* </small>Logo</label>
                                        <?php
                                        if (old('site_logo') != '') {
                                            $site_logo = old('site_logo');
                                        } else if (isset($settings->site_logo) && $settings->site_logo != '') {
                                            $site_logo = $settings->site_logo;
                                        } else {
                                            $site_logo = '';
                                        }
                                        ?>
                                        @if($action!='view') <input type="file" class="form-control" name="site_logo"> @endif
                                        <input type="hidden" class="form-control" name="old_site_logo" value="<?php echo $site_logo; ?>" readonly>
                                        @if($site_logo!="")
                                        <img src="<?php echo asset(Storage::url('public/uploads/logos/' . $site_logo)); ?>" width="130px">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="fld">
                                        <label class="control-label"> <small class="req text-danger">* </small>Watermark <b>(Max : 200x70)</b></label>

                                        <?php
                                        if (old('watermark') != '') {
                                            $watermark = old('watermark');
                                        } else if (isset($settings->watermark) && $settings->watermark != '') {
                                            $watermark = $settings->watermark;
                                        } else {
                                            $watermark = '';
                                        }
                                        ?>
                                        @if($action!='view') <input type="file" class="form-control" name="watermark"> @endif
                                        <input type="hidden" class="form-control" name="old_watermark" value="<?php echo $watermark; ?>" readonly>
                                        @if($watermark!="")
                                        <img src="<?php echo asset(Storage::url('public/uploads/logos/' . $watermark)); ?>" width="130px">
                                        @endif
                                    </div>
                                </div>
                                div class="col-lg-12">
                                    <div class="fld">
                                        <label class="control-label"> <small class="req text-danger">* </small>Gift Module?</label>

                                        <?php
                                        if (old('enable_gift') != '') {
                                            $enable_gift = old('enable_gift');
                                        } else if (isset($settings->enable_gift) && $settings->enable_gift != '') {
                                            $enable_gift = $settings->enable_gift;
                                        } else {
                                            $enable_gift = '';
                                        }
                                        ?>
                                        <input type="checkbox" class="flaged_toggle" @if ($enable_gift) checked="checked" @endif data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="enable_gift" data-size="sm" value=1>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">
                                <input type="hidden" name="type" id="setting_type" value="G">
                                <div class="col-lg-12 col-md-12" <?php if ($action == 'view') {
                                                                        echo "style='display:none'";
                                                                    } ?>>
                                    <br />

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div> -->
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function() {
        $('.nav-link').on('click', function() {
            var val = $(this).attr("data-type");
            $('#setting_type').val(val);
        });
    });
</script>
@endsection