<!-- mob menu -->

<div class="topnav d-lg-none">
    <a href="#home" class="active text-center"><img class="img-fluid" src="{{ MyFunctions::getLogo() }}" width="130px"></a>
    <div id="myLinks">
        <nav class="sidebar py-2 mb-4">
            <ul class="nav flex-column" id="nav_accordion">
                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="<?php echo (Route::currentRouteName()=='admin.dashboard') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-house-fill"></i> Dashbroard</a></li>
                <li class="nav-item"><a href="{{ route('admin.categories.index')}}" class=" nav-link"><i class="bi bi-list-ul"></i> Categories</a></li>
                <li class="nav-item"><a href="{{ route('admin.sounds.index')}}" class=" nav-link"><i class="bi bi-music-note-list"></i> Sounds</a></li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"><i class="bi bi-people-fill"></i> Users <i class="fa fa-caret-down float-lg-end"></i></a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('admin.candidates.index')}}/1"><i class="fa fa-angle-right" aria-hidden="true"></i> Active</a></li>
                        <li><a class="nav-link" href="{{ route('admin.candidates.index')}}/0"><i class="fa fa-angle-right" aria-hidden="true"></i> Deactivate</a></li>

                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"><i class="bi bi-bookmark-fill"></i> Verification <i class="fa fa-caret-down float-lg-end"></i></a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('admin.user-verify.index', ['type'=>'A'])}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Verified</a></li>
                        <li><a class="nav-link" href="{{ route('admin.user-verify.index', ['type'=>'P'])}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Pending</a></li>
                        <li><a class="nav-link" href="{{ route('admin.user-verify.index', ['type'=>'R'])}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Rejected</a></li>

                    </ul>
                </li>
                
                <li class="nav-item"><a href="{{ route('admin.videos.index')}}" class=" nav-link"><i class="bi bi-camera-video-fill"></i> Videos</a></li>
                <li class="nav-item"><a href="{{ route('admin.flagvideos.index')}}" class=" nav-link"><i class="bi bi-camera-video-fill"></i> Flaged Videos</a></li>
                <li class="nav-item"><a href="{{ route('admin.tags.index')}}" class=" nav-link"><i class="bi bi-tags-fill"></i> Tags</a></li>
                <li class="nav-item"><a href="{{ route('admin.reports.index')}}" class=" nav-link"><i class="bi bi-layout-text-sidebar-reverse"></i> Reports</a></li>
                <li class="nav-item"><a href="{{ route('admin.gifts.index')}}" class=" nav-link"><i class="bi bi-gift"></i> Gifts</a></li>
                <li class="nav-item"><a href="{{ route('admin.payment_history.index')}}" class=" nav-link"><i class="bi bi-gift"></i> Payment History</a></li>
                <li class="nav-item"><a href="{{ route('admin.send-coins.index')}}" class=" nav-link"><i class="bi bi-wallet"></i> Coins History</a></li>
                <li class="nav-item"><a href="{{ route('admin.withdraw_requests.index')}}" class=" nav-link"><i class="bi bi-wallet"></i> Withdraw Requests</a></li>
                <li class="nav-item"><a href="{{ route('admin.settings')}}" class=" nav-link"><i class="bi bi-gear-fill"></i> Settings</a></li>
                <li class="nav-item"><a href="{{ route('admin.app_config_settings')}}" class=" nav-link"><i class="bi bi-gear-wide-connected"></i> App Theme Settings</a></li>
                <li class="nav-item"><a href="{{ route('admin.pages.index')}}" class=" nav-link"><i class="bi bi-pencil-square"></i> Pages</a></li>
                <li class="nav-item"><a href="{{ route('admin.sponsors.index')}}" class=" nav-link"><i class="bi bi-people-fill"></i> Sponsors</a></li>
                <!-- <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"><i class="bi bi-check2-circle"></i> Translations <i class="fa fa-caret-down float-lg-end"></i></a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('admin.languages.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Languages</a></li>
                        <li><a class="nav-link" href="{{ route('admin.translations')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Labels/Translations</a></li>
                    </ul>
                </li> -->
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"><i class="bi bi-check2-circle"></i> Engagement <i class="fa fa-caret-down float-lg-end"></i></a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('admin.comments.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Comments</a></li>
                        <li><a class="nav-link" href="{{ route('admin.chats.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Chat</a></li>
                        <li><a class="nav-link" href="{{ route('admin.likes.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Likes</a></li>

                    </ul>
                </li>
                <li class="nav-item"><a href="{{ route('admin.logout') }}" class="active-links nav-link"><i class="bi bi-house-fill"></i> Logout</a></li>

            </ul>
        </nav>
    </div>
