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

    <title>Kategori | SI APEM</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Data Kategori</h1>
                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">

                            <div>
                                <a role="button" href="" class="btn btn-primary">Tambah data</a>
                                <a role="button" href="" class="btn btn-success" data-toggle="modal" data-target="#importModal">Import data</a>
                                <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-form').submit();">
                                    Hapus Terpilih
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="delete-form" action="{{route('kategori.deleteMultiple')}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>ID</th>
                                            <th>Nama Kategori</th>
                                            <th>Poin</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Nama Kategori</th>
                                            <th>Poin</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td><input type="checkbox" name="ids[]" value="{{$user->id}}"></td>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->judul}}</td>
                                            <td>{{$user->poin}}</td>
                                            <td>
                                                {{-- <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning">Edit</a> --}}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </form>

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
                judul: row[1] || '',  // Column B (Index 1)
                poin: row[2],
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

    fetch("/kategori/import", {
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
