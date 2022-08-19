
<div class="col-12 mt-2">
    <div class="row d-flex p-2">
        <div class="col-6"><h4 class="fw-bold">Payment Methods</h4></div>
        <div class="ms-auto text-end col-6"><span><i id="paymentwinclose" class="fas fa-times"></i></span></div>
    </div>
</div>

<div class="col-12">
    <div class="card p-3">
        <div class="card-body border p-0">
            <p>
                <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-between"
                    data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                    aria-controls="collapseExample">
                    <span class="fw-bold">Pay By Cash</span>
                    <span class="">
                        <span class="fas fa-money-check"></span>
                        <span class="fas fa-money-bill"></span>
                    </span>
                </a>
            </p>
            <div class="collapse p-3 pt-0" id="collapseExample">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('unpaidPost')}}" method="POST" id="cash-form">
                            @csrf
                            <input type="hidden" id="a" name="itemArray" value="">
                            <div class="col-12">
                                <label class="form__label">Email</label>
                                <div class="form__div">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form__label">Time</label>
                                <div class="form__div">
                                    <input type="time" name="timepicker" class="form-control text-center" required>
                                </div>
                            </div>
                            <div class="pt-2"><button class="btn btn-primary" onclick="clearCart()" type="submit">Pay Cash</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body border p-0">
            <p>
                <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                    data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                    aria-controls="collapseExample">
                    <span class="fw-bold">Credit Card</span>
                    <span class="">
                        <span class="fab fa-cc-amex"></span>
                        <span class="fab fa-cc-mastercard"></span>
                        <span class="fab fa-cc-discover"></span>
                    </span>
                </a>
            </p>
            <div class="collapse show p-3 pt-0" id="collapseExample">
                <div class="row">
                    <div class="col-lg-7">
                        <form action="{{ route('paymentPost') }}" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf
                            {{-- Hidden Input --}}
                            <input type="hidden" id="b" name="itemArray" value="">
                            <div class="row pt-2">
                                <div class="col-12">
                                    <label class="form__label">Email</label>
                                    <div class="form__div">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                        <label class="form__label">Time</label>
                                    <div class="form__div">
                                        <input type="time" id="timeInput" name="timepicker" class="form-control text-center" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="" class="form__label">Card Number</label>
                                    <div class="form__div">
                                        <input autocomplete='off' class='form-control card-number' size='20' type='number' required>
                                    </div>
                                </div>

                                <div class="col-12 col-md-7 col-lg-7 col-xl-7">
                                    <label for="" class="form__label">MM / YYYY</label>
                                    <div class="form-group row d-flex">
                                        <div class="col-5 col-md-3 col-lg-3">
                                            <input class='form-control card-expiry-month' placeholder='MM' size="2"  type='number' required>
                                        </div>
                                        <div class="col-1"><span>/</span></div>
                                        <div class="col-5 col-md-3 col-lg-3">
                                            <input class='form-control card-expiry-year' placeholder='YYYY' size="4" type='number' required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-5 col-lg-5 col-xl-5">
                                    <div class="form__div">
                                        <label for="" class="form__label">CVV</label>
                                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='password' required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form__div">
                                        <label for="" class="form__label">Name On The Card</label>
                                        <input class='form-control' size='4' type='text' required>
                                    </div>
                                </div>
                                <div class="col-12 pt-2">
                                    <button onclick="clearCart()"  class="btn btn-primary btn-xs btn-block" type="submit">Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>