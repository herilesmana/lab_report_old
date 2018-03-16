<div class="modal" tabindex="-1" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Shift Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="#" id="formInput">
                  @csrf
                  @method('POST')
                    <div id="name" class="form-group row">
                        <label class="col-form-label col-md-3" for="shift_name">Name</label>
                        <div class="col-md-8">
                            <input name="name" placeholder="Shift Name" class="form-control" type="text" id="shift_name">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3" for="jam">Waktu</label>
                        <div id="jam_awal" class="col-md-4 input-group date" data-target-input="nearest">
                            <input name="jam_awal" placeholder="Jam Mulai Shift" class="form-control datetimepicker-input" type="text" data-target="#jam_awal" id="jam">
                            <div class="input-group-append" data-target="#jam_awal" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                            </div>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div id="jam_akhir" class="col-md-4 input-group date" data-target-input="nearest">
                            <input name="jam_akhir" placeholder="Jam Mulai Shift" class="form-control datetimepicker-input" type="text" data-target="#jam_akhir" id="jam">
                            <div class="input-group-append" data-target="#jam_akhir" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
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
