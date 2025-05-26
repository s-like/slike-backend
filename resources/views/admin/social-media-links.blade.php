@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Social Media Links';
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
                        <form role="form" action="{{url( config('app.admin_url') .'/social-media-links-update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="" style="padding-bottom: 32px;">
                                        <!-- <label class="panel-title">Facebook Link</label> -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- <div style="padding-top:25px"></div> -->
                                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                    <label class="control-label title">Facebook Link</label>
                                                    <?php
                                                    if (old('fb_link') != '') {
                                                        $fb_link = old('fb_link');
                                                    } else if (isset($socialLinks->fb_link) && $socialLinks->fb_link != '') {
                                                        $fb_link = $socialLinks->fb_link;
                                                    } else {
                                                        $fb_link = '';
                                                    }
                                                    ?>
                                                    <input type="text" name="fb_link" class="form-control" value="{{$fb_link}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div style="padding-top:15px"></div>
                                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                    <label class="control-label title">Google Link</label>
                                                    <?php
                                                    if (old('google_link') != '') {
                                                        $google_link = old('google_link');
                                                    } else if (isset($socialLinks->google_link) && $socialLinks->google_link != '') {
                                                        $google_link = $socialLinks->google_link;
                                                    } else {
                                                        $google_link = '';
                                                    }
                                                    ?>
                                                    <input type="text" name="google_link" class="form-control" value="{{$google_link}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div style="padding-top:15px"></div>
                                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                    <label class="control-label title">Twitter Link</label>
                                                    <?php
                                                    if (old('twitter_link') != '') {
                                                        $twitter_link = old('twitter_link');
                                                    } else if (isset($socialLinks->twitter_link) && $socialLinks->twitter_link != '') {
                                                        $twitter_link = $socialLinks->twitter_link;
                                                    } else {
                                                        $twitter_link = '';
                                                    }
                                                    ?>
                                                    <input type="text" name="twitter_link" class="form-control" value="{{$twitter_link}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div style="padding-top:15px"></div>
                                                <div class="form-group label-floating is-empty" style="padding: 0px;margin: 0px;">
                                                    <label class="control-label title">You Tube Link</label>
                                                    <?php
                                                    if (old('youtube_link') != '') {
                                                        $youtube_link = old('youtube_link');
                                                    } else if (isset($socialLinks->youtube_link) && $socialLinks->youtube_link != '') {
                                                        $youtube_link = $socialLinks->youtube_link;
                                                    } else {
                                                        $youtube_link = '';
                                                    }
                                                    ?>
                                                    <input type="text" name="youtube_link" class="form-control" value="{{$youtube_link}}">
                                                </div>
                                            </div>
                                        </div>
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

@endsection