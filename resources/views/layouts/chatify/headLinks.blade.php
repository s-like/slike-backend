{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="route" content="{{ $route }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('') }}" data-user="{{ Auth::user()->user_id }}">
<?php $version=MyFunctions::getCurrentVersion(); ?>
{{-- scripts --}}
<script src="{{ asset('chatify/js/font.awesome.min.js?v=').$version }}"></script>
<script src="{{ asset('chatify/js/autosize.js?v=').$version }}"></script>
<!-- <script src="{{ asset('chatify/js/app.js') }}"></script> -->
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('chatify/css/style.css?v=').$version }}" rel="stylesheet" />
<link href="{{ asset('chatify/css/'.$dark_mode.'.mode.css?v=').$version }}" rel="stylesheet" />
<!-- <link href="{{ asset('chatify/css/app.css') }}" rel="stylesheet" /> -->

{{-- Messenger Color Style--}}
@include('layouts.chatify.messengerColor')