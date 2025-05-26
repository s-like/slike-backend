@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Edit Language';
    $readonly = "";
} else if ($action == 'add') {
    $title = 'Add Language';
    $readonly = "";
} else if ($action == 'view') {
    $title = 'View Language';
    $readonly = 'readonly';
} else {
    $title = 'Copy Language';
    $readonly = "";
}
$path = route('admin.languages.index');
?>
<style>
    /* .main_cat .select2-container--default .select2-selection--single {
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
    } */
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
            <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/languages/'.$id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
            <?php } else { ?>
                <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/languages')}}" method="post" enctype="multipart/form-data">
                <?php } ?>
                {{ csrf_field() }}
                <div class="row">

                    <div class="col-lg-12 ">
                        <div class="padding20">


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="fld">
                                        <label for="name" class="control-label"> <small class="req text-danger">* </small>Name</label>
                                        <?php
                                        if (old('name') != '') {
                                            $name = old('name');
                                        } else if (isset($language->name) && $language->name != '') {
                                            $name = $language->name;
                                        } else {
                                            $name = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" {{$readonly}}>

                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="fld">
                                        <label for="code" class="control-label"> <small class="req text-danger">* </small>Code</label>
                                        <?php
                                        if (old('code') != '') {
                                            $code = old('code');
                                        } else if (isset($language->code) && $language->code != '') {
                                            $code = $language->code;
                                        } else {
                                            $code = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="code" value="<?php echo $code; ?>" {{$readonly}}>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <div class="fld">
                                    <label for="code" class="control-label"> <small class="req text-danger">* </small>Flag</label>

                                    <?php
                                    if (old('flag') != '') {
                                        $flag = old('flag');
                                    } else if (isset($language->flag) && $language->flag != '') {
                                        $flag = asset(Storage::url('public/flags')) . '/' . $language->flag;;
                                    } else {
                                        $flag = '';
                                    }

                                    ?>
                                    <input type="file" class="form-control" name="flag" value="<?php echo $flag; ?>" {{$readonly}}>

                                    @if($flag!="")
                                    <img src="{{ $flag }}" width="80px" />
                                    @endif
                                </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mt-3">
                                        <label class="control-label col-md-2">Active</label>
                                        <?php
                                        if (old('active') != '') {
                                            $active = old('active');
                                        } else if (isset($language->active) && $language->active == 1) {
                                            $active = "checked='checked'";
                                        } else {
                                            $active = "";
                                        }
                                        ?>
                                        <input type="checkbox" class="active_toggle" {{$active}} data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="active" data-size="sm" value=1>
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
        $(".active_toggle").bootstrapToggle();
    });
</script>
@endsection