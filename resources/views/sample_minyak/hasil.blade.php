@extends('layouts.base')

@section('title')
    Hasil sample minyak
@endsection

@section('breadcrumb')
    Hasil Sample Minyak
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="alert">
            </div>
            <div class="card">
                <div class="card-header">
                    Hasil Sample Minyak
                </div>
                <div class="card-body row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped sample_table" style="table-layout:fixed">
                            <thead>
                              <tr>
                                  <th rowspan="2" style="vertical-align: middle;" width="110">Sample ID</th>
                                  <th rowspan="2" style="vertical-align: middle;" width="130">Line</th>
                                  <th rowspan="2" style="vertical-align: middle;" width="60">Tangki</th>
                                  <th rowspan="2" style="vertical-align: middle;" width="80">Variant</th>
                                  <th colspan="4" style="text-align: center;">PV</th>
                                  <th colspan="4" style="text-align: center;">FFA</th>
                                  <th rowspan="2" style="vertical-align: middle;" width="15">Action</th>
                              </tr>
                              <tr style="text-align: center">
                                  <th width="110">Bobot (gram)</th>
                                  <th width="150">Volume Titrasi</th>
                                  <th width="80">Normalitas</th>
                                  <th width="120">Nilai (mek O2/kg)</th>
                                  <th width="110">Bobot (gram)</th>
                                  <th width="150">Volume Titrasi</th>
                                  <th width="120">Normalitas</th>
                                  <th width="120">Nilai (%)</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('styles')

@media (min-width: 576px)
{
  #detail .modal-dialog {
      max-width: 100% !important;
      margin: 1.75rem auto;
  }
}
#detail.modal {
  padding: 17px !important;
}

@endpush
<div class="modal" tabindex="-1" id="detail" role="dialog">
    <div class="modal-dialog" role="document" style="width: 100%; margin: 0;padding: 0">
        <div class="modal-content" style="width: 100%; margin: 0;padding: 0">
            <div class="modal-header">
              <h4 class="modal-title">Detail Duplo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="create_sample">
              <input type="hidden" name="ulang" value="false">
              <div class="modal-body row">
                  <div class="col-md-7">
                    <table id="pv-table" class="table">
                      <thead>
                        <tr>
                            <th colspan="4" style="text-align: center;">PV</th>
                            <th width="40" rowspan="2" style="text-align: center;">Choose</th>
                        </tr>
                        <tr style="text-align: center">
                            <th width="110">Bobot (gr)</th>
                            <th width="150">Volume Titrasi</th>
                            <th width="80">Normalitas</th>
                            <th width="120">Nilai (mek O2/kg)</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-5">
                    <table id="ffa-table" class="table">
                      <thead>
                        <tr>
                            <th colspan="4" style="text-align: center;">FFA</th>
                            <th rowspan="2" style="text-align: center;">Choose</th>
                        </tr>
                        <tr style="text-align: center">
                            <th width="110">Bobot (gr)</th>
                            <th width="150">Volume Titrasi</th>
                            <th width="80">Normalitas</th>
                            <th width="120">Nilai (%)</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="approve_id" class="approve_id">
                  <button type="button" onClick="Approve('')" class="btn btn-primary">Approve</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              </div>
            </form>
        </div>
    </div>
</div>

