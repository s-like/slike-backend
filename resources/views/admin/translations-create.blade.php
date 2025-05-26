@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'Edit Translation';
    $readonly = "";
} else if ($action == 'add') {
    $title = 'Add Translation';
    $readonly = "";
} else if ($action == 'view') {
    $title = 'View Translation';
    $readonly = 'readonly';
} else {
    $title = 'Copy Translation';
    $readonly = "";
}
$path = route('admin.translations');
?>

<div class="col-lg-12">
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
    <form class="form-horizontal" role="form" action="{{ route('admin.translations.store')}}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
        <div class="translationCard">
            @include('admin.translation-add-card')
        </div>
        <div class="row mt-4">

            <div class="col-12 text-end">
                <button type="button" id="addMore" class="btn btn-info button-green b-shadow">Add More</button>
                <button type="submit" class="btn btn-primary button-green b-shadow">Save</button>
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

    $(document).on('click', '#addMore', function() {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.translations.addMore') }}",
            success: function(response) {
               $('.translationCard').append(response);
            }
        });
    });
</script>
@endsection