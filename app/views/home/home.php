<div class="container">

    <h1 class="h3 text-gray-800">Bimbingan Belajar CPNS & Sekolah Kedinasan Winaya Laksa</h1>
    <h5 class="text-dark">Selesaikan try out untuk melatih kemampuan kamu.</h5>

    <ol class="breadcrumb bg-light mt-4">
        <li class="breadcrumb-item"><a href="<?= base_url('user/dashboard') ?>">Home</a></li>
    </ol>
    <?php if ($announcement['status'] == 1): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Pengumuman!</strong> <?= $announcement['text']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>
    <div class="row" style="margin-bottom:250px">
        <?php
            foreach ($title as $menu) {
        ?>
        <a href="<?= base_url($menu->link) ?>" class="col-sm-4 text-decoration-none">
            <div class="bg-warning p-4 my-3 text-white rounded shadow" style="min-height: 160px;">
                <h3><?= $menu->name ?></h3>
                <p><?= $menu->desc ?></p>
            </div>
        </a>
        <?php
            }
        ?>
    </div>
</div>