@extends('layouts.base')

@section('title')
    Upload Hasil Sample
@endsection

@section('breadcrumb')
    Upload Hasil Sample
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  			     Upload Hasil Sample
  			</div>
  			<div class="card-body">
    				<div>
              {{-- <div class="alert alert-danger" id="error">
                  <span class="fa fa-close"></span> <span class="error"></span>
              </div> --}}
                <div class="form-group row">
                  <div class="col-md-12 table-responsive">
                    <form class="" action="" method="post" id="formSample">
                      <input type="hidden" name="row" value="">
                      <table class="table table-bordered editable" id="sample-id">
                          <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;" width="160">Sample Id</th>
                                <th rowspan="2" style="vertical-align: middle;">Line</th>
                                <th rowspan="2" style="vertical-align: middle;" width="30">Tangki</th>
                                <th colspan="4" style="text-align: center;">PV</th>
                                <th colspan="4" style="text-align: center;">FFA</th>
                                <th rowspan="2" style="vertical-align: middle;" width="40">Action</th>
                            </tr>
                            <tr style="text-align: center">
                                <th style="vertical-align: middle;" width="120">Volume Titrasi</th>
                                <th style="vertical-align: middle;" width="80">Bobot Sample</th>
                                <th style="vertical-align: middle;" width="100">Normalitas</th>
                                <th style="vertical-align: middle;" width="100">Nilai</th>
                                <th style="vertical-align: middle;" width="120">Volume Titrasi</th>
                                <th style="vertical-align: middle;" width="80">Bobot Sample</th>
                                <th style="vertical-align: middle;" width="100">Normalitas</th>
                                <th style="vertical-align: middle;" width="100">Nilai</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="12" class="text-right"><button class="btn btn-outline-primary" type="submit"><i class="fa fa-save"></i> Simpan Semua</button></td>
                            </tr>
                          </tfoot>
                      </table>
                    </form>
                  </div>
                </div>
            </div>
  			</div>
  		</div>
  	</div>
  </div>
