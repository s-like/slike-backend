@extends('layouts.admin')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<style>
    table.dataTable>tbody>tr:not(.no-padding)>td:last-child,
    table:not(.dataTable)>tbody>tr>td:last-child {
        width: auto;
    }

    .customers-profile h3 {
        border-bottom: none;
    }

    #notifications {
        cursor: pointer;
        position: fixed;
        right: 0px;
        z-index: 9999;
        top: 10px;
        margin-bottom: 22px;
        margin-right: 15px;
        max-width: 300px;
    }

    .loading {
        position: absolute;
        top: 50%;
        width: 50px;
        left: 46%;
    }
</style>
<?php
$path = route('admin.translations.create');
?>
<div class="col-lg-12">
    <div class="card customers-profile">

        <div id="notifications"></div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h3>Labels/Translations</h3>
            </div>
            <div class="col-lg-6 col-md-6 text-right">
                <a type="button" class="btn btn-primary button-green green-border" href="<?php echo $path ?>">Add New</a>
            </div>
            <hr />
        </div>

        <div class="contact-detail">

            <div>
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('admin.translations.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-9">
                                <input type="file" name="file" class="form-control" />
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('admin.translations.export') }}" class="btn btn-primary" >Export</a>
                    </div>
                    <div class="col-lg-12 col-md-12 mt-2">
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
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-8 text-end">Search</div>
                    <div class="col-md-2 col-4"><input type="text" class="form-control" name="search" id="search_val" /></div>
                    <div class="col-12 table-responsive">
                        @include('admin.translations-table')
                    </div>
                    <div class="mt-8">

                    </div>
                    <img class="loading" src="{{ asset('assets/images/loading.gif')}}" />
                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/Notify.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('.loading').hide();
    });
    $(document).on('click', '.remove_label', function(e) {
        var app_ver = "{{config('app.app_version')}}";
        if (app_ver == 'demo') {
            var route = "{{ route('admin.admin-app-version-warning') }}";
            window.location = route;
        }
        that = this;
        id = $(this).attr('data-id');
        e.preventDefault();
        if (confirm('Are you sure you want to delete ?')) {
            $.ajax({
                type: "post",
                url: "{{route('admin.translations.delete')}}",
                data: {
                    "id": id
                },
                success: function(data) {
                    if (data) {
                        $(that).parent().parent().hide();
                        Notify("Success! record deleted.", null, null, 'success');
                        // console.log('Updated');
                    }
                },
            });
        }
    });

    $(document).on('focusout', '.input_field', function() {
        var app_ver = "{{config('app.app_version')}}";
        if (app_ver == 'demo') {
            var route = "{{ route('admin.admin-app-version-warning') }}";
            window.location = route;
        }
        id = $(this).attr('data-id');
        type = $(this).attr('data-type');
        languageid = $(this).attr('data-languageid');
        labelid= $(this).attr('data-labelid');
        value = $(this).val();
        $.ajax({
            type: "post",
            url: "{{route('admin.translations.update')}}",
            data: {
                "id": id,
                "type": type,
                "value": value,
                "language_id":languageid,
                "label_id":labelid
            },
            success: function(data) {
                if (data) {
                    Notify("Success! record updated.", null, null, 'success');
                    // console.log('Updated');
                }
            },
        });

        return false;
    });

    $(document).on('keyup', '#search_val', function() {
        search_val = $(this).val();
        console.log(search_val.length);
        // if (search.length > 2) {
            $('.table-responsive').css("opacity", 0.5);
            $('.loading').show();
            $.ajax({
                type: "get",
                url: "{{route('admin.translations')}}",
                data: {
                    "search": search_val,
                    "ajax" : true
                },
                success: function(data) {
                    $('.table-responsive').html(data);
                    $('.table-responsive').css("opacity", 1);
                    $('.loading').hide();
                },
            });
        // }
    });
</script>
@endsection