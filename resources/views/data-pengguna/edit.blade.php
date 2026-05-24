<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_pengguna">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data">
          <div class="modal-body">

            <input type="hidden" id="pengguna_id">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" id="edit_name">
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" id="edit_email">
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="edit_password" placeholder="Kosongkan jika password tidak diubah">
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
            </div>
            <div class="form-group">
                <label>Pilih Role</label>
                  <select class="form-control" name="role" id="edit_role_id" style="width: 100%">
                    @foreach ($roles as $role)
                        @if (old('role_id', $role->role) == $role->id)
                        <option value="{{ $role->id }}" selected>{{ $role->role }}</option>
                        @else
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                        @endif
                    @endforeach
                  </select>
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-role"></div>
            </div>
        
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
          <button type="button" class="btn btn-primary" id="update">Edit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_edit_pengguna" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">
                    <i class="fa fa-user-edit"></i> Edit Pengguna
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="pengguna_id">

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" id="edit_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" id="edit_email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Password (Opsional)</label>
                    <input type="password" id="edit_password" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select id="edit_role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-warning" id="update">
                    <i class="fa fa-save"></i> Update
                </button>
            </div>

        </div>
    </div>
</div>




