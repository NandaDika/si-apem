<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SI APEM</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/smada.ico  " rel="icon">
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
    <section id="school-rules" class="school-rules section bg-light py-5">
      <div class="container" data-aos="fade-up">
        <div class="section-header text-center mb-5">
          <h2 class="text-success fw-bold">Hal Masuk Sekolah</h2>
          <p class="text-muted">Tata tertib kehadiran peserta didik di SMAN 2 Pare</p>
        </div>

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <h5 class="card-title"><i class="bi bi-clock-history me-2 text-success"></i>Waktu Masuk</h5>
                <p class="card-text">Bel masuk dibunyikan pukul <strong>06.45</strong>, dan peserta didik hadir di sekolah <strong>15 menit sebelum</strong> bel berbunyi.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <h5 class="card-title"><i class="bi bi-music-note-beamed me-2 text-success"></i>Kegiatan Awal</h5>
                <p class="card-text">Sebelum pembelajaran dimulai, peserta didik berdoa bersama, menyanyikan lagu <strong>Indonesia Raya</strong> dengan sikap sempurna, dan <strong>literasi 15 menit</strong>.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <h5 class="card-title"><i class="bi bi-calendar-week me-2 text-success"></i>Jam Belajar</h5>
                <p class="card-text">
                  <strong>Senin – Kamis:</strong> 06.45 – 15.30 WIB<br>
                  <strong>Jumat:</strong> 06.45 – 14.15 WIB
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <h5 class="card-title"><i class="bi bi-exclamation-triangle me-2 text-success"></i>Terlambat</h5>
                <p class="card-text">Peserta didik yang datang setelah bel dibunyikan dianggap <strong>terlambat</strong> dan wajib melapor ke <strong>petugas piket</strong> serta menghubungi orang tua untuk mendapatkan surat izin masuk.</p>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <h5 class="card-title"><i class="bi bi-envelope-open me-2 text-success"></i>Izin Tidak Masuk</h5>
                <p class="card-text">
                  <strong>A.</strong> Jika sakit, wajib ada surat dari orang tua/wali paling lambat <strong>2 hari</strong> setelah tanggal tidak masuk. Lewat dari itu dianggap <strong>alpa</strong>.<br><br>
                  <strong>B.</strong> Jika tidak masuk karena keperluan lain (misalnya ada acara keluarga), wajib izin terlebih dahulu dan dikonfirmasi ke sekolah.
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </main>

  <footer id="footer" class="footer">
    <div class="container copyright text-center mt-4">
      <div class="credits">
        Website ini dikelola oleh pihak <a href="https://smadapare.sch.id/" target="_blank" rel="noopener noreferrer">SMAN 2 Pare 	</a> &#169; 2025

      </div>
    </div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
