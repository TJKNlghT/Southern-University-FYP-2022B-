<x-admin-layout>
    <div class="page-wrapper chiller-theme toggled">
        @include('partials._adminsidebar')
        <main class="page-content py-6 bg-light">
            <div class="row mobile-scrollable">
                <div class="col-md-3">
                    <div class="dash-card">
                        <i class="fa fa-money"></i>
                        <p>Total Sales</p>
                        <h1 class="text-success">{{$totalsalescounter}}</h1>
                        <a href="#SalesReport"><button type="button" class="btn btn-theme">More Info</button></a>
                    </div>
                </div>
          
                <div class="col-md-3">
                    <div class="dash-card">
                        <i class="fa fa-commenting-o" aria-hidden="true"></i>
                        <p>Reviews</p>
                        <h1 class="text-warning">{{$reviewcounter}}</h1>
                        <a href="{{route('viewallreviews')}}"><button type="button" class="btn btn-theme">More Info</button></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="dash-card">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        <p>Pending Orders</p>
                        <h1 class="text-danger">{{$pendingordercounter}}</h1>
                        <a href="{{route('manageorder')}}"><button type="button" class="btn btn-theme">More Info</button></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="dash-card">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <p>Delivered Orders</p>
                        <h1 class="text-success">{{$deliveredcounter}}</h1>
                        <a href="{{route('orderhistory')}}"><button type="button" class="btn btn-theme">More Info</button></a>
                    </div>
                </div>
            </div>

            <section class="spacethis px-3">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="title">
                        New Orders
                        <div class="card bg-light">
                            <h3 class="card-title text-center">
                            <div class="d-flex flex-wrap justify-content-center mt-2">
                                <a><span class="badge hours text-dark"></span></a> :
                                <a><span class="badge min text-dark"></span></a> :
                                <a><span class="badge sec text-dark"></span></a>
                            </div>
                            </h3>
                        </div>
                        </h5>
                        <div class="md-card">
                            <table class="table table-hover no-border">
                            <thead>
                            <tr>
                                <th scope="col">Time</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($latestorders as $latestorder)
                                    <tr>
                                        <td>{{$latestorder->created_at->format('H:i:s')}}</td>
                                        <td>{{$latestorder->orderid}}</td>
                                        <td>RM {{$latestorder->total}}</td>
                                        <td>
                                            @if($latestorder->status == 'Unpaid')
                                                <span class="badge badge-pill bg-danger">{{$latestorder->status}}</span>
                                            @elseif($latestorder->status == 'Paid')
                                                <span class="badge badge-pill bg-danger">{{$latestorder->status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="text-decoration-none text-black" href="{{ route('vieworder', ['id' => $latestorder->orderid]) }}">View &nbsp;<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a> 
                                        </td>
                                    </tr>
                                @endforeach                            
                            </tbody>
                        </table>
                        </div>
                        
                    </div>

                    <div class="col-md-6">
                        <h5 class="title">Ongoing Orders</h5>
                        <div class="md-card por">
                        <table class="table table-hover no-border"> 
                            <thead>
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>                       
                            <tbody>
                                @foreach($latestongoingorders as $ongoingorder)
                            <tr class="">
                                <td>{{$ongoingorder->updated_at->format('H:i:s')}}</td>
                                <td>{{$ongoingorder->orderid}}</td>
                                <td>{{$ongoingorder->total}}</td>
                                <td>
                                    <span class="badge badge-pill bg-warning">{{$ongoingorder->status}}</span>
                                </td>
                                <td>
                                    <a class="text-decoration-none text-black" href="{{ route('vieworder', ['id' => $ongoingorder->orderid]) }}">View &nbsp;<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a> 
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>                            
                    </div>
                </div>
            </section>

            <section class="spacethis px-3">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="title">Sales Report &nbsp;<span class="badge bg-secondary">@foreach($totalsalesamount as $total)RM {{$total->totalSale}}@endforeach</span></h5>
                        <div class="md-card">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            <canvas id="SalesReport" class="w-100 h-auto"></canvas>

                            <script>
                                var xValues = ["January","February","March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                                new Chart("SalesReport", {
                                type: "line",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                    data: [{{$jan}},{{$feb}},{{$march}},{{$apr}},{{$may}},{{$jun}},{{$july}},{{$aug}},{{$sept}},{{$oct}},{{$nov}},{{$dec}}],
                                    borderColor: "red",
                                    fill: false
                                    }]
                                },
                                options: {
                                    legend: {display: false}
                                }
                                });
                            </script>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5 class="title">Serving Orders</h5>
                        <div class="md-card por">
                        <table class="table table-hover no-border"> 
                            <thead>
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>                       
                            <tbody>
                                @foreach($latestservingorders as $servingorder)
                            <tr class="">
                                <td>{{$servingorder->updated_at->format('H:i:s')}}</td>
                                <td>{{$servingorder->orderid}}</td>
                                <td>{{$servingorder->total}}</td>
                                <td>
                                    <span class="badge badge-pill bg-success">{{$servingorder->status}}</span>
                                </td>
                                <td>
                                    <a class="text-decoration-none text-black" href="{{ route('vieworder', ['id' => $servingorder->orderid]) }}">View &nbsp;<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a> 
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>                            
                    </div>
                </div>
            </section>

            <section class="spacethis px-3">
                <div class="row">
                    <div class="col-md-6">
                    </div>

                    <div class="col-md-6">
                        <h5 class="title">Recent Delivered</h5>
                        <div class="md-card por">
                        <table class="table table-hover no-border"> 
                            <thead>
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>                       
                            <tbody>
                                @foreach($latestdeliveredorders as $deliveredorder)
                            <tr class="">
                                <td>{{$deliveredorder->updated_at->format('H:i:s')}}</td>
                                <td>{{$deliveredorder->orderid}}</td>
                                <td>{{$deliveredorder->total}}</td>
                                <td>
                                    <span class="badge badge-pill bg-success">{{$deliveredorder->status}}</span>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>                            
                    </div>
                </div>
            </section>
        </main>
    </div>

</x-admin-layout>