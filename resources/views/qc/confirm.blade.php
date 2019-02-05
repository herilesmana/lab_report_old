<div class="modal" tabindex="-1" id="confirm" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Sample</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="create_sample">
              <input type="hidden" name="ulang" value="false">
              <div class="modal-body">
                  @csrf
                  <h6>Variant</h6>
                  <input type="hidden" name="line" id="line">
                  <div id="variant">
                    <div class="prn" style="display: none">
                    @foreach ($prn_variant as $variant_product)
                      @if($variant_product->mid != 1)
                      <label for="{{ $variant_product->mid }}" class="lab-option option-label" id="{{ $variant_product->mid }}-label">
                          <input id="{{ $variant_product->mid }}" type="radio" name="variant_product" value="{{ $variant_product->mid }}"><span id="{{ $variant_product->mid }}-label2">{{ $variant_product->name }}</span>
                      </label>
                      @endif
                    @endforeach
                    </div>
                    <div class="pnc" style="display: none">
                    @foreach ($pnc_variant as $variant_product)
                      @if($variant_product->mid != 1)
                      <label for="{{ $variant_product->mid }}" class="lab-option option-label" id="{{ $variant_product->mid }}-label">
                          <input id="{{ $variant_product->mid }}" type="radio" name="variant_product" value="{{ $variant_product->mid }}"><span id="{{ $variant_product->mid }}-label2">{{ $variant_product->name }}</span>
                      </label>
                      @endif
                    @endforeach
                    </div>
                  </div>
                  <h6>Tangki</h6>
                  <div id="tangki">
                    <label for="BKA" class="lab-option option-label" id="BKA-label">
                      <input type="radio" name="tangki" value="BKA" id="BKA">BK A
                    </label>
                    <label for="BKB" class="lab-option option-label" id="BKB-label">
                      <input type="radio" name="tangki" value="BKB" id="BKB">BK B
                    </label>
                    <label for="MP" class="lab-option option-label" id="MP-label">
                      <input type="radio" name="tangki" value="MP" id="MP">Proses
                    </label>
                  </div>
              </div>
            </form>
            <div class="modal-footer">
                <button type="button" onClick="cekQa()" class="btn btn-primary">Create</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" id="confirm2" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Menunggu Konfirmasi QA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <!-- <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">Department</label>
                <div class="col-md-9">
                  <strong class="form-control-static cek-department" style="line-height: 3"></strong>
                </div>
              </div> -->
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">Line</label>
                <div class="col-md-9">
                  <strong class="form-control-static cek-line" style="line-height: 3"></strong>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">Tangki</label>
                <div class="col-md-9">
                  <strong class="form-control-static cek-tangki" style="line-height: 3"></strong>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">Variant</label>
                <div class="col-md-9">
                  <strong class="form-control-static cek-variant" style="line-height: 3"></strong>
                </div>
              </div>
              <input type="text" name="card_number" class="card_number" class="form-control" autofocus="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>
