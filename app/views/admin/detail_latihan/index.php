<div class="container-fluid">

    <div class="mb-4">
        <h1 class="h3 mb-3 text-gray-800">Ranking Latihan</h1>
        <a target="_blank" href="<?= base_url("admin/print_latihan/".$this->uri->segment(3)) ?>" class="btn bg-orange text-white">Export</a>
    </div>

    <div class="row">
        <div class="col-sm-12 mb-5">
            <div class="card">
                <table class="table">
                    <tr>
                        <th width="20%">Nama Latihan</th>
                        <td><?= $question['title'] ?></td>
                    </tr>
                    <tr>
                        <th>Waktu</th>
                        <td><?= $question['time'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-sm-12 mb-5">
            <div class="card">
                <table class="table bg-white">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Aksi</th>
                            <th>Tanggal</th>
                            <th>Nama User</th>
                            <th>Total Nilai</th>
                            <th>Kelulusan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($answer as $key => $value): ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><a onclick="return confirm('Yakin untuk menghapus riwayat pengerjaan?')" href="<?= base_url('admin/detail_latihan/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$value['answer_id']) ?>" class="btn btn-danger">X</a></td>
                            <td><?= explode(' ',$value['date'])[0] ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['count_point'] ?></td>
                            <td><?= $value['kelulusan'] ?></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

