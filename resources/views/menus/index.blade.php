<x-index-layout>
  <div class="container-fluid text-center">
    <div class="row py-4">
      @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
          <div class="col-sm-12">
            <div class="carousel slide d-flex justify-content-center carousel-fade" data-bs-ride="carousel">
              <div class="carousel-inner px-0 py-3 w-75 rounded-4">
                <div class="carousel-item shadow active">
                  <img src="{{asset('images/sushi-img-1.jpg')}}" class="d-block w-100" alt="img-1">
                </div>
                <div class="carousel-item shadow">
                  <img src="{{asset('images/sushi-img-2.jpg')}}" class="d-block w-100" alt="img-2">
                </div>
                <div class="carousel-item shadow">
                  <img src="{{asset('images/sushi-img-3.jpg')}}" class="d-block w-100" alt="img-3">
                </div>
              </div>
            </div>
          </div>
      
          <hr>
      
      <div class="col-12">
        <div class="container-fluid">
          <div class="row d-flex justify-content-center p-4 mb-5">
            <div class="col">
              <a href="/selectmenu"><button class="order-btn shadow p-2">Order Now</button></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="container-fluid">

          @unless (count($reviews) == 0)

          <h3 class="text-decoration-underline pb-2">Latest Reviews</h3>
          <ul class="hash-list cols-3 cols-2-xs pad-30-all align-center text-sm">
            @foreach($reviews as $review)
              <li class="review-column">
                <p class="fs-110 font-cond-l" contenteditable="false">"{{$review->description}}"</p> 
                <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">{{$review->name}}</h5>
                <div class="row">
                  <div class="col-12 d-flex justify-content-center">
                    <div class="rating">
                      <input type="radio" name="{{$review->id}}" value="5" id="5" {{ ($review->rating=="5")? "checked" : "" }} disabled><label for="5">☆</label>
                      <input type="radio" name="{{$review->id}}" value="4" id="4" {{ ($review->rating=="4")? "checked" : "" }} disabled><label for="4">☆</label>
                      <input type="radio" name="{{$review->id}}" value="3" id="3" {{ ($review->rating=="3")? "checked" : "" }} disabled><label for="3">☆</label>
                      <input type="radio" name="{{$review->id}}" value="2" id="2" {{ ($review->rating=="2")? "checked" : "" }} disabled><label for="2">☆</label>
                      <input type="radio" name="{{$review->id}}" value="1" id="1" {{ ($review->rating=="1")? "checked" : "" }} disabled><label for="1">☆</label> 
                    </div>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>

          @else

          @endunless
        </div>
      </div>
    </div>
  </div>
</x-index-layout>