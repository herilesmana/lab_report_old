@extends('layouts.base')

@section('title')
    Master Department
@endsection

@section('breadcrumb')
  Department
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  				Master Department
  			</div>
  			<div class="card-body">
  				<div class="container-fluid">
            <div id="alert-department"></div>
            <button onClick="showForm()" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Department</button></div>
    				<br>
    				<table id="department" class="table table-striped table-bordered table-hover">
    					<thead>
    						<tr>
                  <th>No</th>
    							<th>ID</th>
    							<th>Name</th>
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
  @include('department.form')
@endsection

@push('scripts')
<script type="text/javascript">
var table, save_method;
$(function() {
  table = $('.table').DataTable( {
    "processing" : true,
    "ajax" : {
      "url" : "{{ route('department.data') }}",
      "type" : "GET"
    }
  });

  $('#modal-department form').on('submit', function (event) {
      event.preventDefault();
      $('#btnSave').text('Saving..');
      $('#btnSave').attr('disabled', true);

      var id = $('input[name=id]').val();
      var url;

      if (save_method == "add") url = '{{ route('department.store') }}';
      else url = 'department/'+id;

      $.ajax({
          url : url,
          type : $('input[name=_method]').val(),
          data : $('#modal-department form').serialize(),
          success : function (data) {
            $('#modal-department').modal('hide');
            $('#btnSave').attr('disabled', false);
            $('#btnSave').val('Save');
            table.ajax.reload();
          },
          error : function () {
            alert('Tidak dapat menyimpan data!');
            $('#btnSave').attr('disabled', false);
            $('#btnSave').val('Save');
          }
      });

  });

});
// Untuk menampilkan form
function showForm() {
  save_method = "add";
  $('#modal-department').modal('show');
  $('#modal-department form')[0].reset();
  $('input[name=_method]').val('POST');
  $('.modal-title').text('Tambah Department');
  $('input').attr('readonly', false);
}
// Untuk menampilkan form
function editForm(id) {
  save_method = "edit";
  $('#modal-department').modal('show');
  $('#modal-department form')[0].reset();
  $('input[name=_method]').val('PATCH');
  $('.modal-title').text('Edit Department');
  $('input[name=id]').attr('readonly', true);
  $('input[name=id]').val(id);
}

function deleteData(id) {
  alert(id)
}

</script>
@endpush
