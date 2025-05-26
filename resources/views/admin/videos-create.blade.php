@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Edit Video';
    $readonly = "";
} else if ($action == 'add') {
    $title = 'Add Video';
    $readonly = "";
} else if ($action == 'view') {
    $title = 'View Video';
    $readonly = 'readonly';
} else {
    $title = 'Copy Video';
    $readonly = "";
}
$path = route('admin.videos.index');
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
</style>
<div class="col-lg-12">
    <div class="card customers-profile">
        <h3><?php echo $title; ?></h3>
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
            </div>
        </div>
        <?php
        if ($action == 'edit') { ?>
            <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/videos/'.$id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
            <?php } else { ?>
                <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/videos')}}" method="post" enctype="multipart/form-data">
                <?php } ?>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="padding20">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label for="username" class="control-label"> <small class="req text-danger">* </small>Userame</label>
                                        <?php
                                        if (isset($video->user_id) && $video->user_id > 0) {
                                            $user_id = $video->user_id;
                                        } else {
                                            $user_id = '';
                                        } ?>
                                        <select class="form-control js-example-basic-multiple" name="user_id" {{$readonly}}>
                                            <option value=" ">---Select---</option>
                                            <?php
                                            if ($user_id > 0) {
                                                foreach ($users as $u) { ?>
                                                    <option <?php if ($user_id == $u->user_id) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $u->user_id; ?>"><?php echo $u->username; ?></option>
                                                <?php }
                                            } else {
                                                foreach ($users as $u) { ?>
                                                    <option value="<?php echo $u->user_id; ?>"><?php echo $u->username; ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label for="sound" class="control-label"> <small class="req text-danger">* </small>Sound (optional)</label>
                                        <?php
                                        if (isset($video->sound_id) && $video->sound_id > 0) {
                                            $sound_id = $video->sound_id;
                                        } else {
                                            $sound_id = 0;
                                        } ?>
                                        <select class="form-control js-example-basic-multiple" name="sound_id" {{$readonly}}>
                                            <option value="0">---Select---</option>
                                            <?php
                                            if ($sound_id > 0) {
                                                foreach ($sounds as $sound) { ?>
                                                    <option <?php if ($sound_id == $sound->sound_id) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $sound->sound_id; ?>"><?php echo $sound->title; ?></option>
                                                <?php }
                                            } else {
                                                foreach ($sounds as $sound) { ?>
                                                    <option value="<?php echo $sound->sound_id; ?>"><?php echo $sound->title; ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label for="title" class="control-label"> <small class="req text-danger">* </small>Title</label>
                                        <?php
                                        if (old('title') != '') {
                                            $title = old('title');
                                        } else if (isset($video->title) && $video->title != '') {
                                            $title = $video->title;
                                        } else {
                                            $title = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" {{$readonly}}>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label for="video" class="control-label"> <small class="req text-danger">* </small>Video</label>
                                        <?php
                                        if (old('video') != '') {
                                            $video1 = old('video');
                                        } else if (isset($video->video) && $video->video != '') {
                                            $video1 = $video->video;
                                            $thumb = $video->thumb;
                                            $gif = $video->gif;
                                        } else {
                                            $video1 = '';
                                            $thumb = '';
                                            $gif = '';
                                        }
                                        if (isset($video->user_id) && $video->user_id != '') {
                                            $user_id = $video->user_id;
                                        } else {
                                            $user_id = 0;
                                        }
                                        if (isset($video->duration) && $video->duration != '') {
                                            $duration = $video->duration;
                                        } else {
                                            $duration = 0;
                                        }
                                        ?>
                                        <input type="file" class="form-control" name="video" value="<?php echo $video1; ?>" {{$readonly}}>
                                        <input type="hidden" name="old_video" value="<?php echo $video1; ?>">
                                        <input type="hidden" name="old_thumb" value="<?php echo $thumb; ?>">
                                        <input type="hidden" name="old_gif" value="<?php echo $gif; ?>">
                                        <input type="hidden" name="old_duration" value="<?php echo $duration; ?>">
                                        <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label for="description" class="control-label"> <small class="req text-danger">* </small>Description</label>
                                        <?php
                                        if (old('description') != '') {
                                            $description = old('description');
                                        } else if (isset($video->description) && $video->description != '') {
                                            $description = $video->description;
                                        } else {
                                            $description = '';
                                        }
                                        ?>
                                        <textarea name="description" class="form-control" {{$readonly}}><?php echo $description; ?></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <br />
                                    <?php if ($thumb != "") { ?>
                                        <img width="100" height="150" src="<?php echo url('storage/videos/' . $user_id . '/thumb/' . $thumb); ?>">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="c-invoice" <?php if ($action == 'view') {
                                            echo "style='display:none'";
                                        } ?>>
                    <button type="submit" class="btn btn-info button-green b-shadow">Save</button>
                </div>
                </form>
    </div>
    <!-- new-card -->
    <br>
</div>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $(document).ready(function() {

        $(document).on("change", "#main_cat_id", function() {
            var main_cat = $(this).val();
            $.post('<?php echo $path; ?>/select_cat', 'main_cat=' + main_cat, function(data) {
                $('#cat_id').html(data);
                //window.location = '<?php //echo $path;
                                        ?>';
            });
        });
        $('#main_cat_id').select2();
        $('#cat_id').select2();
    });
</script>
@endsection