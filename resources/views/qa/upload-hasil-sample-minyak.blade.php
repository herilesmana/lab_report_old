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
  			     <span>Input Hasil Sample</span>
             <span class="float-right">
                <span style="padding-right: 20px">
                  <a href="javascript:;" role="button" onClick="window.location.reload()" class="btn btn-sm btn-sm btn-outline-info" style="position: relative;">
                    <i class="fa fa-refresh"></i> Refresh
                  </a>
                </span>
             </span>
  			</div>
  			<div class="card-body" style="padding-bottom: 0 !important; padding-right: 0 !important;padding-left: 0 !important">
            <div class="container-fluid form-horizontal">
                <div class="form-group row">
                  <div class="col-sm-2">
                    <label for="normalitas-setter-pv" class="col-form-label">Normalitas PV :</label>
                    <input autocomplete="off" type="text" maxlength="6" name="normalitas-setter-pv" class="normalitas-setter-pv form-control" id="normalitas-setter-pv" placeholder="PV">
                  </div>
                  <div class="col-sm-2">
                    <label for="normalitas-setter-pv" class="col-form-label">Normalitas FFA :</label>
                    <input autocomplete="off" type="text" maxlength="6" name="normalitas-setter-ffa" class="normalitas-setter-ffa form-control" id="normalitas-setter-ffa" placeholder="FFA">
                  </div>
                  <div class="col-sm-2">
                    <label for="dept-setter" class="col-form-label">Plant :</label>
                    <select id="dept-setter" class="form-control">
                        <option value="">---</option>
                        <option value="PRN">PRN</option>
                        <option value="PNC">PNC</option>
                    </select>
                  </div>
                  <div class="col-sm-6 alert alert-info">
                    <i class="fa fa-exclamation-circle"></i> <strong>Tips !</strong> Tekan enter setelah mengganti nilai normalitas
                  </div>
                </div>
            </div>
    				<div class="_dept" id="PRN" style="display: none">
                <div class="form-group row">
                  <div class="col-md-12 table-responsive">
                    <form class="" action="" method="post" id="formSample">
                      <input autocomplete="off" type="hidden" id="row" name="row" value="">
                      <table class="table table-bordered editable" id="sample-id">
                          <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;" width="100">Line</th>
                                <th rowspan="2" style="vertical-align: middle;" width="80">Variant</th>
                                <th rowspan="2" style="vertical-align: middle;" width="70">Tangki</th>
                                <th colspan="4" style="text-align: center;">PV</th>
                                <th colspan="4" style="text-align: center;">FFA</th>
                                <th rowspan="2" style="vertical-align: middle;" width="70">Action</th>
                            </tr>
                            <tr style="text-align: center">
                                <th style="vertical-align: middle;">Bobot Sample (gram)</th>
                                <th style="vertical-align: middle;">Volume Titrasi</th>
                                <th style="vertical-align: middle;">Normalitas</th>
                                <th style="vertical-align: middle;">Nilai (mek O2/kg)</th>
                                <th style="vertical-align: middle;">Bobot Sample (gram)</th>
                                <th style="vertical-align: middle;">Volume Titrasi</th>
                                <th style="vertical-align: middle;">Normalitas</th>
                                <th style="vertical-align: middle;">Nilai (%)</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="12">Last index :
                                  <input autocomplete="off" type="text" readonly id="prn-last-index" name="prn_last_index">
                                  <span class="text-right">
                                      <button class="btn btn-outline-primary btn-simpan" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                  </span>
                              </td>
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
                      <input autocomplete="off" type="hidden" id="pnc-row" name="pnc_row" value="">
                      <table class="table table-bordered editable" id="pnc-sample-id">
                          <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;" width="100">Line</th>
                                <th rowspan="2" style="vertical-align: middle;" width="80">Variant</th>
                                <th rowspan="2" style="vertical-align: middle;" width="70">Tangki</th>
                                <th colspan="4" style="text-align: center;">PV</th>
                                <th colspan="4" style="text-align: center;">FFA</th>
                                <th rowspan="2" style="vertical-align: middle;" width="70">Action</th>
                            </tr>
                            <tr style="text-align: center">
                                <th style="vertical-align: middle;">Bobot Sample (gram)</th>
                                <th style="vertical-align: middle;">Volume Titrasi</th>
                                <th style="vertical-align: middle;">Normalitas</th>
                                <th style="vertical-align: middle;">Nilai (mek O2/kg)</th>
                                <th style="vertical-align: middle;">Bobot Sample (gram)</th>
                                <th style="vertical-align: middle;">Volume Titrasi</th>
                                <th style="vertical-align: middle;">Normalitas</th>
                                <th style="vertical-align: middle;">Nilai (%)</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="12">Last index :
                                  <input autocomplete="off" type="text" readonly id="pnc-last-index" name="pnc_last_index">
                                  <span class="text-right">
                                      <button class="btn btn-outline-primary btn-simpan" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                  </span>
                              </td>
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
    $(document).ready(() => {
        get_sample_id();
        setTimeout(function() {
          $("input:text").focus(function() { $(this).select(); } );
        }, 3000)
    })
    function getNormalitas(name)
    {
        $('.normalitas-setter-'+name).val(localStorage.getItem('normalitas-'+name));
        $('.normalitas-'+name).val(localStorage.getItem('normalitas-'+name));
    }
    function setNormalitas(name, value)
    {
        localStorage.setItem('normalitas-'+name, value);
    }
    $('#normalitas-setter-pv').on('keyup', (e) => {
      setNormalitas('pv', $('#normalitas-setter-pv').val() );
      getNormalitas('pv');
      var length = localStorage.getItem('rows');
      for (var i = length; i >= 0; i--) {
          nilai(i);
      }
    });
    $('#normalitas-setter-ffa').on('keyup', (e) => {
      setNormalitas('ffa', $('#normalitas-setter-ffa').val() );
      getNormalitas('ffa');
      var length = localStorage.getItem('rows');
      for (var i = length; i >= 0; i--) {
          nilai(i);
      }
    });
    function get_sample_id()
    {
      var sample_table = $('#sample-id');
      var pnc_sample_table = $('#pnc-sample-id');
      <?php foreach ($departments as $department): ?>
        $.ajax({
          url: "{{ URL::to('sample-minyak') }}/1/<?php echo $department->id; ?>",
          type: "GET",
          dataType: "JSON",
          success: function (response) {
              var tanggal_shift_before = "";
              var dept_before = "";
              var keterangan = "";
              var tanda = "";
              $.each(response, (index, item) => {
                  if (item.volume_titrasi_pv == null) {
                      var volume_titrasi_pv = '';
                  }else {
                      volume_titrasi_pv = item.volume_titrasi_pv.toFixed(2);
                  }
                  if (item.bobot_sample_pv == null) {
                      var bobot_sample_pv = '';
                  }else {
                      var bobot_sample_pv = item.bobot_sample_pv.toFixed(4);
                  }
                  if (item.normalitas_pv == null) {
                      var normalitas_pv = '';
                  }else {
                      var normalitas_pv = item.normalitas_pv.toFixed(4);
                  }
                  if (item.nilai_pv == null) {
                      var nilai_pv = '';
                  }else {
                      var nilai_pv = item.nilai_pv.toFixed(2);
                  }
                  if (item.volume_titrasi_ffa == null) {
                      var volume_titrasi_ffa = '';
                  }else {
                      var volume_titrasi_ffa = item.volume_titrasi_ffa.toFixed(2);
                  }
                  if (item.bobot_sample_ffa == null) {
                      var bobot_sample_ffa = '';
                  }else {
                      var bobot_sample_ffa = item.bobot_sample_ffa.toFixed(4);
                  }
                  if (item.normalitas_ffa == null) {
                      var normalitas_ffa = '';
                  }else {
                      var normalitas_ffa = item.normalitas_ffa.toFixed(4);
                  }
                  if (item.nilai_ffa == null) {
                      var nilai_ffa = '';
                  }else {
                      var nilai_ffa = item.nilai_ffa.toFixed(4);
                  }
                  if (item.ulang == 'Y') {
                      keterangan = `data-toggle="popover" data-trigger="focus" title="Revis Detail" data-content="`+item.keterangan+`"`;
                    tanda = `<span tabindex="0" style="border-right:10px solid transparent;border-bottom:5px solid transparent;border-left:5px solid rgb(255,193,7);border-top:10px solid rgb(255,193,7);z-index: 99;position:absolute;top:0;left:0"></span>`;
                  }else if (item.approver != null && item.approve == null) {
                    keterangan = `data-toggle="popover" data-trigger="focus" title="Revis Detail" data-content="`+item.keterangan+`"`;
                    tanda = `<span tabindex="0" style="border-right:10px solid transparent;border-bottom:5px solid transparent;border-left:5px solid #f86c6b;border-top:10px solid #f86c6b;z-index: 99;position:absolute;top:0;left:0"></span>`;
                  }else{
                    keterangan = "";
                    tanda = "";
                  }
                  var line_id = (item.line_id+item.sample_date+item.sample_time).replace(/ |:/gi,'-');
                  var table_row = $("<tr id='"+item.id+"'>", {});
                  var table_cell1 = `
                  <td style="position: relative">
                    <input autocomplete="off" style="cursor:pointer" `+keterangan+` onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="line_`+index+`" id="line_`+index+`" readonly class="form-control-plaintext" value="`+item.line_id+`" />
                    `+tanda+`
                  </td>`;
                  var table_cell2 = `
                  <td>
                    <input autocomplete="off" type="hidden" name="id_row_`+index+`" id="id_row_`+index+`" class="form-control" value="`+line_id+`" />
                    <input autocomplete="off" type="hidden" name="id_pv_`+index+`" id="id_pv_`+index+`" class="form-control" value="`+item.pv_id+`" />
                    <input autocomplete="off" type="hidden" name="id_ffa_`+index+`" id="id_ffa_`+index+`" class="form-control" value="`+item.ffa_id+`" />
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, `+index+`)" type="hidden" name="id_`+index+`" id="id_`+index+`" class="form-control-plaintext" value="`+item.id+`" />
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="variant_`+index+`" id="variant_`+index+`" readonly class="form-control-plaintext" value="`+item.variant+`" />
                  </td>`;
                  var table_cell3 = `
                  <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="tangki_`+index+`" id="tangki_`+index+`" readonly class="form-control-plaintext" value="`+item.tangki+`" />
                  </td>`;
                  // var table_cell3 = `<td><input autocomplete="off" onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="variant_product_`+index+`" id="variant_product_`+index+`" readonly class="form-control-plaintext" value="`+item.mid_product+`" /></td>`;
                  var table_cell6 = `
                  <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+`','`+index+`', 'volume_titrasi_pv_')" type="text" name="volume_titrasi_pv_`+index+`" id="volume_titrasi_pv_`+item.dept_name+index+`" class="volume_titrasi_pv_`+index+` form-control" value="`+volume_titrasi_pv+`" />
                  </td>`;
                  var table_cell5 = `
                  <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+`','`+index+`', 'bobot_sample_pv_')" type="text" name="bobot_sample_pv_`+index+`" id="bobot_sample_pv_`+item.dept_name+index+`" class="bobot_sample_pv_`+index+` form-control" value="`+bobot_sample_pv+`" />
                  </td>`;
                  var table_cell7 = `
                  <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+`','`+index+`', 'normalitas_pv_')" type="text" name="normalitas_pv_`+index+`" id="normalitas_pv_`+item.dept_name+index+`" class="normalitas_pv_`+index+` normalitas-pv form-control" value="`+normalitas_pv+`" />
                  </td>`;
                  var table_cell8 = `
                  <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+`','`+index+`', 'nilai_pv_')" type="text" name="nilai_pv_`+index+`" id="nilai_pv_`+item.dept_name+index+`" class="nilai_pv_`+index+` form-control" value="`+nilai_pv+`" />
                  </td>`;
                  var table_cell11 = `
                  <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+`','`+index+`', 'volume_titrasi_ffa_')" type="text" name="volume_titrasi_ffa_`+index+`" id="volume_titrasi_ffa_`+item.dept_name+index+`" class="volume_titrasi_ffa_`+index+` form-control" value="`+volume_titrasi_ffa+`" />
                  </td>`;
                  var table_cell10 = `
                  <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+`','`+index+`', 'bobot_sample_ffa_')" type="text" name="bobot_sample_ffa_`+index+`" id="bobot_sample_ffa_`+item.dept_name+index+`" class="bobot_sample_ffa_`+index+` form-control" value="`+bobot_sample_ffa+`" />
                  </td>`;
                  var table_cell12 = `
                  <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+`','`+index+`', 'normalitas_ffa_')" type="text" name="normalitas_ffa_`+index+`" id="normalitas_ffa_`+item.dept_name+index+`" class="normalitas_ffa_`+index+` normalitas-ffa form-control" value="`+normalitas_ffa+`" />
                  </td>`;
                  var table_cell13 = `
                  <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+item.dept_name+`','`+index+`', 'nilai_ffa_')" type="text" name="nilai_ffa_`+index+`" id="nilai_ffa_`+item.dept_name+index+`" class="nilai_ffa_`+index+` form-control" value="`+nilai_ffa+`" />
                  </td>`;
                  var table_cell14 = `<td style="vertical-align: top;" class="text-center">
                    <a class="btn btn-sm btn-primary" style="margin-top: 3px" href="javascript:;" title="Duplo Sample" onClick="duplo('`+item.id+`','`+item.line_id+`','`+item.variant+`','`+item.tangki+`', '`+item.dept_name.toLowerCase()+`')"><i class="fa fa-plus"></i></a></td>`;
                  // Menambahkan kolom ke row
                  table_row.append(table_cell1,table_cell2,table_cell3,table_cell5,table_cell6,table_cell7,table_cell8,table_cell10,table_cell11,table_cell12,table_cell13,table_cell14);
                  // Untuk keterangan tanggal dan variant
                  var tanggal_row = $('<tr>', {});
                  if (item.sample_date+item.shift+item.sample_time != tanggal_shift_before) {
                      if (item.sample_time == null) {
                        var sample_time = '';
                      }else{
                        var sample_time = item.sample_time;
                      }
                      tanggal = `<td style="background-color: #f9f9f9;padding:5px !important" colspan="12"><span>`+item.shift+`</span><span class="float-right">`+item.sample_date+` `+sample_time+`</span></td>`;
                      tanggal_row.append(tanggal);
                      tanggal_shift_before = item.sample_date+item.shift+item.sample_time;
                  }
                  var dept_row = $('<tr>', {});
                  if (item.dept_name != dept_before) {
                      dept_name = `<td style="background-color: #fff;text-align:center;font-weight:bold;padding:10px 17px !important" colspan="12"><span style="padding:5px 20px;border-bottom: 1px solid #666">`+item.dept_name+`</span></td>`;
                      dept_row.append(dept_name);
                      dept_before = item.dept_name;
                  }
                  // Menambahkan semua row ke tabel
                  if (item.dept_name == "PRN")
                  {
                      sample_table.append(dept_row, tanggal_row,table_row);
                      $('#prn-last-index').val(index);
                      $('#row').val(index);
                  }else if (item.dept_name == "PNC")
                  {
                      pnc_sample_table.append(dept_row, tanggal_row,table_row);
                      $('#pnc-last-index').val(index);
                      $('#pnc-row').val(index);
                  }
                  getNormalitas('pv');
                  getNormalitas('ffa');
                  localStorage.setItem('rows', index);
              });
              if(response.length == 0)
              {
                var table_row = $('<tr>', {});
                var table_cell1 = `<td colspan="12" class="text-center">Not data here..</td>`;
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
    function duplo(sample_id, line_id, variant, tangki, dept)
    {
        var index = $('#'+dept+'-last-index').val();
        var index = parseInt(index) + 1;
        $('#'+dept+'-last-index').val(index);
        $('#'+sample_id).after(`
            <tr id="duplo-`+sample_id+index+`" class="duplo-`+sample_id+`">
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, `+index+`)" type="hidden" name="duplo_sample_id_`+index+`" id="duplo_sample_id_`+index+`" class="form-control-plaintext" value="`+sample_id+`" />
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="duplo_line_`+index+`" id="line_`+index+`" readonly class="form-control-plaintext" value="`+line_id+`" />
                </td>
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="duplo_variant_`+index+`" id="variant_`+index+`" readonly class="form-control-plaintext" value="`+variant+`" />
                </td>
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="duplo_tangki_`+index+`" id="tangki_`+index+`" readonly class="form-control-plaintext" value="`+tangki+`" />
                </td>
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+dept+`','`+index+`', 'bobot_sample_pv_')" type="text" name="duplo_bobot_sample_pv_`+index+`" id="bobot_sample_pv_`+dept+index+`" class="form-control" value="" />
                </td>
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+dept+`','`+index+`', 'volume_titrasi_pv_')" type="text" name="duplo_volume_titrasi_pv_`+index+`" id="volume_titrasi_pv_`+dept+index+`" class="form-control" value="" />
                  </td>
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+dept+`','`+index+`', 'normalitas_')" type="text" name="duplo_normalitas_pv_`+index+`" id="normalitas_pv_`+dept+index+`" class="normalitas-pv form-control" value="" />
                </td>
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+dept+`','`+index+`', 'nilai_pv_')" type="text" name="duplo_nilai_pv_`+index+`" id="nilai_pv_`+dept+index+`" class="form-control" value="" />
                </td>
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+dept+`','`+index+`', 'bobot_sample_ffa_')" type="text" name="duplo_bobot_sample_ffa_`+index+`" id="bobot_sample_ffa_`+dept+index+`" class="form-control" value="" />
                </td>
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+dept+`','`+index+`', 'volume_titrasi_ffa_')" type="text" name="duplo_volume_titrasi_ffa_`+index+`" id="volume_titrasi_ffa_`+dept+index+`" class="form-control" value="" />
                </td>
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+dept+`','`+index+`', 'normalitas_ffa_')" type="text" name="duplo_normalitas_ffa_`+index+`" id="normalitas_ffa_`+dept+index+`" class="normalitas-ffa form-control" value="" />
                </td>
                <td>
                    <input autocomplete="off" onkeyup="return AllowNumbersOnly(event, '`+dept+`','`+index+`', 'nilai_ffa_')" type="text" name="duplo_nilai_ffa_`+index+`" id="nilai_ffa_`+dept+index+`" class="form-control" value="" />
                </td>
                <td style="vertical-align: top;" class="text-center">
                    <a class="btn btn-sm btn-danger" style="margin-top: 3px" href="javascript:;" title="Hapus duplo" onClick="delete_duplo('duplo-`+sample_id+index+`', '`+dept+`')"><i class="fa fa-close"></i></a>
                </td>
            </tr>
        `);
        getNormalitas('pv');
        getNormalitas('ffa');
    }
    function delete_duplo(duplo, dept)
    {
      if (confirm('Delete this duplo?')) {
        var index = $('#'+dept+'-last-index').val();
        var index = parseInt(index) - 1;
        $('#'+dept+'-last-index').val(index);
        $('#'+duplo).remove();
      }
    }
    function deleteSample(id)
    {
        if(confirm('Yakin hapus sample ini?')) {
            $.ajax({
                url : "{{ URL::to('sample-minyak/delete') }}/"+id,
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
    function AllowNumbersOnly(e,dept,index,inputName) {
      // Memastikan hanya angka dan titik yang diinput user.
      var code = (e.which) ? e.which : e.keyCode;
      if ( ( code != 46 && (code > 31 && (code < 48 || code > 57)) ) && e.ctrlKey == false  ) {
          e.preventDefault();
      }
      switch(code) {
      case (37) :
        switch(inputName) {
          case('bobot_sample_pv_') :
          $('.nilai_ffa_'+index).focus();
          break;
          case('volume_titrasi_pv_') :
          $('.bobot_sample_pv_'+index).focus();
          break;
          case('normalitas_pv_') :
          $('.volume_titrasi_pv_'+index).focus();
          break;
          case('nilai_pv_') :
          $('.normalitas_pv_'+index).focus();
          break;
          case('bobot_sample_ffa_') :
          $('.nilai_pv_'+index).focus();
          break;
          case('volume_titrasi_ffa_') :
          $('.bobot_sample_ffa_'+index).focus();
          break;
          case('normalitas_ffa_') :
          $('.volume_titrasi_ffa_'+index).focus();
          break;
          case('nilai_ffa_') :
          $('.normalitas_ffa_'+index).focus();
          break;
        }
        break;
      case (38) :
        $('.'+inputName+(parseInt(index)-1)).focus();
        break;
      case (39) :
        switch(inputName) {
          case('bobot_sample_pv_') :
          $('.volume_titrasi_pv_'+index).focus();
          break;
          case('volume_titrasi_pv_') :
          $('.normalitas_pv_'+index).focus();
          break;
          case('normalitas_pv_') :
          $('.nilai_pv_'+index).focus();
          break;
          case('nilai_pv_') :
          $('.bobot_sample_ffa_'+index).focus();
          break;
          case('bobot_sample_ffa_') :
          $('.volume_titrasi_ffa_'+index).focus();
          break;
          case('volume_titrasi_ffa_') :
          $('.normalitas_ffa_'+index).focus();
          break;
          case('normalitas_ffa_') :
          $('.nilai_ffa_'+index).focus();
          break;
          case('nilai_ffa_') :
          $('.bobot_sample_pv_'+index).focus();
          break;
        }
        break;
      case (40) :
        $('.'+inputName+(parseInt(index)+1)).focus();
        break;
      }

      nilai(dept+index)
    }
    function nilai(index)
    {
        // Jika di enter
        var volume_titrasi_pv = $('#volume_titrasi_pv_'+index).val().replace(',', '.');
        var bobot_sample_pv = $('#bobot_sample_pv_'+index).val().replace(',', '.');
        var normalitas_pv = $('#normalitas_pv_'+index).val().replace(',', '.');
        var volume_titrasi_ffa = $('#volume_titrasi_ffa_'+index).val().replace(',', '.');
        var bobot_sample_ffa = $('#bobot_sample_ffa_'+index).val().replace(',', '.');
        var normalitas_ffa = $('#normalitas_ffa_'+index).val().replace(',', '.');
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
    $('#dept-setter').on('change', () => {
        var dept = $('#dept-setter').val();
        $('._dept').hide();
        $('#'+dept).show();
    })
    $(function() {
        $('#formSample').on('submit', (event) => {
            event.preventDefault();
            submit_input('formSample');
        });
        $('#pnc-formSample').on('submit', (event) => {
            event.preventDefault();
            submit_input('pnc-formSample');
        });
    })
    function submit_button(text, disabled)
    {
        $('.btn-simpan').text(text);
        $('.btn-simpan').attr('disabled', disabled);
    }
    function submit_input(form)
    {
        submit_button('Menyimpan...', true);
        $.ajax({
            url : '{{ route('sample_minyak.store') }}',
            type : 'POST',
            dataType : 'JSON',
            data : $('#'+form).serialize(),
            success : (response) => {
                if (response.success == 1) {
                    submit_button('Simpan', false);
                    // get_sample_id();
                    for (var i = response.saved_id.length - 1; i >= 0; i--) {
                      $('#'+response.saved_id[i]).hide( 500 , () => {
                         $(this).remove();
                      });
                      $('.duplo-'+response.saved_id[i]).hide( 500 , () => {
                         $(this).remove();
                      });
                      makeAlert('Input Success!', 'Simple '+response.saved_id[i]+' inputed successfully', 'success', 'top-right');
                    }
                    for (var i = response.failed_id.length - 1; i >= 0; i--) {
                      makeAlert('Input Failed!', 'Simple '+response.failed_id[i]+' Not inputed successfully', 'error', 'top-right');
                    }
                } else {
                    makeAlert('Input Error!', 'Input samples Failed, try refresh your browser', 'error', 'top-right');
                }
            },
            error : (error) => {
                submit_button('Simpan', false);
                makeAlert('Input Error!', 'Make sure the data you fill in is correct', 'error', 'top-right');
            }
        })
    }
    $('.popover-dismiss').popover({
      trigger: 'focus'
    })
</script>
@endpush
