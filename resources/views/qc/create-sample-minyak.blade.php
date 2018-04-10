<div class="container-fluid">
    <div class="form-group row">
        <div id="tanggal_sample" class="col-md-3 input-group" data-target-input="nearest">
            <input name="tanggal_sample" placeholder="Tanggal Sample" class="form-control datetimepicker-input" type="text" data-target="#tanggal_sample" id="tanggal">
            <div class="input-group-append" data-target="#tanggal_sample" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            <span class="invalid-feedback"></span>
        </div>
        <select id="department" class="form-control col-md-2" name="department" style="margin-right: 15px">
            <option value="">-- Pilih Department --</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
        <select id="jam_sample" class="form-control col-md-2" name="jam_sample">
            <option value="">-- Jam Sample --</option>
            @foreach ($jam_samples as $jam_sample)
                <option value="{{ $jam_sample->jam_sample }}">{{ $jam_sample->jam_sample }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
          <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                  <a href="#line" class="nav-link active" data-toggle="tab" role="tab" aria-controls="line">Lines :</a>
              </li>
          </ul>
          <div class="tab-content">
              <div class="tab-pane active" id="lines" role="tabpanel">
                  Select department & jam sample first
              </div>
          </div>
      </div>
    </div>
</div>
