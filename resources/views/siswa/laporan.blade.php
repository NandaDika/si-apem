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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    @if(session('message'))
                    <div class="alert alert-primary">{{ session('message') }}</div>
                @endif
                @if ($errors->any())
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif

                    <!-- Content Row -->

                    <div class="row">


                        <!-- Area Chart -->
                        <div class="col-lg-6">
                            <form action="{{route('siswa.laporan.submit')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                        <label for="pelaku">Nama Pelaku:</label>
                                    <select id="pelaku" name="id_pelaku" class="form-control select2">
                                        <option value="">-- Pilih nama siswa --</option>
                                        @foreach($users as $id => $nama)
                                            <option value="{{ \Illuminate\Support\Facades\Crypt::encrypt($id) }}">{{ $nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="lokasi">Lokasi:</label>
                                <input class="form-control" type="text" name="lokasi" id="lokasi">
                                </div>
                                <div>
                                    <label for="lokasi">Tanggal:</label>
                                <input class="form-control" type="date" name="tanggal" id="tanggal">
                                </div>
                                <div>
                                    <label for="description">Deksripsi:</label>
                                <textarea name="deskripsi" class="form-control col-12"></textarea>
                                </div>

                                <div>
                                    <label for="kategori">Kategori Pelanggaran:</label>
                                <select id="kategori" name="kategori" class="form-control">
                                    <option value="">-- Pilih kategori --</option>
                                    @foreach($kategoris as $id => $judul)
                                        <option value="{{ $id }}">{{ $judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="custom-file-upload text-center mt-3">
                                    <label for="file">Bukti Dokumentasi:</label>
                                    <input type="file" name="file" id="file" accept="image/*" onchange="displayFile()" class="absolute inset-0 opacity-0 cursor-pointer" required>
                                    <label for="file">
                                        <div id="uploadIcon" class="upload-icon mb-3">
                                            <i class="fa fa-upload fa-2x"></i>
                                        </div>
                                        <h4 style="color: #616161; !important" id="uploadText">Tarik file atau klik untuk mengupload</h4>
                                        <p id="uploadInstructions">Format: gambar (.jpg, .png, .jpeg) | Max size: 1MB <br>Keamanan data terjamin! Semua file akan dienkripsi oleh sistem.</p>
                                    </label>
                                    <p id="file-name" class="mt-2"></p>
                                    <img id="imagePreview" src="" alt="Image Preview" class="preview-img hidden">
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
         $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Search a user...",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
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
