<style>
    .select2{
        width: 100% !important
    }
</style>
<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelas</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <div class="row">
        <div class="col-sm-12">

            <div class="mb-4">
                <a class="right btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Kelas</a> 
            </div>
        
            <table class="table table-bordered  table-responsive-sm table-striped rounded" id="tableData">
                <thead>
                    <tr class="">
                        <th>No</th>  
                        <th>Nama</th> 
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
        <h5 class="modal-title" >Detail Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDetail">
            <div class="row">

                <div class="col-sm-6 form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="nameDetail" name="name" readonly>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Akses Soal</label>
                    <select class="form-control" multiple="multiple" id="access_questionDetail" name="access_question[]"></select>

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
        <h5 class="modal-title" >Tambah Kelas</h5>
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
                    <label>Akses Soal</label>
                    <select required class="form-control" multiple="multiple" id="access_questionAdd" name="access_question[]"></select>
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
        <h5 class="modal-title" >Edit Kelas <span class="dataName"></span></h5>
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
                    <label>Akses Soal</label>
                    <select required class="form-control" multiple="multiple" id="access_questionEdit" name="access_question[]"></select>
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
        <h5 class="modal-title text-center w-100" >Hapus Kelas <span class="dataName"></span> ?</h5>
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