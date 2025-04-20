<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('assets/img/smada.ico')}}" rel="icon">
    <title>User | SI APEM</title>

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
        @if(session('reload'))
            <script>
                window.location.reload();
            </script>
        @endif

        <!-- Sidebar -->
        @include('admin.component.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="modal fade show" id="loadingModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none; z-index: 9999;">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content text-center">
                    <div class="modal-body py-5 bg-white">
                      <div class="spinner-border text-primary mb-3" role="status" style="width: 3rem; height: 3rem;"></div>
                      <p class="mb-0 fs-5 text-secondary">Processing your request...</p>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.component.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- <h1 class="h3 mb-2 text-gray-800">Data Pengguna</h1> -->

                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
                </div>
                <div class="card-body">
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="id">NIS / NIP</label>
                        <input type="text" name="id" id="id" class="form-control" required value="{{ old('id') }}">
                        @if($errors->has('id'))
                            <div class="text-danger">{{ $errors->first('id') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama') }}">
                        @if($errors->has('nama'))
                            <div class="text-danger">{{ $errors->first('nama') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                            <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @if($errors->has('role'))
                            <div class="text-danger">{{ $errors->first('role') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="kode_guru">Kode Guru</label>
                        <input type="text" name="kode_guru" id="kode_guru" class="form-control" value="{{ old('kode_guru') }}">
                        @if($errors->has('kode_guru'))
                            <div class="text-danger">{{ $errors->first('kode_guru') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="poin">Poin</label>
                        <input type="number" name="poin" id="poin" class="form-control" required min="0" value="{{ old('poin') }}">
                        @if($errors->has('poin'))
                            <div class="text-danger">{{ $errors->first('poin') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        @if($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        @if($errors->has('password_confirmation'))
                            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <div class="text-right">
                        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
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
                        Website ini dikelola oleh pihak <a href="https://smadapare.sch.id/" target="_blank" rel="noopener noreferrer">SMAN 2 Pare 	</a> &#169; 2025
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Import Excel File</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <input  type="file" id="excelFile"/>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button class="btn btn-primary" onclick="importExcel()">Upload</button>
                    </div>
                  </div>
                </div>
              </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script>
        function importExcel() {


        let fileInput = document.getElementById("excelFile");
        let file = fileInput.files[0];

        if (!file) {
            alert("Please select an Excel file!");
            return;
        }else{
            let loadingModal;

            const modalEl = document.getElementById('loadingModal');
            modalEl.style.display = 'block';

            // Ensure modal is shown manually (non-dismissible)
            loadingModal = new bootstrap.Modal(modalEl, {
            backdrop: 'static',
            keyboard: false
            });

        loadingModal.show();
        }

        let reader = new FileReader();

        reader.onload = function (e) {
            let data = new Uint8Array(e.target.result);
            let workbook = XLSX.read(data, { type: "array" });
            let sheetName = workbook.SheetNames[0]; // Get the first sheet
            let sheetData = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], { header: 1 }); // Convert to array format

            sheetData.shift(); // Remove the first row (headers)

            let formattedData = sheetData.map(row => ({
                id: row[0] && row[0].trim() !== '' ? row[0] : generateRandomName(),   // Column A (Index 0)
                nama: row[1] || '',  // Column B (Index 1)
                role: row[2] && row[2].trim() !== '' ? row[2] : 'siswa',
                poin: row[3] && row[3].trim() !== '' ? row[3] : 0,
                kode_guru: row[4] && row[4].trim() !== '' ? row[4] : 'SUPERADMIN',
                password: row[5] ? row[5] : 'siapem001', // Column C (Index 2)
                link_dapodik: row[6] ? row[6] : 'NULL',
            }));

            console.log(formattedData); // Check in console
            sendToServer(formattedData);
        };

        reader.readAsArrayBuffer(file);
    }

    function generateRandomName() {
        let letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        let numbers = "0123456789";
        let randomLetters = Array(4).fill().map(() => letters[Math.floor(Math.random() * letters.length)]).join('');
        let randomNumbers = Array(3).fill().map(() => numbers[Math.floor(Math.random() * numbers.length)]).join('');
        return randomLetters + randomNumbers; // Example: NRN543
    }

    function sendToServer(sheetData) {
    console.log("Data Inside sendToServer():", sheetData);

    fetch("/users/import", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ users: sheetData }),
    })
    .then(response => response.text()) // Read response as text first
    .then(data => {
        console.log("Raw Response from Server:", data);

        try {
            let jsonData = JSON.parse(data); // Convert text to JSON
            alert(jsonData.message);
        } catch (e) {
            console.error("JSON Parsing Error:", e, "Response was:", data);
            document.body.innerHTML = data; // Show HTML response if it's not JSON
        }
    })
    .catch(error => console.error("Fetch Error:", error));
}
    </script>
    <script>
        document.getElementById('select-all').addEventListener('click', function(event) {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
        });
        </script>


</body>

</html>
