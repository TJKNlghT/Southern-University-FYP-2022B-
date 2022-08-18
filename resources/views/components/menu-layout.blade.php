<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css\menu.css') }}" />
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
    <ul class="navbar-nav ms-auto mb-lg-0 list-group-horizontal py-3">
      <li class="nav-item ps-2">
        <i id="flip" class="fa-solid fa-basket-shopping fa-2x">
        </i>
        <div class="cartbadge position-absolute hide">
          <span class="quantitybadge badge rounded-pill bg-danger">
            0
          </span>
        </div>
      </li>
    </ul>
  <div>
</nav>

<!-- Content -->
  {{$slot}}

<!-- Cart Window -->
<div class="cart-window container fixed-bottom rounded-2 shadow-sm hide" id="panel">
  <div class="row justify-content-center">
    <div class="empty-cart container-fluid hide">
      <div class="row d-flex justify-content-center">
        <div class="col-3 col-lg-1 col-md-2 d-flex justify-content-center">
          <img src="{{asset('images/sad-sushi.png')}}" class="img-fluid bg-transparent opacity-75" alt="no-items">
        </div>
      </div>
      <div class="text-center">
        <small class="text-secondary text-uppercase fw-bold">Your cart is empty...</small>
      </div>
    </div>
    <div class="food-cart-items flex-row p-2">

      
      {{-- Items --}}
      {{-- <div class="food-item col-12">
        <div class="d-flex align-items-center">
          <div class="quantity p-2 flex-shrink-0"><h6>1 &nbsp<span><i class="fa-solid fa-xmark" aria-hidden="true"></i></span></h6></div>
          <div class="p-2 w-100 ms-3">
            <div class="row align-items-center">
              <div class="image-col col">
                <img class="image-adj" src="{{asset('images/chickensoup.jpg')}}" class="img-fluid" alt="chickensoup">
              </div>
              <div class="col">
                  <p>Chicen soup</p>
                  <ul class = "list-unstyled">
                    <li><small></small></li>
                    <li><small></small></li>
                  </ul>
              </div>
            </div>
          </div>
          <div class="p-2 flex-shrink-1">RM 12.40</div>
        </div>
      </div>  --}}

      
      {{--Placeholder for testing --}}

      {{-- --}}


    </div>
    
    <!-- Force next columns to break to new line at md breakpoint and up -->
    <div class="w-100 d-none d-md-block"></div>

    <div class="price-summary-cart col-12 col-sm-12 d-flex justify-content-center">
      <div class="container px-1 pt-3">
        <div class="row justify-content-center">

          <!-- Force next columns to break to new line -->
          <div class="w-100"></div>
          
          <div class="col-12">
            <div class="d-flex justify-content-between">
              <div>Subtotal</div>
              <div class="subtotal">RM0.00</div>
            </div>
          </div>
      
          <!-- Force next columns to break to new line -->
          <div class="w-100"></div>
      
          <div class="col-12">
            <div class="d-flex justify-content-between">
              <div>Service Charge</div>
              <div>RM 1.3</div>
            </div>
          </div>

          <!-- Force next columns to break to new line -->
          <div class="w-100"></div>

          <div class="col-12">
            <div class="d-flex justify-content-between">
              <div>Total</div>
              <div class="totalPrice">RM0.00</div>
            </div>
          </div>

          <!-- Force next columns to break to new line -->
          <div class="w-100"></div>

          <div class="col-sm-12 col-md-6 px-1 py-3 d-flex justify-content-center">
            <a class="review-btn" href="/payment">
              <span class="name-descripeion">Review Order</span>
              <div class="btn-icon heart">
                <i class="fa-solid fa-cash-register"></i>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- View Cart Button (Show only if theres item in cart) --}}
{{-- <div class="container-fluid position-fixed bottom-0 px-5 hide">
  <div class="row justify-content-center text-center">
    <div class="col-12 col-md-8 col-lg-8 viewcartbtn rounded-3">
      <span class="badge rounded-circle ">3</span>
      <span class="text-uppercase font-weight-bold text-white h5">View Cart&nbsp<i class="fa-solid fa-basket-shopping" aria-hidden="true"></i></span>
    </div>
  </div>
</div> --}}

  <script src="{{ asset('js\menu.js') }}"></script>
</body>

</html>