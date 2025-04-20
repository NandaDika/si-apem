<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SI APEM</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('assets/img/smada.ico')}}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eNno
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
  <div class="container"> <!-- GANTI DI SINI -->
    <!-- Brand -->
    <a class="navbar-brand fw-bold text-success" href="/">SI APEM</a>

    <!-- Toggler -->
    <button class="navbar-toggler navbar-toggler-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=" mobile-nav-toggle"></span>
    </button>

    <!-- Nav Items -->
    <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarContent">
      <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0 align-items-lg-center">
        <li class="nav-item">
          <a class="nav-link active" href="/">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            About
          </a>
          <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
            <li><a class="dropdown-item" href="/">Dasar Hukum</a></li>
            <li><a class="dropdown-item" href="/hal-sekolah">Peraturan Masuk Sekolah</a></li>
            <li><a class="dropdown-item" href="/kewajiban">Kewajiban Peserta Didik</a></li>
            <li><a class="dropdown-item" href="/larangan">Larangan Peserta Didik</a></li>
            <li><a class="dropdown-item" href="/hak">Hak Peserta Didik</a></li>
            <li><a class="dropdown-item" href="/lainnya">Lain-Lain</a></li>
          </ul>
        </li>
      </ul>

      <!-- Login Button -->
      <a class="btn btn-success btn-sm d-inline-block mt-2 mt-lg-0" href="/auth">LOGIN</a>
    </div>
  </div>
