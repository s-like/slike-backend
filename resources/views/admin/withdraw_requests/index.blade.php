@extends('layouts.admin')
@section('content')
<?php
$path = url(config('app.admin_url')) . '/withdraw_requests';
?>

<div class="col-lg-12">
    <div class="card customers-profile">
        <h3 class="m-b-10">Manage Withdraw Requests</h3>
        <div class="contact-detail">
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

                <div class="table-s table-responsive">
                    <table id="data_table" class="table table-striped customer-table">
                        <thead>
                            <tr>
                                <th class="sorting">Payment Link</th>
                                <th class="sorting">UPI</th>
                                <th class="sorting">Username</th>
                                <th class="sorting">Payment Type</th>
                                
                                {{-- <th class="sorting">Acc Holder Name</th>
                                <th class="sorting">Bank Name</th>
                                <th class="sorting">Acc No</th>
                                <th class="sorting">IBAN</th>
                                <th class="sorting">IFSC Code</th>
                                <th class="sorting">Country</th>
                                <th class="sorting">City</th>
                                <th class="sorting">Address</th>
                                <th class="sorting">Postcode</th> --}}
                                
                                <th class="sorting">Coins</th>
                                <th class="sorting">Amount</th>
                                <th class="sorting">Status</th>
                                <th class="sorting">Created At</th>
                                <th class="sorting">Action</th>
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


<script type="text/javascript">
    var table;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $(document).ready(function() {

        $(document).on("click",".process", function() {          
            $("#user_id_hidden").val($(this).attr("data-val"));
        });

        $('#deleteSel').click(function(){
            var favorite = [];
            $.each($(".delete_box:checked"), function(){
                favorite.push($(this).attr('data-val'));
            });
            if(favorite != "") {
                if (confirm('Are you sure you want to delete ?')) {
                    var ids =favorite.join(",");
                    $.post('<?php echo $path;?>/delete','ids='+ids,function(data){
                        window.location = '<?php echo $path;?>';
                    });
                }
            } else {
                alert("Please select item to delete.")
            }
        });
        $(document).on('click','.deleteSelSingle',function(e){
            e.preventDefault();   
            if (confirm('Are you sure you want to delete ?')) {
                var favorite = [];
                favorite.push($(this).attr('data-val'));
                var ids =favorite.join(",");
                $.post('<?php echo $path;?>/delete','ids='+ids,function(data){
                    window.location = '<?php echo $path;?>';
                });
            }
        });
        table = $('#data_table').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo $path;?>/server_processing",
                    "type": "POST"
                },
                "language": {
                    "processing": "<img src='<?php echo url('')?>/assets/images/loading.gif'>",
                    "search": '<i class="fa fa-search"></i>',
                    "searchPlaceholder": "Search",
                    "paginate": {
                        "previous": '<i class="fa fa-angle-double-left"></i>',
                        "next": '<i class="fa fa-angle-double-right"></i>'
                    }
                },
                "dom": '<"top"flp<"clear">>rt<"bottom"ip<"clear">>',
                "pageLength": <?php echo config('app.admin_records'); ?>,
                "lengthMenu": [ [10,20,30,50,100,-1], [10,20,30,50,100,"All"] ],
                //Set column definition initialisation properties.
                "columnDefs": [
                { 
                    "targets": [ 8 ], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                { className: "actionss", "targets": [ 0 ] }, { className: "checkboxColumn", "targets": [ 1 ] }
                ],
            });
        $("#remember_me").parent().find('th').removeClass('sorting').addClass('sorting_disabled');
        $("#remember_me").click(function () {
            $(".delete_box").prop('checked', $(this).prop('checked'));
        });
        $(".delete_box").change(function(){
            if (!$(this).prop("checked")){
                $("#remember_me").prop("checked",false);
            }
        });
    });

        $(document).on('click','.paid',function(e){
            e.preventDefault();   
            if (confirm('Are you sure you want to Mark as Paid ?')) {
                var favorite = [];
                favorite.push($(this).attr('data-val'));
                var ids =favorite.join(",");
                $.post('<?php echo $path;?>/paid','ids='+ids,function(data){
                    window.location = '<?php echo $path;?>';
                });
            }
        });
</script>
@endsection