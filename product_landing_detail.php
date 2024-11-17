
<?php
// Include file koneksi ke database
include 'db_connect.php';

// Query untuk mendapatkan daftar produk beserta kategorinya
$query = "SELECT products.id, products.name AS product_name, categories.name AS category_name, price, foto 
          FROM products 
          INNER JOIN categories ON products.category_id = categories.id";
$result = $conn->query($query);
   

    // Periksa apakah parameter ID produk telah diterima dari URL
    if(isset($_GET['id'])) {
        // Ambil ID produk dari parameter URL
        $product_id = $_GET['id'];
        
        // Query untuk mendapatkan detail produk berdasarkan ID
        $product_query = "SELECT * FROM products WHERE id = $product_id";
        $product_result = $conn->query($product_query);
        
        // Periksa apakah produk dengan ID yang diberikan ada dalam database
        if($product_result->num_rows > 0) {
            // Ambil data produk
            $product_row = $product_result->fetch_assoc();
            
            // Tampilkan detail produk
                   } else {
            echo "<p>Produk tidak ditemukan.</p>";
        }
    } else {
        echo "<p>Parameter ID produk tidak ditemukan dalam URL.</p>";
    }
    ?>


<!DOCTYPE html>
<html lang="zxx">
<head>
  <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='copyright' content=''>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Title Tag  -->
    <title>Produk Detail | Nusa Indah Florist</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/favicon.png">
  <!-- Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  
  <!-- StyleSheet -->
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="landing-page/eshop/css/bootstrap.css">
  <!-- Magnific Popup -->
    <link rel="stylesheet" href="landing-page/eshop/css/magnific-popup.min.css">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="landing-page/eshop/css/font-awesome.css">
  <!-- Fancybox -->
  <link rel="stylesheet" href="landing-page/eshop/css/jquery.fancybox.min.css">
  <!-- Themify Icons -->
    <link rel="stylesheet" href="landing-page/eshop/css/themify-icons.css">
  <!-- Nice Select CSS -->
    <link rel="stylesheet" href="landing-page/eshop/css/niceselect.css">
  <!-- Animate CSS -->
    <link rel="stylesheet" href="landing-page/eshop/css/animate.css">
  <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="landing-page/eshop/css/flex-slider.min.css">
  <!-- Owl Carousel -->
    <link rel="stylesheet" href="landing-page/eshop/css/owl-carousel.css">
  <!-- Slicknav -->
    <link rel="stylesheet" href="landing-page/eshop/css/slicknav.min.css">
  
  <!-- Eshop StyleSheet -->
  <link rel="stylesheet" href="landing-page/eshop/css/reset.css">
  <link rel="stylesheet" href="landing-page/eshop/style.css">
    <link rel="stylesheet" href="landing-page/eshop/css/responsive.css">
 
  <!-- template-2-card -->
         <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="landing-page/template-2-card/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="landing-page/template-2-card/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="landing-page/template-2-card/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="landing-page/template-2-card/css/style.css" rel="stylesheet">


        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="landing-page/card-product/css/bootstrap.css" />

        <!-- fonts style -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

        <!-- font awesome style -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="landing-page/card-product/css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="landing-page/card-product/css/responsive.css" rel="stylesheet" />


        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="landing-page/card-product/css/bootstrap.css" />

        <!-- Fonts style -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

        <!-- Font awesome style -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

         <!-- Bootstrap icons-->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
          <!-- Core theme CSS (includes Bootstrap)-->
          <link href="landing-page/asset-detail/css/styles.css" rel="stylesheet" />
        <!-- Custom CSS -->
  <style>
    /* Custom CSS for star rating */
    .product_rating {
      display: inline-block;
      font-size: 20px;
      color: #fdd835; /* warna kuning untuk bintang */
    }
   /* Custom CSS for star rating */
    .product_rating {
      display: inline-block;
      font-size: 20px;
      color: #fdd835; /* warna kuning untuk bintang */
    }

    /* Style untuk tombol "Pesan Sekarang" */
    .btn-pesan-sekarang {
      background-color: #28a745; /* warna hijau untuk tombol */
      color: #fff; /* warna putih untuk teks tombol */
      border-color: #28a745; /* warna border tombol */
    }

    /* Style untuk tombol "Detail" */
    .btn-detail {
      background-color: #007bff; /* warna biru untuk tombol */
      color: #fff; /* warna putih untuk teks tombol */
      border-color: #007bff; /* warna border tombol */
    }
    .banner {
       background-color: #c2b3a7; 
       background-image: url('landing-page/eshop/images/banner-02.png'); 
       background-size: cover; background-position: center;

    }
         .accordion-item {
            background-color: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 10px;
            height: auto; /* Set tinggi item menjadi otomatis */
        }

        .accordion-button {
            background-color: #e9ecef;
            color: #495057;
            border-radius: 8px;
            border: none;
            text-align: left;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-body {
            border-radius: 0 0 8px 8px;
        }
  </style>
</head>


<body>
<!--  -->

  <body>
  <!-- Single Page Header start -->
        <div class="container-fluid page-header-01 py-5">
           
        </div>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
           <!-- Navbar start -->
     <div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2" id="movingText">
                <span style="color: white">TOKO BUNGA NUSA INDAH FLORIST - INDRAMAYU</span>
            </div>
        </div>
    </div>
          <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.php" class="navbar-brand"><h1 class="text-primary display-6">Nusa Indah Florist Indramayu</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="product_landing.php" class="nav-item nav-link active" style="color: blue;">Produk</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kategori Produk</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="product_landing_happy_wedding.php" class="dropdown-item ">Happy Wedding</a>
                                    <a href="product_landing_berduka_cita.php" class="dropdown-item">Berduka Cita</a>
                                    <a href="product_landing_selamat_sukses.php" class="dropdown-item">Selamat & Sukses</a>
                                    <a href="product_landing_bouqet.php" class="dropdown-item ">Hand Bouqet</a>
                                </div>
                            </div>
                            <a href="artikel_landing.php" class="nav-item nav-link">Artikel</a>
                            <a href="gallery_landing.php" class="nav-item nav-link">Galeri</a>
                            <a href="tentang_landing.php" class="nav-item nav-link">Tentang</a>
                            <a href="contact_landing.php" class="nav-item nav-link">Contact</a>
                        </div>
                     
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar-->
        <!-- Navbar End -->


       
        <!-- Modal Search End -->

<!-- Conten Gallery -->
<div class="breadcrumbs" style="background-image: url('landing-page/template-2-card/img/produk/detail.png'); background-size: cover; background-position: center; background-repeat: no-repeat; background-color: #C2B3A7">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="index1.html"><i class="ti-arrow-right"></i></a></li>
            <li class="active"><a href="blog-single.html"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

        <!-- Modal Search End -->

<!-- Conten Detail -->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="<?php echo $product_row['foto']; ?>" alt="Product Image"/>
                <?php echo $product_row['name']; ?>
            </div>
            <div class="col-md-6">
                <div class="small mb-1">Product ID: <?php echo $product_row['id']; ?></div>
                <h1 class="display-5 fw-bolder"><?php echo $product_row['name']; ?></h1>
                <div class="fs-5 mb-5">
                    <?php if(!empty($product_row['discount_price'])) : ?>
                        <span class="text-decoration-line-through">Rp.<?php echo $product_row['price']; ?></span>
                        <span>Rp.<?php echo $product_row['discount_price']; ?></span>
                    <?php else : ?>
                        <span>Rp.<?php echo $product_row['price']; ?></span>
                        <span style="font-style: italic; color: darkgreen;">(* Tidak ada Harga diskon)</span>
                    <?php endif; ?>
                </div>
                <p class="lead"><?php echo $product_row['deskripsi']; ?></p>
                <div class="d-flex">
                    <button class="btn btn-outline-success" type="button">
                       <i class="bi bi-whatsapp"></i> 
                       Pesan Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


        <!-- Related items section-->
  
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Product Yang Sama </h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

           <?php
            // Include file koneksi ke database
            include 'db_connect.php';

            // Periksa apakah parameter ID produk telah diterima dari URL
            if(isset($_GET['id'])) {
                // Ambil ID produk dari parameter URL
                $product_id = $_GET['id'];

                // Query untuk mendapatkan detail produk berdasarkan ID
                $product_query = "SELECT * FROM products WHERE id = $product_id";
                $product_result = $conn->query($product_query);

                // Periksa apakah produk dengan ID yang diberikan ada dalam database
                if($product_result->num_rows > 0) {
                    // Ambil data produk
                    $product_row = $product_result->fetch_assoc();

                    // Dapatkan ID kategori dari produk yang sedang dilihat
                    $category_id = $product_row['category_id'];

                    // Query untuk mendapatkan produk terkait dengan kategori yang sama
                    $related_query = "SELECT * FROM products WHERE category_id = $category_id AND id != $product_id";
                    $related_result = $conn->query($related_query);

                    // Periksa apakah ada produk terkait yang ditemukan
                    if($related_result->num_rows > 0) {
                        // Tampilkan produk terkait
                        while($related_row = $related_result->fetch_assoc()) {
                            // Tampilkan informasi produk terkait
                              ?>
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="<?php echo $related_row['foto']; ?>" alt="Product Image" />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder"><?php echo $related_row['name']; ?></h5>
                                            <!-- Product price-->
                                            Rp. <?php echo $related_row['price']; ?>
                                            <div class="d-flex justify-content-center small text-warning mb-2">
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                                <div class="bi-star-fill"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                 <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
    <div class="text-center">
        <div class="btn-group" role="group" aria-label="Product actions">
            <a class="btn btn-outline-success btn-sm" href="#"><i class="fa fa-shopping-cart me-1"></i> Pesan Sekarang</a>
            <a class="btn btn-outline-danger btn-sm" href="product_landing_detail.php?id=<?php echo $product_row['id']; ?>"><i class="fa fa-info-circle me-1"></i> Lihat Detail</a>
        </div>
    </div>
</div>
                                </div>
                            </div>
            <?php
                        }
                    } else {
                        echo "<p>Tidak ada produk terkait yang ditemukan.</p>";
                    }
                } else {
                    echo "<p>Produk tidak ditemukan.</p>";
                }
            } else {
                echo "<p>Parameter ID produk tidak ditemukan dalam URL.</p>";
            }
            ?>
        </div>
    </div>
</section>

       <!--  -->
<!-- ======= Why Us Section ======= -->
<section>
    <footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer about">
              <div class="logo">
                <a href="index.php"><img src="landing-page/eshop/images/logo-nif.png" alt="#" width="200px"></a>
              </div>
              <p class="text">Melayani berbagai pesanan secara custom, pelayanan cepat dan terpercaya, gratis ongkir daerah indramayu dan sekitarnya *s&k berlaku</p>
              <p class="call">Order Langsung? Hubungi us 24/7<span><a href="wa.me/628xx-xxxx-xxxx">
               <i class="fab fa-whatsapp" aria-hidden="true"> +628xx-xxxx-xxxx</i></a></span></p>
            </div>
            <!-- End Single Widget -->
          </div>
          <div class="col-lg-2 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer links">
              <h4>Infromasi </h4>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery_landing.php">Galleri</a></li>
                <li><a href="contact_landing.php">Kontak Kami</a></li>
                <li><a href="tentang_landing.php">Tentang</a></li>
              </ul>
            </div>
            <!-- End Single Widget -->
          </div>
          <div class="col-lg-2 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer links">
              <h4>Kategori Produk</h4>
              <ul>
                <li><a href="product_landing_happy_wedding.php">Happy Wedding</a></li>
                <li><a href="product_landing_berduka_cita.php">Berduka Cita</a></li>
                <li><a href="product_landing_selamat_sukses.php">Selamat dan Sukses</a></li>
                <li><a href="product_landing_hand_bouqet.php">Hand Bouqet</a></li>
              </ul>
            </div>
            <!-- End Single Widget -->
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <!-- Single Widget -->
            <div class="single-footer social">
              <h4>Get In Tuch</h4>
              <!-- Single Widget -->
              <div class="contact">
                <ul>
                <li>Jl Islamic Center Indramayu, Belakang TIC Karaoke Bungkul, Indramayu, Jawa Barat</li>
                </ul>
              </div>
              <!-- End Single Widget -->
              <ul>
                <li><a href="facebook.com/"><i class="fab fa-facebook"></i></a></li>
                <li><a href="nusaindahfloristindramayu.com"><i class="fa fa-globe"></i></a></li>
                <li><a href="instagram.com/"><i class="fab fa-instagram"></i></a></li>
                 <li><a href="https://wa.me/628xxxxxxxxxx?text=Nusa Indah Florist Indramayu"><i class="fab fa-whatsapp"></i></a></li>
              </ul>
            </div>
            <!-- End Single Widget -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
      <div class="container">
        <div class="inner">
          <div class="row">
            <div class="col-lg-6 col-12">
              <div class="left">
                <p>Copyright Nusa Indah Florist Indramayu © 2024 <a href="http://www.nusaindahfloristindramayu.com" target="_blank">Nusa Indah Florist Indramayu</a>  -  All Rights Reserved</p>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="right">
                <img src="landing-page/eshop/images/logo-nif.png" alt="#" width="130px">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</section>

  <!-- Start Footer Area -->

<!-- end footer -->
    <!-- jQery -->
  <script type="text/javascript" src="landing-page/card-product/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="landing-page/card-product/https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="landing-page/card-product/js/bootstrap.js"></script>
  <!-- custom js -->
  <script type="text/javascript" src="landing-page/card-product/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

  <!--  -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="landing-page/template-2-card/lib/easing/easing.min.js"></script>
    <script src="landing-page/template-2-card/lib/waypoints/waypoints.min.js"></script>
    <script src="landing-page/template-2-card/lib/lightbox/js/lightbox.min.js"></script>
    <script src="landing-page/template-2-card/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="landing-page/template-2-card/js/main.js"></script>
  <!-- Jquery -->
    <script src="landing-page/eshop/js/jquery.min.js"></script>
    <script src="landing-page/eshop/js/jquery-migrate-3.0.0.js"></script>
    <script src="landing-page/eshop/js/jquery-ui.min.js"></script>
    <!-- Popper JS -->
    <script src="landing-page/eshop/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="landing-page/eshop/js/bootstrap.min.js"></script>
    <!-- Color JS -->
    <script src="landing-page/eshop/js/colors.js"></script>
    <!-- Slicknav JS -->
    <script src="landing-page/eshop/js/slicknav.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="landing-page/eshop/js/owl-carousel.js"></script>
    <!-- Magnific Popup JS -->
    <script src="landing-page/eshop/js/magnific-popup.js"></script>
    <!-- Fancybox JS -->
    <script src="landing-page/eshop/js/facnybox.min.js"></script>
    <!-- Waypoints JS -->
    <script src="landing-page/eshop/js/waypoints.min.js"></script>
    <!-- Countdown JS -->
    <script src="landing-page/eshop/js/finalcountdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="landing-page/eshop/js/nicesellect.js"></script>
    <!-- Ytplayer JS -->
    <script src="landing-page/eshop/js/ytplayer.min.js"></script>
    <!-- Flex Slider JS -->
    <script src="landing-page/eshop/js/flex-slider.js"></script>
    <!-- ScrollUp JS -->
    <script src="landing-page/eshop/js/scrollup.js"></script>
    <!-- Onepage Nav JS -->
    <script src="landing-page/eshop/js/onepage-nav.min.js"></script>
    <!-- Easing JS -->
    <script src="landing-page/eshop/js/easing.js"></script>
    <!-- Active JS -->
    <script src="landing-page/eshop/js/active.js"></script>
</body>
</html>