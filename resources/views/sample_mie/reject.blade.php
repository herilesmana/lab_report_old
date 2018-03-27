<div class="modal" tabindex="-1" id="modalReject" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Reject Sample : <string class="id-sample"></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="" id="approve">
                <div class="modal-body">
                  @csrf
                  @method('POST')
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="status" value="N">
                    <div id="keterangan" class="form-group row">
                        <label class="col-form-label col-md-3" for="ketarangan_reject">Ketarangan</label>
                        <div class="col-md-9">
                            <textarea name="keterangan" rows="4" cols="50" id="keterangan_reject"></textarea>
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
