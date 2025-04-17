<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.css')}}" rel="stylesheet">
    <style>
        /* Custom Styles */
        .soft-green {
            /* background-color: #A9DFBF; Soft green */
        }
        .smooth-transition {
            transition: all 0.3s ease-in-out;
        }
        .card-sm {
            max-width: 220px;
            margin: 0 auto;
        }
        .category-icon {
            width: 60px;
            height: 60px;
        }
        .footer-links a {
            color: #fff;
        }
        .footer-links a:hover {
            color: #007bff;
        }

.custom-file-upload {
    border: 2px dashed #d3d3d3;
    border-radius: 5px;
    background: #f8f9fa;
    padding: 30px;
    position: relative;
}

.custom-file-upload input[type="file"] {
    opacity: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.custom-file-upload label {
    cursor: pointer;
}

.custom-file-upload .upload-icon {
    color: #6c757d;
}

.custom-file-upload h4 {
    font-size: 18px;
    margin-bottom: 0;
}

.preview-img {
    max-width: 100%;
    height: auto;
    margin-top: 10px;
}

.hidden {
    display: none;
}

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('siswa.component.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('siswa.component.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



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
                                    <span class="h6">Bukti Laporan:</span>
                                    @php

                                        $encryptedId = \Illuminate\Support\Facades\Crypt::encrypt($data->id);
                                    @endphp
                                    <span><br>
                                        @if ($data->contentType == 'application/pdf')
                                        <a  target="_blank"  href="{{ route('image.show', ['id' => $encryptedId]) }}"> Buka Dokumen</a>
                                        @elseif ($data->contentType == 'image/jpeg')
                                        <img class="img-fluid w-50 " src="{{ route('image.show', ['id' => $encryptedId]) }}" alt="Encrypted Image">
                                        @elseif ($data->contentType == 'video/mp4')
                                        <video controls class="img-fluid w-50 ">
                                            <source src="{{ route('image.show', ['id' => $encryptedId]) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        @endif
                                        </span>

                                </ul>

                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-lg-7 mt-2 mb-2">
                        <div class="card mb-6">
                            <div class="card-body pt-12">
                              <div class="user-avatar-section">
                                <div class="d-flex flex-column">
                                  <div class="user-info">
                                      <h3>Form Sanggahan</h3>
                                  </div>
                                </div>
                              </div>
                              @if ($data->status == 'diproses')
                              <form action="{{route('siswa.laporan.sanggah.upload',  ['id' => $encryptedId])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="info-container">
                                    <ul class="list-unstyled mb-6">
                                      <li class="mb-2">
                                        <span class="h6">Deskripsi Sanggah:</span>
                                        <div><textarea name="deskripsi_sanggah" id="" class="form-control"></textarea></div>
                                      </li>
                                      <li class="mb-2">
                                        <span class="h6">Bukti Sanggah:</span>
                                        <div class="custom-file-upload text-center align-content-center mt-3">
                                            <label for="file">Bukti Dokumentasi:</label>
                                            <input type="file" name="file" id="file" accept="image/*,video/*,application/pdf" onchange="displayFile()" class="absolute inset-0 opacity-0 cursor-pointer" required>
                                            <label for="file">
                                                <div id="uploadIcon" class="upload-icon mb-3">
                                                    <i class="fa fa-upload fa-2x"></i>
                                                </div>
                                                <h4 style="color: #616161; !important" id="uploadText">Tarik file atau klik untuk mengupload</h4>
                                                <p id="uploadInstructions">Format: (.jpg, .png, .jpeg .mp4 .pdf) | Max size gambar/pdf: 1MB, video: 10MB </p>
                                            </label>
                                            <p id="file-name" class="mt-2"></p>
                                            <img id="imagePreview" src="" alt="Image Preview" class="preview-img hidden">
                                        </div>
                                      </li>
                                      <li class="mb-2">
                                        <button class="btn btn-danger" type="submit">Sanggah</button>
                                      </li>

                                    </ul>

                                  </div>

                              </form>
                              @endif

                            </div>
                          </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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

    <script>
        function displayFile() {
    const fileInput = document.getElementById('file');
    const fileName = document.getElementById('file-name');
    const imagePreview = document.getElementById('imagePreview');
    const uploadText = document.getElementById('uploadText');
    const uploadIcon = document.getElementById('uploadIcon');
    const uploadInstructions = document.getElementById('uploadInstructions');

    if (fileInput.files && fileInput.files[0]) {
        const file = fileInput.files[0];
        fileName.textContent = file.name;

        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.classList.add('hidden');
        }

        // Hide upload text and instructions when a file is selected
        uploadText.classList.add('hidden');
        uploadIcon.classList.add('hidden');
        uploadInstructions.classList.add('hidden');
    } else {
        fileName.textContent = '';
        imagePreview.classList.add('hidden');
        // Show upload text and instructions when no file is selected
        uploadText.classList.remove('hidden');
        uploadIcon.classList.remove('hidden');
        uploadInstructions.classList.remove('hidden');
    }
}
let selectedFiles = [];

function displayFiles2() {
    const fileInput = document.getElementById('file2');
    const filePreviewContainer = document.getElementById('file-preview-container2');

    // Get newly selected files
    const files = fileInput.files;

    // Update the array of selected files
    selectedFiles = [...files];

    filePreviewContainer.innerHTML = ''; // Clear previous previews

    selectedFiles.forEach(file => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.alt = 'Image Preview';
                imgElement.classList.add('preview-img2', 'mb-2');
                imgElement.style.width = '150px'; // Set preview size
                imgElement.style.margin = '10px'; // Add some margin

                // Append the preview image
                filePreviewContainer.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        } else {
            alert('Only image files are allowed.');
        }
    });
}

    </script>

</body>

</html>
