<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Soal <span class="titleQuestion"></span></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <div class="row">
        <div class="col-sm-12">

            <div class="mb-4">
                <a class="right btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Soal</a> 
            </div>
        
            <table class="table table-bordered  table-responsive-sm table-striped rounded" id="tableData">
                <thead>
                    <tr>
                        <th>No</th>  
                        <th>Soal</th> 
                        <th>Foto</th>
                        <th>Pembahasan</th> 
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Detail Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formDetail">
            <div class="row">

                <div class="col-sm-6 form-group">
                    <label>Soal</label>
                    <input readonly required type="hidden" class="form-control" id="question_idDetail" name="question_id">
                    <textarea readonly required class="form-control" id="questionDetail" name="question"></textarea>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Foto</label>
                    <div id="imageDetailPreview"></div>
                </div>
                <div class="col-sm-12 form-group">
                    <label>Pembahasan</label>
                    <textarea readonly required class="form-control" id="descriptionDetail" name="description"></textarea>
                </div>
                <div class="col-sm-12 form-group">
                    <hr>
                    <label>Jawaban A</label>
                    <div class="d-flex">
                        <input readonly required type="text" class="form-control w-75" id="choice1Detail" name="choice1">
                        <input readonly value="0" type="number" class="form-control w-25" id="point1Detail" name="point1">
                    </div>
                    <br>
                    <label>Jawaban B</label>
                    <div class="d-flex">
                        <input readonly required type="text" class="form-control w-75" id="choice2Detail" name="choice2">
                        <input readonly value="0" type="number" class="form-control w-25" id="point2Detail" name="point2">
                    </div>
                    <br>
                    <label>Jawaban C</label>
                    <div class="d-flex">
                        <input readonly required type="text" class="form-control w-75" id="choice3Detail" name="choice3">
                        <input readonly value="0" type="number" class="form-control w-25" id="point3Detail" name="point3">
                    </div>
                    <br>
                    <label>Jawaban D</label>
                    <div class="d-flex">
                        <input readonly required type="text" class="form-control w-75" id="choice4Detail" name="choice4">
                        <input readonly value="0" type="number" class="form-control w-25" id="point4Detail" name="point4">
                    </div>
                    <br>
                    <label>Jawaban E</label>
                    <div class="d-flex">
                        <input readonly required type="text" class="form-control w-75" id="choice5Detail" name="choice5">
                        <input readonly value="0" type="number" class="form-control w-25" id="point5Detail" name="point5">
                    </div>
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
        <h5 class="modal-title" >Tambah Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAdd">
            <div class="row">
                
                <div class="col-sm-6 form-group">
                    <label>Soal</label>
                    <input required type="hidden" class="form-control" id="question_idAdd" name="question_id">
                    <textarea class="form-control" id="questionAdd" name="question"></textarea>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" id="imageAdd" name="image">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Pembahasan</label>
                    <textarea class="form-control" id="descriptionAdd" name="description"></textarea>
                </div>
                <div class="col-sm-12 form-group">
                    <hr>
                    <label>Jawaban A</label>
                    <div class="d-flex">
                        <input required type="text" class="form-control w-75" id="choice1Add" name="choice1">
                        <input value="0" type="number" class="form-control w-25" id="point1Add" name="point1">
                    </div>
                    <br>
                    <label>Jawaban B</label>
                    <div class="d-flex">
                        <input required type="text" class="form-control w-75" id="choice2Add" name="choice2">
                        <input value="0" type="number" class="form-control w-25" id="point2Add" name="point2">
                    </div>
                    <br>
                    <label>Jawaban C</label>
                    <div class="d-flex">
                        <input required type="text" class="form-control w-75" id="choice3Add" name="choice3">
                        <input value="0" type="number" class="form-control w-25" id="point3Add" name="point3">
                    </div>
                    <br>
                    <label>Jawaban D</label>
                    <div class="d-flex">
                        <input required type="text" class="form-control w-75" id="choice4Add" name="choice4">
                        <input value="0" type="number" class="form-control w-25" id="point4Add" name="point4">
                    </div>
                    <br>
                    <label>Jawaban E</label>
                    <div class="d-flex">
                        <input required type="text" class="form-control w-75" id="choice5Add" name="choice5">
                        <input value="0" type="number" class="form-control w-25" id="point5Add" name="point5">
                    </div>
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
        <h5 class="modal-title" >Edit Soal No <span class="dataName"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEdit">
            <input required type="hidden" id="idEdit" name="id">
            <div class="row">
                
                <div class="col-sm-6 form-group">
                    <label>Soal</label>
                    <textarea type="text" class="form-control" id="questionEdit" name="question"></textarea>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control mb-3" id="imageEdit" name="image">
                    <div id="imageEditPreview"></div>
                </div>
                <div class="col-sm-12 form-group">
                    <label>Pembahasan</label>
                    <textarea type="text" class="form-control" id="descriptionEdit" name="description"></textarea>
                </div>
                <div class="col-sm-12 form-group">
                    <hr>
                    <label>Jawaban A</label>
                    <div class="d-flex">
                        <input type="hidden" id="id1Edit" name="id1">
                        <input required type="text" class="form-control w-75" id="choice1Edit" name="choice1">
                        <input value="0" type="number" class="form-control w-25" id="point1Edit" name="point1">
                    </div>
                    <br>
                    <label>Jawaban B</label>
                    <div class="d-flex">
                        <input type="hidden" id="id2Edit" name="id2">
                        <input required type="text" class="form-control w-75" id="choice2Edit" name="choice2">
                        <input value="0" type="number" class="form-control w-25" id="point2Edit" name="point2">
                    </div>
                    <br>
                    <label>Jawaban C</label>
                    <div class="d-flex">
                        <input type="hidden" id="id3Edit" name="id3">
                        <input required type="text" class="form-control w-75" id="choice3Edit" name="choice3">
                        <input value="0" type="number" class="form-control w-25" id="point3Edit" name="point3">
                    </div>
                    <br>
                    <label>Jawaban D</label>
                    <div class="d-flex">
                        <input type="hidden" id="id4Edit" name="id4">
                        <input required type="text" class="form-control w-75" id="choice4Edit" name="choice4">
                        <input value="0" type="number" class="form-control w-25" id="point4Edit" name="point4">
                    </div>
                    <br>
                    <label>Jawaban E</label>
                    <div class="d-flex">
                        <input type="hidden" id="id5Edit" name="id5">
                        <input required type="text" class="form-control w-75" id="choice5Edit" name="choice5">
                        <input value="0" type="number" class="form-control w-25" id="point5Edit" name="point5">
                    </div>
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
        <h5 class="modal-title text-center w-100" >Hapus Soal <span class="dataName"></span> ?</h5>
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