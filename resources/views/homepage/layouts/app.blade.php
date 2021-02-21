<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">

    <title>@yield('title')</title>

    <style>
        .bg {
            background-image: url(/assets/img/bg-homepage.jpg);
            background-size: cover;
            box-sizing: border-box;
            width: 100%;
            min-height: 100vh;
            height: auto;
        }

        .opacity {
            opacity: 0.7;
            background-color: #3C256C;
        }

        .btn-primary {
            background-color: #3C256C;
        }
    </style>
</head>

<body>

    @include('homepage.layouts.navbar')

    @yield('content')

    <footer class="bg-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <span class="font-weight-bold">Copyright &copy; 2021</span>
                    <span style="color: grey;">- Electric Payment</span>
                </div>
            </div>
        </div>
    </footer>


    <script src="/assets/bootstrap/js/bootstrap.min.js""></script>
</body>

</html>