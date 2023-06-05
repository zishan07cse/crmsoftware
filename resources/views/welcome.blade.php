<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        .centerdiv {
            width: 100%;
            height: 100px;
            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;
            
            margin: auto;
        }
    </style>    

</head>

<body class="antialiased">
    <div>
      

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="row centerdiv">
                <div class="col-12">
                    <div class="row">

                        <div class="col-lg-4">
                            <a href=" {{ route('login', ['parameter' => 1]) }}">
                                <button type="button" class="btn btn-info btn-lg btn-block">Real Estate</button>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href=" {{ route('login', ['parameter' => 2]) }}">
                                <button type="button" class="btn btn-info btn-lg btn-block">Invetment Service</button>
                            </a>    
                        </div>
                        <div class="col-lg-4">
                            <a href=" {{ route('login', ['parameter' => 3]) }}">
                                 <button type="button" class="btn btn-info btn-lg btn-block">It / Software Service</button>
                            </a>     
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</body>

</html>
