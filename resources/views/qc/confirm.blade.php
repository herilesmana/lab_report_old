<div class="modal" tabindex="-1" id="confirm" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Sample</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="create_sample">
              <div class="modal-body">
                  @csrf
                  <h6>Tangki</h6>
                  <label for="BKA" class="btn btn-outline-primary"><input type="checkbox" name="tangki[]" value="BKA" id="BKA">BK A</label>
                  <input type="checkbox" name="tangki[]" value="BKB" id="BKB"><label for="BKB">BK B</label>
                  <input type="checkbox" name="tangki[]" value="BB" id="BB"><label for="BB">BB</label>
                  <input type="checkbox" name="tangki[]" value="MP" id="MP"><label for="MP">Proses</label>
                  <h6>Variant</h6>
                  <input type="hidden" name="line" id="line">
                  @foreach ($variant_products as $variant_product)
                  <label for="{{ $variant_product->mid }}"><input id="{{ $variant_product->mid }}" type="radio" name="variant_product" value="{{ $variant_product->mid }}">{{ $variant_product->name }}</label>
                  @endforeach
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">cencle</button>
              </div>
            </form>
        </div>
    </div>
</div>
