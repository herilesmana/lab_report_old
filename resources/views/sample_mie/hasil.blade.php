@extends('layouts.base')

@section('title')
    Hasil sample mie
@endsection

@section('breadcrumb')
    Hasil Sample Mie
@endsection

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
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="vertical-align: middle;" width="120">Variant</th>
                                    <th colspan="4" style="text-align: center;">FC</th>
                                    <th colspan="4" style="text-align: center;">KA</th>
                                    <th rowspan="2" style="vertical-align: middle;" width="15">Action</th>
                                </tr>
                                <tr style="text-align: center">
                                    <th width="120">Bobot Sample</th>
                                    <th width="100">Labu Awal</th>
                                    <th width="120">Labu Akhir</th>
                                    <th width="100">Nilai</th>
                                    <th width="120">Cawang Kosong</th>
                                    <th width="150">Cawan + Sample</th>
                                    <th width="120">Bobot Akhir</th>
                                    <th width="100">Nilai</th>
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
      }
    });
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
  function Approve(id)
  {
      if (confirm('Yakin approve hasil lab ini ?')) {
          $.ajax({
              url: '{{ route('sample.mie.approve') }}',
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
