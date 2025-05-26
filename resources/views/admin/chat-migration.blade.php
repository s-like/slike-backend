@extends('layouts.admin')
@section('content')
<?php

$title = 'Chat Migration';
$readonly = "";

?>
<style>
    .panel-body {
        border-radius: 5px;
        padding-left: 20px;
        padding-bottom: 20px;
        padding-right: 20px;
        padding-top: 20px;
        margin-top: 20px;
        box-shadow: 0 0 5px 1px #a9a9a9;
    }

    .panel-title {
        position: absolute;
        background: white;
        margin-top: -30px;
        padding-left: 10px;
        font-weight: bold;
        padding-right: 10px;
        color: #000;
    }

    label.title {
        color: black;
        font-weight: 500;
        font-size: 15px;
    }

    .custom-btn {
        font-size: 13px;
        padding: 3px 8px 4px 8px;
    }

    .modal {
        margin-top: 50px;
    }

    .card {
        min-height: 450px;
        margin-top: 0px;
    }

    /* The container */
    .radio-container {
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding-left: 30px;
        position: relative;
        color: #000;
    }

    /* Hide the browser's default radio button */
    .radio-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;

    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 3px;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .radio-container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .radio-container input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .radio-container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .radio-container .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
</style>

<div class="row">
    <div class="col-md-3 pr-0">
        @include('includes.admin.settings')
    </div>
    <div class="col-md-9 pl-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card customers-profile">
                    <h3><?php echo $title; ?></h3>

                    <div class="card-body">
                        <!-- <div class="row"> -->

                        <!-- <div class="row"> -->

                        <div style="padding-top:20px"></div>
                        <div class="row">

                            <div class="col-lg-12 col-md-12 main-migration">
                                <?php if($migrated==0){ ?>
                                <button type="button" class="btn btn-primary migrate">Chat Migration</button>
                                <?php }else{ ?>
                                    <div class="alert alert-success">Chat Migrated.</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<img src="{{ asset('default/loading.gif') }}" class="loading"/>

<style type="text/css">
    .loading{
        position: absolute ;
        width: 100px;
        top: 45%;
        left: 49%;
        display:none;
    }
</style>
<script type="text/javascript">
    $(function() {
        $('.nav-link').on('click', function() {
            var val = $(this).attr("data-type");
            $('#setting_type').val(val);
        });
        $('.radio-container').on('click', function() {
            $('.s3_div').hide();
        });
        $('.s3_radio').on('click', function() {
            $('.s3_div').show();
        });
    });

    $(document).on('click','.migrate',function(){
        $(".migrate").attr("disabled", true);
        $(".loading").show();
        $.ajax({
						type: "GET",
						url: "{{ route('moveChatOldToNew') }}",
						dataType: "json",
						success: function(response) {
							if (response.status == true) {
								$(".main-migration").html("<div class='alert alert-success alert-block'>Migration Done Successfully!</div>");
                                $(".loading").hide();
							}
						}
					});
    });
</script>
@endsection