</nav>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
            <h1>SI APEM</h1>
            <p>Sistem Informasi Aduan dan Pelaporan Tata Tertib SMAN 2 Pare</p>
            <div class="d-flex">
              <a href="/auth" class="btn-get-started">Get Started</a>

              <style>
                .btn-get-started {
                color: #fff;
                background: transparent;
                padding: 12px 30px;
                border: 2px solid #00ffff;
                border-radius: 30px;
                text-decoration: none;
                font-size: 1rem;
                font-weight: 600;
                position: relative;
                transition: all 0.4s ease;
                box-shadow: 0 0 10px #00ffff, 0 0 20px #00ffff inset;
              }

              .btn-get-started::before {
                content: '';
                position: absolute;
                top: -2px;
                left: -2px;
                right: -2px;
                bottom: -2px;
                background: linear-gradient(45deg, #00ffff, #ff00ff, #00ffff);
                z-index: -1;
                filter: blur(10px);
                opacity: 0;
                transition: opacity 0.4s ease;
                border-radius: 30px;
              }

              .btn-get-started:hover {
                background-color: rgba(0, 255, 255, 0.1);
                box-shadow: 0 0 20px #00ffff, 0 0 30px #00ffff;
                transform: scale(1.05);
              }

              .btn-get-started:hover::before {
                opacity: 1;
              }

              .d-flex {
                display: flex;
                justify-content: flex-start;
              }
              </style>

            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/smadaa.jpg" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <section id="about-si-apem" class="about section bg-light py-5">
  <div class="container">

    <!-- SI APEM -->
    <div class="row g-4 align-items-center mb-5" data-aos="fade-up">
      <div class="col-md-6">
        <div class="p-4 h-100 shadow rounded-4 bg-white">
          <h4 class="mb-3 text-primary fw-semibold" style="font-family: inherit;">Tentang SI APEM</h4>
          <p class="text-justify" style="font-family: inherit;">
            SI APEM (Sistem Informasi Aduan dan Pelaporan Tata Tertib) adalah sebuah platform digital yang dirancang khusus untuk memfasilitasi pelaporan pelanggaran tata tertib di lingkungan SMAN 2 Pare. Sistem ini memberikan kemudahan bagi siswa, guru, dan staf untuk melakukan pelaporan secara aman, cepat, dan terdokumentasi dengan baik. Dengan fitur pelaporan real-time dan dashboard pemantauan, SI APEM mendukung transparansi dan akuntabilitas dalam penerapan peraturan sekolah.
          </p>
        </div>
      </div>
      <div class="col-md-6 text-center">
        <img src="assets/img/smada-logo.png" alt="Ilustrasi SI APEM" class="img-fluid rounded-4 shadow" />
      </div>
    </div>

    <!-- SMAN 2 Pare -->
    <div class="row g-4 align-items-center flex-md-row-reverse" data-aos="fade-up">
      <div class="col-md-6">
        <div class="p-4 h-100 shadow rounded-4 bg-white">
          <h4 class="mb-3 text-success fw-semibold" style="font-family: inherit;">Tentang SMAN 2 Pare</h4>
          <p class="text-justify" style="font-family: inherit;">
            SMAN 2 Pare adalah salah satu sekolah menengah atas unggulan di Kabupaten Kediri, Jawa Timur, yang dikenal dengan komitmennya terhadap kualitas pendidikan dan pembinaan karakter. Sekolah ini tidak hanya fokus pada pencapaian akademik, tetapi juga menjunjung tinggi nilai-nilai kedisiplinan, integritas, dan tanggung jawab sosial. Melalui berbagai inovasi digital seperti SI APEM, SMAN 2 Pare terus bertransformasi menjadi institusi pendidikan yang adaptif dan berbasis teknologi.
          </p>
        </div>
      </div>
      <div class="col-md-6 text-center">
        <img src="assets/img/smadaganteng.png" alt="Gedung SMAN 2 Pare" class="img-fluid rounded-4 shadow" />
      </div>
    </div>

  </div>
</section>

   <!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section py-5" style="background: linear-gradient(135deg, #e0f7fa, #f1f8e9);">
  <div class="container">
    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <div class="col-xl-10">
        <div class="text-center p-5 rounded-4 shadow-lg bg-white">
          <h3 class="mb-4 fw-bold text-uppercase text-primary">Dasar Hukum Kegiatan</h3>
          <p class="mb-4 fs-5 text-muted">Kegiatan ini berlandaskan pada sejumlah peraturan dan perundang-undangan nasional yang relevan, sebagai berikut:</p>
          <ul class="list-unstyled text-start d-inline-block mx-auto" style="max-width: 700px;">
            <li class="mb-3 d-flex align-items-start">
              <span class="badge bg-success me-3 p-3 rounded-circle"><i class="bi bi-check-lg fs-5 text-white"></i></span>
              <span class="fs-6">Undang-undang No. 20 Tahun 2003 tentang Sistem Pendidikan Nasional</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
              <span class="badge bg-success me-3 p-3 rounded-circle"><i class="bi bi-check-lg fs-5 text-white"></i></span>
              <span class="fs-6">Peraturan Pemerintah No. 19 Tahun 2005 tentang Standar Nasional Pendidikan, Pasal 52 poin G</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
              <span class="badge bg-success me-3 p-3 rounded-circle"><i class="bi bi-check-lg fs-5 text-white"></i></span>
              <span class="fs-6">Permendikbud No. 45 Tahun 2014 tentang Pakaian Seragam Sekolah</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
              <span class="badge bg-success me-3 p-3 rounded-circle"><i class="bi bi-check-lg fs-5 text-white"></i></span>
              <span class="fs-6">Undang-undang No. 24 Tahun 2009 tentang Bendera, Bahasa, dan Lambang Negara</span>
            </li>
          </ul>

            <a class="btn btn-primary btn-lg mt-4 px-4 shadow instagram-btn" href="#" style="border-radius: 30px;">
          <i class="bi bi-instagram me-2"></i> Kunjungi Instagram Sekolah
            </a>

        <style>
        .instagram-btn {
        background-color:rgb(22, 48, 159); /* Warna khas Instagram vibes */
        border: none;
        transition: all 0.3s ease;
        }

        .instagram-btn:hover {
        background-color:rgb(44, 55, 122);
        transform: scale(1.05);
        box-shadow: 0 0.8rem 1.5rem rgba(0, 0, 0, 0.2);
        color: #fff;
        }
        </style>

        </div>
      </div>
    </div>
  </div>
</section>








  </main>

  <footer id="footer" class="footer">
  <div class="container copyright text-center mt-4">
    <!-- <p>© <span>Hak Cipta</span> <strong class="px-1 sitename">eNno</strong> <span>Hak Cipta Dilindungi</span></p> -->
    <div class="credits">
      <!-- Semua tautan di footer harus tetap utuh. -->
      <!-- Anda dapat menghapus tautan hanya jika Anda membeli versi pro. -->
      <!-- Informasi lisensi: https://bootstrapmade.com/license/ -->
      <!-- Beli versi pro dengan formulir kontak PHP/AJAX yang berfungsi: [buy-url] -->
      Website ini dikelola oleh pihak <a href="https://bootstrapmade.com/" target="_blank" rel="noopener noreferrer">SMAN 2 Pare 	</a> &#169; 2025
    </div>
  </div>
</footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
