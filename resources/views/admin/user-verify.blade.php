@extends('layouts.admin')
@section('content')
<?php
$path = route('admin.user-verify.index');
// $path = url(config('app.admin_url')).'/user-verify/'.$type;

?>
<div class="col-lg-12">
    <div class="card customers-profile">
        @if ($type=='P')
        <h3>Pending Verifications</h3>
        @elseif($type=='R')
        <h3>Rejected Verifications</h3>
        @else
        <h3>Accepted Verifications</h3>
        @endif
        <div class="contact-detail">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <button id="deleteSel" class="btn btn-danger">Delete Selected</button>
                </div>
            </div>
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
                                
                                <th width="5%" class="h_check">
                                    <input type="checkbox" id="remember_me" name="key_m[]" class="red-check" />
                                </th>
                                <th class="sorting">Name</th>
                                <th class="sorting">Address</th>
                                <th class="sorting">Id Proof 1</th>
                                <th class="sorting">Id Proof 2</th>
                                <th></th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- img modal -->
<div class="modal fade " style="margin-top: 80px;" id="idProof" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="btn btn-default text-right" data-bs-dismiss="modal">X</button>
            <div class="">
                <!-- <video id="thumbVideo" class="embed-responsive-item" controls="controls" poster="">
          <source src="" type="video/mp4"> 
        </video> -->
                <img src="" id="thumbImg" class="img-responsive">
            </div>
        </div>
    </div>
</div>

<!-- reject modal -->

<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason For Rejection</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="rejectionForm" method="post">
                <div class="modal-body">
                    <input type="hidden" name="user_verify_id" class="form-control" id="user_verify_id">
                    <input type="hidden" name="type" class="form-control" value="<?php echo $type; ?>">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Reason:</label>
                        <textarea class="form-control" name="reason" id="message-text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    #rejectModal {
        margin-top: 100px;
    }

    #message-text {
        visibility: visible !important;
    }
</style>
<script type="text/javascript">
    var table;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('#rejectModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #user_verify_id').val(id)
    });

    $("#rejectionForm").on("submit", function(event) {
        event.preventDefault();
        console.log($(this).serialize());
        var url = '<?php echo $path; ?>' + '/reject';
        $.post(url, $(this).serialize(), function(data) {
            $('#rejectModal').modal('hide');
            window.location = '<?php echo $path; ?>' + '?type=' + '<?php echo $type; ?>';
        });

    });

    $(function() {
        tinyMCE.remove('#message-text');
    });
    $(document).ready(function() {

        $(document).on("click", ".process", function() {
            $("#user_id_hidden").val($(this).attr("data-val"));
        });

        $('#deleteSel').click(function() {
            var favorite = [];
            $.each($(".delete_box:checked"), function() {
                favorite.push($(this).attr('data-val'));
            });
            if (favorite != "") {
                if (confirm('Are you sure you want to delete ?')) {
                    var ids = favorite.join(",");
                    $.post('<?php echo $path; ?>/delete', 'ids=' + ids, function(data) {
                        window.location = '<?php echo $path; ?>' + '?type=' + '<?php echo $type; ?>';
                    });
                }
            } else {
                alert("Please select item to delete.")
            }
        });
        $(document).on('click', '.deleteSelSingle', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete ?')) {
                var favorite = [];
                favorite.push($(this).attr('data-val'));
                var ids = favorite.join(",");
                $.post('<?php echo $path; ?>/delete', 'ids=' + ids, function(data) {
                    window.location = '<?php echo $path; ?>' + '?type=' + '<?php echo $type; ?>';
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
                "data": {
                    "type": '<?php echo $type ?>'
                }
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
            "columnDefs": [{
                    "targets": [0, 5], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                {
                    className: "actionss",
                    "targets": [5]
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
    $(document).on('click', '.img_thumb', function() {
        var url = $(this).attr('id');
        $("#thumbImg").attr("src", url);
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