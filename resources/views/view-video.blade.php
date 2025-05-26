<html>

<head>
    <title><?php echo $username; ?> • <?php echo $description; ?> • {{ config("app.webtitle") }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="video.other" />
    <!--<meta property="og:url" content="https://www.moooby.com" />-->
    <meta property="og:title" content="<?php echo $username; ?> • <?php echo $description; ?> • on Moooby  " />
    <meta property="og:description" content="<?php echo $title; ?>" />
    <!--<meta property="og:image" content="<?php echo secure_url('storage/videos/' . $user_id . '/thumb/' . $thumb); ?>" />-->
    <!--<meta property="og:image:secure" content="<?php echo secure_url('storage/videos/' . $user_id . '/thumb/' . $thumb); ?>" />-->
    <meta property="og:image" content="{{ asset(Storage::url('public/videos/'.$user_id. '/thumb/' . $thumb)) }}" />
    <meta property="og:image:secure" content="{{ asset(Storage::url('public/videos/'.$user_id. '/thumb/' . $thumb)) }}" />
     <meta property="og:video" content="{{ asset(Storage::url('public/videos/'.$user_id.'/'.$video)) }}" />
    <meta property="og:video:secure" content="{{ asset(Storage::url('public/videos/'.$user_id.'/'.$video)) }}" />
   

    <style>
        body {
            margin: 0px;
            font-family: sans-serif;
        }

        .top-header {
            background-color: #000;
            text-align: center;
            padding: 10px;
        }

        .card {
            width: 80%;
            background: #fff;
            margin: auto;
            box-shadow: 0px 0px 10px #ccc;
            border-radius: 5px;
        }

        .product-detail {
            background: #eaeaea;
            /* padding-top: 10px;
            padding-bottom: 10px; */
            width: 100%;
        }

        h4 {
            /* display: table-caption; */
        }

        p {
            margin: 10px;
        }

        .float-left {
            float: left;
        }

        .down {
            text-align: center;
            width: 100%;
            /*display: flex;*/
            margin-top: 10px;
        }

        .down img {
            width: 130px;
        }

        .overflow-ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        video {
            max-height: 500px;
        }
    </style>
</head>

<body>
@php
    $topbarColor=MyFunctions::getTopbarColor();
    @endphp
    <div class="container-fluid">
        <div class="row top-header" style="{{$topbarColor}}">
            <div class="col-12">
                <a href="{{ route('web.home') }}">
                    <img src="{{ asset('default/d-logo.png') }}" />
                </a>
            </div>
        </div>

        <div class="row">
            <br />
            <br />
            <div class="card">
                @if($user_dp!=null)

                <?php
                if ($user_dp != "") {
                    if (strpos($user_dp, 'facebook.com') !== false || strpos($user_dp, 'fbsbx.com') !== false || strpos($user_dp, 'googleusercontent.com') !== false) {
                        $u_dp = $user_dp;
                    } else {

                        $u_dp = asset(Storage::url('public/profile_pic') . '/' . $user_id . '/small/' . $user_dp);
                    }
                } else {
                    $u_dp = asset('default/default.png');
                }
                ?>

                <div class="product-detail float-left">
                    <div class="float-left" style="width:auto">
                        <div>
                            <img width="100" src="{{ $u_dp }}" />
                            &nbsp;
                        </div>

                    </div>

                    <div class="float-left" style="width:70%;display: contents;">

                        <h4 class="">{{ $username}}</h4>
                        <p class="">{{ $title}}</p>
                    </div>
                    <div class="float-left" style="width:100%;background: #f5f5f5;">
                        
                        <p class="">{{ $description}}</p>
                    </div>
                </div>
                @endif
                <br />
                <video width="100%" height="auto" controls>
                    <source src="{{ asset(Storage::url('public/videos/'.$user_id.'/'.$video)) }}" type="video/mp4">
                    
                </video>

                <div class="down">
                    <?php
                    if ($home_data->img1 != "") {
                        $img1 = asset(Storage::url('public/uploads/' . $home_data->img1));
                    } else {
                        $img1 = asset('default/google_play.png');
                    } ?>
                    <a href="<?php echo $home_data->img1_link; ?>" class="google ">
                        <img src="<?php echo $img1; ?>" alt="">
                    </a>

                    <?php
                    if ($home_data->img2 != "") {
                        $img2 = asset(Storage::url('public/uploads/' . $home_data->img2));
                    } else {
                        $img2 = asset('default/app_store.png');
                    } ?>
                    <a href="<?php echo $home_data->img2_link; ?>" class="app ">
                        <img src="<?php echo $img2; ?>" alt="">
                    </a>
                </div>
                <br />
            </div>
            <br />
            <br />
        </div>
    </div>
</body>

</html>