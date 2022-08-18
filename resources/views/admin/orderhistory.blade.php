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
                        <h4 class="pb-3 border-bottom d-flex justify-content-between">Order History <a href="{{route('clearorderhistory')}}"><button class="btn-sm btn btn-primary">Clear History</button></a></h4>
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
                                        @foreach($orderhistories as $orderhistory)
                                            @if($orderhistory->status == 'Completed' || $orderhistory->status == 'Cancelled')
                                                <tr class="cell-1">
                                                    <td class="text-center"></td>
                                                    <td>#{{$orderhistory->orderid}}</td>
                                                    <td>
                                                        @if($orderhistory->status == 'Unpaid')
                                                            <span class="badge bg-danger">{{$orderhistory->status}}</span>
                                                        @elseif($orderhistory->status == 'Paid')
                                                            <span class="badge bg-warning">{{$orderhistory->status}}</span>
                                                        @elseif($orderhistory->status == 'Completed')
                                                            <span class="badge bg-success">{{$orderhistory->status}}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{$orderhistory->status}}</span>                                     
                                                        @endif
                                                    </td>
                                                    <td>RM {{$orderhistory->total}}</td>
                                                    <td>{{$orderhistory->created_at}}</td>
                                                    <td><a href="{{ route('pastorder', ['id' => $orderhistory->orderid]) }}"><i class="fa fa-arrow-right text-black-50"></i></a></td>
                                                </tr>
                                            @endif
                                        @endforeach                           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 p-4">
                        {{$orderhistories->links()}}
                    </div>
                </div>
            </div>
          </main>
    </div>
</x-admin-layout>