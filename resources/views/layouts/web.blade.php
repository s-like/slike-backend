<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title><?php echo MyFunctions::getSiteTitle(); ?></title>
<?php $version=MyFunctions::getCurrentVersion(); ?>
    <style>
      body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    /* background-color: #B0BEC5;
    background-color:#f6f7f7; */
    background-repeat: no-repeat
    }

    .card0 {
        /* box-shadow: 0px 4px 8px 0px #757575; */
        box-shadow: 0px 0px 13px 0px #cac4c6;
        border-radius: 0px
    }

    .card2 {
        margin: 0px 40px;
        padding-top: 3rem!important;
    }

    .logo {
        /* width: 200px;
        height: 100px; */
        /* margin-top: 20px; */
        margin-top: 100px;
        /* margin-left: 35px */
    }

    .left-div{
        background-image: linear-gradient(to bottom right, #ec4a63, #7350c7);
        height: 100%;
    }
    .image {
        width: 360px;
        height: 280px
    }

    .border-line {
        border-right: 1px solid #EEEEEE
    }

    /* .facebook {
        background-color: #3b5998;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer;
        display:inline-block;
    } */
.facebook{
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    padding-left: 10px;
    padding-right: 10px;
    height: 35px;
    cursor: pointer;
}
    /* .twitter {
        background-color: #1DA1F2;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer;
        display:inline-block;
    } */
.twitter{
    background-color: #1DA1F2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    padding-left: 10px;
    padding-right: 10px;
    height: 35px;
    cursor: pointer;
  
}
    .linkedin {
        background-color: #2867B2;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .line {
        height: 1px;
        width: 45%;
        background-color: #E0E0E0;
        margin-top: 10px
    }

    .or {
        width: 10%;
        font-weight: bold
    }

    .text-sm {
        font-size: 14px !important
    }

    ::placeholder {
        color: #BDBDBD;
        opacity: 1;
        font-weight: 300
    }

    :-ms-input-placeholder {
        color: #BDBDBD;
        font-weight: 300
    }

    ::-ms-input-placeholder {
        color: #BDBDBD;
        font-weight: 300
    }

    input,
    textarea {
        padding: 10px 12px 10px 12px;
        border: 1px solid lightgrey;
        border-radius: 2px;
        margin-bottom: 5px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        color: #2C3E50;
        font-size: 14px;
        /* letter-spacing: 1px */
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #304FFE;
        outline-width: 0
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    a {
        color: inherit;
        cursor: pointer
    }

    .btn-blue {
        /* background-color: #1A237E; */
        /* background-color:#7350c7; */
        /* background: linear-gradient(to bottom right, #ec4a63, #7350c7); */
        width: 150px;
        color: #fff;
        border-radius: 2px;
        background: "{{MyFunctions::getTopbarColor()}}";
	border-color: transparent;
    }
 
    .btn-blue:hover {
        background-color: #ec4a63;
        cursor: pointer;
        color:#fff;

    }

    .bg-blue {
        color: #fff;
        /* background-color: #1A237E; */
        background: linear-gradient(to bottom right, #ec4a63, #7350c7);
    }
.bg-blue-bottom{
    padding:18px;
    /* margin-left:-15px;
    margin-top:1px; */
    text-align: right;
}
    @media screen and (max-width: 991px) {
        .logo {
            margin-left: 0px
        }

        .image {
            width: 300px;
            height: 220px
        }

        .border-line {
            border-right: none
        }

        .card2 {
            border-top: 1px solid #EEEEEE !important;
            margin: 0px;
            /* margin: 0px 15px */
        }
        .bg-blue-bottom{
            margin-left:0px;
        }
    }
    </style>
  </head>
  <body style="background-image:url({{ asset('assets/images/login-back6.jpg') }});background-repeat: repeat;">

      {{-- @yield('content') --}}
      <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <!-- <div class="card card0 border-0"> -->
            <div class="row d-flex">
                <!-- <div class="col-lg-6 " style="padding:0px">
                    <div class="card1 pb-5 left-div">
                        <div class="row"> 
                            <div class="col-md-12 text-center">
                                <img src="{{ asset('img') }}/w-logo.png" class="logo img-responsive"> 
                            </div>
                        </div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line"></div> {{-- <img src="" class="image"> </div> --}}
                    </div>
                </div> -->
                <!-- <div class="col-lg-4" ></div> -->
                <!-- <div class="col-lg-4" >
                <div class="card card0 border-0"> -->
                    @yield('content')
                    <!-- <br/>
                    <br/>
                    
                    <div class="bg-blue bg-blue-bottom">
                    
               Copyright &copy; {{ date('Y') }}. All rights reserved.
                 
            </div> -->
                <!-- </div>
            </div> -->
            <!-- <div class="bg-blue py-4">
                <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; {{ date('Y') }}. All rights reserved.</small>
                    <div class="social-contact ml-4 ml-sm-auto"> 
                        {{-- <span class="fa fa-facebook mr-4 text-sm"></span> 
                        <span class="fa fa-google-plus mr-4 text-sm"></span> 
                        <span class="fa fa-linkedin mr-4 text-sm"></span> 
                        <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>  --}}
                    </div>
                </div>
            </div> -->
        </div>
      </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="{{ asset('js/share.js?v=').$version }}"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });
    </script>
  </body>
</html>