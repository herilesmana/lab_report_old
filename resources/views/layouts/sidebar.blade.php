<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}"><i class="icon-speedometer"></i> Home</a>
      </li>

      <li class="nav-title">
        Transactions
      </li>
      <li class="nav-item">
        <a href="{{ URL::to('sample-minyak') }}" class="nav-link"><i class="icon-drop"></i> Sample Minyak</a>
      </li>
      <li class="nav-item">
        <a href="{{ URL::to('sample-mie') }}" class="nav-link"><i class="icon-pencil"></i> Sample Mie</a>
      </li>
      <li class="nav-item">
        <a href="{{ URL::to('set-shift') }}" class="nav-link"><i class="icon-pencil"></i> Set Shift</a>
      </li>
      <li class="nav-title">
        Reports
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('sample-minyak/report') }}"><i class="icon-pie-chart"></i> Sample Minyak</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('sample-mie/report') }}"><i class="icon-pie-chart"></i> Sample Mie</a>
      </li>
      <li class="nav-title">
        Masters
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('user') }}"><i class="icon-user"></i> User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('department') }}"><i class="icon-pie-chart"></i> Department</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('variant_product') }}"><i class="icon-pie-chart"></i> Variant Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('shift') }}"><i class="icon-pie-chart"></i> Shift</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('line') }}"><i class="icon-pie-chart"></i> Line</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('authorization.group') }}"><i class="icon-lock"></i> Otorisasi</a>
      </li>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
