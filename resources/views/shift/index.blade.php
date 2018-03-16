@extends('layouts.base')

@section('title')
    Master Shift
@endsection

@section('breadcrumb')
  Shift
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  				Master Shift
  			</div>
  			<div class="card-body">
  				<div class="container-fluid">
            <div id="alert">
            </div>
            <button onClick="showForm()" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Shift</button></div>
    				<br>
    				<table id="shift" class="table table-striped table-bordered table-hover">
    					<thead>
    						<tr>
                  <th>No</th>
    							<th>Name</th>
                  <th style="width: 150px">Jam Mulai</th>
                  <th style="width: 150px">Jam Berakhir</th>
                  <th style="width: 250px">Status</th>
    							<th style="width: 250px">Action</th>
    						</tr>
    					</thead>
    					<tbody></tbody>
    				</table>
  			</div>
  		</div>
  	</div>
  </div>
  @include('shift.form')
@endsection

@push('scripts')
<script type="text/javascript">
var table, save_method;
$(function() {
  table = $('.table').DataTable( {
    "processing" : true,
    "ajax" : {
      "url" : "{{ route('shift.data') }}",
      "type" : "GET"
    }
  });

  $('#jam_awal').datetimepicker({
      locale:'id',
      format: 'HH:mm'
  });

  $('#jam_akhir').datetimepicker({
      locale: 'id',
      format: 'HH:mm'
  });

  $('#modalForm form').on('submit', function (event) {
      event.preventDefault();
      $('#btnSave').text('Saving..');
      $('#btnSave').attr('disabled', true);

      var id = $('input[name=name]').val();
      var url;

      if (save_method == "add") url = '{{ route('shift.store') }}';
      else url = 'shift/'+id;

      $.ajax({
          url : url,
          type : $('input[name=_method]').val(),
          data : $('#modalForm form').serialize(),
          dataType: 'JSON',
          success : function (data) {
            if (data.success == '1') {
                // Jika data berhasil disimpan
                $('input').removeClass('is-invalid');
                $('#modalForm').modal('hide');
                $('#btnSave').attr('disabled', false);
                $('#btnSave').text('Save');
                $('#alert').html(`
                  <div class="alert alert-primary alert-dismissible"><span>Shift `+data.action+`!</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
                  `);
                table.ajax.reload();
            }else{
                // Jika data gagal disimpan
                $('#btnSave').attr('disabled', false);
                $('#btnSave').text('Save');
                $('#modalForm form').addClass('was-error');
                if (data.errors.name) {
                    $('#name input').addClass('is-invalid');
                    $('#name span').text(data.errors.name)
                }else{
                    $('#name input').removeClass('is-invalid');
                }
                if (data.errors.jam_awal) {
                    $('#jam_awal input').addClass('is-invalid');
                    $('#jam_awal span').text(data.errors.jam_awal)
                }else{
                    $('#jam_awal input').removeClass('is-invalid');
                }
                if (data.errors.jam_akhir) {
                    $('#jam_akhir input').addClass('is-invalid');
                    $('#jam_akhir span').text(data.errors.jam_akhir)
                }else{
                    $('#jam_akhir input').removeClass('is-invalid');
                }
            }
          },
          error : function (error) {
            console.log('error '+error);
            alert('Tidak dapat menyimpan data!');
            $('#btnSave').attr('disabled', false);
            $('#btnSave').text('Save');
          }
      });

  });

});
// Untuk menampilkan form
function showForm() {
    save_method = "add";
    $('#modalForm').modal('show');
    $('#modalForm form')[0].reset();
    $('input[name=_method]').val('POST');
    $('.modal-title').text('Tambah Shift');
    $('input').attr('readonly', false);
}
// Untuk menampilkan form
function editForm(id) {
    save_method = "edit";
    $('#modalForm').modal('show');
    $('#modalForm form')[0].reset();
    $('input[name=_method]').val('PATCH');
    $('.modal-title').text('Edit Shift');
    $('input[name=name]').attr('readonly', true);
    $('input[name=name]').val(id);
    $.ajax({
        url : 'shift/'+id+'/edit',
        type : 'GET',
        dataType: 'JSON',
        success: (response) => {
            $('input[name=jam_awal]').val(response.jam_awal);
            $('input[name=jam_akhir]').val(response.jam_akhir);
            if (response.status == 'N') $('input[name=status]').attr('checked', false);
            else $('input[name=status]').attr('checked', true);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function deleteData(id) {
    if(confirm('Yakin akan menghapus data ?'))
        $.ajax({
            type: 'DELETE',
            url: 'shift/'+id,
            data : {
                '_token' : "{{ csrf_token() }}"
            },
            success: (response) => {
                $('#alert').html(`
                    <div class="alert alert-danger alert-dismissible"><span>Shift `+response.action+`!</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
                `);
                table.ajax.reload();
            },
            error: (error) => {
              console.log(error)
            }
        })
}

</script>
@endpush
