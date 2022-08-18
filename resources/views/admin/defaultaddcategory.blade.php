<x-admin-layout>
    <div class="page-wrapper chiller-theme toggled">
        @include('partials._adminsidebar')
        <main class="page-content">
            <div class="container-fluid">
                <table class="table">
                    <div class="d-flex justify-content-between"><h2>Add Default Category</h2> &nbsp;<button class="btn btn-primary"><a href="{{ route('viewAdminCategory') }}" class="pt-4 previous">Back</a></button></div>
              <hr>
              <div class="row">
                <form method="POST" action="{{ route('addCategory') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6 pb-3">
                        <label for="name" class="inline-block text-lg pt-2 px-2">Category Name</label>
                        <input type="text" class="border rounded p-2 w-full" name="name" placeholder="" value="{{old('name')}}"/>
                        
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror

                    </div>

                    <div class="mb-6 pb-3">
                        <button class="btn btn-primary">
                            Create Category
                        </button>
                        
                    </div>
                </form>
              </div>
            </div>
          </main>
    </div>

</x-admin-layout>