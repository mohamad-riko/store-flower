<?php
// 1. Ambil ID artikel dari parameter URL
$id_artikel = $_GET['id'];

// 2. Include file koneksi ke database
include 'db_connect.php';

// 3. Query untuk mengambil detail artikel berdasarkan ID
$query = "SELECT * FROM artikel WHERE id = $id_artikel";
$result = $conn->query($query);

// 4. Tampilkan detail artikel jika query berhasil
if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Title Tag  -->
  <title>Artikel | Nusa Indah Florist Indramayu</title>
  <!-- Site Metas -->
  <link rel="icon" href="landing-page/template-2-card/img/logo.png" type="image/x-icon">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- template-2-card -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">
  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Libraries Stylesheet -->
  <link href="landing-page/template-2-card/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="landing-page/template-2-card/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <!-- Customized Bootstrap Stylesheet -->
  <link href="landing-page/template-2-card/css/bootstrap.min.css" rel="stylesheet">
  <!-- Template Stylesheet -->
  <link href="landing-page/template-2-card/css/style.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="landing-page/card-product/css/bootstrap.css" />
  <!-- Fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <!-- Font awesome style -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="asset-detail/assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href=".../asset-detail/css/styles.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="landing-page/card-product/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="landing-page/card-product/css/responsive.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="landing-page/eshop/css/reset.css">
  <link rel="stylesheet" href="landing-page/eshop/style.css">
  <link rel="stylesheet" href="landing-page/eshop/css/responsive.css">
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="landing-page/card-product/css/bootstrap.css" />

<!-- Custom CSS -->
  <style>
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
     /* CSS untuk memberikan ruang antara navbar dan section */

.about .content h3 {
  font-weight: 600;
  font-size: 26px;
}

.about .content ul {
  list-style: none;
  padding: 0;
}

.about .content ul li {
  padding-left: 28px;
  position: relative;
}

.about .content ul li+li {
  margin-top: 10px;
}

.about .content ul i {
  position: absolute;
  left: 0;
  top: 2px;
  font-size: 20px;
  color: #47b2e4;
  line-height: 1;
}

.about .content p:last-child {
  margin-bottom: 0;
}

.about .content .btn-learn-more {
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  font-size: 14px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 12px 32px;
  border-radius: 4px;
  transition: 0.3s;
  line-height: 1;
  color: #47b2e4;
  animation-delay: 0.8s;
  margin-top: 6px;
  border: 2px solid #47b2e4;
}

.about .content .btn-learn-more:hover {
  background: #47b2e4;
  color: #fff;
  text-decoration: none;
}

/*--------------------------------------------------------------
# Why Us
--------------------------------------------------------------*/
.why-us .content {
  padding: 60px 100px 0 100px;
}

.why-us .content h3 {
  font-weight: 400;
  font-size: 34px;
  color: #37517e;
}

.why-us .content h4 {
  font-size: 20px;
  font-weight: 700;
  margin-top: 5px;
}

.why-us .content p {
  font-size: 15px;
  color: #848484;
}

.why-us .img {
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center center;
}

.why-us .accordion-list {
  padding: 0 100px 60px 100px;
}

.why-us .accordion-list ul {
  padding: 0;
  list-style: none;
}

.why-us .accordion-list li+li {
  margin-top: 15px;
}

.why-us .accordion-list li {
  padding: 20px;
  background: #fff;
  border-radius: 4px;
}

.why-us .accordion-list a {
  display: block;
  position: relative;
  font-family: "Poppins", sans-serif;
  font-size: 16px;
  line-height: 24px;
  font-weight: 500;
  padding-right: 30px;
  outline: none;
  cursor: pointer;
}

.why-us .accordion-list span {
  color: #47b2e4;
  font-weight: 600;
  font-size: 18px;
  padding-right: 10px;
}

.why-us .accordion-list i {
  font-size: 24px;
  position: absolute;
  right: 0;
  top: 0;
}

.why-us .accordion-list p {
  margin-bottom: 0;
  padding: 10px 0 0 0;
}

