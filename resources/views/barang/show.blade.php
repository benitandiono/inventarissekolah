<div class="modal fade" tabindex="-1" role="dialog" id="modal_detail_barang">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Show Detail Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="barang_id">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Gambar</label>

                {{-- Wrapper agar gambar tidak terpotong & menyesuaikan ukuran asli --}}
                <div style="background: #f8fafc;
                            border-radius: 14px;
                            padding: 12px;
                            border: 1.5px solid #e2e8f0;
                            min-height: 120px;
                            display: flex;
                            align-items: center;
                            justify-content: center;">
                    <img src="" class="img-preview img-fluid my-1" id="detail_gambar_preview"
                         style="max-height: 275px;
                                max-width: 100%;
                                width: auto;
                                height: auto;
                                display: block;
                                margin: 0 auto;
                                border-radius: 10px;
                                box-shadow: 0 4px 16px rgba(0,0,0,.1);
                                object-fit: contain;">
                </div>

              </div>
            </div>

            <div class="col-md-6">

              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" id="detail_nama_barang" disabled>
              </div>

              <div class="form-group">
                <label>Kategori Barang</label>
                <select class="form-control" name="jenis_id" id="detail_jenis_id" disabled>
                  @foreach ($jenis_barangs as $jenis)
                      @if (old('jenis_id', $jenis->jenis_barang) == $jenis->id)
                        <option value="{{ $jenis->id }}" selected>{{ $jenis->jenis_barang }}</option>
                      @else
                        <option value="{{ $jenis->id }}">{{ $jenis->jenis_barang }}</option>
                      @endif
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Satuan Barang</label>
                <select class="form-control" name="satuan_id" id="detail_satuan_id" disabled>
                  @foreach ($satuans as $satuan)
                      @if (old('satuan', $satuan->satuans) == $satuan->id)
                        <option value="{{ $satuan->id }}" selected>{{ $satuan->satuan }}</option>
                      @else
                        <option value="{{ $satuan->id }}">{{ $satuan->satuan }}</option>
                      @endif
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Stok Saat Ini</label>
                <input type="text" class="form-control" name="stok" id="detail_stok" disabled>
              </div>

              <div class="form-group">
                <label>Minim.Stok</label>
                <input type="number" class="form-control" name="stok_minimum" id="detail_stok_minimum" disabled>
              </div>

              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="detail_deskripsi" disabled></textarea>
              </div>

            </div>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
        </div>
      </form>

    </div>
  </div>
</div>