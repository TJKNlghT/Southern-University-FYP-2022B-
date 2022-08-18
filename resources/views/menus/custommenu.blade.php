<x-menu-layout>
    <!--Image Header -->
    <header class="createsushi-header shadow-lg">
        <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-end">
            <h1 class="text-light ml16 createsushi-header-text font-weight-bold">Create Your Own Sushi</h1>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
            </div>
        </div>
        </div>
    </header>

    <form class="p-2" method="POST" action="{{ route('createsushi') }}" enctype="multipart/form-data">
        @csrf
        <div class="create-sushi-container shadow container-fluid pt-3 bg-light rounded-3 border">
            <!-- First Row [Item]-->
            @unless (count($categories) == 0)
                @foreach($categories as $category)
                    <div class="row py-3">
                        <div class="px-5">
                            <h5>Select {{$category->name}}</h5>
                            <hr>
                        </div>
                        <fieldset>
                            <div class="d-flex overflow-auto px-4">
                                @foreach($products as $product)
                                    @if($product->categoryName == $category->name)
                                        <div class="px-2 position-relative">
                                            <input type="radio" name="{{$category->name}}" value="{{$product->name}}" class="sr-only" id="{{$product->id}}" required>
                                            <label for="{{$product->id}}">
                                                <div class="card" style="width: 10rem;">
                                                    <div class="card-image">
                                                        <img src="{{$product->image ? asset ('images/' . $product->image) : asset('/images/no-image.png')}}" class="img-fluid w-100" alt="">
                                                    </div>
                                            
                                                    <div class="card-content d-flex justify-content-between">
                                                        <div><h6>{{$product->name}}</h6></div>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="tick-container">
                                                <div class="tick"><i class="fa fa-check"></i></div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
                @endforeach
            @else
                <div class="container-fluid d-flex justify-content-center">
                    <img src="{{asset('images/no-items.png')}}" class="img-fluid bg-transparent" alt="no-items">
                </div>
            @endunless
        </div>
        <hr>
        <div class="mb-6 pb-3 px-4 d-flex float-end">
            <button type="submit" class="btn btn-primary">Create Sushi</button> 
        </div> 
    </form>
    <div class="ps-4"><a href="{{route('selectmenu')}}" class="previous border rounded-3 btn bg-primary text-white align-left">&laquo; Back</a></div>
</x-menu-layout>