@include('sample_minyak.reject')
@endsection

  @push('scripts')
  <script type="text/javascript" src="https://cdn.rawgit.com/ashl1/datatables-rowsgroup/fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js"></script>
  <script type="text/javascript">
  var table, save_method;
  $(function() {
    table = $('.sample_table').DataTable( {
      "processing" : true,
      "ajax" : {
        "url" : "{{ route('sample.minyak.show') }}",
        "type" : "GET"
      },
      "rowsGroup": [0,2,3]
    });
    $('.dataTables_wrapper').removeClass('container-fluid');
    $('.table').removeAttr('style');
    $('#approve').on('submit', (event) => {
        event.preventDefault();
        if($('#approve textarea').val() == '') {
            alert('keterangan wajib diisi')
            $('#approve textarea').focus();
        }else{
            var dataForm = $('#approve').serialize();
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data: dataForm,
                url: '{{ route('sample.minyak.approve') }}',
                success: (response) => {
                  if (response.success == 1) {
                    $('#alert').html(`
                        <div class="alert alert-success alert-dismissible"><span><strong>Berhasil Reject!</strong> id sample : `+response.id+`</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
                    `);
                    $('#keterangan_reject').val('');
                    table.ajax.reload();
                    $('#modalReject').modal('hide');
                    makeAlert('Reject Success!', 'The sample has been rejected', 'success', 'top-right');
                  }else{
                    makeAlert('Reject Failed!', 'The sample not been rejected, try refresh your browser', 'error', 'top-right');
                  }
                },
                error: (error) => {
                    makeAlert('Reject Failed!', 'The sample not been rejected, try refresh your browser', 'error', 'top-right');
                }
            })
        }
    })
  });
  // Fungsi approve hasil sample
  function Approve(id)
  {
      if (id == '') {
          id = $('.approve_id').val()
      }
      if (confirm('Yakin approve hasil lab ini ? '+ id)) {
          $.ajax({
              url: '{{ route('sample.minyak.approve') }}',
              type: 'POST',
              data: {
                  '_token' : '{{ csrf_token() }}',
                  'id' : id,
                  'status' : 'Y'
              },
              dataType: 'JSON',
              success: (response) => {
                  if (response.success == 1) {
                    $('#alert').html(`
                        <div class="alert alert-success alert-dismissible"><span><strong>Berhasil approve!</strong> id sample : `+id+`</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
                    `);
                    table.ajax.reload();
                    $('#detail').modal('hide');
                  }
              },
              error: (error) => {
                alert('error: '+ error);
                  console.log(error);
              }
          })
      }
  }
  function detail(id)
  {
      get_pv(id);
      get_ffa(id);
      $('.approve_id').val(id)
      $('#detail').modal('show');
  }
  function get_pv(id)
  {
      var table = $('#pv-table');
      $.ajax({
          url : "{{ URL::to('sample_minyak/get_pv') }}/"+id,
          type: 'GET',
          dataType: 'JSON',
          success: (response) => {
              $('#pv-table').html('')
              $.each(response, function(index, item) {
                  var row =  $('<tr>', {});
                  var bobot_sample = `<td>`+item.bobot_sample+`</td>`;
                  var volume_titrasi = `<td>`+item.volume_titrasi+`</td>`;
                  var normalitas = `<td>`+item.normalitas+`</td>`;
<<<<<<< HEAD
                  var nilai = `<td>`+item.nilai+`</td>`;
                  if (item.used == null) {
                    var action = `<td class="pv pv`+item.id+`"><a href="javascript:;" onClick="use_pv('`+item.sample_id+`','`+item.id+`')"><i class="fa fa-check"></i> Use</a></td>`;
                  }else if (item.used == 'Y') {
                    var action = `<td><i class="fa fa-check"></i> Used</td>`;
                  }else if (item.used == 'N') {
                    var action = `<td><i class="fa fa-close"></i></td>`;
                  }else {
                    var action = `<td>Nothing</td>`;
=======
                  var not = '';
                  var used = '';
                  if (item.used == null || item.used == 'N') {
                      not = 'none';
                      used = 'block';
                  }else if (item.used == 'Y') {
                      not = 'block';
                      used = 'none';
>>>>>>> 2fc48dea1bd30831ec8ca817208dd888b1082001
                  }
                  var action = `
                    <td style="display: `+used+`" class="not pv pv`+item.id+`"><a href="javascript:;" onClick="use_pv('`+item.sample_id+`','`+item.id+`')"><i class="fa fa-check"></i> Use</a></td>
                    <td style="display: `+not+`" class="used pv pv`+item.id+`"><i class="fa fa-check"></i> Used</td>
                    `;
                  var nilai = `<td>`+item.nilai+`</td>`;
                  row.append(bobot_sample, volume_titrasi, normalitas, nilai, action);
                  table.append(row);
              })
          },
          error: (error) => {
              console.log(error)
          }
      })
  }
  function get_ffa(id)
  {
      $.ajax({
          url : "{{ URL::to('sample_minyak/get_ffa') }}/"+id,
          type: 'GET',
          dataType: 'JSON',
          success: (response) => {
              $('#ffa-table').html('')
              $.each(response, function(index, item) {
                  var table = $('#ffa-table');
                  var row =  $('<tr>', {});
                  var bobot_sample = `<td>`+item.bobot_sample+`</td>`;
                  var volume_titrasi = `<td>`+item.volume_titrasi+`</td>`;
                  var normalitas = `<td>`+item.normalitas+`</td>`;
<<<<<<< HEAD
                  if (item.used == null) {
                    var action = `<td class="ffa ffa`+item.id+`"><a href="javascript:;" onClick="use_ffa('`+item.sample_id+`','`+item.id+`')"><i class="fa fa-check"></i> Use</a></td>`;
                  }else if (item.used == 'Y') {
                    var action = `<td><i class="fa fa-check"></i> Used</td>`;
                  }else if (item.used == 'N') {
                    var action = `<td><i class="fa fa-close"></i></td>`;
                  }else {
                    var action = `<td>Nothing</td>`;
=======
                  var not = '';
                  var used = '';
                  if (item.used == null || item.used == 'N') {
                      not = 'none';
                      used = 'block';
                  }else if (item.used == 'Y') {
                      not = 'block';
                      used = 'none';
>>>>>>> 2fc48dea1bd30831ec8ca817208dd888b1082001
                  }
                  var action = `
                    <td style="display: `+used+`" class="not ffa ffa`+item.id+`"><a href="javascript:;" onClick="use_ffa('`+item.sample_id+`','`+item.id+`')"><i class="fa fa-check"></i> Use</a></td>
                    <td style="display: `+not+`" class="used ffa ffa`+item.id+`"><i class="fa fa-check"></i> Used</td>
                    `;
                  var nilai = `<td>`+item.nilai+`</td>`;
                  row.append(bobot_sample, volume_titrasi, normalitas, nilai, action);
                  table.append(row);
              })
          },
          error: (error) => {
              console.log(error)
          }
      })
  }
  function use_pv(sample_id, pv_id)
  {
<<<<<<< HEAD
    $.ajax({
        url : "{{ URL::to('sample_minyak/use_pv') }}/"+sample_id+"/"+pv_id,
        type: 'GET',
        dataType: 'JSON',
        success: (response) => {
            $('.pv').html('<i class="fa fa-close"></i>');
            $('.pv'+pv_id).html('<i class="fa fa-check"></i> Used');
        },
        error: (error) => {
            console.log(error)
        }
    })
  }
  function use_ffa(sample_id, ffa_id)
  {
    $.ajax({
        url : "{{ URL::to('sample_minyak/use_ffa') }}/"+sample_id+"/"+ffa_id,
        type: 'GET',
        dataType: 'JSON',
        success: (response) => {
            $('.ffa').html('<i class="fa fa-close"></i>');
            $('.ffa'+ffa_id).html('<i class="fa fa-check"></i> Used');
        },
        error: (error) => {
            console.log(error)
        }
    })
=======
    if ( confirm( "Use this PV ? ") ) {
      $.ajax({
          url : "{{ URL::to('sample_minyak/use_pv') }}/"+sample_id+"/"+pv_id,
          type: 'GET',
          dataType: 'JSON',
          success: (response) => {
              $('.not.pv').show();
              $('.used.pv').hide();
              $('.not.pv'+pv_id).hide();
              $('.used.pv'+pv_id).show();
          },
          error: (error) => {
              console.log(error)
          }
      })
    }
  }
  function use_ffa(sample_id, ffa_id)
  {
    if ( confirm( "Use this FFA ? ") ) {
      $.ajax({
          url : "{{ URL::to('sample_minyak/use_ffa') }}/"+sample_id+"/"+ffa_id,
          type: 'GET',
          dataType: 'JSON',
          success: (response) => {
              $('.not.ffa').show();
              $('.used.ffa').hide();
              $('.not.ffa'+ffa_id).hide();
              $('.used.ffa'+ffa_id).show();
          },
          error: (error) => {
              console.log(error)
          }
      })
    }
>>>>>>> 2fc48dea1bd30831ec8ca817208dd888b1082001
  }
  // Menampilkan modal keterangan reject
  function Reject(id)
  {
      $('input[name=id]').val(id);
      $('.id-sample').text(id);
      $('#modalReject').modal('show');
      $('#keterangan_reject').focus();
  }
  </script>
  @endpush

