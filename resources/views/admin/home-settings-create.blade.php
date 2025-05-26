@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Home Settings';
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
    <div class="col-md-9 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card customers-profile">
                    <h3><?php echo $title; ?></h3>

                    <div class="card-body">
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
                                @if($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                    <?php Session::forget('success'); ?>
                                </div>
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{!! $message !!}</strong>
                                    <?php Session::forget('error'); ?>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="row"> -->

                        <!-- <div class="row"> -->
                        <form role="form" action="{{url( config('app.admin_url') .'/home-settings-update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Site Title</label>
                                        <?php
                                        if (old('site_title') != '') {
                                            $site_title = old('site_title');
                                        } else if (isset($homeSettings->site_title) && $homeSettings->site_title != '') {
                                            $site_title = $homeSettings->site_title;
                                        } else {
                                            $site_title = '';
                                        }
                                        ?>
                                        <input type="text" name="site_title" class="form-control col-md-6" value="<?php echo $site_title; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Heading</label>
                                        <?php
                                        if (old('heading') != '') {
                                            $heading = old('heading');
                                        } else if (isset($homeSettings->heading) && $homeSettings->heading != '') {
                                            $heading = $homeSettings->heading;
                                        } else {
                                            $heading = '';
                                        }
                                        ?>
                                        <input type="text" name="heading" class="form-control col-md-6" value="<?php echo $heading; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Sub Heading</label>
                                        <?php
                                        if (old('sub_heading') != '') {
                                            $sub_heading = old('sub_heading');
                                        } else if (isset($homeSettings->sub_heading) && $homeSettings->sub_heading != '') {
                                            $sub_heading = $homeSettings->sub_heading;
                                        } else {
                                            $sub_heading = '';
                                        }
                                        ?>
                                        <input type="text" name="sub_heading" class="form-control col-md-6" value="{{$sub_heading}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Google Button Image</label>
                                        <?php
                                        if (old('img1') != '') {
                                            $img1 = old('img1');
                                        } else if (isset($homeSettings->img1) && $homeSettings->img1 != '') {
                                            $img1 = $homeSettings->img1;
                                        } else {
                                            $img1 = '';
                                        }
                                        ?>
                                        @if($action!='view')
                                        <input type="file" name="img1" class="form-control col-md-6">
                                        @endif
                                        <input type="hidden" class="form-control" name="old_img1" value="<?php echo $img1; ?>" readonly>
                                        @if($img1!="")
                                        <div class="col-3">
                                            <img src="<?php echo asset(Storage::url('public/uploads/' . $img1)); ?>" width="130px">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Google Link</label>
                                        <?php
                                        if (old('img1_link') != '') {
                                            $img1_link = old('img1_link');
                                        } else if (isset($homeSettings->img1_link) && $homeSettings->img1_link != '') {
                                            $img1_link = $homeSettings->img1_link;
                                        } else {
                                            $img1_link = '';
                                        }
                                        ?>
                                        <input type="text" name="img1_link" class="form-control col-md-6" value="{{$img1_link}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Apple Button Image</label>
                                        <?php
                                        if (old('img2') != '') {
                                            $img2 = old('img2');
                                        } else if (isset($homeSettings->img2) && $homeSettings->img2 != '') {
                                            $img2 = $homeSettings->img2;
                                        } else {
                                            $img2 = '';
                                        }
                                        ?>
                                        @if($action!='view')
                                        <input type="file" name="img2" class="form-control col-md-6">
                                        @endif
                                        <input type="hidden" class="form-control" name="old_img2" value="<?php echo $img2; ?>" readonly>
                                        @if($img2!="")
                                        <div class="col-3">
                                            <img src="<?php echo asset(Storage::url('public/uploads/' . $img2)); ?>" width="130px">
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Apple Link</label>
                                        <?php
                                        if (old('img2_link') != '') {
                                            $img2_link = old('img2_link');
                                        } else if (isset($homeSettings->img2_link) && $homeSettings->img2_link != '') {
                                            $img2_link = $homeSettings->img2_link;
                                        } else {
                                            $img2_link = '';
                                        }
                                        ?>
                                        <input type="text" name="img2_link" class="form-control col-md-6" value="{{$img2_link}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Logo</label>
                                        <?php
                                        if (old('logo') != '') {
                                            $logo = old('logo');
                                        } else if (isset($homeSettings->logo) && $homeSettings->logo != '') {
                                            $logo = $homeSettings->logo;
                                        } else {
                                            $logo = '';
                                        }
                                        ?>
                                        @if($action!='view')
                                        <input type="file" name="logo" class="form-control col-md-6">
                                        @endif
                                        <input type="hidden" class="form-control" name="old_logo" value="<?php echo $logo; ?>" readonly>
                                        @if($logo!="")
                                        <div class="col-3">
                                            <img src="<?php echo asset(Storage::url('public/uploads/logos/' . $logo)); ?>" width="130px">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">White Logo</label>
                                        <?php
                                        if (old('white_logo') != '') {
                                            $white_logo = old('white_logo');
                                        } else if (isset($homeSettings->white_logo) && $homeSettings->white_logo != '') {
                                            $white_logo = $homeSettings->white_logo;
                                        } else {
                                            $white_logo = '';
                                        }
                                        ?>
                                        @if($action!='view')
                                        <input type="file" name="white_logo" class="form-control col-md-6">
                                        @endif
                                        <input type="hidden" class="form-control" name="old_white_logo" value="<?php echo $white_logo; ?>" readonly>
                                        @if($white_logo!="")
                                        <div class="col-3">
                                            <img src="<?php echo asset(Storage::url('public/uploads/logos/' . $white_logo)); ?>" width="130px">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Topbar Color</label>
                                        <div id="gradX"></div>
                                        <!-- <div class="result"> Result [Target elements]</div>

                                                        <div class="targets">
                                                            <div class="target" id="target"><div class="target_text">Target #1</div></div>
                                                            <div class="target" id="target2"><div class="target_text">Target #2</div></div>

                                                    </div> -->
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Top Header Background Image</label>
                                        <?php
                                        if (old('home_top_background_img') != '') {
                                            $home_top_background_img = old('home_top_background_img');
                                        } else if (isset($homeSettings->home_top_background_img) && $homeSettings->home_top_background_img != '') {
                                            $home_top_background_img = $homeSettings->home_top_background_img;
                                        } else {
                                            $home_top_background_img = '';
                                        }
                                        ?>
                                        @if($action!='view')
                                        <input type="file" name="home_top_background_img" class="form-control col-md-6">
                                        @endif
                                        <input type="hidden" class="form-control" name="old_home_top_background_img" value="<?php echo $home_top_background_img; ?>" readonly>
                                        @if($home_top_background_img!="")
                                        <div class="col-6">
                                            <img src="<?php echo asset(Storage::url('public/uploads/' . $home_top_background_img)); ?>" width="200px">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Comments Per Page</label>
                                        <?php
                                        if (old('comments_per_page') != '') {
                                            $comments_per_page = old('comments_per_page');
                                        } else if (isset($homeSettings->comments_per_page) && $homeSettings->comments_per_page != '') {
                                            $comments_per_page = $homeSettings->comments_per_page;
                                        } else {
                                            $comments_per_page = '';
                                        }
                                        ?>
                                        <input type="text" name="comments_per_page" class="form-control col-md-6" value="{{$comments_per_page}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-bottom: 25px">
                                    <div style="padding-top:25px"></div>
                                    <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                        <label class="control-label title col-md-3 nopad">Videos Per Page</label>
                                        <?php
                                        if (old('videos_per_page') != '') {
                                            $videos_per_page = old('videos_per_page');
                                        } else if (isset($homeSettings->videos_per_page) && $homeSettings->videos_per_page != '') {
                                            $videos_per_page = $homeSettings->videos_per_page;
                                        } else {
                                            $videos_per_page = '';
                                        }
                                        ?>
                                        <input type="text" name="videos_per_page" class="form-control col-md-6" value="{{$videos_per_page}}">
                                    </div>
                                </div>
                            </div>
                            <div style="padding-top:20px"></div>
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

    #gradx_code {
        visibility: visible !important;
    }
