<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>@yield('title')</title>

    <style>
        .bg {
            background-image: url(/img/bg-homepage.jpg);
            background-size: cover;
            box-sizing: border-box;
            width: 100%;
            height: 100vh;
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



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>