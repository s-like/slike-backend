@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('css/colorpicker/jquery.minicolors.css')}}">
<?php
$title = "App Configration";
?>
<style>
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

    .card {
        min-height: 450px;
        margin-top: 0px;
    }

    label {
        font-size: 16px;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('appConfig/css/style.css') }}">
<?php

if (old('bg_color') != '') {
    $bg_color = old('bg_color');
} else if (isset($appSettings->bg_color) && $appSettings->bg_color != '') {
    $bg_color = $appSettings->bg_color;
} else {
    $bg_color = '#70c24a';
}


if (old('accent_color') != '') {
    $accent_color = old('accent_color');
} else if (isset($appSettings->accent_color) && $appSettings->accent_color != '') {
    $accent_color = $appSettings->accent_color;
} else {
    $accent_color = '#70c24a';
}


if (old('button_color') != '') {
    $button_color = old('button_color');
} else if (isset($appSettings->button_color) && $appSettings->button_color != '') {
    $button_color = $appSettings->button_color;
} else {
    $button_color = '#70c24a';
}

if (old('button_text_color') != '') {
    $button_text_color = old('button_text_color');
} else if (isset($appSettings->button_text_color) && $appSettings->button_text_color != '') {
    $button_text_color = $appSettings->button_text_color;
} else {
    $button_text_color = '#70c24a';
}

if (old('sender_msg_color') != '') {
    $sender_msg_color = old('sender_msg_color');
} else if (isset($appSettings->sender_msg_color) && $appSettings->sender_msg_color != '') {
    $sender_msg_color = $appSettings->sender_msg_color;
} else {
    $sender_msg_color = '#70c24a';
}

if (old('sender_msg_text_color') != '') {
    $sender_msg_text_color = old('sender_msg_text_color');
} else if (isset($appSettings->sender_msg_text_color) && $appSettings->sender_msg_text_color != '') {
    $sender_msg_text_color = $appSettings->sender_msg_text_color;
} else {
    $sender_msg_text_color = '#70c24a';
}

if (old('my_msg_color') != '') {
    $my_msg_color = old('my_msg_color');
} else if (isset($appSettings->my_msg_color) && $appSettings->my_msg_color != '') {
    $my_msg_color = $appSettings->my_msg_color;
} else {
    $my_msg_color = '#70c24a';
}

if (old('my_msg_text_color') != '') {
    $my_msg_text_color = old('my_msg_text_color');
} else if (isset($appSettings->my_msg_text_color) && $appSettings->my_msg_text_color != '') {
    $my_msg_text_color = $appSettings->my_msg_text_color;
} else {
    $my_msg_text_color = '#70c24a';
}

if (old('heading_color') != '') {
    $heading_color = old('heading_color');
} else if (isset($appSettings->heading_color) && $appSettings->heading_color != '') {
    $heading_color = $appSettings->heading_color;
} else {
    $heading_color = '#70c24a';
}

if (old('sub_heading_color') != '') {
    $sub_heading_color = old('sub_heading_color');
} else if (isset($appSettings->sub_heading_color) && $appSettings->sub_heading_color != '') {
    $sub_heading_color = $appSettings->sub_heading_color;
} else {
    $sub_heading_color = '#70c24a';
}

if (old('icon_color') != '') {
    $icon_color = old('icon_color');
} else if (isset($appSettings->icon_color) && $appSettings->icon_color != '') {
    $icon_color = $appSettings->icon_color;
} else {
    $icon_color = '#70c24a';
}
if (old('dashboard_icon_color') != '') {
    $dashboard_icon_color = old('dashboard_icon_color');
} else if (isset($appSettings->dashboard_icon_color) && $appSettings->dashboard_icon_color != '') {
    $dashboard_icon_color = $appSettings->dashboard_icon_color;
} else {
    $dashboard_icon_color = '#70c24a';
}

if (old('dashboard_icon_background_color') != '') {
    $dashboard_icon_background_color = old('dashboard_icon_background_color');
} else if (isset($appSettings->dashboard_icon_background_color) && $appSettings->dashboard_icon_background_color != '') {
    $dashboard_icon_background_color = $appSettings->dashboard_icon_background_color;
} else {
    $dashboard_icon_background_color = '#70c24a';
}
if (old('grid_item_border_color') != '') {
    $grid_item_border_color = old('grid_item_border_color');
} else if (isset($appSettings->grid_item_border_color) && $appSettings->grid_item_border_color != '') {
    $grid_item_border_color = $appSettings->grid_item_border_color;
} else {
    $grid_item_border_color = '#70c24a';
}
if (old('grid_border_radius') != '') {
    $grid_border_radius = old('grid_border_radius');
} else if (isset($appSettings->grid_border_radius) && $appSettings->grid_border_radius != '') {
    $grid_border_radius = $appSettings->grid_border_radius;
} else {
    $grid_border_radius = '10';
}

