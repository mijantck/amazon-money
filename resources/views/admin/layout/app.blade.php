<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @stack("meta")
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin-lte/css/adminlte.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('assets/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/jsgrid/jsgrid.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/jsgrid/jsgrid-theme.min.css')}}">
</head>

<body class="hold-transition">

    @yield('body')

    <!-- jQuery -->
    <script src="{{ asset('assets/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin-lte/js/adminlte.min.js') }}"></script>


    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin-lte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin-lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin-lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- jsGrid -->
    <script src="{{ asset('assets/admin-lte/plugins/jsgrid/demos/db.js')}}"></script>
    <script src="{{ asset('assets/admin-lte/plugins/jsgrid/jsgrid.min.js')}}"></script>

    <!-- Page specific script -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="{{ asset('assets/admin-lte/js/demo.js') }}"></script> -->
    </script>
    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "paging": false,
            "responsive": true,
            "searching": false,
            "lengthChange": true,
            "autoWidth": false,
            "info": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,

        });
    });
    </script>


    @stack('script')

</body>

</html>