<x-payment-layout>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center p-3">
            <div class="receipt-box p-4 shadow well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3 rounded-3">
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
                    <div class="col-12 text-center"><h5>Receipt</h5></div>
                    <hr>
                    @foreach($orders as $order)
                        <div class="col-6">
                            <address>
                                <strong>SUC Sushi</strong>
                                <br>
                                PTD 64888, Jalan Selatan Utama, KM 15,
                                <br>
                                Off, Skudai Lbh, 81300 Skudai, Johor
                                <br>
                                <abbr title="Phone"></abbr> 123456789
                            </address>
                        </div>
                        <div class="col-6 text-end">
                            <p>
                                <em>Date: {{$order->created_at}}</em>
                            </p>
                            <p>
                                <em>Order No: <strong class="text-center text-danger">{{$order->orderid}}</strong></em>
                                <br>
                                <em>Status: <strong class="text-center text-danger">{{$order->status}}</strong></em>
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                        <img class="receipt-img p-3 border-bottom border-3 img-fluid" src="{{asset('images/confirm.gif')}}" alt="">
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td class="col-md-9"><em>{{$item->name}}</em></h4>
                                        @if($item->description != '')
                                            <br>
                                            <small>{{$item->description}}</small>
                                        @endif
                                    </td> {{--Item name--}}

                                    <td class="col-md-1" style="text-align: center">{{$item->quantity}}</td> {{--Quantity--}}
                                    <td class="col-md-1 text-center">RM {{$item->price}}</td> {{--Price--}}
                                    <td class="col-md-1 text-center"></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td class="text-right">
                                    <p><strong>Subtotal(RM): </strong></p>
                                    <p><strong>Service Charge(RM): </strong></p>
                                </td>
                                <td class="text-center">
                                <p>
                                    <strong>{{$subTotal}}</strong>
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
                <div class="col-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-danger btn-md btn-block text-center" data-bs-toggle="modal" data-bs-target="#reviewform">
                        Return Menu &nbsp;<span><i class="fa fa-home"></i></span>
                    </button>
                </div>
  
                <!-- Modal -->
                <div class="modal fade" id="reviewform" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="card">
                                <div class="row p-2">
                                    <div class="col-12">
                                        <div class="comment-box ml-2">
                                            <h4>How was your order experience?</h4>
                                            <form method="POST" action="{{ route('serviceReview') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="rating"> 
                                                    <input type="radio" name="rating" value="5" id="5" required><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> 
                                                </div>
                                                <div class="comment-area"> 
                                                    <textarea class="form-control" name="description" placeholder="Your comments..." rows="4"></textarea> 
                                                </div>
                                                <div class="comment-btns mt-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="pull-left"><span data-bs-dismiss="modal" class="btn btn-danger btn-sm">Cancel</span></div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="pull-right"> <button type="submit" class="btn btn-success send btn-sm">Submit<i class="fa fa-long-arrow-right ml-1"></i></button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-payment-layout>