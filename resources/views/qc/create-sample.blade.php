@extends('layouts.base')

@section('title')
    Create Sample
@endsection

@section('breadcrumb')
  Create Sample
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  			     Create Sample ID
  			</div>
  			<div class="card-body">
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
                            <option value="{{ $jam_sample->id }}">{{ $jam_sample->jam_sample }}</option>
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
  			</div>
  		</div>
  	</div>
  </div>
@include('qc.confirm', ['variant_products' => $variant_products])
@endsection
@push('scripts')
<script type="text/javascript">
    var sekarang = "{{ date('d/m/Y') }}";
    $('#tanggal').val(sekarang);
    $('#tanggal_sample').datetimepicker({
        locale:'id',
        format: 'D/MM/Y'
    });
    $('#department').change(function () {
        $('#jam_sample').val('');
    })
    $('#jam_sample').change(function () {
        var dept_id = $('#department').val();
        if (dept_id == "") {
            alert('select department first');
            return false;
        }
        var jam_sample = $(this).val();
        $('#lines').html('');
        $.ajax({
            url : "{{ URL::to('line') }}/"+dept_id+"/per_department",
            type: 'GET',
            dataType: 'JSON',
            success: (response) => {
              $.each(response, function(index, item) {
                  var line = `
                      <button onClick="createSample('`+item.id+`')" style=\"margin: 2px; width: 105px\" type=\"button\" class=\"btn btn-outline-info text-left\">
                        <strong>`+item.id+`</strong><br>
                        <span style=\"font-size: 10px;\">Waiting result</span>
                      </button>
                  `;
                  $('#lines').append(line);
              });
            },
            error: (error) => {
                console.log(error)
            }
        })
    })

    function createSample(line)
    {
        $('#line').val(line);
        $('#confirm').modal('show');
    }

    $('#create_sample').submit( (event) => {
        event.preventDefault();
        var data_form = new FormData();
        var department = $('#department').val();
        var tanggal_sample = $('#tanggal_sample').val();
        var jam_sample = $('#jam_sample').val();
        var line = $('#line').val();
        data_form.append('department', department);
        data_form.append('tanggal_sample', tanggal_sample);
        data_form.append('jam_sample', jam_sample);
        data_form.append('line', line);
        $.ajax({
            data : data_form,
            processData: false,
            url: "{{ route('sample.minyak.create') }}",
            type: "POST",
            dataType: "JSON",
            success: (response) => {
                console.log(response)
            },
            error: (error) => {
                console.log(error)
            }
        });
    });

</script>
@endpush
