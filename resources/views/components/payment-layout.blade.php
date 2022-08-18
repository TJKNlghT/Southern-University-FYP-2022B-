<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/8f27d68390.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css\payment.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- Font awesome icon kit-->
    <script src="https://kit.fontawesome.com/5e7da929cb.js" crossorigin="anonymous"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
</head>

<body>
    
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-0">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{asset('images/logo.png')}}" class="img-fluid" alt="sushilogo">
        </a>
        </div>

    
    </nav>
    
    <!-- Content -->
    {{$slot}}

    <script src="{{ asset('js\payment.js') }}"></script>
    <script src="{{ asset('js\menu.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</body>