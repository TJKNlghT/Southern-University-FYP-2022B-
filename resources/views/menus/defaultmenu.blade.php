<x-menu-layout>
    <div class="wrapper">

        @include('partials._defaultmenubar')

        <div class="menu-items container-fluid px-2 py-3">
        <div class="row gx-2">
            @unless (count($products) == 0)

            @foreach($products as $product)
                <div class=" col-lg-2 col-md-3 col-6 d-flex justify-content-center mb-4">
                    <a class="item-card" style="width: 18rem;" href="{{ route('viewitem', ['product' => $product->id]) }}">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{$product->image ? asset ('images/' . $product->image) : asset('/images/no-image.png')}}" class="img-fluid w-100 h-100" alt="">
                            </div>
                    
                            <div class="card-content d-flex justify-content-between">
                                <div><h6>{{$product->name}}</h6></div>
                                <div><h6>RM {{$product->price}}</h6></div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            @else
                <div class="container-fluid d-flex justify-content-center">
                    <img src="{{asset('images/no-items.png')}}" class="img-fluid bg-transparent" alt="no-items">
                </div>
            @endunless


        </div>
        <div class="mt-6 p-4">
            {{$products->links()}}
        </div>
    </div>
</x-menu-layout>