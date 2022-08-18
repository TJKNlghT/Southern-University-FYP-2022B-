<!-- Sidebar -->
<nav class="p-2" id="sidebar">
    <div class="sidebar-header">
        {{--Header Image Goes Here (Maybe a slideshow?)--}}
        {{-- <img src="{{asset('images/sushi-img-600-by-600.jpg')}}" class="img-fluid rounded-2 shadow" alt="..."> --}}
    </div>
    <div class="categories container-fluid">
        <ul class="list-unstyled p-2">
        @foreach($categories as $category)
            <li>     
                <a href="{{ route('menu', ['id' => $category->id]) }}">{{$category->name}}</a>         
            </li>
        @endforeach
            <li>
                <a href="/selectmenu">Back &raquo;</a>
            </li>
        </ul>

    
    </div>
</nav>