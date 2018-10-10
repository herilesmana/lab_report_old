@extends('layouts.base')

@section('title')
    Master Variant Product
@endsection

@section('breadcrumb')
  Variant Product
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  				Master Variant Product
  			</div>
  			<div class="card-body">
  				<div class="container-fluid">
            <div id="alert">
            </div>
            <button onClick="showForm()" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Variant</button></div>
    				<br>
    				<table id="variant_product" class="table table-striped table-bordered table-hover">
    					<thead>
    						<tr>
                  <th>No</th>
    							<th>MID</th>
    							<th>Name</th>
                  <th>Dept</th>
                  <th>Jenis</th>
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
  @include('variant_product.form')
@endsection

@push('scripts')
<script type="text/javascript">
var table, save_method;
$(function() {
  table = $('.table').DataTable( {
    "processing" : true,
    "ajax" : {
      "url" : "{{ route('variant_product.data') }}",
      "type" : "GET"
    }
  });

  $('#modalForm form').on('submit', function (event) {
      event.preventDefault();
      $('#btnSave').text('Saving..');
      $('#btnSave').attr('disabled', true);

      var id = $('input[name=mid]').val();
      var url;

      if (save_method == "add") url = '{{ route('variant_product.store') }}';
      else url = "{{ URL::to('variant_product') }}/"+id;

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
                  <div class="alert alert-primary alert-dismissible"><span>Variant Product `+data.action+`!</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
                  `);
                table.ajax.reload();
            }else{
                // Jika data gagal disimpan
                $('#btnSave').attr('disabled', false);
                $('#btnSave').text('Save');
                $('#modalForm form').addClass('was-error');
                if (data.errors.mid) {
                    $('#id input').addClass('is-invalid');
                    $('#id span').text(data.errors.mid)
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
    $('.modal-title').text('Tambah Variant Product');
    $('input').attr('readonly', false);
    $('.lokal').attr('selected', false);
    $('.export').attr('selected', false);
    $('.PNC').attr('selected', false);
    $('.PRN').attr('selected', false);
}
// Untuk menampilkan form
function editForm(id) {
    save_method = "edit";
    $('#modalForm').modal('show');
    $('#modalForm form')[0].reset();
    $('input[name=_method]').val('PATCH');
    $('.modal-title').text('Edit Variant Product');
    $('input[name=mid]').attr('readonly', true);
    $('input[name=mid]').val(id);
    $.ajax({
        url : "{{ URL::to('variant_product') }}/"+id+"/edit",
        type : 'GET',
        dataType: 'JSON',
        success: (response) => {
            $('input[name=name]').val(response.name);
            if (response.status == 'N') $('input[name=status]').attr('checked', false);
            else $('input[name=status]').attr('checked', true);

            if (response.jenis == 'lokal') {
                $('.export').attr('selected', false);
                $('.lokal').attr('selected', true);
            }else if (response.jenis == 'export') {
                $('.lokal').attr('selected', false);
                $('.export').attr('selected', true);
            }
            if (response.dept == 'PRN') {
                $('.PNC').attr('selected', false);
                $('.PRN').attr('selected', true);
            }else if (response.dept == 'PNC') {
                $('.PRN').attr('selected', false);
                $('.PNC').attr('selected', true);
            }
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
            url: "{{ URL::to('variant_product') }}/"+id,
            data : {
                '_token' : "{{ csrf_token() }}"
            },
            success: (response) => {
                $('#alert').html(`
                    <div class="alert alert-danger alert-dismissible"><span>Variant Product `+response.action+`!</span><button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">x</span></button></div>
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
