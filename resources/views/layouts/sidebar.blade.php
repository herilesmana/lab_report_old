<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}"><i class="icon-speedometer"></i> Home</a>
      </li>
      {{-- Cek apakah user memiliki akses ke menu ini --}}
      @if (in_array('create_sample_minyak', $permissions) || in_array('create_sample_mie', $permissions))
      <li class="nav-title">
        Create Sample
      </li>
      @endif
      {{-- Cek apakah user memiliki akses ke menu ini --}}
      @if (in_array('create_sample_minyak', $permissions))
      <li class="nav-item">
        <a href="{{ route('sample.minyak.create-page') }}" class="nav-link"><i class="icon-drop"></i> Sample Minyak</a>
      </li>
      @endif
      {{-- Cek apakah user memiliki akses ke menu ini --}}
      @if (in_array('create_sample_mie', $permissions))
      <li class="nav-item">
        <a href="{{ route('sample.minyak.create-page') }}" class="nav-link"><i class="icon-drop"></i> Sample Mie</a>
      </li>
      @endif
      @if (in_array('upload_hasil_sample_minyak', $permissions) || in_array('upload_hasil_sample_mie', $permissions))
      <li class="nav-title">
        Upload Sample
      </li>
      @endif
      {{-- Cek apakah user memiliki akses ke menu ini --}}
      @if (in_array('upload_hasil_sample_minyak', $permissions))
      <li class="nav-item">
        <a href="{{ route('sample.minyak.upload-page') }}" class="nav-link"><i class="icon-drop"></i>Sample Minyak</a>
      </li>
      @endif
      {{-- Cek apakah user memiliki akses ke menu ini --}}
      @if (in_array('upload_hasil_sample_mie', $permissions))
      <li class="nav-item">
        <a href="{{ route('sample.mie.upload-page') }}" class="nav-link"><i class="icon-drop"></i>Sample Mie</a>
      </li>
      @endif
      {{-- Cek apakah user memiliki akses ke menu ini --}}
      @if (in_array('upload_hasil_sample_mie', $permissions))
      <li class="nav-item">
        <a href="{{ route('sample.mie.fc-upload-page') }}" class="nav-link"><i class="icon-drop"></i>fc</a>
      </li>
      @endif
      {{-- Cek apakah user memiliki akses ke menu ini --}}
      @if (in_array('set_shift', $permissions))
      <li class="nav-title">
        Shift
      </li>
      <li class="nav-item">
        <a href="{{ URL::to('set-shift') }}" class="nav-link"><i class="icon-pencil"></i> Set Shift</a>
      </li>
      @endif
      @if (in_array('report_sample_minyak', $permissions) || in_array('report_sample_mie', $permissions))
      <li class="nav-title">
        Reports
      </li>
      @endif
      @if (in_array('report_sample_minyak', $permissions))
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('sample-minyak/report-sample') }}"><i class="icon-pie-chart"></i> Sample Minyak</a>
      </li>
      @endif
      @if (in_array('report_sample_mie', $permissions))
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('sample-mie/report-sample') }}"><i class="icon-pie-chart"></i> Sample Mie</a>
      </li>
      @endif
      <li class="nav-title">
        Masters
      </li>
      @if (in_array('master_user', $permissions))
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('user') }}"><i class="icon-user"></i> User</a>
      </li>
      @endif
      @if (in_array('master_department', $permissions))
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('department') }}"><i class="icon-pie-chart"></i> Department</a>
      </li>
      @endif
      @if (in_array('master_variant_product', $permissions))
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('variant_product') }}"><i class="icon-pie-chart"></i> Variant Product</a>
      </li>
      @endif
      @if (in_array('master_shift', $permissions))
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('master_shift') }}"><i class="icon-pie-chart"></i> Master Shift</a>
      </li>
      @endif
      @if (in_array('master_line', $permissions))
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('line') }}"><i class="icon-pie-chart"></i> Line</a>
      </li>
      @endif
      @if (in_array('master_auth', $permissions))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('authorization.group') }}"><i class="icon-lock"></i> Otorisasi</a>
      </li>
      @endif
      @if (in_array('edit_approve_minyak', $permissions))
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('sample_minyak/edit_approve') }}"><i class="icon-pencil"></i> Edit Approve Minyak</a>
      </li>
      @endif
      @if (in_array('edit_approve_mie', $permissions))
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('sample_mie/edit_approve') }}"><i class="icon-pencil"></i> Edit Approve Mie</a>
      </li>
      @endif
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