</style>
<?php $topColor = MyFunctions::getTopbarColor();
if (isset($topColor)) {
    $topbarColor = MyFunctions::getTopbarColor();
} else {
    $topbarColor = 'background: linear-gradient(50deg,rgb(115,80,199) 0%,rgb(236,74,99) 100%);';
}
$string = explode('rgb', $topbarColor);

$shortString1 = '';
if (isset($string[1])) {
    $first_start = strpos($string[1], '(');
    $first_end = strpos($string[1], ')') + 1;
    $shortString1 = substr($string[1], $first_start, $first_end);
}
$shortString2 = '';
if (isset($string[2])) {
    $sec_start = strpos($string[2], '(');
    $sec_end = strpos($string[2], ')') + 1;
    $shortString2 = substr($string[2], $sec_start, $sec_end);
}
?>
<script>
    <?php if (isset($shortString2) && $shortString2 != "") { ?>
        var val = [{
                color: "rgb{{$shortString1}}",
                position: 7
            },
            {
                color: "rgb{{$shortString2}}",
                position: 86
            }
        ];
    <?php } elseif (isset($shortString1) && $shortString1 != "") { ?>
        var val = [{
            color: "rgb{{$shortString1}}",
            position: 7
        }];
    <?php } else { ?>
        var val = [{
            color: "rgb(129, 5, 255);",
            position: 7
        }];
    <?php } ?>

    gradX("#gradX", {
        sliders: val
    });
</script>

<script type="text/javascript">
    $(function() {
        setTimeout(() => {
            tinyMCE.remove('#gradx_code');
        }, 1000);

    });
</script>
@endsection