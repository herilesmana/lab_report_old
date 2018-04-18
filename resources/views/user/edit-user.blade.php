@extends('layouts.base')

@section('title')
    Edit User
@endsection

@section('breadcrumb')
    Edit User
@endsection

@section('content')
    <div class="modal" tabindex="-1" id="modalForm" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">User Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="#" id="formInput">
                    <div class="modal-body">
                      @csrf
                      @method('POST')
                        <div id="nik" class="form-group row">
                            <label class="col-form-label col-md-3" for="user_nik">NIK</label>
                            <div class="col-md-9">
                                <input name="nik" placeholder="Nomor Induk Karyawan" class="form-control" type="text" id="user_nik">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div id="dept_id" class="form-group row">
                            <label class="col-form-label col-md-3" for="department">Department</label>
                            <div class="col-md-9">
                                {{-- <select class="form-control" name="dept_id" id="department">
                                    <option value="">-- Pilih Department --</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select> --}}
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
                                {{-- <select class="form-control" name="auth_group" id="auth_group">
                                    <option value="">-- Pilih Group Otorisasi --</option>
                                    @foreach ($auth_group as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select> --}}
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
        </div>
    </div>
@endsection