.why-us .accordion-list .icon-show {
  display: none;
}

.why-us .accordion-list a.collapsed {
  color: #343a40;
}

.why-us .accordion-list a.collapsed:hover {
  color: #47b2e4;
}

.why-us .accordion-list a.collapsed .icon-show {
  display: inline-block;
}

.why-us .accordion-list a.collapsed .icon-close {
  display: none;
}

@media (max-width: 1024px) {

  .why-us .content,
  .why-us .accordion-list {
    padding-left: 0;
    padding-right: 0;
  }
}

@media (max-width: 992px) {
  .why-us .img {
    min-height: 400px;
  }

  .why-us .content {
    padding-top: 30px;
  }

  .why-us .accordion-list {
    padding-bottom: 30px;
  }
}

@media (max-width: 575px) {
  .why-us .img {
    min-height: 200px;
  }
}

.box {
        width: 100%;
        height: 120%;
      }
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
</style>
<!-- End Custom CSS -->
</head>

<body>
  <br>
    <div class="container-fluid page-header-01 py-5">      </div>
    <!-- Spinner Start -->
      <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
      </div>
    <!-- Spinner End -->

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
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Nusa Indah Florist Indramayu</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="landing_product.php" class="nav-item nav-link">Produk</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Bunga Papan</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="landing_page_happy_wedding.php" class="dropdown-item">Happy Wedding</a>
                                    <a href="landing_page_berduka_cita.php" class="dropdown-item">Berduka Cita</a>
                                    <a href="landing_page_selamat_sukses.php" class="dropdown-item">Selamat & Sukses</a>
                                    <a href="landing_page_bouqet.php" class="dropdown-item">Hand Bouqet</a>
                                </div>
                            </div>
                             <a href="artikel_landing.php" class="nav-item nav-link active" style="color: blue">Artikel</a>
                            <a href="gallery_landing.php" class="nav-item nav-link ">Galeri</a>
                            <a href="tentang_landing.php" class="nav-item nav-link ">Tentang</a>
                            <a href="contact_landing.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                                                 </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Modal Search End -->

  <!-- Conten Gallery -->
<body>
  <style>
    body {
              font-family: 'Roboto', sans-serif;
              line-height: 1.6;
              padding: 20px;
              background-color: #f8f9fa;
          }

          .container-content {
              background-color: #fff;
              padding: 30px;
              border-radius: 10px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          }

          h1,
          h2,
          h3 {
              color: #333;
          }

          img {
              max-width: 100%;
              height: auto;
              margin-bottom: 20px;
              border-radius: 5px;
          }

          p {
              color: #666;
              font-size: 16px;
          }

          .btn {
              background-color: #007bff;
              color: #fff;
              border: none;
              border-radius: 5px;
              padding: 10px 20px;
              cursor: pointer;
              transition: background-color 0.3s ease;
          }

          .btn:hover {
              background-color: #0056b3;
          }
  </style>
  <div class="container-content">
        <h1 class="text-center mb-4"><?php echo $row["judul"]; ?></h1>
        <p class="text-center">Tanggal Publikasi: <?php echo $row["tanggal_publikasi"]; ?></p>
        <img src="uploads/artikel/<?php echo $row["foto"]; ?>" alt="<?php echo $row["judul"]; ?>" class="img-fluid">
        <p><?php echo $row["konten"]; ?></p>
        <div class="text-center">
            <button class="btn">Bagikan</button>
            <button class="btn ml-2">Simpan</button>
        </div>
    </div>

<?php
    } else {
        echo "Artikel tidak ditemukan.";
    }
} else {
    echo "Query gagal dieksekusi: " . $conn->error;
}

// 5. Tutup koneksi ke database
$conn->close();
?>
</body> 


   <?php
// 1. Include file koneksi ke database
include 'db_connect.php';

