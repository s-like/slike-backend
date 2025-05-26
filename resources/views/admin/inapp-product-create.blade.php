@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'In App purchase products';
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
        color:#000;
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
                                        <button class="nav-link active" id="captcha_tab" data-bs-toggle="tab" data-bs-target="#captcha_settings" type="button" role="tab" aria-controls="pusher_settings" aria-selected="true" data-type="P"> <i class="fa fa-refresh"></i> In App Purchase Products</button>

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
                        <form role="form" action="{{url( config('app.admin_url') .'/inapp-purchase-products-update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="tab-content col-md-12" id="myTabContent">
                                    <div class="row tab-pane fade show active" id="captcha_settings" role="tabpanel" aria-labelledby="captcha_setting_tab">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <label class="panel-title">In App purchase</label>
                                                <div class="row">

                                                    <div class="col-lg-12 col-md-12">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title col-md-3 nopad">Products</label>
                                                            <select class="form-control col-md-6" name="products[]" id="products" multiple required>
                                                                    <option disabled>Please enter value</option>
                                                                    <?php foreach ($inappPurchaseSettings as $product) { ?>
                                                                        <option value="<?php echo $product->title; ?>" selected><?php echo $product->title; ?></option>
                                                                    <?php } ?>
                            
                                                                </select>
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

    $('#products').select2({
            tags: true,
            // minimumInputLength: 2,
            // maximumInputLength: 3,
            // maximumSelectionLength: 5,
            minimumInputLength: 1
        });
</script>
@endsection