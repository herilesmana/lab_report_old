<div class="modal" tabindex="-1" id="modalForm" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Department Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="#" id="formInput">
                  <div class="alert alert-danger" id="department-errors" style="display: none"></div>
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
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
