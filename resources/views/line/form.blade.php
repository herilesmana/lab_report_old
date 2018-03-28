<div class="modal" tabindex="-1" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Line Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="#" id="formInput">
                <div class="modal-body">
                  @csrf
                  @method('POST')
                    <div id="name" class="form-group row">
                        <label class="col-form-label col-md-3" for="line_name">Name</label>
                        <div class="col-md-9">
                            <input name="id" placeholder="Line Name" class="form-control" type="text" id="line_name">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div id="dept" class="form-group row">
                        <label class="col-form-label col-md-3" for="dept">Name</label>
                        <div class="col-md-9">
                            <select class="form-control" name="dept" id="dept">
                                <option value="">-- Pilih Department --</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
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
