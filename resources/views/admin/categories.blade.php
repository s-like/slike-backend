@extends('layouts.admin')
@section('content')
<?php
$path = url(config('app.admin_url')) . '/categories';
?>
<div class="col-lg-12">
    <div class="card customers-profile">
        <h3>Categories Management</h3>
        <div class="contact-detail">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <button id="deleteSel" class="btn btn-danger btn-shadow">Delete Selected</button>
                </div>
                <div class="col-lg-6 col-md-6">
                    <a href="javascript:void(0)" type="button" class="float-end btn btn-primary button-green green-border" onclick='document.location.href="<?php echo $path . '/create/' ?>"'>New Category</a>
                </div>
            </div>
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
                                <th width="5%" class="h_check">
                                    <input type="checkbox" id="remember_me" name="key_m[]" class="red-check" />
                                </th>
                                <th class="sorting">Category</th>
                                <th class="sorting">Rank</th>
                                <th class="sorting">Parent</th>
                                <th width="13%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <br />
                </div>
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
            "dom": 'lBfrtip',
            "pageLength": <?php echo config('app.admin_records'); ?>,
            "lengthMenu": [
                [10, 20, 30, 50, 100, -1],
                [10, 20, 30, 50, 100, "All"]
            ],
            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [0, 4], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                {
                    className: "actionss",
                    "targets": [4]
                }, {
                    className: "checkboxColumn",
                    "targets": [0]
                }
            ],
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
</script>
@endsection