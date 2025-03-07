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

    <style>
             .bg-login{
           
            background: url(<?= base_url('assets/img/logo-login.png')?>);
            background-size: 70%;
            background-repeat: no-repeat;
            background-position: 80px 160px;
            background-color: #141518
        }
        .bg-gradient-purple-blue {
            background: #f5a70c;
            background-size: 200% 200%;
        }
    </style>

</head>
  
<body class="bg-gradient-purple-blue" style="height: 100vh;display:flex;align-items: center;">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-4" style="border-radius:30px">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row ">
                            <div class="col-lg-6 d-lg-block bg-login"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h1 class="h4 w-75 text-white welcome-text" style="margin-left: -17.5%; padding: 20px; background: #f5a70c !important;border-bottom-right-radius: 35px;border-top-right-radius: 35px;">Selamat Datang</h1>
                                    <div class="text-center my-5">
                                        <h5 class="text-dark font-weight-bold mb-4">Login</h5>
                                    </div>
                                    <form id="formLogin" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control "  style="border: 2px solid #f5a70c;border-radius: 150px ;"  name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <div class="input-group">
                                            <input type="password" class="form-control password-input"  style="border: 2px solid #f5a70c;border-bottom-right-radius: 0 !important;border-top-right-radius: 0 !important;border-radius: 150px ;"  name="password" placeholder="Password">
                                            <div class="input-group-append">
                                            <span class="input-group-text bg-transparent"  style="border: 2px solid #f5a70c;border-bottom-left-radius: 0 !important;border-top-left-radius: 0 !important;border-radius: 150px ;" id="toggle-password"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block my-5" style="background: #f5a70c !important;border:none;">
                                            Login
                                        </button>
                                    </form>
                                </div>
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
        $("#formLogin").on("submit", function(e){
            e.preventDefault()
            $.ajax({
              'url' : "<?= base_url("api/login/checkLogin") ?>",
              'type' : 'json',
              'method' : 'post',
              'processData': false,
              'contentType': false,
              'data' : new FormData(this),
              'success' : (res) => {
                if((typeof res === "object" && !Array.isArray(res) && res !== null)){
                    location.reload()
                }else{
                    alert(res)
                }
              }
            })
        })
  $(document).ready(function() {
    $("#toggle-password").click(function() {
      var input = $(".password-input");
      if (input.attr("type") === "password") {
        input.attr("type", "text");
        $(this).find('.fa').removeClass('fa-eye-slash').addClass('fa-eye');
      } else {
        input.attr("type", "password");
        $(this).find('.fa').removeClass('fa-eye').addClass('fa-eye-slash');
      }
    });
  });
    </script>


</body>

</html>