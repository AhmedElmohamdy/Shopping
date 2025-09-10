@extends('Shared_Layout.Shared')

@section('Title')
    Product Details
@endsection


@section('Content')
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                        <div class="single-product-img">
                            <img src="{{ asset($product->image_name) }}" alt="Product Image" width="400" height="400">
                        </div>
                    </div>
                <div class="col-lg-7 col-md-6">
                    <div class="single-product-content">
                        <h2>{{ session('locale') == 'en' ? $product->product_name : $product->ProdactNameAr }}</h2>
                        <p><strong> @lang('messages.Price')  : {{ $product->product_price }} @lang('messages.EG') </strong></p>
                        <p><strong> Category :{{ $product->category->category_name }}</strong></p>
                       <p>{{ session('locale') == 'en' ? $product->description : $product->DescriptionAr }}</p>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">@lang('messages.Add to Cart') </button>
                            </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

   {{-- Display associated images --}}
<!-- Display All Images -->




<div class="product-gallery">
    @foreach ($product->images as $image)
        <img src="{{ asset($image->image_Name) }}" width="200" height="200" alt="Product Image">
    @endforeach
</div>

<style>
    .product-gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        margin-top: 30px;
    }

    .product-gallery img {
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        object-fit: cover;
    }
</style>






    

                  <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>@lang('messages.Related Prodects')</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($RelatedProduct as $Pro)
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
                                <button type="submit" class="btn btn-primary">@lang('messages.Add to Cart')</button>
                            </form>

                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </div>




            </div>


@endsection
