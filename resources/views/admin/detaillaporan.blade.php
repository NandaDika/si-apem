<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail Laporan | SI APEM</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.component.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.component.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Laporan</h1>
                    </div>

                    <!-- Content Row -->

                    <!-- Content Row -->
                    <div class="col-12 col-lg-7 mt-2 mb-2">
                        <div class="card mb-6">
                            <div class="card-body pt-12">
                              <div class="user-avatar-section">
                                <div class="d-flex align-items-center flex-column">
                                  <div class="user-info text-center">
                                      <h3>Laporan Diajukan</h3>
                                    <h5>Tanggal pengajuan: {{$data->created_at}}</h5>
                                  </div>
                                </div>
                              </div>

                              <h5 class="pb-4 border-bottom mb-4">Detail Pengajuan Laporan</h5>
                              <div class="info-container">
                                <ul class="list-unstyled mb-6">
                                    <li class="mb-2">
                                        <span class="h6">Status Laporan: {{$data->status}}</span>
                                      </li>
                                  <li class="mb-2">
                                    <span class="h6">Kategori Pengajuan: {{$data->nama_kategori}}</span>
                                  </li>
                                  <li class="mb-2">
                                    <span class="h6">Deskripsi :</span>
                                    <span>{{$data->deskripsi}}</span>
                                  </li>
                                  <li class="mb-2">
                                    <span class="h6">Tanggal:</span>
                                    <span>{{$data->tanggal}}</span>
                                  </li>
                                  <li class="mb-2">
                                    <span class="h6">File Verifikasi:</span>
                                    @php

                                        $encryptedId = \Illuminate\Support\Facades\Crypt::encrypt($data->id);
                                    @endphp
                                    <span><br>
                                        @if ($data->contentType == 'application/pdf')
                                        <a  target="_blank"  href="{{ route('admin.image.show', ['id' => $encryptedId]) }}"> Buka Dokumen</a>
                                        @elseif ($data->contentType == 'image/jpeg')
                                        <img class="img-fluid w-50 " src="{{ route('admin.image.show', ['id' => $encryptedId]) }}" alt="Encrypted Image">
                                        @elseif ($data->contentType == 'video/mp4')
                                        <video controls class="img-fluid w-50 ">
                                            <source src="{{ route('admin.image.show', ['id' => $encryptedId]) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        @endif
                                        </span>
                                  </li>

                                </ul>

                              </div>
                            </div>
                          </div>
                    </div>
                    @if ($data->status != 'diproses')
                    <div class="col-12 col-lg-7 mt-2 mb-2">
                        <div class="card mb-6">
                            <div class="card-body pt-12">
                              <div class="user-avatar-section">
                                <div class="d-flex flex-column">
                                  <div class="user-info">
                                      <h3>Detail Sanggahan</h3>
                                  </div>
                                </div>
                              </div>
                                <div class="info-container">
                                    <ul class="list-unstyled mb-6">

                                        <li class="mb-2">
                                          <span class="h6">Deskripsi :</span>
                                          <span>{{$data->sanggah_deskripsi ?? '-'}}</span>
                                        </li>
                                        <li class="mb-2">
                                          <span class="h6">Bukti Sanggah:</span><br>
                                          @php

                                              $encryptedId = \Illuminate\Support\Facades\Crypt::encrypt($data->id);
                                          @endphp
                                            @if ($data->contentType2 == 'application/pdf')
                                            <a  target="_blank"  href="{{ route('admin.image.sanggah.show', ['id' => $encryptedId]) }}"> Buka Dokumen</a>
                                            @elseif ($data->contentType2 == 'image/jpeg')
                                            <img class="img-fluid w-50 " src="{{ route('admin.image.sanggah.show', ['id' => $encryptedId]) }}" alt="{{$data->sanggah_image ? 'Gambar':''}}">
                                            @elseif ($data->contentType2 == 'video/mp4')
                                            <video controls class="img-fluid w-50 ">
                                                <source src="{{ route('admin.image.sanggah.show', ['id' => $encryptedId]) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            @endif
                                            </span>
                                        </li>

                                      </ul>
                                </div>

                            </div>
                          </div>
                    </div>
                    @endif
                    @if ($data->status != 'ditolak' && $data->status != 'diterima')
                        <div class="col-12 col-lg-7 mt-2 mb-2">
                        <div class="card mb-6">
                            <div class="card-body pt-12">
                              <div class="user-avatar-section">
                                <div class="d-flex flex-column">
                                  <div class="user-info">
                                      <h3>Finalisasi Poin</h3>
                                  </div>
                                </div>
                              </div>
                                <div class="info-container">
                                    <ul class="list-unstyled mb-6 d-flex justify-content-between">

                                        <li class="mb-2">
                                          <form action="{{route('admin.tolak', ['id' => $encryptedId])}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Tolak Laporan</button>
                                          </form>
                                        </li>
                                        <li class="mb-2">
                                            <form action="{{route('admin.terima', ['id' => $encryptedId])}}" method="POST">
                                                @csrf
                                              <button type="submit" class="btn btn-success">Terima Laporan</button>
                                            </form>
                                          </li>
                                      </ul>
                                </div>

                            </div>
                          </div>
                    </div>

                    @endif

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        Website ini dikelola oleh pihak <a href="https://smadapare.sch.id/" target="_blank" rel="noopener noreferrer">SMAN 2 Pare 	</a> &#169; 2025
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
