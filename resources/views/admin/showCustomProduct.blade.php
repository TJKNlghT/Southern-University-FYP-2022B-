<x-admin-layout>
    <div class="page-wrapper chiller-theme toggled">
        @include('partials._adminsidebar')
        <main class="page-content">
            <div class="container-fluid">
              <div class="d-flex justify-content-between"><h2>Custom Menus</h2> &nbsp;<a href="{{route('adminaddcustommenu')}}"><button class="btn btn-sm btn-outline-secondary">Add Menu Items</button></a></div>
              <hr>
           
              @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('danger')}}
                </div>
                @endif

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="img-col"><img src="{{$product->image ? asset ('images/' . $product->image) : asset('/images/no-image.png')}}" width="70%" class="img-fluid img-adj"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>RM {{ $product->price }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('editCustomProduct', ['id' => $product->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('deleteCustomProduct', ['id' => $product->id]) }}"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                                                                                
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </main>
    </div>

</x-admin-layout>