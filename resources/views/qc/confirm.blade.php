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
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              </div>
            </form>
        </div>
    </div>
</div>
