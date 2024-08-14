<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aeternitas | HR DEPARTMENT</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('hrdepartment/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('hrdepartment/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->

    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('hrdepartment/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('hrdepartment/css/style.css') }}">
    <!-- endinject -->

</head>
<body>

    <div class="container-scroller">

        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.hrdepartmentinc.sidebar')

            <div class="home-section">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
    <!-- Plugin js for this page-->
    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->

    <!-- inject:js -->
    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/data-table.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.bootstrap4.js') }}"></script>
    <!-- End custom js for this page-->
    <!-- DataTables & Plugins -->

    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>

    {{-- print button --}}
    {{-- <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script> --}}
    <script>
        $(function () {
            $("#dataTable").DataTable({
                "responsive": true,
                "autoWidth": false,
                "buttons": [
                    {
                        extend: 'excel',
                        className: 'btn btn-danger text-white border border-white border-2'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-danger text-white border-white border-2'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-danger text-white border-white border-2'
                    }
                ],
                "columnDefs": [
                    { "responsivePriority": 1, "targets": 0 },
                    { "responsivePriority": 2, "targets": -1 }
                ]
            }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
        });

        $(function () {
            $("#dataTable2").DataTable({
                "responsive": true,
                "autoWidth": false,
                "buttons": [
                    {
                        extend: 'excel',
                        className: 'btn btn-danger text-white border border-white border-2'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-danger text-white border-white border-2'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-danger text-white border-white border-2'
                    }
                ],
                "columnDefs": [
                    { "responsivePriority": 1, "targets": 0 },
                    { "responsivePriority": 2, "targets": -1 }
                ]
            }).buttons().container().appendTo('#dataTable2_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>
</html>
