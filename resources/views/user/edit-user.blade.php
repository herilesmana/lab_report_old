@extends('layouts.base')

@section('title')
    Edit User
@endsection

@section('breadcrumb')
    Edit User
@endsection

@section('content')
    <div id="modalForm" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          @foreach ($users as $user)
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">User Form</h5>
                </div>
                <form action="#" id="formInput">
                    <div class="modal-body">
                      @csrf
                      @method('POST')
                        <div id="nik" class="form-group row">
                            <label class="col-form-label col-md-3" for="user_nik">NIK</label>
                            <div class="col-md-9">
                                <input value="{{ $user->nik }}" name="nik" placeholder="Nomor Induk Karyawan" class="form-control" type="text" id="user_nik">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div id="dept_id" class="form-group row">
                            <label class="col-form-label col-md-3" for="department">Department</label>
                            <div class="col-md-9">
                                <select class="form-control" name="dept_id" id="department">
                                    <option value="">-- Pilih Department --</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div id="name" class="form-group row">
                            <label class="col-form-label col-md-3" for="user_name">Name</label>
                            <div class="col-md-9">
                                <input name="name" placeholder="User Name" class="form-control" type="text" id="user_name">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div id="jabatan" class="form-group row">
                            <label class="col-form-label col-md-3" for="jabatan_user">Jabatan</label>
                            <div class="col-md-9">
                                <input name="jabatan" placeholder="Jabatan" class="form-control" type="text" id="jabatan_user">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div id="email" class="form-group row">
                            <label class="col-form-label col-md-3" for="user_email">email</label>
                            <div class="col-md-9">
                                <input name="email" placeholder="example@domain.com" class="form-control" type="email" id="user_email">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div id="group" class="form-group row">
                            <label class="col-form-label col-md-3" for="auth_group">Group Otorisasi</label>
                            <div class="col-md-9">
                                <select class="form-control" name="auth_group" id="auth_group">
                                    <option value="">-- Pilih Group Otorisasi --</option>
                                    @foreach ($auth_group as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div id="password" class="form-group row">
                            <label class="col-form-label col-md-3" for="user_password">Password</label>
                            <div class="col-md-9">
                                <input name="password" placeholder="Password Untuk Login" class="form-control" type="password" id="user_password">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div id="password_confirm" class="form-group row">
                            <label class="col-form-label col-md-3" for="user_password_confirm">Password Confirm</label>
                            <div class="col-md-9">
                                <input name="password_confirmation" placeholder="Ketik Ulang Password" class="form-control" type="password" id="user_password_confirm">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div id="status" class="form-group row">
                            <label class="col-form-label col-md-3">Status</label>
                            <div class="col-md-9">
                                 <label class="switch switch-icon switch-primary">
                                    <input value="Y" class="switch-input" type="checkbox" name="status" checked>
                                    <span class="switch-label"  data-on="" data-off=""></span>
                                    <span class="switch-handle"></span>
                                 </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
          @endforeach
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
var save_method;
$(function() {
  $('#modalForm form').on('submit', function (event) {
      event.preventDefault();
      $('#btnSave').text('Saving..');
      $('#btnSave').attr('disabled', true);

      var id = $('input[name=nik]').val();
      var url;

      url = 'user/'+id;

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


@endpush
