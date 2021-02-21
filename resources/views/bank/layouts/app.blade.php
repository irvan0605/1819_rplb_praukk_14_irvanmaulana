<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/font/css/all.min.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="/assets/datatables/datatables.min.css">

    <!-- My css -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>@yield('title')</title>
</head>

<body>

    <!-- Side Bar -->
    @include('bank.layouts.sidebar')
    <!-- Akhir Side Bar -->

    <!-- Body -->
    <div class="page-content p-0" id="content">

        <!-- Navbar -->
        @include('bank.layouts.navbar')
        <!-- Akhir Navbar -->

        <!-- Konten -->
        @yield('content')
        <!-- Akhir Konten -->

        <!-- Footer -->
        <div class="bg-white p-3 m-0" id="footer">
            <span class="font-weight-bold text-secondary">Copyright &copy; 2021</span>
            <span class="text-secondary">- Electric Payment</span>
        </div>
        <!-- Akhir Footer -->

    </div>
    <!-- Akhir Body-->




    <!-- JQUERY -->
    <script src="/assets/jquery/jquery-3.5.1.js"></script>

    <!-- End Jquery

    <!-- Bootstrap-->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Toggle Sidebar -->
    <script>
        $(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });
    </script>
    <!-- End Toggle Sidebar -->

    <!-- Datatables -->
    <script src="/assets/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "scrollX": true
            });
        });
    </script>

    <!-- End Datatables -->


    {{-- My Script --}}
    <script>

        const navbar = $('#navbar').innerHeight();
        const footer = $('#footer').innerHeight();
        const sidebar = $('#sidebar').innerHeight();

        $('.container-fluid').css('min-height', sidebar - (navbar + footer));
    </script>
    
</body>

</html>