<!DOCTYPE html>
    <head>
    <title>Laravel Real Time Notification Tutorial With Example</title>
    <h1>Laravel Real Time Notification Tutorial With Example</h1>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
    Pusher.logToConsole = true;

var pusher = new Pusher('{{ config("app.pusher_app_key") }}', {
      cluster: '{{ config("app.pusher_app_cluster") }}',
      encrypted: true
    });



    var channel = pusher.subscribe('my-channel');
    channel.bind('pusher:subscription_succeeded', function(members) {
        // alert('successfully subscribed!');
    });
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
    </script>
    </head>
</html>