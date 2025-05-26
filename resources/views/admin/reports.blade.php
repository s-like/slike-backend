@extends('layouts.admin')
@section('content')
<?php
$path = route('admin.reports.index');
?>
<style>
    .video_play {
        font-size: 35px;
        position: absolute;
        left: 45%;
        top: 37%;
        color: #fff;
        border-radius: 50%;
    }

    #homeVideo button {
        position: absolute;
        right: 0px;
        z-index: 9999;
    }
</style>

<div class="col-lg-12">
    <div class="card customers-profile">

        <h3>Manage Reports</h3>

        <div class="contact-detail">
            <!-- <a href="javascript:void(0)" type="button" class="btn btn-primary button-green green-border" onclick='document.location.href="<?php echo $path . '/create/' ?>"'>Add New</a> -->
            <div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
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

                <div class="table-s">
                    <table id="data_table" class="table table-striped customer-table">
                        <thead>
                            <tr>
                                <th class="sorting">Report Type</th>
                                <th class="sorting">Video</th>
                                <th class="sorting">Report By</th>

                                <th class="sorting">Description</th>
                                <th class="sorting">Report On</th>
                                <th>Video Active</th>
                                <th>User Active</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- <div class="row margin-tp-bt-10">
                    <div class="col-lg-12 col-md-12">
                        <button id="deleteSel" class="btn btn-danger">Delete Selected</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>


