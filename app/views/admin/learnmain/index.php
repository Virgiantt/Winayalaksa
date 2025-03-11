<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <div class="card px-4 py-3 bg-white text-dark ">
                <p class="h5">Total User</p>
                <h3 class="font-weight-bold"><?= $user ?></h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card px-4 py-3 bg-white text-dark ">
                <p class="h5">Total Kelas</p>
                <h3 class="font-weight-bold"><?= $class ?></h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card px-4 py-3 bg-white text-dark ">
                <p class="h5">Total Pelatihan</p>
                <h3 class="font-weight-bold"><?= $lesson ?></h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card px-4 py-3 bg-white text-dark ">
                <p class="h5">Total Modul</p>
                <h3 class="font-weight-bold"><?= $modul ?></h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card px-4 py-3 bg-white text-dark ">
                <p class="h5">Total Materi</p>
                <h3 class="font-weight-bold"><?= $materi ?></h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card px-4 py-3 bg-white text-dark ">
                <p class="h5">Total Pembahasan</p>
                <h3 class="font-weight-bold"><?= $discuss ?></h3>
            </div>
        </div>

        <div class="col-sm-12 mt-4">
            <h4 class="text-dark">Ranking Try Out</h4>
            <table class="table bg-white">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>List Soal</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($class_data as $key => $value): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $value['name'] ?></td>
                        <td><a href="<?= base_url('admin/statistik/') . $value['id'] ?>" class="btn btn-info">Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="col-sm-12 mt-5 mb-5">
            <h4 class="text-dark">Ranking Latihan</h4>
            <table class="table bg-white">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Waktu</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($latihan as $key => $value): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $value['title'] ?></td>
                        <td><?= $value['time'] ?> Menit</td>
                        <td><a href="<?= base_url('admin/detail_latihan/') . $value['id'] ?>" class="btn btn-info">Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

