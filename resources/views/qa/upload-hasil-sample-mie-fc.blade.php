@extends('layouts.base')

@section('title')
    Input Hasil Sample
@endsection

@section('breadcrumb')
    Input Hasil Sample
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  			     Input Hasil Sample FC
  			</div>
  			<div class="card-body">
            <div class="form-group row">
              <div class="col-sm-2">
                <label for="dept-setter" class="col-form-label">Plant :</label>
                <select id="dept-setter" class="form-control">
                    <option value="">---</option>
                    <option value="PRN">PRN</option>
                    <option value="PNC">PNC</option>
                </select>
              </div>
            </div>
    				<div class="_dept" id="PRN" style="display: none">
                <div class="form-group row">
                  <div class="col-md-12 table-responsive">
                    <form class="" action="" method="post" id="formSample">
                      <input type="hidden" name="row" value="">
                      <table class="table table-bordered editable" id="sample-id" style="table-layout: fixed;">
                          <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;" width="100">Line</th>
                                <th rowspan="2" style="vertical-align: middle;" width="80">Variant</th>
                                <th colspan="4" style="text-align: center;">KA</th>
                                <th colspan="4" style="text-align: center;">FC</th>
                            </tr>
                            <tr style="text-align: center">
                                <th style="vertical-align: middle;">W Cawan 0</th>
                                <th style="vertical-align: middle;">W Cawan 1</th>
                                <th style="vertical-align: middle;">W Cawan 2</th>
                                <th style="vertical-align: middle;">Nilai (%)</th>
                                <th style="vertical-align: middle;">Bobot (gram)</th>
                                <th style="vertical-align: middle;">Labu Awal</th>
                                <th style="vertical-align: middle;">Labu Isi</th>
                                <th style="vertical-align: middle;">Nilai</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="10" class="text-right"><button class="btn btn-outline-primary btn-simpan" type="submit"><i class="fa fa-save"></i> Simpan</button></td>
                            </tr>
                          </tfoot>
                      </table>
                    </form>
                  </div>
                </div>
            </div>
            <div class="_dept" id="PNC" style="display: none">
                <div class="form-group row">
                  <div class="col-md-12 table-responsive">
                    <form class="" action="" method="post" id="pnc-formSample">
                      <input type="hidden" name="row" value="">
                      <table class="table table-bordered editable" id="pnc-sample-id" style="table-layout: fixed;">
                          <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;" width="100">Line</th>
                                <th rowspan="2" style="vertical-align: middle;" width="80">Variant</th>
                                <th colspan="4" style="text-align: center;">KA</th>
                                <th colspan="4" style="text-align: center;">FC</th>
                            </tr>
                            <tr style="text-align: center">
                                <th style="vertical-align: middle;">W Cawan 0</th>
                                <th style="vertical-align: middle;">W Cawan 1</th>
                                <th style="vertical-align: middle;">W Cawan 2</th>
                                <th style="vertical-align: middle;">Nilai (%)</th>
                                <th style="vertical-align: middle;">Bobot (gram)</th>
                                <th style="vertical-align: middle;">Labu Awal</th>
                                <th style="vertical-align: middle;">Labu Isi</th>
                                <th style="vertical-align: middle;">Nilai</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="10" class="text-right"><button class="btn btn-outline-primary btn-simpan" type="submit"><i class="fa fa-save"></i> Simpan</button></td>
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
      var sample_table = $('#sample-id');
      var pnc_sample_table = $('#pnc-sample-id');
      <?php foreach ($departments as $department): ?>
          $.ajax({
              url: "{{ URL::to('sample-mie') }}/9/<?php echo $department->id; ?>",
              type: "GET",
              dataType: "JSON",
              success: function (response) {
                  var disabled = true;
                  var with_ka = false;
                  var shift_before = "";
                  $.each(response, (index, item) => {
                      if (item.labu_isi_fc == null || item.labu_isi_fc == 0) {
                          var labu_isi_fc = '';
                      }else {
                          labu_isi_fc = item.labu_isi_fc;
                      }
                      if (item.labu_awal_fc == null || item.labu_awal_fc == 0) {
                          var labu_awal_fc = '';
                      }else {
                          var labu_awal_fc = item.labu_awal_fc;
                      }
                      if (item.bobot_sample_fc == null || item.bobot_sample_fc == 0) {
                          var bobot_sample_fc = '';
                      }else {
                          var bobot_sample_fc = item.bobot_sample_fc;
                      }
                      if (item.nilai_fc == null || item.nilai_fc == 0) {
                          var nilai_fc = '';
                      }else {
                          var nilai_fc = item.nilai_fc;
                      }
                      if (item.w0_ka == null || item.w0_ka == 0) {
                          var w0_ka = '';
                      }else {
                          var w0_ka = item.w0_ka;
                      }
                      if (item.w1_ka == null || item.w1_ka == 0) {
                          var w1_ka = '';
                      }else {
                          var w1_ka = item.w1_ka;
                      }
                      if (item.w2_ka == null || item.w2_ka == 0) {
                          var w2_ka = '';
                      }else {
                          var w2_ka = item.w2_ka;
                      }
                      if (item.nilai_ka == null || item.nilai_ka == 0) {
                          var nilai_ka = '';
                      }else {
                          var nilai_ka = item.nilai_ka;
                      }
                      var table_row = $("<tr id='"+item.id+"'>", {});
                      var table_cell1 = `
                      <td>
                        <input type="hidden" name="id_fc_`+index+`" id="id_fc_`+index+`" class="form-control" value="`+item.fc_id+`" />
                        <input type="hidden" name="id_ka_`+index+`" id="id_ka_`+index+`" class="form-control" value="`+item.ka_id+`" />
                        <input type="hidden" name="id_`+index+`" id="id_`+index+`" class="form-control" value="`+item.id+`" />
                        <input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="line_id_`+index+`" id="line_id_`+index+`" readonly class="form-control-plaintext" value="`+item.line_id+`" />
                      </td>`;
                      var table_cell2 = `
                      <td>
                        <input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="variant_`+index+`" id="variant_`+index+`" readonly class="form-control-plaintext" value="`+item.variant+`" />
                      </td>`;
                      // var table_cell3 = `
                      // <td>
                      //   <input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="shift_`+index+`" id="shift_`+index+`" readonly class="form-control-plaintext" value="`+item.shift+`" />
                      // </td>`;
                      // var table_cell3 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="variant_product_`+index+`" id="variant_product_`+index+`" readonly class="form-control-plaintext" value="`+item.mid_product+`" /></td>`;
                      var table_cell7 = `
                      <td>
                        <input onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="labu_isi_fc_`+index+`" id="labu_isi_fc_`+item.dept_name+index+`" class="form-control" value="`+labu_isi_fc+`" />
                      </td>`;
                      var table_cell6 = `
                      <td>
                        <input onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="labu_awal_fc_`+index+`" id="labu_awal_fc_`+item.dept_name+index+`" class="form-control" value="`+labu_awal_fc+`" />
                      </td>`;
                      var table_cell5 = `
                      <td>
                        <input onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="bobot_sample_fc_`+index+`" id="bobot_sample_fc_`+item.dept_name+index+`" class="form-control" value="`+bobot_sample_fc+`" />
                      </td>`;
                      var table_cell8 = `
                      <td>
                        <input onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="nilai_fc_`+index+`" id="nilai_fc_`+item.dept_name+index+`" class="form-control" value="`+nilai_fc+`" />
                      </td>`;
                      var table_cell11 = `
                      <td>
                        <input disabled onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="w0_ka_`+index+`" id="w0_ka_`+item.dept_name+index+`" class="form-control ka_`+item.id+`" value="`+w0_ka+`" />
                      </td>`;
                      var table_cell12 = `
                      <td>
                        <input disabled onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="w1_ka_`+index+`" id="w1_ka_`+item.dept_name+index+`" class="form-control ka_`+item.id+`" value="`+w1_ka+`" />
                      </td>`;
                      var table_cell13 = `
                      <td>
                        <input disabled onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="w2_ka_`+index+`" id="w2_ka_`+item.dept_name+index+`" class="form-control ka_`+item.id+`" value="`+w2_ka+`" />
                      </td>`;
                      var table_cell14 = `
                      <td>
                        <input disabled onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="nilai_ka_`+index+`" id="nilai_ka_`+item.dept_name+index+`" class="form-control ka_`+item.id+`" value="`+nilai_ka+`" />
                      </td>`;
                      var table_cell10 = `
                      <td class="text-center" style="vertical-align: middle">
                           <label class="switch switch-icon switch-outline-secondary" style="margin-bottom: 0 !important">
                              <input `+with_ka+` value="`+item.id+`" class="switch-input w_ka" type="checkbox" name="w_ka_`+index+`">
                              <span class="switch-label"></span>
                              <span class="switch-handle"></span>
                           </label>
                      </td>`;
                      table_row.append(table_cell1,table_cell2,table_cell11,table_cell12,table_cell13,table_cell14,table_cell5,table_cell6,table_cell7,table_cell8);

                      var shift_row = $('<tr>', {});
                      if (item.shift != shift_before) {
                          shift = `<td style="background-color: #f4f4f4;" colspan="10"><span style="padding-left: 5px">`+item.shift+`</span></td>`;
                          shift_row.append(shift);
                          shift_before = item.shift;
                      }
                      if (item.dept_name == "PRN")
                      {
                          sample_table.append(shift_row,table_row);
                      }else if (item.dept_name == "PNC") 
                      {
                          pnc_sample_table.append(shift_row,table_row);
                      }
                      $('input[name=row]').val(index);
                  });
                  if(response.length == 0)
                  {
                    var table_row = $('<tr>', {});
                    var table_cell1 = `<td colspan="10" class="text-center">Not data here..</td>`;
                    table_row.append(table_cell1);
                    sample_table.append(table_row);
                  }
              },
              error: function (error) {
                  console.log(error)
              }
          });
      <?php endforeach ?>
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
        var labu_isi_fc_ = $('#labu_isi_fc_'+index).val().replace(',', '.');
        var labu_awal_fc_ = $('#labu_awal_fc_'+index).val().replace(',', '.');
        var bobot_sample_fc_ = $('#bobot_sample_fc_'+index).val().replace(',', '.');
        var w0_ka_ = $('#w0_ka_'+index).val().replace(',', '.');
        var w1_ka = $('#w1_ka_'+index).val().replace(',', '.');
        var w2_ka = $('#w2_ka_'+index).val().replace(',', '.');
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
    $('#dept-setter').on('change', () => {
        var dept = $('#dept-setter').val();
        $('._dept').hide();
        $('#'+dept).show();
    })
    function submit_button(text, disabled)
    {
        $('.btn-simpan').text(text);
        $('.btn-simpan').attr('disabled', disabled);
    }
    $(function() {
        $('#formSample').on('submit', (event) => {
            event.preventDefault();
            submit_input('formSample');
        })
        $('#pnc-formSample').on('submit', (event) => {
            event.preventDefault();
            submit_input('pnc-formSample');
        })
    })
    $(document).on("change", ".w_ka", function () {
        if (this.checked) {
            $('.ka_'+$(this).val()).attr('disabled', false);
        }else{
            $('.ka_'+$(this).val()).attr('disabled', true);
            $('.ka_'+$(this).val()).val('');
        }
    });
    function submit_input(form)
    {
      submit_button('Menyimpan...', true);
      $.ajax({
          url : '{{ route('fc_sample_mie.store') }}',
          type : 'POST',
          dataType : 'JSON',
          data : $('#'+form).serialize(),
          success : (response) => {
              if (response.success == 1) {
                  submit_button('Simpan', false);
                  for (var i = response.saved_id.length - 1; i >= 0; i--) {
                    $('#'+response.saved_id[i]).hide( 500 , () => {
                       $(this).remove(); 
                    });
                    makeAlert('Input Success!', 'Simple '+response.saved_id[i]+' inputed successfully', 'success', 'top-right');
                  }
              } else {
                  alert('error! '+ response);
              }
          },
          error : (error) => {
              alert('Gagal menyimpan! Pastikan inputan benar! ');
              console.log(error)
          }
      })
    }
</script>
@endpush
