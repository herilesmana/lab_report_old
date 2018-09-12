@extends('layouts.base')

@section('title')
    Create Sample Minyak
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
      width: auto;
      height: 50px;
      line-height: 35px;
      cursor: pointer
  }
  .option-label input {
      display: none;
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
          Create Sample ID Minyak

  			</div>
  			<div class="card-body" style="position: relative;">

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
              <div>
                <div id="alert">

                </div>
                <div class="form-group row">

                </div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#lines-panel" class="nav-link active" data-toggle="tab" role="tab" aria-controls="line">Lines :</a>
                    </li>
                    <li class="nav-item">
                        <a href="#bb-panel" class="nav-link inactive" data-toggle="tab" role="tab" aria-controls="line">BB :</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="lines-panel" class="tab-pane active" role="tabpanel">
                        <div class="form-group row">
                          <div id="tanggal_sample" class="col-md-3 input-group" data-target-input="nearest">
                              <input name="tanggal_sample" placeholder="Tanggal Sample" class="form-control datetimepicker-input" type="text" data-target="#tanggal_sample" id="tanggal" disabled="">
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
                                <option value="">-- Pilih jam sample --</option>
                          </select>
                        </div>

                        <div id="lines">
                            <span class="alert alert-primary">
                            Select department & jam sample first
                            </span>
                        </div>
                    </div>
                    <div id="bb-panel" class="tab-pane" role="tabpanel">
                        <div class="form-group row">
                          <div id="bb_tanggal_sample" class="col-md-3 input-group" data-target-input="nearest">
                              <input type="hidden" name="bb_line" id="bb_line">
                              <input name="bb_tanggal_sample" placeholder="Tanggal Sample" class="form-control datetimepicker-input" type="text" data-target="#bb_tanggal_sample" id="bb_tanggal" disabled="">
                              <div class="input-group-append" data-target="#bb_tanggal_sample" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                              <span class="invalid-feedback"></span>
                          </div>
                          <select id="bb_department" class="form-control col-md-2" name="bb_department" style="margin-right: 15px">
                              <option value="">-- Pilih Department --</option>
                              @foreach ($departments as $department)
                                  <option value="{{ $department->id }}">{{ $department->name }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div id="shifts">
                            <span class="alert alert-primary">
                            Select department first
                            </span>
                        </div>
                    </div>
                </div>
              </div>
  			</div>
  		</div>
  	</div>
  </div>
  <div id="details"></div>
@include('qc.confirm')
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ajaxStart(() => {
        $('#loading-line').show();
    });
    $(document).ajaxComplete(() => {
        $('#loading-line').hide();
    });
    $('#tangki input').on('click', function() {
        var label = $(this).val()+'-label';
        $('#tangki .lab-option-selected').addClass('lab-option');
        $('#tangki .lab-option-selected').removeClass('lab-option-selected');
        $("#"+label).removeClass('lab-option');
        $("#"+label).addClass('lab-option-selected');
    });
    $('#variant input').on('click', function() {
        var label = $(this).val()+'-label';
        $('#variant .lab-option-selected').addClass('lab-option');
        $('#variant .lab-option-selected').removeClass('lab-option-selected');
        $("#"+label).removeClass('lab-option');
        $("#"+label).addClass('lab-option-selected');
    });
    var sekarang = "{{ date('Y-m-d') }}";
    $('#tanggal').val(sekarang);
    $('#bb_tanggal').val(sekarang);
    $('#tanggal_sample').datetimepicker({
        locale: 'id',
        format: 'Y-MM-D'
    });
    $('#bb_tanggal_sample').datetimepicker({
        locale: 'id',
        format: 'Y-MM-D'
    });
    $('#department').change(function () {
        $('#lines').html('');
        $('#jam_sample').html('');
        $('#jam_sample').append('<option value="">Pilih Jam Sample</option>');
        // $('#jam_sample').val('');
        var jam_now = '<?php echo date("H:i:s"); ?>';
        var jam_samples = ['22:30:00','21:00:00','19:30:00','18:00:00','16:30:00','15:00:00','13:30:00','12:00:00','10:30:00','09:00:00','07:30:00','06:00:00','04:30:00','03:00:00','01:30:00','00:00:00'];
        for (var i = jam_samples.length - 1; i >= 0; i--) {
            // Jam sekarang dikurangi 1
            var jam_sekarang = new Date("01/01/2007 " + jam_now).getHours();
            // Hanya mengambil jam dari jam sample
            var jam_sample = new Date("01/01/2007 " + jam_samples[i]).getHours();
            // Untuk dua jam berikutnya
            var dua_jam_berikutnya = jam_sekarang + 2;
            // Juka jam sekarang dan dua jam berikutnya maka akan ditapilkan
            if (jam_sample >= jam_sekarang && jam_sample <= dua_jam_berikutnya) {
                $('#jam_sample').append('<option value="'+jam_samples[i]+'">'+jam_samples[i]+'</option>');
            }
        } 
        $('.jam').html(jam_now);
    })
    function validate(start, end) {
      var a = start;
      var b = end;
      var aa1 = a.split(":");
      var aa2 = b.split(":");

      var d1 = new Date(parseInt("2001",10),(parseInt("01",10))-1,parseInt("01",10),parseInt(aa1[0],10),parseInt(aa1[1],10),parseInt(aa1[2],10));
      var d2 = new Date(parseInt("2001",10),(parseInt("01",10))-1,parseInt("01",10),parseInt(aa2[0],10),parseInt(aa2[1],10),parseInt(aa2[2],10));
      var dd1 = d1.valueOf();
      var dd2 = d2.valueOf();
      if (dd1 > dd2) {
          return true;
      }else{
          return false;
      }
    }
    $('#jam_sample').change(function () {
        get_lines();
    })

    $('#bb_department').change(function () {
        get_shifts();
        get_line();
    })

    function get_line()
    {
      var dept_id = $('#bb_department').val();
      $.ajax({
          url : "{{ URL::to('line') }}/"+dept_id+"/get-one-line",
          type: 'GET',
          dataType: 'JSON',
          success: (response) => {
              $('#bb_line').val(response.id);
              //$('#details').html(response.detail);
          },
          error: (error) => {
              console.log(error)
          }
      })
    }
    function get_shifts()
    {
      var dept_id = $('#bb_department').val();
      var tanggal_sample = $('#bb_tanggal').val();
      $.ajax({
          url : "{{ URL::to('shift') }}/"+dept_id+"/"+tanggal_sample+"/get-shift",
          type: 'GET',
          dataType: 'JSON',
          success: (response) => {
              $('#shifts').html(response.option);
              //$('#details').html(response.detail);
          },
          error: (error) => {
              console.log(error)
          }
      })
    }

    function get_lines()
    {
      var dept_id = $('#department').val();
      if (dept_id == "") {
          alert('select department first');
          $('#jam_sample').val('');
          return false;
      }
      var jam_sample = $('#jam_sample').val();
      var tanggal_sample = $('#tanggal').val();
      $.ajax({
          url : "{{ URL::to('line') }}/"+dept_id+"/"+tanggal_sample+"/"+jam_sample+"/get-by-minyak",
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
    function BBCreateSample(shift)
    {
        if (confirm('Yakin untuk membuat sample BB ini??')) {
            $('#alert').html('');
            var data_form = $('#create_sample').serializeArray();
            var department = $('#bb_department').val();
            var tanggal_sample = $('#bb_tanggal').val();
            var line = $('#bb_line').val();
            data_form.push({
              name: "line",
              value: line
            });
            data_form.push({
              name: "department",
              value: department
            });
            data_form.push({
              name: "shift",
              value: shift
            });
            data_form.push({
              name: "tanggal_sample",
              value: tanggal_sample
            });
            data_form.push({
              name: "jam_sample",
              value: ''
            });
            data_form.push({
              name: "tangki",
              value: 'BB'
            });
            data_form.push({
              name: "variant_product",
              value: '1'
            });
            $.ajax({
                data : data_form,
                url: "{{ route('sample.minyak.create') }}",
                type: "POST",
                success: (response) => {
                  if(response.success != 1) {
                      alert(response.error);
                  }
                  $('#alert').html(`
                    <div class=\"alert alert-success alert-dismissible\">
                        <i class=\"fa fa-check\"></i> Sample berhasil dibuat!. ID : <strong><span class=\"id-sample\"></span></strong>
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                          <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                  `);
                  $('.alert-success .id-sample').text(response.semua_id)
                  $('.modal').modal('hide');
                  $('#line').val('');
                  get_shifts();
                },
                error: (error) => {
                    console.log(error)
                }
            });
        }
    }
    function createSample(line)
    {
        $('#line').val(line);
        $('input[name=ulang]').val('false');
        $('#confirm').modal('show');
    }
    function hapusSample(sample_id)
    {
        if(confirm('Hapus sample '+sample_id+' ?')) {
            $.ajax({
                url : "{{ URL::to('sample-minyak/delete') }}/"+sample_id,
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
        $('#'+line).modal('show');
    }

    function samplingUlang(line, variant, tangki)
    {
        $('#line').val(line);
        var $variant = $('input[name=variant_product]');
        if($variant.is(':checked') === false) {
            $variant.filter('[value='+variant+']').prop('checked', true);
        }
        var $tangki = $('input[name=tangki]');
        if($tangki.is(':checked') === false) {
            $tangki.filter('[value='+tangki+']').prop('checked', true);
        }
        $('input[name=ulang]').val('true');
        $('#create_sample').submit();
    }

    $('#create_sample').submit( (event) => {
        $('#alert').html('');
        event.preventDefault();
        var data_form = $('#create_sample').serializeArray();
        var department = $('#department').val();
        var tanggal_sample = $('#tanggal').val();
        var jam_sample = $('#jam_sample').val();
        var line = $('#line').val();
        var variant = $('input[name=variant_product]:checked').val();
        if (confirm('Buat sample? \n line '+line+' \n tangki '+$('input[name=tangki]:checked').val()+' \n variant '+$('#'+variant+'-label2').text() )) {
          data_form.push({
            name: "department",
            value: department
          });
          data_form.push({
            name: "tanggal_sample",
            value: tanggal_sample
          });
          data_form.push({
            name: "jam_sample",
            value: jam_sample
          });
          $.ajax({
              data : data_form,
              url: "{{ route('sample.minyak.create') }}",
              type: "POST",
              success: (response) => {
                  if(response.success != 1) {
                      alert(response.error);
                  }
                  $('#alert').html(`
                    <div class=\"alert alert-success alert-dismissible\">
                        <i class=\"fa fa-check\"></i> Sample berhasil dibuat!. ID : <strong><span class=\"id-sample\"></span></strong>
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                          <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                  `);
                  $('.alert-success .id-sample').text(response.semua_id)
                  $('.modal').modal('hide');
                  $('#line').val('');
                  get_lines();
              },
              error: (error) => {
                  console.log(error)
              }
          });
        }
    });
    



</script>
@endpush
