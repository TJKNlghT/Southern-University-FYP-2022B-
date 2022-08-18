<x-menu-layout>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center p-3">
            <div class="receipt-box p-4 shadow well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3 rounded-3">
                <div class="row">
                        <h4 class="text-center">Create Your Own Sushi</h4>
                        <img class="receipt-img p-3 border-bottom border-3 img-fluid" src="{{asset('images/sushidone.gif')}}" alt="">
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th></th>
                                <th></th>
                                <th class="text-center">Price(RM)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <img id="customProductImg" src="/images/customsushi.png" alt="customsushi.png" class="img-fluid d-none">
                                <td class="col-md-9 text-nowrap"><em id="customProductName">Create Own Sushi :</em></h4></td>
                                <td><h6 id="customProductId" class="d-none">{{$id}}</h6></td>
                                <td class="col-md-1 text-center"></td>
                                <td class="col-md-1 text-center"></td>
                            </tr>

                            @foreach($items as $item)
                                @foreach($products as $product)
                                    @if($product->name == $item)
                                        <tr>
                                            <td id="customProductDesc" datas2="item" name="customProductDesc" class="ps-4">{{$item}}</td> {{--item name--}}
                                            <td></td>
                                            <td></td>
                                            <td class="text-center"><p><strong>{{$product->price}}</strong></p></td> {{--price--}}
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            <tr>
                                <td>
                                    <div class="col-6 d-flex">
                                        <button class="btn btn-minus btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                    <i class="fas fa-minus"></i>
                                    </button>
                            
                                    <input id="customQuantity" min="1" max="99" name="customquantity" value="1" type="number"
                                    class="form-control text-center" />
                            
                                    <button class="btn btn-plus btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="fas fa-plus"></i>
                                    </button>
                                    </div>
                                </td>
                                <td></td>
                                <td class="text-right"><h4><strong>Total(RM): </strong></h4></td>
                                <td class="text-center text-danger"><h4><strong id="customPrice">{{$totals}}</strong></h4></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <a href="{{route('selectmenu')}}"><button type="button" class="btn btn-danger btn-md btn-block text-center">
                        Discard &nbsp; <span><i class="fa fa-trash"></i></span>
                    </button></a>
                </div>

                <div class="col-6 d-flex justify-content-center">
                    <button onclick="window.location='{{ URL::route('selectmenu'); }}'"class="add-to-cart-btn-two btn btn-success btn-md btn-block text-center">
                        Add To Cart &nbsp;<span><i class="fa fa-shopping-basket"></i></span>
                    </button>
                </div>
                </td>
                </div>
            </div>
        </div>
</x-menu-layout>