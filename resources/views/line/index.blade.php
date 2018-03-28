@extends('layouts.base')

@section('title')
    Master Line
@endsection

@section('breadcrumb')
  Line
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  				Master Line
  			</div>
  			<div class="card-body">
  				<div class="container-fluid">
            <div id="alert">
            </div>
            <button onClick="showForm()" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Line</button></div>
    				<br>
    				<table id="line" class="table table-striped table-bordered table-hover">
    					<thead>
    						<tr>
                  <th>No</th>
    							<th>Name</th>
    							<th>Department</th>
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
  @include('line.form', ['departments' => $departments])
@endsection

@push('scripts')
<script type="text/javascript">
var table, save_method;
$(function() {
  table = $('.table').DataTable( {
    "processing" : true,
    "ajax" : {
      "url" : "{{ route('line.data') }}",
      "type" : "GET"
    }
  });

  $('#modalForm form').on('submit', function (event) {
      event.preventDefault();
      $('#btnSave').text('Saving..');
      $('#btnSave').attr('disabled', true);

      var id = $('input[name=id]').val();
      var url;

      if (save_method == "add") url = '{{ route('line.store') }}';
      else url = 'line/'+id;

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
                  <div class="alert alert-primary alert-dismissible"><span>Line `+data.action+`!</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
                  `);
                table.ajax.reload();
            }else{
                // Jika data gagal disimpan
                $('#btnSave').attr('disabled', false);
                $('#btnSave').text('Save');
                $('#modalForm form').addClass('was-error');
                if (data.errors.id) {
                    $('#name input').addClass('is-invalid');
                    $('#name span').text(data.errors.name)
                }else{
                    $('#name input').removeClass('is-invalid');
                }
                if (data.errors.dept) {
                    $('#dept select').addClass('is-invalid');
                    $('#dept span').text(data.errors.name)
                }else{
                    $('#dept select').removeClass('is-invalid');
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
    $('.modal-title').text('Tambah Line');
    $('input').attr('readonly', false);
}
// Untuk menampilkan form
function editForm(id) {
    save_method = "edit";
    $('#modalForm').modal('show');
    $('#modalForm form')[0].reset();
    $('input[name=_method]').val('PATCH');
    $('.modal-title').text('Edit Line');
    $('input[name=id]').attr('readonly', true);
    $('input[name=id]').val(id);
    $.ajax({
        url : 'line/'+id+'/edit',
        type : 'GET',
        dataType: 'JSON',
        success: (response) => {
            $('select[name=dept_id]').val(response.dept_id);
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
            url: 'line/'+id,
            data : {
                '_token' : "{{ csrf_token() }}"
            },
            success: (response) => {
                $('#alert').html(`
                    <div class="alert alert-danger alert-dismissible"><span>Line `+response.action+`!</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
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
