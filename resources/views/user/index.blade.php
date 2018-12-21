@extends('layouts.base')

@section('title')
    Master User
@endsection

@section('breadcrumb')
  User
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  				Master User
  			</div>
  			<div class="card-body">
  				<div class="container-fluid">
            <div id="alert">
            </div>
            <button onClick="showForm()" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</button></div>
    				<br>
    				<table id="user" class="table table-striped table-bordered table-hover">
    					<thead>
    						<tr>
                  <th>No</th>
    							<th>NIK</th>
                                <th>Card Number</th>
                  <th>Department</th>
    							<th>Name</th>
                  <th>Jabatan</th>
                  <th>Email</th>
                  <th style="width: 150px">Status</th>
    							<th style="width: 150px">Action</th>
    						</tr>
    					</thead>
    					<tbody></tbody>
    				</table>
  			</div>
  		</div>
  	</div>
  </div>
  @include('user.form')
@endsection

@push('scripts')
<script type="text/javascript">

var table, save_method;
$(function() {
    $('#user_card_number').on('keypress', function ( event ) {
        if( event.which == 13) {
            return false;
        }
    })
  table = $('.table').DataTable( {
    "processing" : true,
    "ajax" : {
      "url" : "{{ route('user.data') }}",
      "type" : "GET"
    }
  });

  $('#modalForm form').on('submit', function (event) {
      event.preventDefault();
      $('#btnSave').text('Saving..');
      $('#btnSave').attr('disabled', true);

      var id = $('input[name=nik]').val();
      var url;

      if (save_method == "add") url = '{{ route('user.store') }}';
      else url = 'user/'+id;

      $.ajax({
          url : url,
          type : $('input[name=_method]').val(),
          data : $('#modalForm form').serialize(),
          dataType: 'JSON',
          success : function (data) {
            if (data.success == '1') {
                // Jika data berhasil disimpan
                $('input').removeClass('is-invalid');
                $('select').removeClass('is-invalid');
                $('#modalForm').modal('hide');
                $('#btnSave').attr('disabled', false);
                $('#btnSave').text('Save');
                $('#alert').html(`
                  <div class="alert alert-primary alert-dismissible"><span>User `+data.action+`!</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
                  `);
                  makeAlert('Created!', 'User <strong>'+data.name+'</strong> success '+data.action, 'success', 'top-right');
                table.ajax.reload();
            }else{
                // Jika data gagal disimpan
                $('#btnSave').attr('disabled', false);
                $('#btnSave').text('Save');
                $('#modalForm form').addClass('was-error');
                if (data.errors.nik) {
                    $('#nik input').addClass('is-invalid');
                    $('#nik span').text(data.errors.nik)
                }else{
                    $('#nik input').removeClass('is-invalid');
                }
                if (data.errors.dept_id) {
                    $('#dept_id select').addClass('is-invalid');
                    $('#dept_id span').text(data.errors.dept_id)
                }else{
                    $('#dept_id select').removeClass('is-invalid');
                }
                if (data.errors.auth_group) {
                    $('#group select').addClass('is-invalid');
                    $('#group span').text(data.errors.auth_group)
                }else{
                    $('#group select').removeClass('is-invalid');
                }
                if (data.errors.jabatan) {
                    $('#jabatan input').addClass('is-invalid');
                    $('#jabatan span').text(data.errors.jabatan)
                }else{
                    $('#jabatan input').removeClass('is-invalid');
                }
                if (data.errors.email) {
                    $('#email input').addClass('is-invalid');
                    $('#email span').text(data.errors.email)
                }else{
                    $('#email input').removeClass('is-invalid');
                }
                if (data.errors.name) {
                    $('#name input').addClass('is-invalid');
                    $('#name span').text(data.errors.name)
                }else{
                    $('#name input').removeClass('is-invalid');
                }
                if (data.errors.password) {
                    $('#password input').addClass('is-invalid');
                    $('#password span').text(data.errors.password)
                }else{
                    $('#password input').removeClass('is-invalid');
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
    $('.modal-title').text('Tambah User');
    $('input').attr('readonly', false);
}
// Untuk menampilkan form
function editForm(id) {
    save_method = "edit";
    $('#modalForm').modal('show');
    $('#modalForm form')[0].reset();
    $('input[name=_method]').val('PATCH');
    $('.modal-title').text('Edit User');
    $('input[name=nik]').attr('readonly', true);
    $('input[name=nik]').val(id);
    $.ajax({
        url : 'user/'+id+'/get_user',
        type : 'GET',
        dataType: 'JSON',
        success: (response) => {
            $('select[name=dept_id]').val(response.dept_id);
            $('select[name=auth_group]').val(response.group_id);
            $('input[name=name]').val(response.name);
            $('input[name=card_number]').val(response.card_number);
            $('input[name=jabatan]').val(response.jabatan);
            $('input[name=email]').val(response.email);
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
            url: 'user/'+id,
            data : {
                '_token' : "{{ csrf_token() }}"
            },
            success: (response) => {
                $('#alert').html(`
                    <div class="alert alert-danger alert-dismissible"><span>User `+response.action+`!</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
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
