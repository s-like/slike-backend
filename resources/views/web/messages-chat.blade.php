@extends('layouts.front')

@section('content')
@include('includes.topbar')
@include('layouts.messages.headLinks')
<div class="container message-container">
    <div class="row message-row">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 left-message-bar">
            <ul class="nav nav-pills my-3 row" id="pills-tab" role="tablist">
                <li class="nav-item col-6 text-center">
                    <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Chats</a>
                </li>
                <li class="nav-item col-6 text-center">
                    <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">People</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                @include('layouts.messages.leftMessageBar')
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">.sssssssssssss..</div>
            </div>
        </div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
            <div class="row ">
                <div class="col-12 messenger-messagingView">
                    <div class="m-header m-header-messaging my-2">
                        <nav>

                            <div style="display: inline-flex;">
                                <!-- <a href="#" class="show-listView"><svg class="svg-inline--fa fa-arrow-left fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path>
                                    </svg> -->
                                <!-- <i class="fa fa-arrow-left"></i> Font Awesome fontawesome.com -->
                                <!-- </a> -->
                                <div class="avatar av-s header-avatar" style="margin: -5px 10px; background-image: url('{{ $user->user_dp }}');">
                                </div>
                                <a href="#" class="user-name">{{$user->fname.' '.$user->lname}}</a>
                            </div>

                            <nav class="m-header-right">
                                <div class="selected-delete">Delete Selected</div>  &nbsp; &nbsp; 
                                <div class="dropdown dropleft" style="margin:auto">
                                    <a class="" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="false" href="#">
                                        <svg class="svg-inline--fa fa-ellipsis-v fa-w-6 delete-dots" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="ellipsis-v" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"></path>
                                        </svg></a>
                                    <div class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                        <a href="#" class="edit-msgs dropdown-item" data-id="{{$id}}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="delete-convo dropdown-item" id="{{$id}}"><i class="fa fa-trash"></i> Delete Conversation</a>
                                    </div>
                                </div>

                                
                                <!--  <a href="#" class="add-to-favorite" style="display: inline;"><svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                    </svg> -->
                                <!-- <i class="fas fa-star"></i> Font Awesome fontawesome.com -->
                                <!-- </a>
                                <a href="http://slikewebpanel.local"><svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                                    </svg> -->
                                <!-- <i class="fas fa-home"></i> Font Awesome fontawesome.com -->
                                <!-- </a>
                                <a href="#" class="show-infoSide"><svg class="svg-inline--fa fa-info-circle fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                                    </svg> -->
                                <!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com -->
                                <!-- </a>-->
                            </nav>
                        </nav>
                    </div>

                    <div class="col-12">
                        <div class="" style="opacity: 1;">
                            <img src="{{ asset('default/loading.gif') }}" class="loading" width="50px" />
                            <div class="messages m-body app-scroll" id="message-{{$id}}">
                                <?php //dd($data); 
                                ?>
                                @include('layouts.messages.message',$data)



                            </div>

                            <div class="typing-indicator ">
                                <div class="message-card typing">
                                    <p>
                                    <div class="snippet typing-dots" data-title=".dot-flashing">
                                        <div class="stage">
                                            <div class="dot-flashing"></div>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>

                            <style>
                                .m-send {
                                    padding-left: 15px;
                                }
                            </style>
                            <div class="messenger-sendCard" style="display: block;">
                                <form id="message-form" method="POST" action="{{ route('web.messages.store',$id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <!-- <input type="hidden" name="_token" value="fXCG6nmbvAZkmga6VkkIV1mjPSHx9UBh4ztSNlEj"> -->
                                    <!-- <label><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip" /></label> -->
                                    <input type="hidden" name="to_user" value="{{$user->user_id}}" />
                                    <textarea name="msg" class="m-send app-scroll message-input" placeholder="Type a message.." style="height: 42px;"></textarea>
                                    <button id="msg-submit"><svg class="svg-inline--fa fa-paper-plane fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path>
                                        </svg><!-- <span class="fas fa-paper-plane"></span> Font Awesome fontawesome.com --></button>
                                </form>
                            </div>
                            <input type="hidden" id="conversation_id" value="{{$id}}" />
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('layouts.messages.footerLinks')
        @endsection