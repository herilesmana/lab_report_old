@extends('layouts.base')

@section('title')
    Input Hasil Sample
@endsection

@section('breadcrumb')
    Input Hasil Sample
@endsection

@push('styles')
.editable input {
  background-color: transparent !important
}
@endpush

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  			     Input Hasil Sample

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
                                <th rowspan="2" style="vertical-align: middle;" width="80">With FC</th>
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
                              <td colspan="11" class="text-right"><button class="btn btn-outline-primary btn-simpan" type="submit"><i class="fa fa-save"></i> Simpan</button></td>
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
                                <th rowspan="2" style="vertical-align: middle;" width="80">With FC</th>
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
                              <td colspan="11" class="text-right"><button class="btn btn-outline-primary btn-simpan" type="submit"><i class="fa fa-save"></i> Simpan</button></td>
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
              url: "{{ URL::to('sample-mie') }}/1/<?php echo $department->id; ?>",
              type: "GET",
              dataType: "JSON",
              success: function (response) {
                  var disabled = true;
                  var with_fc = '';
                  var shift_before = "";
                  $.each(response, (index, item) => {
                      if (item.with_fc == 'Y') {
                          disabled = '';
                          with_fc = 'checked';
                      }else if(item.with_fc == 'N'){
                          disabled = 'disabled';
                          with_fc = '';
                      }
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
                      if (item.approver != null && item.approve == null) {
                        var keterangan = `data-toggle="popover" data-trigger="focus" title="Revis Detail" data-content="`+item.keterangan+`"`;
                        var tanda = `<span tabindex="0" style="border-right:10px solid transparent;border-bottom:5px solid transparent;border-left:5px solid #f86c6b;border-top:10px solid #f86c6b;z-index: 99;position:absolute;top:0;left:0"></span>`;
                      }else{
                        var keterangan = "";
                        var tanda = "";
                      }
                      var table_row = $("<tr id='"+item.id+"'>", {});
                      var table_cell1 = `
                      <td style="position: relative">
                      <div style="width:20px;height:100%;background-color:red">
                      </div>
                        <input type="hidden" name="id_fc_`+index+`" id="id_fc_`+index+`" class="form-control" value="`+item.fc_id+`" />
                        <input type="hidden" name="id_ka_`+index+`" id="id_ka_`+index+`" class="form-control" value="`+item.ka_id+`" />
                        <input type="hidden" name="id_`+index+`" id="id_`+index+`" class="form-control" value="`+item.id+`" />
                        <input style="cursor:pointer" `+keterangan+` onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="line_id_`+index+`" id="line_id_`+index+`" readonly class="form-control-plaintext" value="`+item.line_id+`" />
                        `+tanda+`
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
                      var table_cell11 = `
                      <td>
                        <input onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="w0_ka_`+index+`" id="w0_ka_`+item.dept_name+index+`" class="form-control ka_`+item.id+`" value="`+w0_ka+`" />
                      </td>`;
                      var table_cell12 = `
                      <td>
                        <input onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="w1_ka_`+index+`" id="w1_ka_`+item.dept_name+index+`" class="form-control ka_`+item.id+`" value="`+w1_ka+`" />
                      </td>`;
                      var table_cell13 = `
                      <td>
                        <input onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="w2_ka_`+index+`" id="w2_ka_`+item.dept_name+index+`" class="form-control ka_`+item.id+`" value="`+w2_ka+`" />
                      </td>`;
                      var table_cell14 = `
                      <td>
                        <input onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="nilai_ka_`+index+`" id="nilai_ka_`+item.dept_name+index+`" class="form-control ka_`+item.id+`" value="`+nilai_ka+`" />
                      </td>`;
                      var table_cell7 = `
                      <td>
                        <input `+disabled+` onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="labu_isi_fc_`+index+`" id="labu_isi_fc_`+item.dept_name+index+`" class="form-control fc_`+item.id+`" value="`+labu_isi_fc+`" />
                      </td>`;
                      var table_cell6 = `
                      <td>
                        <input `+disabled+` onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="labu_awal_fc_`+index+`" id="labu_awal_fc_`+item.dept_name+index+`" class="form-control fc_`+item.id+`" value="`+labu_awal_fc+`" />
                      </td>`;
                      var table_cell5 = `
                      <td>
                        <input `+disabled+` onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="bobot_sample_fc_`+index+`" id="bobot_sample_fc_`+item.dept_name+index+`" class="form-control fc_`+item.id+`" value="`+bobot_sample_fc+`" />
                      </td>`;
                      var table_cell8 = `
                      <td>
                        <input `+disabled+` onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+index+`')" type="text" name="nilai_fc_`+index+`" id="nilai_fc_`+item.dept_name+index+`" class="form-control fc_`+item.id+`" value="`+nilai_fc+`" />
                      </td>`;
                      var table_cell10 = `
                      <td class="text-center" style="vertical-align: middle">
                           <label class="switch switch-icon switch-outline-secondary" style="margin-bottom: 0 !important">
                              <input `+with_fc+` value="`+item.id+`" class="switch-input w_fc" type="checkbox" name="w_fc_`+index+`">
                              <span class="switch-label"></span>
                              <span class="switch-handle"></span>
                           </label>
                      </td>`;
                      table_row.append(table_cell1,table_cell2,table_cell11,table_cell12,table_cell13,table_cell14,table_cell10,table_cell5,table_cell6,table_cell7,table_cell8);

                      var shift_row = $('<tr>', {});
                      if (item.shift != shift_before) {
                          shift = `<td style="background-color: #f4f4f4;" colspan="11"><span style="padding-left: 5px">`+item.shift+`</span></td>`;
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
                    var table_cell1 = `<td colspan="11" class="text-center">Not data here..</td>`;
                    table_row.append(table_cell1);
                    sample_table.append(table_row);
                  }
                  $('[data-toggle="popover"]').popover()
              },
              error: function (error) {
                  console.log(error)
              }
          });
      <?php endforeach ?>
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
    $(document).on("change", ".w_fc", function () {
        if (this.checked) {
            $('.fc_'+$(this).val()).attr('disabled', false);
        }else{
            $('.fc_'+$(this).val()).attr('disabled', true);
            $('.fc_'+$(this).val()).val('');
        }
    });
    function submit_input(form)
    {
      submit_button('Menyimpan...', true);
      $.ajax({
          url : '{{ route('sample_mie.store') }}',
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
    $('.popover-dismiss').popover({
      trigger: 'focus'
    })
</script>
@endpush
