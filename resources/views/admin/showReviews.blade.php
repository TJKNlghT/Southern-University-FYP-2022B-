<x-admin-layout>
    <div class="page-wrapper chiller-theme toggled">
        @include('partials._adminsidebar')
        <main class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-review">
                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Food Quality Reviews</h4>
                                        <h5 class="card-subtitle">Overview of Review</h5>
                                        <h2 class="font-medium mt-5 mb-0 p-2">{{$foodreviewcounter}}</h2>
                                        <a href="{{route('viewallfoodreviews')}}" class="btn btn-md btn-info waves-effect waves-light">View All Reviews</a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-8 border-left">
                                    <div class="card-body">
                                        <ul class="list-style-none">
                                            <li class="mt-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-smile-o display-5 text-muted pe-2"></i>
                                                    <div class="ml-2">
                                                        <h5 class="mb-0">Positive Reviews</h5>
                                                        <span class="text-muted">{{$foodreviewpositivecount}} Reviews</span></div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$foodreviewpositivepercentage}}%" aria-valuenow="{{$foodreviewpositivepercentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="mt-5 mb-5">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-meh-o display-5 text-muted pe-2"></i>
                                                    <div class="ml-2">
                                                        <h5 class="mb-0">Neutral Reviews</h5>
                                                        <span class="text-muted">{{$foodreviewneutralcount}} Reviews</span></div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$foodreviewneutralpercentage}}%" aria-valuenow="{{$foodreviewneutralpercentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="mt-5">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-frown-o display-5 text-muted pe-2"></i>
                                                    <div class="ml-2">
                                                        <h5 class="mb-0">Negative Reviews</h5>
                                                        <span class="text-muted">{{$foodreviewnegativecount}} Reviews</span></div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$foodreviewnegativepercentage}}%" aria-valuenow="{{$foodreviewnegativepercentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-review">
                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Order System Reviews</h4>
                                        <h5 class="card-subtitle">Overview of Review</h5>
                                        <h2 class="font-medium mt-5 mb-0 p-2">{{$orderreviewcounter}}</h2>
                                        <a href="{{route('viewallorderreviews')}}" class="btn btn-md btn-info waves-effect waves-light">View All Reviews</a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-8 border-left">
                                    <div class="card-body">
                                        <ul class="list-style-none">
                                            <li class="mt-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-smile-o display-5 text-muted pe-2"></i>
                                                    <div class="ml-2">
                                                        <h5 class="mb-0">Positive Reviews</h5>
                                                        <span class="text-muted">{{$orderreviewpositivecount}} Reviews</span></div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$orderreviewpositivepercentage}}%" aria-valuenow="{{$orderreviewpositivepercentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="mt-5 mb-5">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-meh-o display-5 text-muted pe-2"></i>
                                                    <div class="ml-2">
                                                        <h5 class="mb-0">Neutral Reviews</h5>
                                                        <span class="text-muted">{{$orderreviewneutralcount}} Reviews</span></div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$orderreviewneutralpercentage}}%" aria-valuenow="{{$orderreviewneutralpercentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="mt-5">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-frown-o display-5 text-muted pe-2"></i>
                                                    <div class="ml-2">
                                                        <h5 class="mb-0">Negative Reviews</h5>
                                                        <span class="text-muted">{{$orderreviewnegativecount}} Reviews</span></div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$orderreviewnegativepercentage}}%" aria-valuenow="{{$orderreviewnegativepercentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </main>
    </div>

</x-admin-layout>