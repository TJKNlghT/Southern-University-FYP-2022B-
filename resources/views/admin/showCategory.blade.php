<x-admin-layout>
    <div class="page-wrapper chiller-theme toggled">
        @include('partials._adminsidebar')
        <main class="page-content">
            <div class="container-fluid">
                <table class="table">
                    <div class="d-flex justify-content-between"><h2>Default Category</h2> &nbsp;<a href="{{ route('admindefaultaddcat')}}"><button class="btn btn-sm btn-outline-secondary">Add Category</button></div></a>
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
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="text-end">
                                    <a href="{{ route('editCategory', ['id' => $category->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('deleteCategory', ['id' => $category->id]) }}"><i class="fa-solid fa-trash"></i></a>
                                </td>                                                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </main>
    </div>

</x-admin-layout>