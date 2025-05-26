@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Edit Gift';
    $readonly = "";
} else if ($action == 'add') {
    $title = 'Add Gift';
    $readonly = "";
} else if ($action == 'view') {
    $title = 'View Gift';
    $readonly = 'readonly';
} else {
    $title = 'Copy Gift';
    $readonly = "";
}
$path = route('admin.gifts.index');
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
                                    <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/gifts/'.$id)}}" method="post" enctype="multipart/form-data">
                                        {{ method_field('PUT') }}
                                    <?php } else { ?>
                                        <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/gifts')}}" method="post" enctype="multipart/form-data">
                                        <?php } ?>
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name <span class="requried">*</span></label>
                                                    <div class="col-sm-10">
                                                        <?php
                                                        if (old('name') != '') {
                                                            $name = old('name');
                                                        } else if (isset($gift->name) && $gift->name != '') {
                                                            $name = $gift->name;
                                                        } else {
                                                            $name = '';
                                                        }
                                                        ?>
                                                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" {{$readonly}}>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Icon <span class="requried">*</span></label>
                                                    <div class="col-sm-10">
                                                        <?php
                                                        if (old('icon') != '') {
                                                            $icon = old('icon');
                                                        } else if ($action != 'add') {
                                                            if ($gift->icon == '') {
                                                                $icon = "";
                                                            } else {
                                                                $icon = $gift->icon;
                                                            }
                                                        } else {
                                                            $icon = '';
                                                        }
                                                        ?>

                                                        <input type="file" class="form-control" name="icon" value="<?php echo $icon; ?>" {{$readonly}}>
                                                        <?php if ($icon != "") { ?>
                                                            <img src="{{ asset(Storage::url('gifts')).'/'.$icon }}" width=50 />
                                                        <?php } ?>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Coins<span class="requried">*</span></label>
                                                    <div class="col-sm-10">
                                                        <?php
                                                        if (old('coins') != '') {
                                                            $coins = old('coins');
                                                        } else if (isset($gift->coins) && $gift->coins != '') {
                                                            $coins = $gift->coins;
                                                        } else {
                                                            $coins = '';
                                                        }
                                                        ?>

                                                        <input type="number" class="form-control" name="coins" value="<?php echo $coins; ?>" {{$readonly}}>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Active <span class="requried">*</span></label>
                                                    <div class="col-sm-10">
                                                        <?php
                                                        if (old('active') != '') {
                                                            $active = old('active');
                                                        } else if (isset($gift->active) && $gift->active != '') {
                                                            $active = $gift->active;
                                                        } else {
                                                            $active = 1;
                                                        }
                                                        ?>
                                                        <input type="radio" class="" name="active" value="0" <?php if ($active == '0') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>&nbsp;No&nbsp;&nbsp;
                                                        <input type="radio" class="" name="active" value="1" <?php if ($active == '1') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>&nbsp;Yes
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row margin-tp-bt-10">
                                            <div class="col-lg-12 col-md-12" <?php if ($action == 'view') {
                                                                                    echo "style='display:none'";
                                                                                } ?>>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
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