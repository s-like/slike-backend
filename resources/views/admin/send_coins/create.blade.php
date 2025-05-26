@extends('layouts.admin')
@section('content')
<?php
$title = 'Send Coin';
$path = route('admin.send-coins.index');
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
        <form class="form-horizontal" role="form" action="{{url( config('app.admin_url') .'/send-coins')}}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User <span class="requried">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="user_id" name="user_id">
                                <option></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Coins<span class="requried">*</span></label>
                        <div class="col-sm-10">
                            <?php
                            if (old('coins') != '') {
                                $coins = old('coins');
                            } else {
                                $coins = '';
                            }
                            ?>

                            <input type="number" class="form-control" name="coins" value="<?php echo $coins; ?>">
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

        $("#user_id").select2({
            placeholder: "Select Programme",
            allowClear: true,
            ajax: {
                url: "{{ route('admin.getUsers') }}",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    cat_id = $("#cat_id").val();
                    return {
                        searchTerm: params.term, // search term                        
                    };
                },
                processResults: function(response) {
                    return {
                        results: response

                    };
                },
                cache: true
            }
        });
    });
</script>
@endsection