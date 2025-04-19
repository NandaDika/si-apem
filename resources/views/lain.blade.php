<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SI APEM</title>
  <link href="assets/img/smada.ico  " rel="icon">
  <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <style>
    .navbar-nav .nav-link {
      font-weight: 500;
    }
    .btn-login {
      margin-left: 1rem;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
  <div class="container"> <!-- GANTI DI SINI -->
    <!-- Brand -->
    <a class="navbar-brand fw-bold text-success" href="/">SI APEM</a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mobile-nav-toggle"></span>
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


<!-- Main Content -->
<main class="container py-5">
  <div class="text-center mb-5">
    <h2 class="text-success fw-bold">LAIN-LAIN</h2>
    <p class="text-muted">Hal-hal lain yang perlu diperhatikan oleh peserta didik dan pihak sekolah</p>
  </div>

  <div class="row gy-4">
    <div class="col-md-12">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-gear me-2 text-success"></i>Pengaturan Selanjutnya</h5>
          <p class="card-text">Hal-hal yang tidak tercantum dalam tata tertib ini akan diatur lebih lanjut sesuai kebijakan pihak sekolah.</p>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-calendar-check me-2 text-success"></i>Peraturan Berlaku</h5>
          <p class="card-text">Tata tertib ini mulai berlaku sejak tanggal ditetapkan oleh pihak sekolah.</p>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<footer class="footer mt-5 py-4 border-top bg-light text-center">
  <div class="container">
    <span class="small">
    Website ini dikelola oleh pihak <a href="https://bootstrapmade.com/" target="_blank" rel="noopener noreferrer">SMAN 2 Pare 	</a> &#169; 2025

    </span>
  </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
