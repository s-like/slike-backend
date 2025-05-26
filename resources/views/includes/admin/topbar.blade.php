<div class="topbar">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6  col-6">
        <div class="top-right-liks">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><bi class="bi bi-house-fill"></bi> Dashboard</a></li>
              <?php if (isset($menu)) { ?>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ $menuUrl }}">{{ $menu }}</a></li>
              <?php } ?>
              <?php if (isset($submenu)) { ?>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ $submenuUrl }}">{{ $submenu }}</a></li>
              <?php } ?>
            </ol>
          </nav>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="top-right-liks pull-right">
          <!-- <ul>
            <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="bi bi-chat-text-fill"></i> </a></li>
            <li><a href="#"><i class="bi bi-bell-fill"></i></a></li>
            <li><a href="#"><i class="bi bi-slack"></i></a></li>
            <li><a href="#"><i class="bi bi-grid-fill"></i></a>
            </li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</div>