if (old('divider_color') != '') {
    $divider_color = old('divider_color');
} else if (isset($appSettings->divider_color) && $appSettings->divider_color != '') {
    $divider_color = $appSettings->divider_color;
} else {
    $divider_color = '#70c24a';
}

if (old('dp_border_color') != '') {
    $dp_border_color = old('dp_border_color');
} else if (isset($appSettings->dp_border_color) && $appSettings->dp_border_color != '') {
    $dp_border_color = $appSettings->dp_border_color;
} else {
    $dp_border_color = '#70c24a';
}

if (old('text_color') != '') {
    $text_color = old('text_color');
} else if (isset($appSettings->text_color) && $appSettings->text_color != '') {
    $text_color = $appSettings->text_color;
} else {
    $text_color = '#70c24a';
}

if (old('inactive_button_color') != '') {
    $inactive_button_color = old('inactive_button_color');
} else if (isset($appSettings->inactive_button_color) && $appSettings->inactive_button_color != '') {
    $inactive_button_color = $appSettings->inactive_button_color;
} else {
    $inactive_button_color = '#000000';
}

if (old('inactive_button_text_color') != '') {
    $inactive_button_text_color = old('inactive_button_text_color');
} else if (isset($appSettings->inactive_button_text_color) && $appSettings->inactive_button_text_color != '') {
    $inactive_button_text_color = $appSettings->inactive_button_text_color;
} else {
    $inactive_button_text_color = '#ffffff';
}


if (old('header_bg_color') != '') {
    $header_bg_color = old('header_bg_color');
} else if (isset($appSettings->header_bg_color) && $appSettings->header_bg_color != '') {
    $header_bg_color = $appSettings->header_bg_color;
} else {
    $header_bg_color = '#ffffff';
}

if (old('bottom_nav') != '') {
    $bottom_nav = old('bottom_nav');
} else if (isset($appSettings->bottom_nav) && $appSettings->bottom_nav != '') {
    $bottom_nav = $appSettings->bottom_nav;
} else {
    $bottom_nav = '#ffffff';
}

if (old('bg_shade') != '') {
    $bg_shade = old('bg_shade');
} else if (isset($appSettings->bg_shade) && $appSettings->bg_shade != '') {
    $bg_shade = $appSettings->bg_shade;
} else {
    $bg_shade = '#ffffff';
}

?>

