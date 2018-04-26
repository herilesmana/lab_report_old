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
                                <th rowspan="2" style="vertical-align: middle;" width="70">Variant</th>
                                <th rowspan="2" style="vertical-align: middle;" width="30">Shift</th>
                                <th colspan="4" style="text-align: center;">FC</th>
                                <th colspan="4" style="text-align: center;">KA</th>
                                <th rowspan="2" style="vertical-align: middle;" width="40">Action</th>
                            </tr>
                            <tr style="text-align: center">
                                <th style="vertical-align: middle;" width="80">Labu Isi</th>
                                <th style="vertical-align: middle;" width="90">Labu Awal</th>
                                <th style="vertical-align: middle;" width="120">Bobot Sample</th>
                                <th style="vertical-align: middle;" width="100">Nilai</th>
                                <th style="vertical-align: middle;" width="100">W Cawan 0</th>
                                <th style="vertical-align: middle;" width="100">W Cawan 1</th>
                                <th style="vertical-align: middle;" width="100">W Cawan 2</th>
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
          url: "{{ URL::to('sample-mie') }}/1",
          type: "GET",
          dataType: "JSON",
          success: function (response) {
              var sample_table = $('#sample-id');
              $('#sample-id tbody').html('');
              $.each(response, (index, item) => {
                  if (item.labu_isi_fc == null) {
                      var labu_isi_fc = '';
                  }else {
                      labu_isi_fc = item.labu_isi_fc;
                  }
                  if (item.labu_awal_fc == null) {
                      var labu_awal_fc = '';
                  }else {
                      var labu_awal_fc = item.labu_awal_fc;
                  }
                  if (item.bobot_sample_fc == null) {
                      var bobot_sample_fc = '';
                  }else {
                      var bobot_sample_fc = item.bobot_sample_fc;
                  }
                  if (item.nilai_fc == null) {
                      var nilai_fc = '';
                  }else {
                      var nilai_fc = item.nilai_fc;
                  }
                  if (item.w0_ka == null) {
                      var w0_ka = '';
                  }else {
                      var w0_ka = item.w0_ka;
                  }
                  if (item.w1_ka == null) {
                      var w1_ka = '';
                  }else {
                      var w1_ka = item.w1_ka;
                  }
                  if (item.w2_ka == null) {
                      var w2_ka = '';
                  }else {
                      var w2_ka = item.w2_ka;
                  }
                  if (item.nilai_ka == null) {
                      var nilai_ka = '';
                  }else {
                      var nilai_ka = item.nilai_ka;
                  }
                  var table_row = $('<tr>', {});
                  var table_cell1 = `<td><input type="hidden" name="id_fc_`+index+`" id="id_fc_`+index+`" class="form-control" value="`+item.fc_id+`" /><input type="hidden" name="id_ka_`+index+`" id="id_ka_`+index+`" class="form-control" value="`+item.ka_id+`" /><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="id_`+index+`" id="id_`+index+`" readonly class="form-control-plaintext" value="`+item.id+`" /></td>`;
                  var table_cell2 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="variant_`+index+`" id="variant_`+index+`" readonly class="form-control-plaintext" value="`+item.mid_product+`" /></td>`;
                  var table_cell3 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="shift_`+index+`" id="shift_`+index+`" readonly class="form-control-plaintext" value="`+item.shift+`" /></td>`;
                  // var table_cell3 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="variant_product_`+index+`" id="variant_product_`+index+`" readonly class="form-control-plaintext" value="`+item.mid_product+`" /></td>`;
                  var table_cell5 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="labu_isi_fc_`+index+`" id="labu_isi_fc_`+index+`" class="form-control" value="`+labu_isi_fc+`" /></td>`;
                  var table_cell6 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="labu_awal_fc_`+index+`" id="labu_awal_fc_`+index+`" class="form-control" value="`+labu_awal_fc+`" /></td>`;
                  var table_cell7 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="bobot_sample_fc_`+index+`" id="bobot_sample_fc_`+index+`" class="form-control" value="`+bobot_sample_fc+`" /></td>`;
                  var table_cell8 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="nilai_fc_`+index+`" id="nilai_fc_`+index+`" class="form-control" value="`+nilai_fc+`" /></td>`;
                  var table_cell10 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="w0_ka_`+index+`" id="w0_ka_`+index+`" class="form-control" value="`+w0_ka+`" /></td>`;
                  var table_cell11 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="w1_ka_`+index+`" id="w1_ka_`+index+`" class="form-control" value="`+w1_ka+`" /></td>`;
                  var table_cell12 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="w2_ka_`+index+`" id="w2_ka_`+index+`" class="form-control" value="`+w2_ka+`" /></td>`;
                  var table_cell13 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="nilai_ka_`+index+`" id="nilai_ka_`+index+`" class="form-control" value="`+nilai_ka+`" /></td>`;
                  var table_cell14 = `<td class="text-center"><a href="javascript:;" onClick="deleteSample('`+item.id+`')" title="hapus sample `+item.id+`" class="text-danger"><i class="fa fa-trash"></i></a></td>`;
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
    function deleteSample(id)
    {
        if(confirm('Yakin hapus sample ini?')) {
            $.ajax({
                url : "{{ URL::to('sample-mie/delete') }}/"+id,
                type : "GET",
                dataType : 'JSON',
                success : function (response) {
                    if(response.success = 1) {
                        get_sample_id();
                    }
                },
                error : function (error) {
                    console.log(error);
                }
            });
        }
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
        var labu_isi_fc_ = $('#labu_isi_fc_'+index).val();
        labu_isi_fc_ = labu_isi_fc_.replace(',', '.');
        var labu_awal_fc_ = $('#labu_awal_fc_'+index).val();
        labu_awal_fc_ = labu_awal_fc_.replace(',', '.');
        var bobot_sample_fc_ = $('#bobot_sample_fc_'+index).val();
        bobot_sample_fc_ = bobot_sample_fc_.replace(',', '.');
        var w0_ka_ = $('#w0_ka_'+index).val();
        w0_ka_ = w0_ka_.replace(',', '.');
        var w1_ka = $('#w1_ka_'+index).val();
        w1_ka = w1_ka.replace(',', '.');
        var w2_ka = $('#w2_ka_'+index).val();
        w2_ka = w2_ka.replace(',', '.');
        var nilai_fc = ( ((labu_isi_fc_-labu_awal_fc_)/bobot_sample_fc_)*100 ).toFixed(2);
        var nilai_ka = ( ((w1_ka-w2_ka)/(w1_ka-w0_ka_))*100 ).toFixed(2);
        if (isNaN(nilai_fc)) {
            nilai_fc = '';
        }
        if (isNaN(nilai_ka)) {
            nilai_ka = '';
        }
        $('#nilai_fc_'+index).val(nilai_fc);
        $('#nilai_ka_'+index).val(nilai_ka);
    }
    $(function() {
        $('#formSample').on('submit', (event) => {
            event.preventDefault();
            $.ajax({
                url : '{{ route('sample_mie.store') }}',
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
