<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 mt-4">
            <h3 class="font-weight-bold mb-4">List Paket Soal</h3>

            <table class="table bg-white">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Waktu</th>
                        <th>Passing Grade <br>TKP</th>
                        <th>Passing Grade <br>TWK</th>
                        <th>Passing Grade <br>TIU</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($question as $key => $value): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $value['title'] ?></td>
                        <td><?= $value['time'] ?> Menit</td>
                        <td><?= $value['pg_tkp'] ?></td>
                        <td><?= $value['pg_twk'] ?></td>
                        <td><?= $value['pg_tiu'] ?></td>
                        <td><a href="<?= base_url('admin/detail_statistik/') . $value['id'].'/'.$this->uri->segment(3) ?>" class="btn btn-info">Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

