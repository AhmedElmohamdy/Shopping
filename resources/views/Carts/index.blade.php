@extends('Shared_Layout.Shared')

@section('Title')
    Cart
@endsection

@section('Content')
    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                    <tr class="table-head-row">
                                        <th class="product-remove"></th>
                                        <th class="product-image">@lang('messages.ProductImages')</th>
                                        <th class="product-name">@lang('messages.Name')</th>
                                        <th class="product-price">@lang('messages.Price')</th>
                                        <th class="product-quantity">@lang('messages.Quantity')</th>
                                        <th class="product-total">@lang('messages.Total')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cart as $id => $CartItem)
                                        <tr class="table-body-row">
                                            <td class="product-remove">
                                                <a href="{{ route('cart.remove', $id) }}"><i class="far fa-window-close"></i></a>
                                            </td>
                                            <td class="product-image">
                                                <img src="{{ asset($CartItem['image']) }}" alt="{{ $CartItem['name'] }}" width="60">
                                            </td>
                                            <td class="product-name">{{ $CartItem['name'] }}</td>
                                            <td class="product-price">${{ number_format($CartItem['price'], 2) }}</td>
                                            <td class="product-quantity">
                                                <input type="number" name="quantity[{{ $id }}]" value="{{ $CartItem['quantity'] }}" min="1"
                                                       style="width: 60px; padding: 5px; text-align: center;">
                                            </td>
                                            <td class="product-total">
                                                ${{ number_format($CartItem['quantity'] * $CartItem['price'], 2) }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">@lang('messages.Your cart is empty.')</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="text-right">
                                            <button type="submit" class="boxed-btn black" style="margin-right: 10px;">@lang('messages.Update Cart')</button>
                                            <a href="{{ route('checkout') }}" class="boxed-btn black">@lang('messages.Check Out')</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
@endsection
