<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.cs') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        .mx-auto {
            position: absolute;
            top: 50%;
            left: 35%;
        }

        .logo {
            position: absolute;
            display: flex;
            justify-content: center;
            left: 33%;
            top: 35%;
        }

        /* @media only screen and (min-width: 320px) {
            .logo {
                left: 9%;
                top: 35%;
            }

            .mx-auto {
                left: 8%;
            }

            /* For mobile phones:
            
        }*/
    </style>

</head>

<body>
    <div class="row">
        <div class="col-sm-4 logo">
            <div class="brand-logo ">
                <img src="{{ asset('/images/st_logo.png') }}" alt="logo">
            </div>
        </div>
        <div class="col-sm-4 mx-auto">
            <div class="d-flex align-items-center justify-content-evenly">
                <a href="user/login/1">
                    <button class="btn btn-primary">Real Estate</button>
                </a>
                <a href="user/login/2">
                    <button class="btn btn-primary">Investement</button>
                </a>
                <a href="user/login/3">
                    <button class="btn btn-primary">Software</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
