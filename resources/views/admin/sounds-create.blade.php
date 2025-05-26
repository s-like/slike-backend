@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Edit Sound';
    $readonly = "";
} else if ($action == 'add') {
    $title = 'Add Sound';
    $readonly = "";
} else if ($action == 'view') {
    $title = 'View Sound';
    $readonly = 'readonly';
} else {
    $title = 'Copy Sound';
    $readonly = "";
}
$path = route('admin.sounds.index');
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
            <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/sounds/'.$id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
            <?php } else { ?>
                <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/sounds')}}" method="post" enctype="multipart/form-data">
                <?php } ?>
                {{ csrf_field() }}
                <div class="row">

                    <div class="col-lg-12 ">
                        <div class="padding20">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label for="cat_name" class="control-label"> <small class="req text-danger">* </small>Category</label>
                                        <?php
                                        if (isset($sound->cat_id) && $sound->cat_id != '') {
                                            $cat_id = $sound->cat_id;
                                        } else {
                                            $cat_id = '';
                                        }
                                        ?>
                                        <select class="form-control" name="cat_id[]" id="cat_id" multiple {{$readonly}}>
                                            <option value="0" disabled>---Select---</option>
                                            <?php
                                            if ($cat_id != '') {
                                                foreach ($categories as $cat) {
                                                    $str = ',' . $cat_id . ',';
                                                    $sub_str = ',' . $cat->cat_id . ',';
                                            ?>
                                                    <option <?php echo (strpos($str, $sub_str) !== false) ? "selected" : "" ?> value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
                                                <?php }
                                            } else {
                                                foreach ($categories as $cat) { ?>
                                                    <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
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
                                        } else if (isset($sound->title) && $sound->title != '') {
                                            $title = $sound->title;
                                        } else {
                                            $title = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" {{$readonly}}>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label class="control-label">Image <small class="req text-danger">*</small></label>

                                        <?php
                                        if (old('image') != '') {
                                            $image = old('image');
                                        } else if (isset($sound->image) && $sound->image != '') {
                                            $image = $sound->image;
                                        } else {
                                            $image = '';
                                        }
                                        ?>
                                        @if($action!='view')
                                        <input type="file" name="image" class="form-control col-md-6">
                                        @endif
                                        <input type="hidden" class="form-control" name="old_image" value="<?php echo $image; ?>" readonly>
                                        @if($image!="")
                                        <img src="<?php echo asset(Storage::url('public/sounds/images/' . $image)); ?>" width="130px">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label class="control-label">Sound <small class="requried">*</small> <small class="muted">(Only .mp3 format are allowed)</small></label>

                                        <?php
                                        if (old('sound_name') != '') {
                                            $sound_name = old('sound_name');
                                        } else if (isset($sound->sound_name) && $sound->sound_name != '') {
                                            $sound_name = $sound->sound_name;
                                        } else {
                                            $sound_name = '';
                                        }
                                        if (isset($sound->duration) && $sound->duration != "") {
                                            $duration = $sound->duration;
                                        } else {
                                            $duration = "";
                                        }

                                        if (isset($sound->album) && $sound->album != "") {
                                            $album = $sound->album;
                                        } else {
                                            $album = "";
                                        }
                                        if (isset($sound->artist) && $sound->artist != "") {
                                            $artist = $sound->artist;
                                        } else {
                                            $artist = "";
                                        }
                                        ?>
                                        <input type="file" class="form-control" name="sound_name[]" value="<?php echo $sound_name; ?>" {{$readonly}}>
                                        <input type="hidden" name="old_sound_name" value="<?php echo $sound_name; ?>">
                                        <input type="hidden" name="old_duration" value="<?php echo $duration; ?>">
                                        <input type="hidden" name="bulk" value="0">

                                        <input type="hidden" name="id" value="<?php echo (isset($id)) ? $id : 0; ?>">


                                        <?php if ($sound_name != "") { ?>
                                            <labe><?php echo $sound_name; ?></label>
                                            <?php } ?>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label class="control-label">Album</label>
                                        <?php
                                        if (old('album') != '') {
                                            $album = old('album');
                                        } else if (isset($sound->album) && $sound->album != '') {
                                            $album = $sound->album;
                                        } else {
                                            $album = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="album" value="<?php echo $album; ?>" {{$readonly}}>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label class="control-label">Artist </label>

                                        <?php
                                        if (old('artist') != '') {
                                            $artist = old('artist');
                                        } else if (isset($sound->artist) && $sound->artist != '') {
                                            $artist = $sound->artist;
                                        } else {
                                            $artist = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="artist" value="<?php echo $artist; ?>" {{$readonly}}>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label class="control-label">Active </label>

                                        <?php
                                        if (old('active') != '') {
                                            $active = old('active');
                                        } elseif ($action != 'add') {

                                            $active = $sound->active;
                                        } else {
                                            $active = 1;
                                        }

                                        ?>
                                        <label class="radio-inline">
                                            <input type="radio" name="active" value="1" <?php if ($active == 1) {
                                                                                            echo 'checked';
                                                                                        } ?>> Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="active" value="0" <?php if ($active == 0) {
                                                                                            echo 'checked';
                                                                                        } ?>> No
                                        </label>
                                    </div>
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
        $('#cat_id2').select2();
    });
</script>
@endsection