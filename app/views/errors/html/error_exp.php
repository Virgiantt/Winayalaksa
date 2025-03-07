<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="icon" type="image/png" href="<?php echo base_url('favicon.png'); ?>">
    <?= stylesheet([
        'plugin/sweetalert2/dist/sweetalert2.min.css',
        'plugin/bootstrap/css/bootstrap.min.css'
    ]); ?>

</head>
<body>

    <div class="container d-flex align-items-center" style="height: 100vh; min-height: 100px">
        <div class="row">
            <div class="col-md-4 d-flex">
                <img src="<?= base_url() ?>assets/images/410.png" class="w-75 m-auto" alt="">
            </div>
            <div class="col-md-8">
                <div class="form-group mb-3">
                    <h1 class="mb-2"><b>Tautan Kadaluarsa</b></h1>
                    <label>Mohon maaf, tautan yang anda kunjungi sudah kadaluarsa. Silahkan kembali ke beranda</label>
                </div>
                <div class="form-group">
                    <a href="<?= base_url() ?>" class="btn btn-primary"><i class="fas fa-home"></i> Beranda</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>