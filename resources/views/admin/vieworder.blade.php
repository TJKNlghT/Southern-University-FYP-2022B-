<x-admin-layout>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center p-3">
            <div class="receipt-box p-4 shadow well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3 rounded-3">
                @foreach($orderhistory as $orderhistorys)
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="col-4 text-start"><a href="{{ route('manageorder') }}" class="previous">&laquo; Back</a></div>
                            <div class="col-8 text-end"><h5>Managing Order : {{$orderhistorys->orderid}}</h5></div>
                        </div>
                        <hr>
                        <div class="col-12 d-flex justify-content-between">
                            <div><p><em>Date: <strong class="text-danger">{{$orderhistorys->created_at}}</strong></em></p></div>
                            <div>
                                <p>
                                    <em>Status: <strong class="text-center text-danger">{{$orderhistorys->status}}</strong></em>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <div><p><em>Pick-Up Time: <strong class="text-danger">{{$orderhistorys->timeselect}}</strong></em></p></div>
                        </div>
                    </div>
                @endforeach
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderhistoryitems as $items)
                                <tr>
                                    <td class="col-md-9"> {{--Item Name--}}
                                        <em>{{$items->name}}</em>
                                        <br>
                                        <small class="px-2">{{$items->description}}</small>
                                    </td>
                                    <td class="col-md-1" style="text-align: center">{{$items->quantity}}</td> {{--Quantity--}}
                                    <td class="col-md-1 text-center">{{$items->price}}</td> {{--Price--}}
                                    <td></td>
                                <tr>
                                @endforeach
                                    <td>   </td>
                                    <td>   </td>
                                    <td class="text-right">
                                        <p><strong>Subtotal(RM):</strong></p>
                                        <p><strong>Service Charge(RM):</strong></p>
                                    </td>
                                    <td class="text-center">
                                    <p>
                                        <strong>{{$subtotal}}</strong>
                                    </p>
                                    <p>
                                        <strong>1.30</strong>
                                    </p></td>
                                </tr>
                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td class="text-right"><h4><strong>Total(RM): </strong></h4></td>
                                    <td class="text-center text-danger"><h4><strong>{{$total}}</strong></h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    @foreach($orderhistory as $orderhistorys)
                    <form action="{{route('updateorder')}}" Method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            @if($orderhistorys->status == 'Ready')
                                <input type="hidden" name="orderstatus" value="Completed"/>
                                <input type="hidden" name="orderid" value="{{$orderhistorys->orderid}}"/>
                                <button type="submit" class="btn btn-success btn-md btn-block text-center">
                                Complete Order &nbsp;<span><i class="fa fa-check"></i></span>
                                </button>
                            @elseif($orderhistorys->status == 'Ongoing')
                                <input type="hidden" name="orderstatus" value="Ready"/>
                                <input type="hidden" name="orderid" value="{{$orderhistorys->orderid}}"/>
                                <button type="submit" class="btn btn-success btn-md btn-block text-center">
                                Serve Order &nbsp;<span><i class="fa fa-check"></i></span>
                                </button>
                            @else
                                <input type="hidden" name="orderstatus" value="Ongoing"/>
                                <input type="hidden" name="orderid" value="{{$orderhistorys->orderid}}"/>
                                <button type="submit" class="btn btn-success btn-md btn-block text-center">
                                Start Order &nbsp;<span><i class="fa fa-check"></i></span>
                                </button>
                            @endif
                        </div>
                    </form>
                    @endforeach
                    
                    <form action="{{route('updateorder')}}" Method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="hidden" name="orderstatus" value="Cancelled"/>
                            <input type="hidden" name="orderid" value="{{$orderhistorys->orderid}}"/>
                            <button type="submit" class="btn btn-danger btn-md btn-block text-center">
                                Cancel Order &nbsp;<span><i class="fa fa-ban"></i></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-admin-layout>