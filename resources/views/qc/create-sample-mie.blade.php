@extends('layouts.base')

@section('title')
    Create Sample Mie
@endsection

@section('breadcrumb')
  Create Sample
@endsection

@push('styles')
  .lab-option {
      display: inline-block;
      font-weight: 400;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border: 1px solid transparent;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      line-height: 1.5;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      color: #007bff;
      background-color: transparent;
      background-image: none;
      border-color: #007bff;
      width: auto;
      height: 50px;
      line-height: 50px;
      line-height: 35px;
      cursor: pointer
  }
  .lab-option-selected {
      display: inline-block;
      font-weight: 400;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border: 1px solid transparent;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      line-height: 1.5;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      color: #fff;
      background-color: #007bff;
      border-color: #007bff;
      auto;
      height: 50px;
      line-height: 35px;
      cursor: pointer
  }
  .option-label input {
    display: none
  }
@endpush

@section('content')
  <a href='{{ URL::to('home') }}' class="btn btn-primary" style="z-index: 9999;position:fixed;right:100px;bottom:100px">
      <i class="fa fa-arrow-left"></i> Kembali</a>
  </a>
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
          Create Sample ID Mie
          {{-- @elseif ($jenis == 'mie')
              <a class="btn btn-sm btn-primary text-white" href='{{ URL::to('sample-minyak/create-sample') }}'><i class="fa fa-arrow-left"></i> Kembali</a> Create Sample ID Mie
          @endif --}}

  			</div>
  			<div class="card-body" style="padding-left: 0 !important;padding-right: 0 !important">
          {{-- Untuk loading --}}
          <div id="loading-line" class="spinner-container" style="display: none">
            <div class="spinner">
              <div class="double-bounce1"></div>
              <div class="double-bounce2"></div>
            </div>
          </div>
              {{-- <div class="container-fluid">
                  <a href='{{ URL::to('sample-minyak/create-sample') }}' style='height: 80px; margin: 2px;' class='btn btn-outline-info text-center'><i class="fa fa-tint fa-2x"></i><br><strong>Sample Minyak</strong></a>
                  <a href='{{ URL::to('sample-minyak/create-sample') }}/mie' style='height: 80px; margin: 2px;' class='btn btn-outline-info text-center'><i class="fa icon-layers fa-2x"></i><br><strong>Sample Mie</strong></a>
              </div> --}}
              <div class="container-fluid">
                <div id="alert">
                  <div class="alert alert-success alert-dismissible" style="display: none">
                      <i class="fa fa-check"></i> <span class="text">Sample berhasil dibuat!. ID : </span><strong><span class="id-sample"></span></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                </div>
                <form id="create-sample" method="post">
                    @csrf
                </form>
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
                      <select id="shift" class="form-control col-md-2" name="shift" style="margin-right: 15px">
                          <option value="">-- Pilih Shift --</option>
                          @foreach ($shifts as $shift)
                              <option value="{{ $shift->name }}">{{ $shift->name }}</option>
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
                                <span class="first">Select Shift first</span>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>

  			</div>
  		</div>
  	</div>
  </div>
 <div id="details"></div>
  <div class="modal" tabindex="-1" id="confirm" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Pilih Variant</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <form id="create_sample">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="line" id="line_id-val" value="">
                    <h6>Variant</h6>
                    <div id="variant">
                      <div class="prn" style="display: none">
                    @foreach ($prn_variant as $variant_product)
                      @if($variant_product->mid != 1)
                      <label for="{{ $variant_product->mid }}" class="lab-option option-label" id="{{ $variant_product->mid }}-label">
                          <input id="{{ $variant_product->mid }}" type="radio" name="variant_product" value="{{ $variant_product->mid }}"><span id="{{ $variant_product->mid }}-label2">{{ $variant_product->name }}</span>
                      </label>
                      @endif
                    @endforeach
                    </div>
                    <div class="pnc" style="display: none">
                    @foreach ($pnc_variant as $variant_product)
                      @if($variant_product->mid != 1)
                      <label for="{{ $variant_product->mid }}" class="lab-option option-label" id="{{ $variant_product->mid }}-label">
                          <input id="{{ $variant_product->mid }}" type="radio" name="variant_product" value="{{ $variant_product->mid }}"><span id="{{ $variant_product->mid }}-label2">{{ $variant_product->name }}</span>
                      </label>
                      @endif
                    @endforeach
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-create">Create</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
                </div>
              </form>
          </div>
      </div>
  </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $('#department').val('');
    $('#shift').val('');
    $(document).ajaxStart(() => {
        $('#loading-line').show();
    });
    $(document).ajaxComplete(() => {
        $('#loading-line').hide();
    });
    $('#tanggal_sample').on('change.datetimepicker', function () {
        table.destroy();
          get_data();
    })
    $('#variant input').on('click', function() {
        var label = $(this).val()+'-label';
        $('#variant .lab-option-selected').addClass('lab-option');
        $('#variant .lab-option-selected').removeClass('lab-option-selected');
        $("#"+label).removeClass('lab-option');
        $("#"+label).addClass('lab-option-selected');
    });
    var sekarang = "{{ date('Y-m-d') }}";
    $('#tanggal').val(sekarang);
    $('#tanggal_sample').datetimepicker({
        locale: 'id',
        format: 'Y-MM-D'
    });
    $('#department').change(function () {
        $('#shift').val('');
        $('#variants div').hide();
        $('#variants .first').show();
        if ( $('#department option:selected').text() == "PRN" ) {
          $('#variant .prn').show();
          $('#variant .pnc').hide();
        }else if ( $('#department option:selected').text() == "PNC" ) {
          $('#variant .prn').hide();
          $('#variant .pnc').show();
        }
    })
    $('#shift').change(function () {
        get_lines();
    })

    function get_lines()
    {
      var dept_id = $('#department').val();
      if (dept_id == "") {
          alert('select department first');
          return false;
      }
      var shift = $('#shift').val();
      var tanggal_sample = $('#tanggal').val();
      $.ajax({
          url : "{{ URL::to('line') }}/"+dept_id+"/"+tanggal_sample+"/"+shift+"/get-by-mie",
          type: 'GET',
          dataType: 'JSON',
          success: (response) => {
              $('#lines').html(response.option);
              $('#details').html(response.detail);
          },
          error: (error) => {
              console.log(error)
          }
      })
    }

    function hapusSample(sample_id)
    {
        if(confirm('Hapus sample '+sample_id+' ?')) {
            $.ajax({
                url : "{{ URL::to('sample-mie/delete') }}/"+sample_id,
                type : "GET",
                dataType : 'JSON',
                success : function (response) {
                    if(response.success = 1) {
                        $('#alert').html(`
                          <div class=\"alert alert-danger alert-dismissible\">
                              <i class=\"fa fa-check\"></i> Sample berhasil dihapus!. ID : <strong><span class=\"id-sample\"></span></strong>
                              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                              </button>
                          </div>
                        `);
                        $('.alert-danger .id-sample').text(response.semua_id)
                        $('.modal').modal('hide');
                        $('#line').val('');
                        get_lines();
                    }
                },
                error : function (error) {
                    console.log(error);
                }
            });
        }
    }

    function detail(line)
    {
        $('input[name=ulang]').val('false');
        $('#mie'+line).modal('show');
    }


    $('#confirm').submit(function(event) {
        event.preventDefault();
        create();
    })

    function create()
    {
      var data_form = $('#create-sample').serializeArray();
      var department = $('#department').val();
      var tanggal_sample = $('#tanggal').val();
      var shift = $('#shift').val();
      var line = $('input[name=line]').val();
      var mid = $('input[name=variant_product]:checked').val();
      if (confirm('buat sample ini? Variant '+mid)) {
        $('#alert').html('');
        data_form.push({
          name: "mid",
          value: mid
        });
        data_form.push({
          name: "department",
          value: department
        });
        data_form.push({
          name: "tanggal_sample",
          value: tanggal_sample
        });
        data_form.push({
          name: "shift",
          value: shift
        });
        data_form.push({
          name: "line",
          value: line
        });
        $.ajax({
            data : data_form,
            url: "{{ route('sample.mie.create') }}",
            type: "POST",
            success: (response) => {
                if(response.success != 1) {
                    alert(response.error);
                }
                get_lines();
                $('.modal').modal('hide');
                $('#alert').html(`
                  <div class=\"alert alert-success alert-dismissible\">
                      <i class=\"fa fa-check\"></i> <span class=\"text\">Sample berhasil dibuat!. ID : </span><strong><span class=\"id-sample\"></span></strong>
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                      </button>
                  </div>
                `);
                $('.alert-success .id-sample').text(response.id)
            },
            error: (error) => {
                console.log(error)
            }
        });
      }
    }

    function createSample(line_id)
    {
        $('#confirm').modal('show');
        $('#line_id-val').val(line_id);
    }

    // $('#create_sample').submit( (event) => {
    //     event.preventDefault();
    //     var data_form = $('#create_sample').serializeArray();
    //     var department = $('#department').val();
    //     var tanggal_sample = $('#tanggal').val();
    //     var jam_sample = $('#jam_sample').val();
    //     var line = $('#line').val();
    //     data_form.push({
    //       name: "department",
    //       value: department
    //     });
    //     data_form.push({
    //       name: "tanggal_sample",
    //       value: tanggal_sample
    //     });
    //     data_form.push({
    //       name: "jam_sample",
    //       value: jam_sample
    //     });
    //     $.ajax({
    //         data : data_form,
    //         url: "{{ route('sample.minyak.create') }}",
    //         type: "POST",
    //         success: (response) => {
    //             if(response.success != 1) {
    //                 alert(response.error);
    //             }
    //             $('#confirm').modal('hide');
    //             $('#line').val('');
    //             get_lines();
    //         },
    //         error: (error) => {
    //             console.log(error)
    //         }
    //     });
    // });

</script>
@endpush
