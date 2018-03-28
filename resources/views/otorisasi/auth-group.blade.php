@extends('layouts.base')

@section('title')
    Group Login
@endsection

@section('breadcrumb')
    Group Login
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  				  Group Login
  			</div>
  			<div class="card-body">
  				<div class="container-fluid">
            <div id="alert">
            </div>
            <button onClick="showForm()" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Group</button></div>
    				<br>
    				<table id="department" class="table table-striped table-bordered table-hover">
    					<thead>
    						<tr>
                  <th width="40">No</th>
    							<th>Name</th>
    							<th style="width: 250px">Action</th>
    						</tr>
    					</thead>
    					<tbody></tbody>
    				</table>
  			</div>
  		</div>
  	</div>
  </div>
  @include('otorisasi.auth-group-permission')
@endsection

@push('scripts')
<script type="text/javascript">
var table, save_method;
$('.custom-checkbox input').prop('indeterminate', true)
$(function() {
  table = $('.table').DataTable( {
    "processing" : true,
    "ajax" : {
      "url" : "{{ route('auth-group.show') }}",
      "type" : "GET"
    }
  });

  $('#modalForm form').on('submit', function (event) {
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
                  <div class="alert alert-primary alert-dismissible"><span>Department `+data.action+`!</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
                  `);
                table.ajax.reload();
            }else{
                // Jika data gagal disimpan
                $('#btnSave').attr('disabled', false);
                $('#btnSave').text('Save');
                $('#modalForm form').addClass('was-error');
                if (data.errors.id) {
                    $('#id input').addClass('is-invalid');
                    $('#id span').text(data.errors.id)
                }else{
                    $('#id input').removeClass('is-invalid');
                }
                if (data.errors.name) {
                    $('#name input').addClass('is-invalid');
                    $('#name span').text(data.errors.name)
                }else{
                    $('#name input').removeClass('is-invalid');
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
    $('.modal-title').text('Tambah Department');
    $('input').attr('readonly', false);
}
// Untuk menampilkan form
function setAuthPermission(id) {
    $('#modalForm').modal('show');
    $.ajax({
        url : 'auth-group/'+id+'/edit',
        type : 'GET',
        dataType: 'JSON',
        success: (response) => {
            $('input[name=name]').val(response.name);
        },
        error: (error) => {
            console.log(error);
        }
    });
    var permissions = $('#permissions');
    $.ajax({
        url : "{{ route('auth-permission.data') }}",
        type : 'GET',
        dataType: 'JSON',
        success: (response) => {
            console.log(response);
            $.each(response, function(index, item) {
                var ul = $('<div class=\"custom-control custom-checkbox\">', {});
                var li = `
                        <input type="checkbox" name="`+item.codename+`" id="`+item.codename+`">
                        <lebel for="`+item.codename+`">`+item.name+`</label>
                      `;
                ul.append(li);
                permissions.append(ul);
            });
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
            url: 'department/'+id,
            data : {
                '_token' : "{{ csrf_token() }}"
            },
            success: (response) => {
                $('#alert').html(`
                    <div class="alert alert-danger alert-dismissible"><span>Department `+response.action+`!</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
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
