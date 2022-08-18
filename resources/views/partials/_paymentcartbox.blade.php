<!-- {{--Per Item--}}
<div class="row align-items-center border-bottom pb-3 pt-3">
    {{--Image--}}
    <div class="image-col col">
        <img src="{{asset('images/chickensoup.jpg')}}" class="img-fluid img-adj rounded-3" alt="Cotton T-shirt">
    </div>

    <div class="col">
        <h6 class="text-black mb-0">Chicken Soup</h6>
    </div>
    
    {{--Quantity--}}
    <div class="col-2 p-0 d-flex">

        <button class="btn btn-minus btn-link px-2"
        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
        <i class="fas fa-minus"></i>
        </button>

        <input id="quantity" min="1" name="quantity" value="1" type="number"
        class="form-control text-center" />

        <button class="btn btn-plus btn-link px-2"
        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
        <i class="fas fa-plus"></i>
        </button>

    </div>

    {{--Price--}}
    <div class="col mx-auto">
        <h6 class="mb-0 text-center">RM 44.00</h6>
    </div>

    <div class="col-1 d-flex justify-content-center">
        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
    </div>
</div>
{{--End--}} -->