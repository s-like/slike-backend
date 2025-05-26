@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Edit Category';
    $readonly = "";
} else if ($action == 'add') {
    $title = 'Add Category';
    $readonly = "";
} else if ($action == 'view') {
    $title = 'View Category';
    $readonly = 'readonly';
} else {
    $title = 'Copy Category';
    $readonly = "";
}
?>

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
            <form role="form" action="{{url( config('app.admin_url') .'/categories/'.$id)}}" method="post">
                {{ method_field('PUT') }}
            <?php } else { ?>
                <form role="form" action="{{url( config('app.admin_url') .'/categories')}}" method="post">
                <?php } ?>
                {{ csrf_field() }}
                <div class="row">

                    <div class="col-lg-12 ">
                        <div class="padding20">


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label for="cat_name" class="control-label"> <small class="req text-danger">* </small>Category Name</label>

                                        <?php
                                        if (old('cat_name') != '') {
                                            $cat_name = old('cat_name');
                                        } else if (isset($category->cat_name) && $category->cat_name != '') {
                                            $cat_name = $category->cat_name;
                                        } else {
                                            $cat_name = '';
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="cat_name" value="<?php echo $cat_name; ?>" {{$readonly}}>


                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="fld">
                                        <label for="rank" class="control-label"> <small class="req text-danger">* </small>Rank</label>
                                        <?php
                                        if (old('rank') != '') {
                                            $rank = old('rank');
                                        } else if ($action != 'add') {
                                            if ($category->rank == '0') {
                                                $rank = "0";
                                            } else {
                                                $rank = $category->rank;
                                            }
                                        } else {
                                            $rank = '';
                                        }
                                        ?>
                                        <input type="number" class="form-control" name="rank" value="<?php echo $rank; ?>" {{$readonly}}>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-invoice" <?php if ($action == 'view') {
                                            echo "style='display:none'";
                                        } ?>>
                    <button type="submit" class="btn btn-info button-green b-shadow">Save</button>
                </div>
            </form>
    </div>

</div>


@endsection