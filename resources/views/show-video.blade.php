<html>
    <head>

    <title><?php echo $username; ?> • <?php echo $description; ?> • {{ config("app.web_title") }}</title>
        <meta property="og:type" content="video.other" />
        <meta property="og:title" content="<?php echo $username; ?> • <?php echo $description; ?> • {{ config('app.web_title') }}  " />
        <meta property="og:description" content="<?php echo $title; ?>"/>

        <!--<meta property="og:image" content="<?php echo secure_url('storage/videos/'.$user_id.'/thumb/'.$thumb); ?>" />-->
        <!--<meta property="og:image:secure" content="<?php echo secure_url('storage/videos/'.$user_id.'/thumb/'.$thumb); ?>" />-->
    
        <meta property="og:image" content="{{ asset(Storage::url('public/videos/'.$user_id. '/thumb/' . $thumb)) }}" />
        <meta property="og:image:secure" content="{{ asset(Storage::url('public/videos/'.$user_id. '/thumb/' . $thumb)) }}" />
        <meta property="og:video" content="{{ asset(Storage::url('public/videos/'.$user_id.'/'.$video)) }}" />
        <meta property="og:video:secure" content="{{ asset(Storage::url('public/videos/'.$user_id.'/'.$video)) }}" />
  
    </head>
    <body>
       
    </body>

    <script>
       window.location='{{route('openmyapp',['id'=>$id])}}';
    </script>
</html>