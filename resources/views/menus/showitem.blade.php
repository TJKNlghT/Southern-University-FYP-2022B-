<x-menu-layout>
    <div class="container card-container shadow rounded border mt-5 mb-5">	
        <div class="card-product">	
            <div class="row g-0">	
                <div class="col-md-6 border-end">	
                    <div class="d-flex flex-column justify-content-center">	
                        <div class="main_image">	
                            <img id="productImg" src="{{$product->image ? asset ('images/' . $product->image) : asset('/images/no-image.png')}}" alt="{{$product->image}}" class="img-fluid">	
                        </div>	
                    </div>	
                </div>	
                <div class="col-md-6">	
                    <div class="p-3 right-side">	
                        <div class="d-flex justify-content-between align-items-center">
                            <input type="hidden" value="{{$product->id}}" id="productId">
                            <h3 id="productName">{{$product->name}}</h3>	
                            <a href="{{route('viewmenu')}}" class="previous">&laquo; Back</a>
                        </div>	
                        <div class="mt-2 pr-3 content">	
                            <p id="productDescription">{{$product->description}}</p>	
                        </div>	
                        <h3 id="price">RM {{$product->price}}</h3>	
                        
                        <div class="py-4">
                            <span class="minus">-</span>
                            <input class="quantitynumber" id="productQuantity" type="number" value="1"/>
                            <span class="plus">+</span>
                        </div>

                        <div class="buttons d-flex flex-row mt-5 gap-3">	
                            <span class="add-to-cart-btn">Add to cart</span>
                        </div>	
                    </div>	
                </div>	
            </div>	
        </div> 
    </div>
    
    {{-- <div class="container-fluid">
        <div class="row p-2">
            <div class="jumbotron">
                <div class="img-col mx-auto d-block">
                    <img id="productImg" src="{{$product->image ? asset ('images/' . $product->image) : asset('/images/no-image.png')}}" class="img-fluid" alt="{{$product->image}}">
                </div>       
                <a href="{{route('viewmenu')}}" class="previous">&laquo; Back</a>
                <hr class="my-4">
                <div class="d-flex justify-content-between">
                    <input type="hidden" value="{{$product->id}}" id="productId">
                    <div><h5 id="productName">{{$product->name}}</h5></div>
                    <div><h5 id="price">RM {{$product->price}}</h5></div>
                </div>
                <p class="pt-4" id="productDescription">{{$product->description}}</p>
                <p class="lead pt-4">
                <div class="pb-4">
                    <span class="minus">-</span>
                    <input class="quantitynumber" id="productQuantity" type="number" value="1"/>
                    <span class="plus">+</span>
                </div>
                <span class="button add-to-cart-btn">Add to cart</span>
                </p>
              </div>
          </div>
    </div> --}}
</x-menu-layout>