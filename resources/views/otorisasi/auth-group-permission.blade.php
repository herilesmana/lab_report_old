<div class="modal" tabindex="-1" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Group Permission set</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="#" id="formInput">
                <div class="modal-body">
                  @csrf
                  @method('POST')
                  <input value="" name="id" readonly class="form-control" type="hidden">
                    <div id="name" class="form-group row">
                        <label class="col-form-label col-md-3">Group Name</label>
                        <div class="col-md-9">
                            <input value="" name="name" readonly class="form-control" type="text">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3">Permissions</label>
                        <div class="col-md-9">
                            <div id="permissions" style="height: 200px; overflow: auto; border: 1px solid #a4b7c1; padding: 10px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3">Reports</label>
                        <div class="col-md-9">
                            <ul id="reports" style="height: 200px; overflow: auto; border: 1px solid #a4b7c1; padding: 10px;">
                            </ul>
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
