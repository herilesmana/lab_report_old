@extends('layouts.base')

@section('title')
    Hasil sample mie
@endsection

@section('breadcrumb')
    Hasil Sample Mie
@endsection

@push('styles')

.table {
  margin-bottom: 0 !important;
}

.pagination {
    margin-top: 10px;
}

@endpush


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="alert">
            </div>
            <div class="card">
                <div class="card-header">
                    Hasil Sample Mie
                </div>
                <div class="card-body row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered" width="100%">
                            <thead>
                              <tr>
                                  <th rowspan="2" style="vertical-align: middle;">Line</th>
                                  <th rowspan="2" style="vertical-align: middle;">Variant</th>
                                  <th rowspan="2" style="vertical-align: middle;">Shift</th>
                                  <th rowspan="2" style="vertical-align: middle;">Create</th>
                                  <th colspan="4" style="text-align: center;">FC</th>
                                  <th colspan="4" style="text-align: center;">KA</th>
                                  <th rowspan="2" style="vertical-align: middle;">Action</th>
                              </tr>
                              <tr style="text-align: center">
                                  <th style="vertical-align: middle;">LI</th>
                                  <th style="vertical-align: middle;">LA</th>
                                  <th style="vertical-align: middle;">B</th>
                                  <th style="vertical-align: middle;">Nilai</th>
                                  <th style="vertical-align: middle;">BC 0</th>
                                  <th style="vertical-align: middle;">BC 1</th>
                                  <th style="vertical-align: middle;">BC 2</th>
                                  <th style="vertical-align: middle;">Nilai</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h4>Keterangan :</h4>
                        <ul>
                          <li>LI = Labu Isi</li>
                          <li>LA = Labu Awal</li>
                          <li>B = Bobot Sample</li>
                          <li>BC 0 = Bobot Cawan 0</li>
                          <li>BC 1 = Bobot Cawan 1</li>
                          <li>BC 2 = Bobot Cawan 2</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('sample_mie.reject')
@endsection

@push('scripts')
  @push('scripts')
  <script type="text/javascript">
  var table, save_method;
  $(function() {
    table = $('.table').DataTable( {
      "processing" : true,
      "ajax" : {
        "url" : "{{ route('sample.mie.show') }}",
        "type" : "GET"
      },
      "scrollY":        "500px",
      "scrollX":        true,
      "scrollCollapse": true,
      "paging":         false,
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
                url: '{{ route('sample.mie.approve') }}',
                success: (response) => {
                  if (response.success == 1) {
                    $('#modalReject').modal('hide');
                    $('#alert').html(`
                        <div class="alert alert-success alert-dismissible"><span><strong>Berhasil Reject!</strong> id sample : `+response.id+`</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
                    `);
                    table.ajax.reload();
                  }
                },
                error: (error) => {
                    alert('error '+error);
                    console.log(error)
                }
            })
        }
    })
  });
  // Fungsi approve hasil sample
  function Approve(id, fc="")
  {
      if (confirm('Yakin approve hasil lab ini ?')) {
          $.ajax({
              url: '{{ route('sample.mie.approve') }}',
              type: 'POST',
              data: {
                  '_token' : '{{ csrf_token() }}',
                  'id' : id,
                  'status' : 'Y',
                  'fc' : fc
              },
              dataType: 'JSON',
              success: (response) => {
                  if (response.success == 1) {
                    $('#alert').html(`
                        <div class="alert alert-success alert-dismissible"><span><strong>Berhasil approve!</strong> id sample : `+id+`</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
                    `);
                    table.ajax.reload();
                  }
              },
              error: (error) => {
                alert('error: '+ error);
                  console.log(error);
              }
          })
      }
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

@endpush
