<header class="app-header navbar">
  <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="nav navbar-nav d-md-down-none">
    {{-- Cek apakah user memiliki akses ke menu ini --}}
    @if (in_array('create_sample_minyak', $permissions))
    <?php
    ?>
      <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('sample.minyak.create-page') }}">Create Sample Minyak</a>
      </li>
    @endif
    {{-- Cek apakah user memiliki akses ke menu ini --}}
    @if (in_array('create_sample_mie', $permissions))
      <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('sample.mie.create-page') }}">Create Sample Mie</a>
      </li>
    @endif
    {{-- Cek apakah user memiliki akses ke menu ini --}}
    @if (in_array('upload_hasil_sample_minyak', $permissions))
      <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('sample.minyak.upload-page') }}">Input Sample Minyak</a>
      </li>
    @endif
    {{-- Cek apakah user memiliki akses ke menu ini --}}
    @if (in_array('upload_hasil_sample_mie', $permissions))
      <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('sample.mie.upload-page') }}">Input Sample Mie</a>
      </li>
    @endif
    {{-- Cek apakah user memiliki akses ke menu ini --}}
    @if (in_array('upload_hasil_sample_mie', $permissions))
      <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('sample.mie.fc-upload-page') }}">Input FC</a>
      </li>
    @endif
    {{-- Cek apakah user memiliki akses ke menu ini --}}
    @if (in_array('hasil_sample_minyak', $permissions))
      <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('sample.minyak.hasil') }}">Hasil Sample Minyak</a>
      </li>
    @endif
    {{-- Cek apakah user memiliki akses ke menu ini --}}
    @if (in_array('hasil_sample_mie', $permissions))
      <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('sample.mie.hasil') }}">Hasil Sample Mie</a>
      </li>
    @endif
    {{-- Cek apakah user memiliki akses ke menu ini --}}
    @if (in_array('set_shift', $permissions))
      <li class="nav-item px-3">
        <a class="nav-link" href="{{ URL::to('set-shift') }}">Set Shift</a>
      </li>
    @endif
    {{-- Cek apakah user memiliki akses ke menu ini --}}
    @if (in_array('report_sample_minyak', $permissions))
      <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('sample.minyak.report') }}">Report Sample Minyak</a>
      </li>
    @endif
    {{-- Cek apakah user memiliki akses ke menu ini --}}
    @if (in_array('report_sample_mie', $permissions))
      <li class="nav-item px-3">
        <a class="nav-link" href="{{ route('sample.mie.report') }}">Report Sample Mie</a>
      </li>
    @endif
  </ul>
  <ul class="nav navbar-nav ml-auto">

    <li class="nav-item dropdown d-md-down-none" style="display: none">
      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="icon-bell"></i>
        <span class="badge badge-pill badge-danger">5</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
        <div class="dropdown-header text-center">
          <strong>You have 5 notifications</strong>
        </div>
        <a class="dropdown-item" href="#">
        <i class="icon-user-follow text-success"></i> New user registered</a>
        <a class="dropdown-item" href="#">
        <i class="icon-user-unfollow text-danger"></i> User deleted</a>
        <div class="dropdown-header text-center">
          <button class="btn btn-primary btn-sm" style="color: #fff">See All</button>
        </div>
      </div>
    </li>


    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->nik }} <img src="{{ asset('images/user-icon.png') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center">
          <strong>{{ Auth::user()->name }}</strong>
        </div>
        <form class="" action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Logout</button>
        </form>
        <div class="dropdown-header text-center">
          <strong>Settings</strong>
        </div>
        <a class="dropdown-item" href="{{ URL::to('user') }}/{{ Auth::user()->nik }}/edit"><i class="fa fa-lock"></i> Change Profile</a>
      </div>
    </li>
  </ul>

</header>
