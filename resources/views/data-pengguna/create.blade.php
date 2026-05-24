<div class="modal fade" tabindex="-1" role="dialog" id="modal_tambah_pengguna">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" id="name">
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" id="email">
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
            </div>
            <div class="form-group">
                <label>Pilih Role</label>
                  <select class="form-control" name="role" id="role_id" style="width: 100%">
                    <option selected>Pilih Role</option>
                    @foreach ($roles as $role)
                      <option value="{{ $role->id }}">{{ $role->role }}</option>
                    @endforeach
                  </select>
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-role"></div>
              </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
          <button type="button" class="btn btn-primary" id="store">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_tambah_pengguna" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fa fa-user-plus"></i> Tambah Pengguna
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" id="name" class="form-control" placeholder="Nama Lengkap">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Email Aktif">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" id="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select id="role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" id="store">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>

        </div>
    </div>
</div>




