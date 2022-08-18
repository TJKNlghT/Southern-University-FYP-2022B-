<x-payment-layout>
    {{--Cart Summary--}}
    <div class="cart-summary container-fluid pt-4">     
        @include('partials._paymentcartbox')
    </div>
    <div class="empty-cart-window container-fluid hide">
        <div class="row d-flex justify-content-center">
            <div class="col-3 col-lg-1 col-md-2 d-flex justify-content-center">
                <img src="{{asset('images/sad-sushi.png')}}" class="img-fluid bg-transparent opacity-75" alt="no-items">
            </div>
        </div>
        <div class="text-center">
            <small class="text-secondary text-uppercase fw-bold">Your cart is empty...</small>
        </div>
    </div> 
    <div class="col-12 text-center pt-3"> <a class="additemsbtn text-uppercase fs-9 text-decoration-none color-pink"href="/selectmenu">Add More Items</a></div>
    
    <hr class="my-4 mx-4">
    {{--Payment Summary Box--}}
    <div class="container-fluid m-0 p-3">      
        @include('partials._paymentsummarybox')
    </div>

    {{--Payment Window--}}
    <div id="paymentwindow" class="container-fluid px-3 bg-light py-0 fixed-bottom border-top border-3 rounded hide">
        @include('partials._paymentwindow')
    </div>

</x-payment-layout>