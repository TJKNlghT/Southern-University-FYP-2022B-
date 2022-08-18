<x-admin-layout>
    <div class="page-wrapper chiller-theme toggled">
        @include('partials._adminsidebar')
        <main class="page-content">
            <div class="container-fluid">
                <table class="table">
                    <h2>All Food Reviews</h2>
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
                            <th>Comment</th>
                            <th>Rating</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($foodreviews as $foodreview)
                            <tr>
                                <td>{{$foodreview->name}}</td>
                                <td>{{$foodreview->description}}</td>
                                <td>
                                    <div class="rating">
                                        <input type="radio" name="{{$foodreview->id}}" value="5" id="5" {{ ($foodreview->rating=="5")? "checked" : "" }} disabled><label for="5">☆</label>
                                        <input type="radio" name="{{$foodreview->id}}" value="4" id="4" {{ ($foodreview->rating=="4")? "checked" : "" }} disabled><label for="4">☆</label>
                                        <input type="radio" name="{{$foodreview->id}}" value="3" id="3" {{ ($foodreview->rating=="3")? "checked" : "" }} disabled><label for="3">☆</label>
                                        <input type="radio" name="{{$foodreview->id}}" value="2" id="2" {{ ($foodreview->rating=="2")? "checked" : "" }} disabled><label for="2">☆</label>
                                        <input type="radio" name="{{$foodreview->id}}" value="1" id="1" {{ ($foodreview->rating=="1")? "checked" : "" }} disabled><label for="1">☆</label> 
                                    </div>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('deletefoodreview', ['id' => $foodreview->id]) }}"><i class="fa-solid fa-trash"></i></a>
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