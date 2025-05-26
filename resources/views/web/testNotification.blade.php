@extends('layouts.web')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>
            </center>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('web.sendNotification') }}" method="POST" id="notifyForm">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" name="body"></textarea>
                          </div>
                        <button type="submit" class="btn btn-primary">Send Notification</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script>


    var firebaseConfig = {
        apiKey: "AIzaSyDeFvP6X8Twx8UnrFIrV5C2oZzMZ9Fc53U",
        authDomain: "slikeapp.firebaseapp.com",
        databaseURL: "https://slikeapp.firebaseio.com",
        projectId: "slikeapp",
        storageBucket: "slikeapp.appspot.com",
        messagingSenderId: "1020512047352",
        appId: "1:1020512047352:web:4657cb1afed7f12dcceb0d",
        measurementId: "G-NS5HP11S9H"
    };
    // measurementId: G-R1KQTR3JBN
      // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    // $('#notifyForm').on('submit', function(e) {
	// 		e.preventDefault();alert('abc');
	// 		form_data = $(this).serialize();
	// 		formUrl = $('#notifyForm').prop('action');alert(formUrl);
	// 		$.ajax({
	// 			url : formUrl,
	// 			type : 'POST',
	// 			datatype : 'json',
	// 			data : form_data,
	// 			success: function(data) {
	// 				if (data.success) {
	// 					$('#video_comment').val('');
	// 					$("#modal-comment-list").animate({ scrollTop: $('#modal-comment-list').prop("scrollHeight")}, 1000);
	// 					videoComments('insert');
	// 				}
	// 			},
	// 			error: function(data) {
	// 				if (data.status == 401) {
	// 					window.location.href = "{{ route('web.login') }}";
	// 				}
	// 			}
	// 		});
	// 	});

    function initFirebaseMessagingRegistration() {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    url: '{{ route("web.saveToken") }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        // alert(response.msg);
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });

            }).catch(function (err) {
                toastr.error('User Chat Token Error'+ err, null, {timeOut: 3000, positionClass: "toast-bottom-right"});
            });
     }  
    

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });

</script>
@endsection
