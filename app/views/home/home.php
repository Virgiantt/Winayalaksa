<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hari-Hari Pasar Swalayan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?= base_url("assets/") ?>img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">   

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url("assets/") ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url("assets/") ?>css/style.css" rel="stylesheet">
    <style>
        .productPer{
            transition: .3s;
            border: 1px solid #aaa;
        }
        .productPer:hover{
            box-shadow: 2px 2px 20px #1dd0ed;
        }
    </style>
</head>

<body style="max-width: 100%;overflow-x: hidden;">
    <!-- Topbar Start -->
    <div style="background:linear-gradient(to right, #1fe0ff, #1bc3de);" class="container-fluid ">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between " style="cursor:pointer;height: 40px;"></div>
            </div>
            <div class="col-md-4 text-right text-white d-none d-md-block" style="cursor:pointer;font-size: 15px;">
                <?= date("l, d M Y") ?>
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-sm-4">
                <a href="<?= base_url("") ?>" class="navbar-brand d-lg-block">
                    <h1 class="mt-2 text-uppercase"><span class="text-white">Hari-hari</span> Pasar Swalayan</h1>
                </a>
            </div>
            <div class="col-sm-8 text-center text-lg-right">
                <div class="input-group ml-auto d-flex justify-content-end align-items-center" style="width: 100%; max-width: 400px;">
                    <?php if (!empty($this->session->userdata("token"))): ?>
                        <span class="mr-4 d-none d-lg-inline text-white small " style="font-size: 15px;"><?= $this->session->userdata('name') ?></span>
                        <a class="d-flex justify-content-center align-items-center" href="<?= base_url("user/cart") ?>">
                            <img class="img-profile rounded-circle" src="<?= base_url("assets/img/undraw_profile.svg") ?>" style="width: 50px">
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url("login") ?>" class="btn btn-light mx-2 px-3" style="border-radius: 20px;">Mulai Berbelanja</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Main News Slider Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <style>
                        .owl-carousel .owl-nav .owl-next{
                            width: 40px;
                            height: 40px;
                            border: 1px solid black;
                            background: black;
                            border-radius: 30px;
                        }
                        .owl-carousel .owl-nav .owl-next:hover{
                            background: #1dd0ed;
                            border: 1px solid black;
                        }
                        .owl-carousel .owl-nav .owl-prev{
                            width: 40px;
                            height: 40px;
                            border: 1px solid black;
                            background: black;
                            border-radius: 30px;
                        }
                        .owl-carousel .owl-nav .owl-prev:hover{
                            background: #1dd0ed;
                            border: 1px solid black;
                        }
                    </style>
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        <div class="position-relative rounded " style="height: 435px;border:1px solid #1dd0ed">
                            <img class="img-fluid" src="<?= base_url("assets/") ?>img/banner3.jpg" >
                            <div class="">
                                <div class="mb-1">
                                    <a class="text-white text-decoration-none">Instant Food</a>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative rounded " style="height: 435px;border:1px solid #1dd0ed">
                            <img class="img-fluid" src="<?= base_url("assets/") ?>img/banner1.jpg" >
                            <div class="">
                                <div class="mb-1">
                                    <a class="text-white text-decoration-none">Instant Food</a>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative rounded " style="height: 435px;border:1px solid #1dd0ed">
                            <img class="img-fluid" src="<?= base_url("assets/") ?>img/banner2.jpg" >
                            <div class="">
                                <div class="mb-1">
                                    <a class="text-white text-decoration-none">Cleaner</a>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative rounded " style="height: 435px;border:1px solid #1dd0ed">
                            <img class="img-fluid" src="<?= base_url("assets/") ?>img/banner4.jpg" >
                            <div class="">
                                <div class="mb-1">
                                    <a class="text-white text-decoration-none">Delivery</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 listCategory">
                    <div class="d-flex align-items-center justify-content-center rounded bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Kategori</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->
    <div style="background:linear-gradient(to right, #1fe0ff, #1bc3de);" class=" w-100 h-25"> &nbsp;</div>
    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3 bg-light">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-3 px-4 mb-3 rounded">
                <h3 class="m-0">Semua Produk</h3>
            </div>
            <div class="listProduct row"></div>
        </div>
    </div>

    <div style="background:linear-gradient(to right, #1fe0ff, #1bc3de);" class=" w-100 h-25"> &nbsp;</div>


    <!-- Featured News Slider End -->
    <div class="pt-3 pb-4 bg-light d-flex align-items-center justify-content-center">
        <img src="<?= base_url("assets/img/banner-footer.jpg") ?>" class="p-3 rounded m-3 productPer" width="500" height="310" style="cursor:pointer;border: 1px solid #1fe0ff;">
        <img src="<?= base_url("assets/img/banner-footer2.jpg") ?>" class="p-3 rounded m-3 productPer" width="500" height="310" style="cursor:pointer;border: 1px solid #1fe0ff;">
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white pt-5 px-sm-3 px-md-5">
        <div class="row">
            <div class="col-sm-4 mb-5">
                <a href="<?= base_url("assets/") ?>index.html" class="navbar-brand">
                    <h1 class=" text-light mb-2 mt-n2 display-5 text-uppercase"><span class="text-info">Hari-hari</span><br> Pasar Swalayan</h1>
                </a>
                <p>
                    Dapatkan berbagai promo menarik setiap hari di Hari-hari Pasar Swalayan
                </p>
            </div>
            <div class="col-sm-4 mb-5">
                <h4 class="font-weight-bold mb-4 text-light">Quick Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2 text-decoration-none" href="#"><i class="fa fa-angle-right mr-2"></i>
                        Alamat
                        <br>
                        Duta Harapan Indah, Teluk Gong, Jl. Duta Harapan Indah Blok C No.1, RT.8/RW.2, Kapuk Muara, Kec. Penjaringan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14460
                    </a>
                    <a class="text-white mb-2 text-decoration-none" href="#"><i class="fa fa-angle-right mr-2"></i>
                        Kontak
                        <br>
                        0216605433
                    </a>
                </div>
            </div>
            <div class="col-sm-4 mb-5">
                <p class="font-weight-bold mb-4 text-light">MAP</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.76930917082!2d106.7752808!3d-6.1384507!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xacaa9d2bd4ebdede!2sHari%20Hari%20Pasar%20Swalayan%20Duta%20Harapan%20Indah!5e0!3m2!1sen!2sid!4v1654060718063!5m2!1sen!2sid" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy; <a class="font-weight-bold text-dark" href="#">Hari Hari Pasar Swalayan</a>.
            Designed by <a class="font-weight-bold" href="#">Tirta</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="<?= base_url("assets/") ?>#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url("assets/") ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url("assets/") ?>lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?= base_url("assets/") ?>mail/jqBootstrapValidation.min.js"></script>
    <script src="<?= base_url("assets/") ?>mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url("assets/") ?>js/main.js"></script>

    <script>
        
        function convertToRupiah(angka){
            var rupiah = '';        
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }

        const getCategoryProduct = () => {
            $.ajax({
                'url' : "<?= base_url("api/category/getWithProduct") ?>",
                'type' : 'json',
                'method' : 'get',
                'success' : (res) => {
                    $.each(res, (i,val) => {
                        $(".listCategory").append(`
                            <div class="position-relative overflow-hidden mb-2" style="height: 60px;border-radius:50px;background:linear-gradient(to right, #1fe0ff, #1bc3de);cursor:pointer">
                                <div class="d-flex align-items-center justify-content-center align-items-center justify-content-center h5 m-0 h-100 text-white text-decoration-none">
                                    ${val.category.name.toUpperCase()}
                                </div>
                            </div>
                        `)
                    })
                }
            })

            $.ajax({
                'url' : "<?= base_url("api/product") ?>",
                'type' : 'json',
                'method' : 'get',
                'success' : (res) => {

                    $.each(res, (i, val) => {
                        $('.listProduct').append(`
                            <div class="col-sm-3">
                                <a href="<?= base_url('/product?p=') ?>${val.slug}" class="card text-white mb-3 rounded p-3 productPer">
                                    <img class="img-fluid rounded" src="<?= base_url("assets/img/product/") ?>${val.image}">
                                    <div class="card-body">
                                        <h6 class="card-title d-flex align-items-center justify-content-center text-center" style="height:50px">${val.name}</h6>
                                        <hr class="m-0 p-0 mb-1">
                                        <h5 class="text-dark text-center">${convertToRupiah(val.price)}</h5>
                                    </div>
                                </a>
                            </div>
                        `)
                    })

                }
            })
        }

        getCategoryProduct()




    </script>

</body>

</html>