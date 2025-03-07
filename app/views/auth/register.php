<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Winayalaksa.id</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url("assets/") ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url("assets/") ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="height: 100vh;display:flex;align-items: center;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <style>
                        .bg-register{
                            margin-top: 70px;
                            background: url(https://upload.wikimedia.org/wikipedia/id/b/bc/Lambang_Kabupaten_Barito_Kuala.png);
                            background-size: 80%;
                            background-repeat: no-repeat;
                        }
                    </style>
                    <div class="col-lg-5 d-none d-lg-block bg-register"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat akun baru!</h1>
                            </div>
                            <div id="errorMessage"></div>
                            <form class="user" id="formRegister">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control" placeholder="Masukkan Nama " name="nama">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control" placeholder="Masukkan Username" name="username">
                                </div>
                                <div class="form-group">
                                    <select type="text" class="form-control form-control" placeholder="Masukkan Bidang" name="bidang_id">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control" placeholder="Masukkan Password" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Buat akun
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-decoration-none" href="<?= base_url("login") ?>">Punya akun? Login disini!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url("assets/") ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url("assets/") ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url("assets/") ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url("assets/") ?>js/sb-admin-2.min.js"></script>

    <script>
        $.ajax({
            'url' : "<?= base_url("api/bidang/index") ?>",
            'type' : 'json',
            'method' : 'get',
            'success' : (res) => {
                let htmlOption = `<option selected value="">Pilih Bidang</option>`
                $.each(res, (key,val)=>{
                    htmlOption += `<option value="${val.id}">${val.nama}</option>`
                })
                $('select[name="bidang_id"]').html(htmlOption)
            }
        })

        $("#formRegister").on("submit", function(e){
            e.preventDefault()
            $.ajax({
              'url' : "<?= base_url("api/register") ?>",
              'type' : 'json',
              'method' : 'post',
              'processData': false,
              'contentType': false,
              'data' : new FormData(this),
              'success' : (res) => {
                if(res == true){
                    $("#errorMessage").html(`
                        <div class="alert alert-info">Anda telah berhasil registrasi, silahkan login untuk melakukan pendataan</div>
                    `)
                    setTimeout(() => {
                        window.location.href = "<?= base_url("login") ?>"
                    },2000)
                }else{
                    $("#errorMessage").html(`
                        <div class="alert alert-danger">${res}</div>
                    `)
                }
              }
            })
        })
    </script>

</body>

</html>