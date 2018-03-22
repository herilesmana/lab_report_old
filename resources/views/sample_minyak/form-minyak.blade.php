<div class="modal" tabindex="-1" id="form-minyak-{{ $sample }}" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Minyak {{ $sample }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form>
              <div class="modal-body">
                  <h6>Detail hasil analisa minyak {{ $sample }} PV</h6>
                  <table class="table" id="pv">
                      <thead>
                          <tr>
                              <th>Line</th>
                              <th>Variant Product</th>
                              <th width="120">Volume Titrasi</th>
                              <th width="120">Bobot Sample</th>
                              <th width="120">Normalitas</th>
                              <th width="120">Nilai PV</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
                  <h6>Detail hasil analisa minyak {{ $sample }} FFA</h6>
                  <table class="table" id="ffa">
                      <thead>
                          <tr>
                            <th>Line</th>
                            <th>Variant Product</th>
                            <th width="120">Volume Titrasi</th>
                            <th width="120">Bobot Sample</th>
                            <th width="120">Normalitas</th>
                            <th width="120">Nilai FFA</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                </div>
            </form>
        </div>
    </div>
</div>
