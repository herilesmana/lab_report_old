<div class="modal" tabindex="-1" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Variant Product Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="#" id="formInput">
                  @csrf
                  @method('POST')
                    <div id="id" class="form-group row">
                        <label class="col-form-label col-md-3" for="mid">MID</label>
                        <div class="col-md-9">
                            <input name="mid" placeholder="MID Product" class="form-control" type="text" id="mid">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div id="name" class="form-group row">
                        <label class="col-form-label col-md-3" for="product_name">Name</label>
                        <div class="col-md-9">
                            <input name="name" placeholder="Product Name" class="form-control" type="text" id="product_name">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div id="jenis" class="form-group row">
                        <label class="col-form-label col-md-3" for="jenis_product">Name</label>
                        <div class="col-md-9">
                            <select class="form-control" name="jenis" id="jenis_product">
                                <option value="">Pilih jenis</option>
                                <option value="lokal">Lokal</option>
                                <option value="export">Export</option>
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
