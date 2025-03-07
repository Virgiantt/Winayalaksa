<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <div class="row">
        <div class="col-sm-12">

            <div class="mb-4">
                <a class="right btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah User</a> 
            </div>
        
            <table class="table table-bordered  table-responsive-sm table-striped rounded" id="tableData">
                <thead>
                    <tr class="">
                        <th>No</th>  
                        <th>Nama</th> 
                        <th>Username</th>
                        <th>Role</th> 
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Detail User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDetail">
            <div class="row">

                <div class="col-sm-6 form-group">
                    <label>Nama</label>
                    <input required type="text" class="form-control" id="nameDetail" name="name" readonly>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Username</label>
                    <input required type="text" class="form-control" id="usernameDetail" name="username" readonly>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Kelas</label>
                    <select required class="form-control" id="class_idDetail" name="class_id" readonly>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Role</label>
                    <select required class="form-control" id="roleDetail" name="role" readonly>
                        <option value="">Pilih Role</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Email</label>
                    <input required type="email" class="form-control" id="emailDetail" name="email" readonly>
                </div>
                <div class="col-sm-6 form-group">
                    <label>No. Telepon</label>
                    <input required type="number" class="form-control" id="phoneDetail" name="phone" readonly>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Jenis Kelamin</label>
                    <select required class="form-control" id="genderDetail" name="gender" readonly>
                        <option value="">Pilih Jenis Kelammin</option>
                        <option value="l">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Alamat</label>
                    <textarea required class="form-control" id="addressDetail" name="address" readonly></textarea>
                </div>

            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAdd">
            <div class="row">
                
                <div class="col-sm-6 form-group">
                    <label>Nama</label>
                    <input required type="text" class="form-control" id="nameAdd" name="name">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Username</label>
                    <input required type="text" class="form-control" id="usernameAdd" name="username">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Kelas</label>
                    <select required class="form-control" id="class_idAdd" name="class_id">
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Password</label>
                    <input required type="password" class="form-control" id="passwordAdd" name="password">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Role</label>
                    <select required class="form-control" id="roleAdd" name="role">
                        <option value="">Pilih Role</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Email</label>
                    <input required type="email" class="form-control" id="emailAdd" name="email">
                </div>
                <div class="col-sm-6 form-group">
                    <label>No. Telepon</label>
                    <input required type="number" class="form-control" id="phoneAdd" name="phone">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Jenis Kelamin</label>
                    <select required class="form-control" id="genderAdd" name="gender">
                        <option value="">Pilih Jenis Kelammin</option>
                        <option value="l">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Alamat</label>
                    <textarea required class="form-control" id="addressAdd" name="address"></textarea>
                </div>

            </div>
            <hr>
            <div class="text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit User <span class="dataName"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEdit">
            <input required type="hidden" id="idEdit" name="id">
            <div class="row">
                
                <div class="col-sm-6 form-group">
                    <label>Nama</label>
                    <input required type="text" class="form-control" id="nameEdit" name="name">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Username</label>
                    <input required type="text" class="form-control" id="usernameEdit" name="username">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Kelas</label>
                    <select required class="form-control" id="class_idEdit" name="class_id">
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Password</label>
                    <input required type="password" class="form-control" id="passwordEdit" name="password">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Role</label>
                    <select required class="form-control" id="roleEdit" name="role">
                        <option value="">Pilih Role</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Email</label>
                    <input required type="email" class="form-control" id="emailEdit" name="email">
                </div>
                <div class="col-sm-6 form-group">
                    <label>No. Telepon</label>
                    <input required type="number" class="form-control" id="phoneEdit" name="phone">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Jenis Kelamin</label>
                    <select required class="form-control" id="genderEdit" name="gender">
                        <option value="">Pilih Jenis Kelammin</option>
                        <option value="l">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Alamat</label>
                    <textarea required class="form-control" id="addressEdit" name="address"></textarea>
                </div>

            </div>
            <hr>
            <div class="text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center w-100" >Hapus User <span class="dataName"></span> ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDelete">
            <div class="text-center">
                <input required type="hidden" id="inputDeleteId" name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>