</div>


<!-- menu -->
<div class="col-xxl-2 col-xl-2 col-lg-3 menu-main d-none d-lg-block pe-0">

    <div class="logo">
        <a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ MyFunctions::getLogo() }}" width="130px"></a>
    </div>
    <nav class="sidebar py-2 mb-4">
        <ul class="nav flex-column" id="nav_accordion">
            <li class="nav-item"><a href="{{ route('admin.dashboard')}}" class="<?php echo (Route::currentRouteName()=='admin.dashboard') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-house-fill"></i> Dashbroard</a></li>
            <li class="nav-item"><a href="{{ route('admin.categories.index')}}" class="<?php echo (Route::currentRouteName()=='admin.categories.index') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-list-ul"></i> Categories</a></li>
            <li class="nav-item"><a href="{{ route('admin.sounds.index')}}" class="<?php echo (Route::currentRouteName()=='admin.sounds.index') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-music-note-list"></i> Sounds</a></li>
            <li class="nav-item has-submenu">
                <a class="<?php echo (Route::currentRouteName()=='admin.candidates.show') ? 'active-links' : ''; ?> nav-link" href="#"><i class="bi bi-people-fill"></i> Users <i class="fa fa-caret-down float-lg-end"></i></a>
                <ul class="submenu collapse <?php echo (Route::currentRouteName()=='admin.candidates.show') ? 'show' : ''; ?>">
                    <li><a class="nav-link <?php echo ((Route::currentRouteName()=='admin.candidates.show') && (Request::getPathInfo()=='/admin/candidates/1')) ? 'active' : ''; ?> " href="{{ route('admin.candidates.index')}}/1"><i class="fa fa-angle-right" aria-hidden="true"></i> Active</a></li>
                    <li><a class="nav-link <?php echo ((Route::currentRouteName()=='admin.candidates.show') && (Request::getPathInfo()=='/admin/candidates/0')) ? 'active' : ''; ?>" href="{{ route('admin.candidates.index')}}/0"><i class="fa fa-angle-right" aria-hidden="true"></i> Deactivate</a></li>

                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="<?php echo (Route::currentRouteName()=='admin.user-verify.index') ? 'active-links' : ''; ?> nav-link" href="#"><i class="fa fa-check-circle"></i> Verification <i class="fa fa-caret-down float-lg-end"></i></a>
                <ul class="submenu collapse <?php echo (Route::currentRouteName()=='admin.user-verify.index') ? 'show' : ''; ?>">
                    <li><a class="nav-link <?php echo ((Route::currentRouteName()=='admin.user-verify.index') && Request::query()['type']=='A') ? 'active' : ''; ?>" href="{{ route('admin.user-verify.index', ['type'=>'A'])}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Verified</a></li>
                    <li><a class="nav-link <?php echo ((Route::currentRouteName()=='admin.user-verify.index') && Request::query()['type']=='P') ? 'active' : ''; ?>" href="{{ route('admin.user-verify.index', ['type'=>'P'])}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Pending</a></li>
                    <li><a class="nav-link <?php echo ((Route::currentRouteName()=='admin.user-verify.index') && Request::query()['type']=='R') ? 'active' : ''; ?>" href="{{ route('admin.user-verify.index', ['type'=>'R'])}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Rejected</a></li>

                </ul>
            </li>
            <li class="nav-item"><a href="{{ route('admin.videos.index')}}" class="<?php echo (Route::currentRouteName()=='admin.videos.index') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-camera-video-fill"></i> Videos</a></li>
            <li class="nav-item"><a href="{{ route('admin.flagvideos.index')}}" class="<?php echo (Route::currentRouteName()=='admin.flagvideos.index') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-camera-video-fill"></i> Flaged Videos</a></li>
            <li class="nav-item"><a href="{{ route('admin.tags.index')}}" class="<?php echo (Route::currentRouteName()=='admin.tags.index') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-tags-fill"></i> Tags</a></li>
            <li class="nav-item"><a href="{{ route('admin.reports.index')}}" class="<?php echo (Route::currentRouteName()=='admin.reports.index') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-layout-text-sidebar-reverse"></i> Reports</a></li>
            <li class="nav-item"><a href="{{ route('admin.gifts.index')}}" class="<?php echo (Route::currentRouteName()=='admin.gifts.index') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-gift"></i> Gifts</a></li>
            <li class="nav-item"><a href="{{ route('admin.payment_history.index')}}" class=" nav-link"><i class="bi bi-gift"></i> Payment History</a></li>
            <li class="nav-item"><a href="{{ route('admin.send-coins.index')}}" class=" nav-link"><i class="bi bi-wallet"></i> Coins History</a></li>
            <li class="nav-item"><a href="{{ route('admin.withdraw_requests.index')}}" class=" nav-link"><i class="bi bi-wallet"></i> Withdraw Requests</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings')}}" class="<?php echo (Route::currentRouteName()=='admin.settings') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-gear-fill"></i> Settings</a></li>
            <li class="nav-item"><a href="{{ route('admin.app_config_settings')}}" class="<?php echo (Route::currentRouteName()=='admin.app_config_settings') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-gear-wide-connected"></i> App Theme Settings</a></li>
            <li class="nav-item"><a href="{{ route('admin.pages.index')}}" class="<?php echo (Route::currentRouteName()=='admin.pages.index') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-pencil-square"></i> Pages</a></li>
            <li class="nav-item"><a href="{{ route('admin.sponsors.index')}}" class="<?php echo (Route::currentRouteName()=='admin.sponsors.index') ? 'active-links' : ''; ?> nav-link"><i class="bi bi-people-fill"></i> Sponsors</a></li>
            <!-- <li class="nav-item has-submenu">
                <a class="<?php echo (Route::currentRouteName()=='admin.languages.index' ||  Route::currentRouteName()=='admin.translations') ? 'active-links' : ''; ?> nav-link" href="#"><i class="bi bi-bookmark-fill"></i> Translations <i class="fa fa-caret-down float-lg-end"></i></a>
                <ul class="submenu collapse <?php echo (Route::currentRouteName()=='admin.languages.index' || Route::currentRouteName()=='admin.translations') ? 'show' : ''; ?>">
                    <li><a class="nav-link <?php echo (Route::currentRouteName()=='admin.languages.index') ? 'active': ''; ?>" href="{{ route('admin.languages.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Languages</a></li>
                    <li><a class="nav-link <?php echo (Route::currentRouteName()=='admin.translations') ? 'active' : ''; ?>" href="{{ route('admin.translations')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Labels/Translations</a></li>

                </ul>
            </li> -->
            <li class="nav-item has-submenu">
                <a class="<?php echo (Route::currentRouteName()=='admin.comments.index' || Route::currentRouteName()=='admin.chats.index' || Route::currentRouteName()=='admin.likes.index') ? 'active-links' : ''; ?> nav-link" href="#"><i class="bi bi-bookmark-fill"></i> Engagement <i class="fa fa-caret-down float-lg-end"></i></a>
                <ul class="submenu collapse <?php echo (Route::currentRouteName()=='admin.comments.index' || Route::currentRouteName()=='admin.chats.index' || Route::currentRouteName()=='admin.likes.index') ? 'show' : ''; ?>">
                    <li><a class="nav-link <?php echo (Route::currentRouteName()=='admin.comments.index') ? 'active': ''; ?>" href="{{ route('admin.comments.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Comments</a></li>
                    <li><a class="nav-link <?php echo (Route::currentRouteName()=='admin.chats.index') ? 'active' : ''; ?>" href="{{ route('admin.chats.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Chat</a></li>
                    <li><a class="nav-link <?php echo (Route::currentRouteName()=='admin.likes.index') ? 'active' : ''; ?>" href="{{ route('admin.likes.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Likes</a></li>

                </ul>
            </li>
            <li class="nav-item"><a href="{{ route('admin.logout') }}" class=" nav-link"><i class="bi bi-house-fill"></i> Logout</a></li>

        </ul>
    </nav>
</div>