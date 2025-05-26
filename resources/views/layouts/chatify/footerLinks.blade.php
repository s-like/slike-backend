<!-- <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;
  var pusher = new Pusher("{{ config('chatify.pusher.key') }}", {
    encrypted: true,
    cluster: "{{ config('chatify.pusher.options.cluster') }}",
    authEndpoint: '{{route("web.pusher.auth")}}',
    auth: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
  });
</script> -->
<?php $version=MyFunctions::getCurrentVersion(); ?>
<script src="{{ asset('js/jquery-2.2.3.min.js?v=').$version }}"></script>
<script src="{{ asset('chatify/js/script.js?v=').$version }}"></script>
<script src="{{ asset('js/socket.io.js?v=').$version }}"></script>
<!-- <script src="{{ asset('js/chatify/code.js') }}"></script> -->
<script>
  // Messenger global variable - 0 by default
  messenger = "{{ @$id }}";
</script>