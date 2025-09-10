@extends('Shared_Layout.Shared')

@section('Title')
    Checkout
@endsection


@section('Content')
    <div class="checkout-section mt-150 mb-150">
        <div class="container">

            
            <h2>@lang('messages.Checkout')</h2>

            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-lg-12">
                        <div class="checkout-accordion-wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                               @lang('messages.Billing Address') 
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="billing-address-form">

                                                <p><input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                </p>
                                                <p><input type="hidden" name="full_name" placeholder="Full Name"
                                                        value="{{ auth()->user()->name }} "></p>
                                                <p><input type="hidden" name="email" placeholder="Email"
                                                        value="{{ auth()->user()->email }}"></p>
                                                <p><input type="text" name="phone" placeholder="phone" required
                                                        class="form-control mb-2"></p>
                                                <p><input type="text" name="address" placeholder="Address" required
                                                        class="form-control mb-2"></p>
                                                <p><input type="text" name="city" placeholder="City" required
                                                        class="form-control mb-2"></p>
                                                <p><input type="text" name="country" placeholder="country" required
                                                        class="form-control mb-2"></P>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                

                            </div>
                        </div>

                    </div>
                </div>
                <div class="card single-accordion mt-4">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-12">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              @lang('messages.Order Summary')  
                            </button>
                        </h5>
                    </div>

                    <ul class="list-group">
                        @foreach ($cart as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                {{ $item['name'] }} x {{ $item['quantity'] }}
                                <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between font-weight-bold">
                            Total
                            <span>${{ number_format($total, 2) }}</span>
                        </li>
                    </ul>
                    <div class="col-md-12 mt-4">
                        <div class="cart-btn text-center">
                            <button type="submit" class="boxed-btn black">@lang('messages.Place Order')</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>







    </div>
@endsection