<div class="modal fade " style="margin-top: 80px;" id="homeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="btn btn-default text-right" data-bs-dismiss="modal" onclick="pauseVid()">X</button>
            <div class="embed-responsive embed-responsive-16by9">
                <video id="thumbVideo" class="embed-responsive-item" controls="controls" poster="">
                    <source src="" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var table;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $(document).ready(function() {

        $(document).on("click", ".process", function() {
            $("#user_id_hidden").val($(this).attr("data-val"));
        });

        $('#deleteSel').click(function() {
            var app_ver = "{{config('app.app_version')}}";
            if (app_ver == 'demo') {
                var route = "{{ route('admin.admin-app-version-warning') }}";
                window.location = route;
            }
            var favorite = [];
            $.each($(".delete_box:checked"), function() {
                favorite.push($(this).attr('data-val'));
            });
            if (favorite != "") {
                if (confirm('Are you sure you want to delete ?')) {
                    var ids = favorite.join(",");
                    $.post('<?php echo $path; ?>/delete', 'ids=' + ids, function(data) {
                        window.location = '<?php echo $path; ?>';
                    });
                }
            } else {
                alert("Please select item to delete.")
            }
        });
        $(document).on('click', '.deleteSelSingle', function(e) {
            var app_ver = "{{config('app.app_version')}}";
            if (app_ver == 'demo') {
                var route = "{{ route('admin.admin-app-version-warning') }}";
                window.location = route;
            }
            e.preventDefault();
            if (confirm('Are you sure you want to delete ?')) {
                var favorite = [];
                favorite.push($(this).attr('data-val'));
                var ids = favorite.join(",");
                $.post('<?php echo $path; ?>/delete', 'ids=' + ids, function(data) {
                    window.location = '<?php echo $path; ?>';
                });
            }
        });
        table = $('#data_table').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo $path; ?>/server_processing",
                "type": "POST",
                // "data":{"type" : <?php //echo "'".$type."'"
                                    ?>}
            },
            "language": {
                "processing": "<img src='<?php echo url('') ?>/assets/images/loading.gif'>",
                "search": '<i class="fa fa-search"></i>',
                "searchPlaceholder": "Search",
                "paginate": {
                    "previous": '<i class="fa fa-angle-double-left"></i>',
                    "next": '<i class="fa fa-angle-double-right"></i>'
                }
            },
            "dom": '<"top"flp<"clear">>rt<"bottom"ip<"clear">>',
            "pageLength": <?php echo config('app.admin_records'); ?>,
            "lengthMenu": [
                [10, 20, 30, 50, 100, -1],
                [10, 20, 30, 50, 100, "All"]
            ],
            //Set column definition initialisation properties.
            // "columnDefs": [{
            //         "targets": [0, 1], //first column / numbering column
            //         "orderable": false, //set not orderable
            //     },
            //     {
            //         className: "actionss",
            //         "targets": [0]
            //     }, {
            //         className: "checkboxColumn",
            //         "targets": [1]
            //     }
            // ],
        });
        $("#remember_me").parent().find('th').removeClass('sorting').addClass('sorting_disabled');
        $("#remember_me").click(function() {
            $(".delete_box").prop('checked', $(this).prop('checked'));
        });
        $(".delete_box").change(function() {
            if (!$(this).prop("checked")) {
                $("#remember_me").prop("checked", false);
            }
        });
    });

    function start_loading() {
        $('#overlay').show();
    }

    function stop_loading() {
        $('#overlay').hide();
    }

    function showError(id, errMsg) {
        if ($.isArray(errMsg)) {
            var errHtml = "<ul>";
            $.each(errMsg, function(key, value) {
                errHtml += '<li>' + value + '</li>';
            });
            errHtml += '</ul>';
            $("#" + id).html(errHtml).show();
        } else {
            $('#' + id).html(errMsg).show();
        }
        setTimeout(function() {
            $("#" + id).html('').hide('slow');
        }, 5000);
    }

    function showSuccess(id, msg, modal_id) {
        $('#' + id).html(msg).show();
        setTimeout(function() {
            $("#" + id).html('').hide('slow');
            $('#' + modal_id).modal('hide');
        }, 5000);
    }

    $('#data_table').on('draw.dt', function() {
        $(".active_toggle").bootstrapToggle();
        $(".user_active_toggle").bootstrapToggle();
    });

    $(document).on('click', '.video_play', function() {
        $(this).siblings('.video_thumb').trigger("click");
    });
    $(document).on('click', '.video_thumb', function() {
        var url = $(this).attr('id');
        var vid = document.getElementById("thumbVideo");
        vid.src = url;
        // $('#thumbVideo').play();
        $("#thumbVideo")[0].autoplay = true;
    });


    $(document).on('change', '.active_toggle', function() {
        var app_ver = "{{config('app.app_version')}}";
        if (app_ver == 'demo') {
            var route = "{{ route('admin.admin-app-version-warning') }}";
            window.location = route;
        }
        var v_id = $(this).attr("data-id");

        if ($(this).prop("checked") == true) {
            var active = 1;
            var msg = "Active";

        } else {
            var active = 0;
            var msg = "Deactivate";
        }
        swal({
                title: "Are you sure?",
                text: "You want to " + msg + " this Video !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "{{route('admin.active_video')}}",
                        data: {
                            "active": active,
                            "id": v_id
                        },
                        error: function(xhr, status, error) {
                            alert(status);
                            alert(xhr.responseText);
                        },
                        success: function(data) {
                            swal({
                                // text: "Product added to Featured Listing ",
                                title: data,
                                button: "Close",
                                icon: "success",
                            });
                        },
                    });
                } else {
                    if ($(this).prop("checked") == true) {
                        $(this).prop("checked", false);
                        $(this).parent(".toggle").removeClass("on").removeClass("btn-success").addClass("off").addClass("btn-danger");

                    } else {
                        $(this).prop("checked", true);
                        $(this).parent(".toggle").removeClass("off").removeClass("btn-danger").addClass("on").addClass("btn-success");
                    }

                }
            });
    });

    $(document).on('change', '.user_active_toggle', function() {
        var app_ver = "{{config('app.app_version')}}";
        if (app_ver == 'demo') {
            var route = "{{ route('admin.admin-app-version-warning') }}";
            window.location = route;
        }
        var u_id = $(this).attr("data-id");

        if ($(this).prop("checked") == true) {
            var active = 1;
            var msg = "Active";

        } else {
            var active = 0;
            var msg = "Deactivate";
        }
        swal({
                title: "Are you sure?",
                text: "You want to " + msg + " this User !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "{{route('admin.active_user')}}",
                        data: {
                            "active": active,
                            "id": u_id
                        },
                        error: function(xhr, status, error) {
                            alert(status);
                            alert(xhr.responseText);
                        },
                        success: function(data) {
                            swal({
                                // text: "Product added to Featured Listing ",
                                title: data,
                                button: "Close",
                                icon: "success",
                            });
                        },
                    });
                } else {
                    if ($(this).prop("checked") == true) {
                        $(this).prop("checked", false);
                        $(this).parent(".toggle").removeClass("on").removeClass("btn-success").addClass("off").addClass("btn-danger");

                    } else {
                        $(this).prop("checked", true);
                        $(this).parent(".toggle").removeClass("off").removeClass("btn-danger").addClass("on").addClass("btn-success");
                    }

                }
            });
    });
</script>
@endsection