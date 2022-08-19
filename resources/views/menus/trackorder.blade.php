<x-trackorder-layout>
        <main class="page-content ">
            <div class="order-track container mt-5">
                <div class="d-flex justify-content-center row">                    
                    <div class="col-md-10">
                        <h4 class="pb-3 border-bottom d-flex justify-content-between">
                            Your Orders
                            <form action="{{ route('searchEmail') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="searchemail" class="form-control" placeholder="Search Email" aria-label="trackorder" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                </div>
                            </form>
                        </h4>
                        <div class="rounded">
                            <div class="table-responsive table-borderless rounded-3 shadow">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center text-uppercase">
                                            <th class="text-center"></th>
                                            <th>Order #</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    @unless (count($orders) == 0)
                                        <tbody class="table-body text-center">
                                            @foreach($orders as $order)
                                                <tr class="cell-1">
                                                    <td class="text-center"></td>
                                                    <td>#{{$order->orderid}}</td>
                                                    <td>RM {{$order->total}}</td>
                                                    <td>
                                                        @if($order->status == 'Unpaid')
                                                            <span class="badge bg-danger">{{$order->status}}</span>
                                                        @elseif($order->status == 'Paid')
                                                            <span class="badge bg-danger">{{$order->status}}</span>
                                                        @elseif($order->status == 'Ongoing')
                                                            <span class="badge bg-warning">{{$order->status}}</span>
                                                        @else
                                                            <span class="badge bg-success">{{$order->status}}</span>                                     
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="text-decoration-none text-black" href="{{route('viewsingletrackorder', ['id' => $order->orderid])}}">View &nbsp;<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a> 
                                                    </td>
                                                </tr>
                                            @endforeach                         
                                        </tbody>
                                    @else
                                    <tr class="cell-1">
                                        <td></td>
                                        <td></td>
                                        <td  class="text-center text-muted text-uppercase">No records found</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endunless
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 p-4">
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
            </div>
        </main>
</x-trackorder-layout>