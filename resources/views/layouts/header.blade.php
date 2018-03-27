<header class="app-header navbar">
  <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="nav navbar-nav d-md-down-none">
    <li class="nav-item px-3">
      <a class="nav-link" href="{{ route('sample.minyak.input') }}">Input Sample Minyak</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="{{ route('sample.mie.input') }}">Input Sample Mie</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="{{ route('sample.minyak.hasil') }}">Hasil Sample Minyak</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="{{ route('sample.mie.hasil') }}">Hasil Sample Mie</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Set Shift</a>
    </li>
    {{-- <li class="nav-item px-3">
      <a class="nav-link" href="#">Report Sample Minyak</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Report Sample Mie</a>
    </li> --}}
  </ul>
  <ul class="nav navbar-nav ml-auto">
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
        <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Ubah Sandi</a>
      </div>
    </li>
  </ul>

</header>