// 2. Query untuk mengambil data artikel dari tabel artikel
$query = "SELECT * FROM artikel";
$result = $conn->query($query);
?>

    
<!-- Konten Artikel -->
<div class="container mt-5">
    <h2 class="text-center mb-4">BACA ARTIKEL LAINYA </h2>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4'>";
                echo "<div class='card mb-4'>";
                echo "<img src='uploads/artikel/" . $row["foto"] . "' class='card-img-top' alt='" . $row["judul"] . "'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row["judul"] . "</h5>";
                echo "<p class='card-text'>" . substr($row["konten"], 0, 100) . "...</p>";
                echo "<a href='artikel_landing_detail.php?id=" . $row["id"] . "' class='btn btn-primary'>Baca Artikel</a>";
                echo "</div></div></div>";
            }
        } else {
            echo "<p class='text-center'>Tidak ada artikel.</p>";
        }
        ?>
    </div>
</div>

<?php
// Tutup koneksi ke database
$conn->close();
?>


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
               <i class="fa fa-whatsapp" aria-hidden="true"> +628xx-xxxx-xxxx</i></a></span></p>
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
                <li><a href="facebook.com/"><i class="ti-facebook"></i></a></li>
                <li><a href="nusaindahfloristindramayu.com"><i class="ti ti-world"></i></a></li>
                <li><a href="instagram.com/"><i class="ti-instagram"></i></a></li>
                 <li><a href="https://wa.me/628xxxxxxxxxx?text=Nusa Indah Florist Indramayu"><i class="fa fa-whatsapp"></i></a></li>
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

<!-- jQuery -->
  <script>
    // Mendapatkan elemen teks yang akan dianimasikan
    var movingText = document.getElementById('movingText');

    // Mengatur fungsi untuk menggerakkan teks
    function moveText() {
        // Mengatur posisi awal teks di luar layar di sisi kanan
        movingText.style.position = 'absolute';
        movingText.style.right = '-80%';

        // Mengatur interval untuk menggerakkan teks
        var interval = setInterval(frame, 80); // Ubah nilai interval menjadi 20 untuk kecepatan yang lebih lambat

        // Fungsi frame yang akan dijalankan secara berulang
        function frame() {
            // Memeriksa jika teks telah bergerak keluar dari layar
            if (movingText.style.right == '100%') {
                // Menghentikan interval dan mengatur kembali posisi awal
                clearInterval(interval);
                movingText.style.right = '-100%';
                // Mengulangi animasi
                moveText();
            } else {
                // Menggerakkan teks ke arah kanan
                movingText.style.right = (parseFloat(movingText.style.right) + 1) + '%';
            }
        }
    }
    // Memanggil fungsi untuk memulai animasi teks
    moveText();
  </script>
  <script type="text/javascript" src="landing-page/card-product/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="landing-page/card-product/js/bootstrap.js"></script>
  <!-- custom js -->
  <script type="text/javascript" src="landing-page/card-product/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Easing JS -->
  <script src="landing-page/template-2-card/lib/easing/easing.min.js"></script>
  <!-- Waypoints JS -->
  <script src="landing-page/template-2-card/lib/waypoints/waypoints.min.js"></script>
  <!-- Lightbox JS -->
  <script src="landing-page/template-2-card/lib/lightbox/js/lightbox.min.js"></script>
  <!-- Owl Carousel JS -->
  <script src="landing-page/template-2-card/lib/owlcarousel/owl.carousel.min.js"></script>
  <!-- Template Main JS -->
  <script src="landing-page/template-2-card/js/main.js"></script>
  <!-- jQery -->
  <script type="text/javascript" src="landing-page/card-product/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="landing-page/card-product/js/bootstrap.js"></script>
  <!-- custom js -->
  <script type="text/javascript" src="landing-page/card-product/js/custom.js"></script>
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
  <!-- Waypoints JS -->
  <script src="landing-page/eshop/js/waypoints.min.js"></script>
  <!-- Countdown JS -->
  <script src="landing-page/eshop/js/finalcountdown.min.js"></script>
  <!-- Nice Select JS -->
  <script src="landing-page/eshop/js/nicesellect.js"></script>
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