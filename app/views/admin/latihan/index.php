<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Latihan</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <div class="row">
        <div class="col-sm-12">

            <div class="mb-4">
                <a class="right btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Latihan</a> 
            </div>
        
            <table class="table table-bordered  table-responsive-sm table-striped rounded" id="tableData">
                <thead>
                    <tr class="">
                        <th>No</th>  
                        <th>Judul</th> 
                        <th>Waktu</th>
                        <th>Status</th> 
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
        <h5 class="modal-title" >Detail Latihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDetail">
            <div class="row">

                <div class="col-sm-6 form-group">
                    <label>Judul</label>
                    <input required type="text" class="form-control" id="titleDetail" name="title" readonly>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Waktu (menit)</label>
                    <input required type="number" class="form-control" id="timeDetail" name="time" readonly>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Status</label>
                    <select required class="form-control" id="statusDetail" name="status" readonly>
                        <option value="">Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Pembahasan</label>
                    <input value="practice" required type="hidden" class="form-control" id="typeDetail" name="type" readonly>
                    <textarea required type="text" class="form-control" id="descriptionDetail" name="description" readonly></textarea>
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
        <h5 class="modal-title" >Tambah Latihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAdd">
            <div class="row">
                
                <div class="col-sm-6 form-group">
                    <label>Judul</label>
                    <input required type="text" class="form-control" id="titleAdd" name="title">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Waktu (menit)</label>
                    <input required type="number" class="form-control" id="timeAdd" name="time">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Status</label>
                    <select required class="form-control" id="statusAdd" name="status">
                        <option value="">Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Pembahasan</label>
                    <input value="practice" required type="hidden" class="form-control" id="typeAdd" name="type">
                    <textarea required type="text" class="form-control" id="descriptionAdd" name="description"></textarea>
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
        <h5 class="modal-title" >Edit Latihan <span class="dataName"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEdit">
            <input required type="hidden" id="idEdit" name="id">
            <div class="row">
                
                <div class="col-sm-6 form-group">
                    <label>Judul</label>
                    <input required type="text" class="form-control" id="titleEdit" name="title">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Waktu (menit)</label>
                    <input required type="number" class="form-control" id="timeEdit" name="time">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Status</label>
                    <select required class="form-control" id="statusEdit" name="status">
                        <option value="">Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Pembahasan</label>
                    <input value="practice" required type="hidden" class="form-control" id="typeEdit" name="type">
                    <textarea required type="text" class="form-control" id="descriptionEdit" name="description"></textarea>
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

<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form id="formStatus">
            <h5 class="modal-title mb-4 text-center" >Ubah Status Latihan <span class="dataName"></span> ?</h5>
            <input required type="hidden" id="idStatus" name="id">
            <div class="text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Ubah Status</button>
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
        <h5 class="modal-title text-center w-100" >Hapus Latihan <span class="dataName"></span> ?</h5>
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