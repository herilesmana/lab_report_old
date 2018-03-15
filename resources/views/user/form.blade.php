<div class="modal" tabindex="-1" id="modalForm" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">User Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="#" id="formInput">
                  @csrf
                  @method('POST')
                    <div id="nik" class="form-group row">
                        <label class="col-form-label col-md-3" for="user_nik">NIK</label>
                        <div class="col-md-9">
                            <input name="id" placeholder="Nomor Induk Karyawan" class="form-control" type="text" id="user_nik">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div id="dept_id" class="form-group row">
                        <label class="col-form-label col-md-3" for="department">Department</label>
                        <div class="col-md-9">
                            <select class="form-control" name="dept_id" id="department">
                                <option value="ITE">ITE</option>
                                <option value="PRN">PRN</option>
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
                    <div id="password" class="form-group row">
                        <label class="col-form-label col-md-3" for="user_password">Password</label>
                        <div class="col-md-9">
                            <input name="password" placeholder="Password Untuk Login" class="form-control" type="password" id="user_password">
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
