@extends('Shared_Layout.Shared')

@section('Title')
    All Product
@endsection
@section('Content')
    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3> @lang('messages.Our Prodects') </h3>
                        <p> @lang('messages.Get Started Shopping......Enjoy')</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($Product as $Pro)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('Prodect.ProductDetails', $Pro->id) }}">
                                    <img src="{{ url($Pro->image_name) }}"
                                        style="max-height:250px!important ; min-height:250px!important" alt=""></a>
                            </div>
                           <h3>{{ session('locale') == 'en' ? $Pro->product_name : $Pro->ProdactNameAr }}</h3>
                            <p class="product-price">@lang('messages.Price')  : {{ $Pro->product_price }} @lang('messages.EG') </p>
                            <p>{{ session('locale') == 'en' ? $Pro->description : $Pro->DescriptionAr }}</p>
                            <form action="{{ route('cart.add', $Pro->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary"> @lang('messages.Add to Cart')</button>
                            </form>

                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </div>
    <div style="text-align: center; margin: 0px auto;">
        {{ $Product->links() }}
    </div>
    <!-- end product section -->
@endsection


<style>
    svg {
        width: 50px;
        height: 50px;
    }
</style>