@endsection
@push('scripts')
<script type="text/javascript">
    get_sample_id()
    function get_sample_id()
    {
      $('#sample-id tbody').html('Loading...');
      $.ajax({
          url: "{{ URL::to('sample-minyak') }}/1",
          type: "GET",
          dataType: "JSON",
          success: function (response) {
              var sample_table = $('#sample-id');
              $('#sample-id tbody').html('');
              $.each(response, (index, item) => {
                  var table_row = $('<tr>', {});
                  var table_cell1 = `<td><input type="hidden" name="id_pv_`+index+`" id="id_pv_`+index+`" class="form-control" value="`+item.pv_id+`" /><input type="hidden" name="id_ffa_`+index+`" id="id_ffa_`+index+`" class="form-control" value="`+item.ffa_id+`" /><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="id_`+index+`" id="id_`+index+`" readonly class="form-control-plaintext" value="`+item.id+`" /></td>`;
                  var table_cell2 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="line_`+index+`" id="line_`+index+`" readonly class="form-control-plaintext" value="`+item.line_id+`" /></td>`;
                  var table_cell3 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="tangki_`+index+`" id="tangki_`+index+`" readonly class="form-control-plaintext" value="`+item.tangki+`" /></td>`;
                  // var table_cell3 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="variant_product_`+index+`" id="variant_product_`+index+`" readonly class="form-control-plaintext" value="`+item.mid_product+`" /></td>`;
                  var table_cell5 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="volume_titrasi_pv_`+index+`" id="volume_titrasi_pv_`+index+`" class="form-control" value="" /></td>`;
                  var table_cell6 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="bobot_sample_pv_`+index+`" id="bobot_sample_pv_`+index+`" class="form-control" value="" /></td>`;
                  var table_cell7 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="normalitas_pv_`+index+`" id="normalitas_pv_`+index+`" class="form-control" value="" /></td>`;
                  var table_cell8 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="nilai_pv_`+index+`" id="nilai_pv_`+index+`" class="form-control" value="" /></td>`;
                  var table_cell10 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="volume_titrasi_ffa_`+index+`" id="volume_titrasi_ffa_`+index+`" class="form-control" value="" /></td>`;
                  var table_cell11 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="bobot_sample_ffa_`+index+`" id="bobot_sample_ffa_`+index+`" class="form-control" value="" /></td>`;
                  var table_cell12 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="normalitas_ffa_`+index+`" id="normalitas_ffa_`+index+`" class="form-control" value="" /></td>`;
                  var table_cell13 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="nilai_ffa_`+index+`" id="nilai_ffa_`+index+`" class="form-control" value="" /></td>`;
                  var table_cell14 = `<td class="green text-center"><a href="javascript:;" onClick="saveOne(`+index+`)" title="save sample `+item.id+`"><i class="fa fa-save"></i></a></td>`;
                  table_row.append(table_cell1,table_cell2,table_cell3,table_cell5,table_cell6,table_cell7,table_cell8,table_cell10,table_cell11,table_cell12,table_cell13,table_cell14);
                  sample_table.append(table_row);
                  $('input[name=row]').val(index);
              });
              if(response.length == 0)
              {
                var table_row = $('<tr>', {});
                var table_cell1 = `<td colspan="12" class="text-center">Not data here..</td>`;
                table_row.append(table_cell1);
                sample_table.append(table_row);
              }
          },
          error: function (error) {
              console.log(error)
          }
      });
    }
    function AllowNumbersOnly(e, index) {
      // Memastikan hanya angka dan titik yang diinput user.
      var code = (e.which) ? e.which : e.keyCode;
      if ( ( code != 46 && (code > 31 && (code < 48 || code > 57)) ) && e.ctrlKey == false  ) {
          e.preventDefault();
      }
      nilai(index)
    }
    function nilai(index)
    {
        // Jika di enter
        var volume_titrasi_pv = $('#volume_titrasi_pv_'+index).val();
        volume_titrasi_pv = volume_titrasi_pv.replace(',', '.');
        var bobot_sample_pv = $('#bobot_sample_pv_'+index).val();
        bobot_sample_pv = bobot_sample_pv.replace(',', '.');
        var normalitas_pv = $('#normalitas_pv_'+index).val();
        normalitas_pv = normalitas_pv.replace(',', '.');
        var volume_titrasi_ffa = $('#volume_titrasi_ffa_'+index).val();
        volume_titrasi_ffa = volume_titrasi_ffa.replace(',', '.');
        var bobot_sample_ffa = $('#bobot_sample_ffa_'+index).val();
        bobot_sample_ffa = bobot_sample_ffa.replace(',', '.');
        var normalitas_ffa = $('#normalitas_ffa_'+index).val();
        normalitas_ffa = normalitas_ffa.replace(',', '.');
        var nilai_pv = ( (volume_titrasi_pv*normalitas_pv*1000)/bobot_sample_pv ).toFixed(2);
        var nilai_ffa = ( (volume_titrasi_ffa*normalitas_ffa*25.6)/bobot_sample_ffa ).toFixed(4);
        if (isNaN(nilai_pv)) {
            nilai_pv = '';
        }
        if (isNaN(nilai_ffa)) {
            nilai_ffa = '';
        }
        $('#nilai_pv_'+index).val(nilai_pv);
        $('#nilai_ffa_'+index).val(nilai_ffa);
    }
    $(function() {
        $('#formSample').on('submit', (event) => {
            event.preventDefault();
            $.ajax({
                url : '{{ route('sample_minyak.store') }}',
                type : 'POST',
                dataType : 'JSON',
                data : $('#formSample').serialize(),
                success : (response) => {
                    if (response.success == 1) {
                        get_sample_id();
                    } else {
                        alert('error! '+ response);
                    }
                },
                error : (error) => {
                    alert('Gagal menyimpan! Pastikan inputan benar! ');
                    console.log(error)
                }
            })
        })
    })
</script>
@endpush
