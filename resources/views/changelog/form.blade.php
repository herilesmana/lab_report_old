<div class="modal" tabindex="-1" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Department Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="#" id="formInput">
                <div class="modal-body">
                  @csrf
                  @method('POST')
                    <div id="id" class="form-group row">
                        <label class="col-form-label col-md-3" for="department_id">ID</label>
                        <div class="col-md-9">
                            <input name="id" placeholder="Department ID" class="form-control" type="text" id="department_id">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div id="name" class="form-group row">
                        <label class="col-form-label col-md-3" for="department_name">Name</label>
                        <div class="col-md-9">
                            <input name="name" placeholder="Department Name" class="form-control" type="text" id="department_name">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div id="produksi" class="form-group row">
                        <label class="col-form-label col-md-3" for="produksi">Produksi</label>
                        <div class="col-md-9">
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="produksi" value="produksi" type="checkbox">
                            </div>
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