<div class="col-md-12 col-lg-12">
    <div class="card customers-profile ">
        <h3><?php echo $title; ?></h3>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @if ($message = Session::get('success'))
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
            <form role="form" action="{{url( config('app.admin_url') .'/app-config-settings-update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Background</label>

                            <div class="col-md-6">
                                <input type="text" id="bg_color" name="bg_color" class="form-control demo" value="<?php echo $bg_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Accent</label>

                            <div class="col-md-6">
                                <input type="text" id="accent_color" name="accent_color" class="form-control demo" value="<?php echo $accent_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Sender Message</label>
                            <div class="col-md-6">
                                <input type="text" id="sender_msg_color" name="sender_msg_color" class="form-control demo" value="<?php echo $sender_msg_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Sender Message Text</label>
                            <div class="col-md-6">
                                <input type="text" id="sender_msg_text_color" name="sender_msg_text_color" class="form-control demo" value="<?php echo $sender_msg_text_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">My Message</label>
                            <div class="col-md-6">
                                <input type="text" id="my_msg_color" name="my_msg_color" class="form-control demo" value="<?php echo $my_msg_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">My Message Text</label>
                            <div class="col-md-6">
                                <input type="text" id="my_msg_text_color" name="my_msg_text_color" class="form-control demo" value="<?php echo $my_msg_text_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Button</label>
                            <div class="col-md-6">
                                <input type="text" id="button_color" name="button_color" class="form-control demo" value="<?php echo $button_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Button Text</label>
                            <div class="col-md-6">
                                <input type="text" id="button_text_color" name="button_text_color" class="form-control demo" value="<?php echo $button_text_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Heading</label>
                            <div class="col-md-6">
                                <input type="text" id="heading_color" name="heading_color" class="form-control demo" value="<?php echo $heading_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Sub Heading</label>
                            <div class="col-md-6">
                                <input type="text" id="sub_heading_color" name="sub_heading_color" class="form-control demo" value="<?php echo $sub_heading_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Icon</label>
                            <div class="col-md-6">
                                <input type="text" id="icon_color" name="icon_color" class="form-control demo" value="<?php echo $icon_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#bcaaa4|#eeeeee|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Dashboard Icon</label>
                            <div class="col-md-6">
                                <input type="text" id="dashboard_icon_color" name="dashboard_icon_color" class="form-control demo" value="<?php echo $dashboard_icon_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Grid Item Border</label>
                            <div class="col-md-6">
                                <input type="text" id="grid_item_border_color" name="grid_item_border_color" class="form-control demo" value="<?php echo $grid_item_border_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Divider</label>
                            <div class="col-md-6">
                                <input type="text" id="divider_color" name="divider_color" class="form-control demo" value="<?php echo $divider_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">DP Border</label>
                            <div class="col-md-6">
                                <input type="text" id="dp_border_color" name="dp_border_color" class="form-control demo" value="<?php echo $dp_border_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Text</label>
                            <div class="col-md-6">
                                <input type="text" id="text_color" name="text_color" class="form-control demo" value="<?php echo $text_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Deactivate Button</label>
                            <div class="col-md-6">
                                <input type="text" id="inactive_button_color" name="inactive_button_color" class="form-control demo" value="<?php echo $inactive_button_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Deactivate Button Text</label>
                            <div class="col-md-6">
                                <input type="text" id="inactive_button_text_color" name="inactive_button_text_color" class="form-control demo" value="<?php echo $inactive_button_text_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Header Background Color</label>
                            <div class="col-md-6">
                                <input type="text" id="header_bg_color" name="header_bg_color" class="form-control demo" value="<?php echo $header_bg_color; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Bottom Nav</label>
                            <div class="col-md-6">
                                <input type="text" id="bottom_nav" name="bottom_nav" class="form-control demo" value="<?php echo $bottom_nav; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Background Shade</label>
                            <div class="col-md-6">
                                <input type="text" id="bg_shade" name="bg_shade" class="form-control demo" value="<?php echo $bg_shade; ?>" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#000000|#ffffff|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="padding-top:20px"></div>
                        <div class="form-group row label-floating is-empty" style="padding: 0px;margin: 0px;">
                            <label class="control-label title col-md-6">Grid Border Radius</label>
                            <div class="col-md-6">
                                <input type="text" id="grid_border_radius" name="grid_border_radius" class="form-control" value="<?php echo $grid_border_radius; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-tp-bt-10">
                    <div class="col-lg-12 col-md-12">
                        <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
</div>


<script src="{{ asset('js/jquery.minicolors.js')}}"></script>
<script>
    $(document).ready(function() {
        $("#grid_border_radius").keyup(function() {
            $(".Rectangle_133").css("border-radius", $(this).val() + 'px');
            $('.Rectangle_130').css("border-radius", $(this).val() + 'px');
            $('.Rectangle_134').css("border-radius", $(this).val() + 'px');
            $('.Rectangle_132').css("border-radius", $(this).val() + 'px');
            $('.Rectangle_135').css("border-radius", $(this).val() + 'px');
            $('.Rectangle_131').css("border-radius", $(this).val() + 'px');
        });

        $('.demo').minicolors({
            theme: 'bootstrap',
            control: $('.demo').attr('data-control') || 'hue',
            //   defaultValue: $('.demo').attr('data-defaultValue') || '',
            format: $('.demo').attr('data-format') || 'hex',
            //   keywords: $('.demo').attr('data-keywords') || '',
            inline: $('.demo').attr('data-inline') === 'true',
            //   letterCase: $('.demo').attr('data-letterCase') || 'lowercase',
            //   opacity: $('.demo').attr('data-opacity'),
            position: $('.demo').attr('data-position') || 'bottom left',
            swatches: $('.demo').attr('data-swatches') ? $('.demo').attr('data-swatches').split('|') : [],
            change: function(hex, opacity) {

            },
            theme: 'default',

        });

    });
</script>
@endsection