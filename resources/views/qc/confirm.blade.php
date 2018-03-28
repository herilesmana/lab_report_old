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
                  <input type="hidden" name="line" id="line">
                  @foreach ($variant_products as $variant_product)
                  <input id="{{ $variant_product->mid }}" type="radio" name="variant_product" value="{{ $variant_product->mid }}"><label for="{{ $variant_product->mid }}">{{ $variant_product->name }}</label>
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
