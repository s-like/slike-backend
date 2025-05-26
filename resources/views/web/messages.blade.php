@extends('layouts.front')

@section('content')
@include('includes.topbar')
@include('layouts.messages.headLinks')
<div class="container message-container">
    <div class="row message-row">
        <div class="col-4 left-message-bar">
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
                
            </div>
        </div>
        <div class="col-8">
            <div class="row ">
          

            </div>
        </div>

        @include('layouts.messages.footerLinks')
        @endsection