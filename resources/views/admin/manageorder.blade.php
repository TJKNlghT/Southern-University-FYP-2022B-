<x-admin-layout>
    <div class="page-wrapper chiller-theme toggled">
        @include('partials._adminsidebar')
        <main class="page-content">
            <div class="order-history container mt-5">
                <div class="d-flex justify-content-center row">
                    
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

                    <div class="col-md-10">
                        <h4 class="pb-3 border-bottom">New Orders</h4>
                        <div class="rounded">
                            <div class="table-responsive table-borderless rounded-3 shadow">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center text-uppercase">
                                            <th class="text-center"></th>
                                            <th>Order #</th>
                                            <th>status</th>
                                            <th>Total</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body text-center">
                                        @foreach($orderhistoriesnew as $orderhistory)
                                            @if($orderhistory->status == 'Paid' || $orderhistory->status == 'Unpaid')
                                                <tr class="cell-1">
                                                    <td class="text-center"></td>
                                                    <td>#{{$orderhistory->orderid}}</td>
                                                    <td>
                                                        @if($orderhistory->status == 'Unpaid')
                                                            <span class="badge bg-danger">{{$orderhistory->status}}</span>
                                                        @elseif($orderhistory->status == 'Paid')
                                                            <span class="badge bg-danger">{{$orderhistory->status}}</span>
                                                        @elseif($orderhistory->status == 'Completed')
                                                            <span class="badge bg-success">{{$orderhistory->status}}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{$orderhistory->status}}</span>                                     
                                                        @endif
                                                    </td>
                                                    <td>RM {{$orderhistory->total}}</td>
                                                    <td>{{$orderhistory->created_at}}</td>
                                                    <td><a href="{{ route('vieworder', ['id' => $orderhistory->orderid]) }}"><span class="btn btn-sm btn-primary">View Order</span></a></td>
                                                </tr>
                                            @endif
                                        @endforeach                           
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-4">
                                {{$orderhistoriesnew->links()}}
                            </div>
                        </div>
                    </div>


                    <div class="col-md-10 pt-5">
                        <h4 class="pb-3 border-bottom">Ongoing Orders</h4>
                        <div class="rounded">
                            <div class="table-responsive table-borderless rounded-3 shadow">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center text-uppercase">
                                            <th class="text-center"></th>
                                            <th>Order #</th>
                                            <th>status</th>
                                            <th>Total</th>
                                            <th>Started At</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body text-center">
                                        @foreach($orderhistoriesongoing as $orderhistory)
                                            @if($orderhistory->status == 'Ongoing')
                                                <tr class="cell-1">
                                                    <td class="text-center"></td>
                                                    <td>#{{$orderhistory->orderid}}</td>
                                                    <td>
                                                        <span class="badge bg-warning">{{$orderhistory->status}}</span>
                                                    </td>
                                                    <td>RM {{$orderhistory->total}}</td>
                                                    <td>{{$orderhistory->updated_at}}</td>
                                                    <td><a href="{{ route('vieworder', ['id' => $orderhistory->orderid]) }}"><span class="btn btn-sm btn-primary">View Order</span></a></td>
                                                </tr>
                                            @endif
                                        @endforeach                           
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-4">
                                {{$orderhistoriesongoing->links()}}
                            </div>
                        </div>
                    </div>


                    <div class="col-md-10 pt-5">
                        <h4 class="pb-3 border-bottom">Ready Orders</h4>
                        <div class="rounded">
                            <div class="table-responsive table-borderless rounded-3 shadow">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center text-uppercase">
                                            <th class="text-center"></th>
                                            <th>Order #</th>
                                            <th>status</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body text-center">
                                        @foreach($orderhistoriesserving as $orderhistory)
                                            @if($orderhistory->status == 'Ready')
                                                <tr class="cell-1">
                                                    <td class="text-center"></td>
                                                    <td>#{{$orderhistory->orderid}}</td>
                                                    <td>
                                                        <span class="badge bg-success">{{$orderhistory->status}}</span>
                                                    </td>
                                                    <td>RM {{$orderhistory->total}}</td>
                                                    <td><a href="{{ route('vieworder', ['id' => $orderhistory->orderid]) }}"><span class="btn btn-sm btn-primary">View Order</span></a></td>
                                                </tr>
                                            @endif
                                        @endforeach                           
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-4">
                                {{$orderhistoriesserving->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </main>
    </div>
</x-admin-layout>