<div class="container">

    <ol class="breadcrumb bg-light mt-3 mb-3">
        <li class="breadcrumb-item"><a href="<?= base_url('user/dashboard') ?>">Home</a></li>
        <li class="breadcrumb-item text-dark">Hasil</li>
    </ol>

    <h1 class="h3 text-gray-800">Hasil Try Out Saya</h1>
    <p>Lihat hasil upayamu! Bandingkan dan analisis performamu dengan pengguna lain.</p>

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tryout-tab" data-toggle="tab" data-target="#tryout" type="button" role="tab" aria-controls="tryout" aria-selected="true">Try Out</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="latihan-tab" data-toggle="tab" data-target="#latihan" type="button" role="tab" aria-controls="latihan" aria-selected="false">Latihan</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane mt-3 fade show active" id="tryout" role="tabpanel" aria-labelledby="tryout-tab">
                    <table class="table table-bordered  table-responsive-sm table-striped rounded mt-4" id="tableDatatryout">
                        <thead>
                            <tr>
                                <th>No</th>  
                                <th>Tipe</th>
                                <th>Nama Try Out</th>
                                <th>Tanggal Mengerjakan</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($exam as $key => $value): ?>
                            <tr>
                                <td><?= $key+1 ?></td>  
                                <td><?= $value['type'] ?></td>
                                <td><?= $value['title'] ?></td> 
                                <td><?= $value['created_at'] ?></td>
                                <td><?= $value['count_point'] ? $value['count_point'] : 0 ?></td>
                                <td><?= $value['kelulusan'] ?></td>
                                <td>
                                    <a href="<?= base_url('user/riwayat/').$value['answer_id'] ?>" class="btn text-white bg-info my-1">Statistik dan Pembahasan</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane mt-3 fade" id="latihan" role="tabpanel" aria-labelledby="latihan-tab">
                    <table class="table table-bordered  table-responsive-sm table-striped rounded mt-4" id="tableDatalatihan">
                        <thead>
                            <tr>
                                <th>No</th>  
                                <th>Tipe</th>
                                <th>Nama Try Out</th>
                                <th>Tanggal Mengerjakan</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($practice as $key => $value): ?>
                            <tr>
                                <td><?= $key+1 ?></td>  
                                <td><?= $value['type'] ?></td>
                                <td><?= $value['title'] ?></td> 
                                <td><?= $value['created_at'] ?></td>
                                <td><?= $value['count_point'] ? $value['count_point'] : 0 ?></td>
                                <td><?= $value['kelulusan'] ?></td>
                                <td>
                                    <a href="<?= base_url('user/riwayat/').$value['answer_id'] ?>" class="btn text-white bg-info my-1">Statistik dan Pembahasan</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Detail Tryout</h5>
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
                <input value="exam" required type="hidden" class="form-control" id="typeDetail" name="type" readonly>
                <textarea required type="text" class="form-control" id="descriptionDetail" name="description" readonly></textarea>
            </div>

        </div>
    </form>
</div>
</div>
</div>
</div>