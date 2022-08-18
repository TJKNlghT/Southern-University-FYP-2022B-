<x-admin-layout>
    <div class="page-wrapper chiller-theme toggled">
        @include('partials._adminsidebar')
        <main class="page-content">
            <div class="container-fluid">
                <table class="table">
                    <div class="d-flex justify-content-between"><h2>Add Default Menu Items</h2> &nbsp;<button class="btn btn-primary"><a href="{{ route('viewAdminProduct') }}" class="pt-4 previous">Back</a></button></div>
              <hr>
              <div class="row">
                <form method="POST" action="{{ route('addProduct') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6 pb-3">
                        <label for="name" class="inline-block text-lg pt-2 px-2">Item Name</label>
                        <input type="text" class="border rounded p-2 w-100" name="name" placeholder="" value="{{old('name')}}"/>
                        
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6 pb-3">
                        <label for="title" class="inline-block text-lg pt-2 px-2">Item Price</label>
                        <input type="number" step="any" class="border rounded p-2 w-100" name="price" placeholder="" value="{{old('price')}}"/>
                        
                        @error('price')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6 pb-3">
                        <label for="title" class="inline-block text-lg pt-2 px-2">Select Category</label>
                        <select class="form-select form-select-md" aria-label=".form-select-sm example" name="categoryName">
                            <option selected disabled>Please select one option</option>
                            @foreach($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                        
                        @error('categoryName')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6 pb-3">
                        <label for="image" class="inline-block text-lg pt-2 px-2">Insert Image</label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-100" name="image"/>

                        @error('image')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    
                    <div class="mb-6 pb-3">
                        <label for="description" class="inline-block text-lg pt-2 px-2">Item Description</label>
                        <textarea
                                class="border border-gray-200 rounded p-2 w-100"
                                name="description"
                                rows="10"
                                placeholder="Item description...">{{old('description')}}</textarea>
                        
                        @error('description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6 pb-3">
                        <button class="btn btn-primary">
                            Create Item
                        </button>
                        
                    </div>
                </form>
              </div>
            </div>
          </main>
    </div>

</x-admin-layout>