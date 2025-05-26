@foreach($data as $con)
<div class="row m-0"> 
    <div class="chk-box col-1">
        <input type="checkbox" class="edit-convo-id" data-val="{{$con->chat_id}}"/>
    </div>
@if($con->type==1)
<div class="message-card col-11" data-id="1">
    <p>{{$con->msg}}
        <sub title="2025-10-12 06:52:24">{{ \Carbon\Carbon::parse($con->created_at)->diffForHumans() }}</sub>

    </p>
    <!-- <div class="chk-box">
        <input type="checkbox" class="edit-convo-id" data-val="{{$con->chat_id}}"/>
    </div> -->
</div>
@else
<div class="message-card mc-sender col-11" data-id="2">
    <!-- <div class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
            <svg class="svg-inline--fa fa-ellipsis-v fa-w-6 delete-dots" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="ellipsis-v" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                <path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"></path>
            </svg></a>
        <div class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <a href="#" class="delete-single-msg" data-id="2">Delete</a>
        </div>
    </div> -->
   
    <p>{{$con->msg}}
        <sub title="2025-10-20 07:00:58" class="message-time">
            <svg class="svg-inline--fa fa-check fa-w-16 seen" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
            </svg> 
            <!-- <span class="fas fa-check seen"></span> Font Awesome fontawesome.com --> 
            {{ \Carbon\Carbon::parse($con->created_at)->diffForHumans() }}
        </sub>

        <!-- <i class="fa fa-ellipsis-v delete-dots "></i> -->

    </p>
    
</div>
@endif
</div>
@endforeach