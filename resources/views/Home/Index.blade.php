@extends('Shared_Layout.Shared')

@section('Title')
    Home
@endsection


@section('Content')
    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>@lang('messages.Shipping')</h3>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>@lang('messages.24/7 Support')</h3>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>@lang('messages.Refund within 3 days')</h3>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end features list section -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">@lang('messages.Our Category')</span> </h3>
                        <p>@lang('messages.Get Started Shopping......Enjoy')</p>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">@lang('messages.All')</li>
                            @foreach ($category as $Cat)
                                <li data-filter="._{{ $Cat->id }}">
                                    {{ session('locale') == 'en' ? $Cat->category_name : $Cat->CategoryNameAr }}</li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @foreach ($product as $Pro)
                    {{-- cat_id colum in product table --}}
                    <div class="col-lg-4 col-md-6 text-center _{{ $Pro->cat_id }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('Prodect.ProductDetails', $Pro->id) }}">
                                    
                                    <img
                                        src="{{ asset($Pro->image_name) }}"
                                        style="max-height:250px!important ; min-height:250px!important" alt="">
                                    
                                    </a>
                            </div>
                            <h3>{{ session('locale') == 'en' ? $Pro->product_name : $Pro->ProdactNameAr }}</h3>
                            <p class="product-price">@lang('messages.Price') : {{ $Pro->product_price }} @lang('messages.EG') </p>
                            <p>{{ session('locale') == 'en' ? $Pro->description : $Pro->DescriptionAr }}</p>
                            <form action="{{ route('cart.add', $Pro->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">@lang('messages.Add to Cart')</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- end product section -->

    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">


            <div class="product-section mt-150 mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <div class="section-title">
                                <h3><span class="orange-text">@lang('messages.Customers Reviews')</span> </h3>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 text-center">
                            <div class="testimonial-sliders">
                                @foreach ($Review as $Rev)
                                    <div class="single-testimonial-slider">
                                        <div class="client-avater">
                                            <img src="assets/img/avaters/avatar2.png" alt="">
                                        </div>
                                        <div class="client-meta">
                                            <h3>{{ $Rev->user_name }} <span>{{ $Rev->user_email }}</span></h3>
                                            <p class="testimonial-body">
                                                {{ $Rev->user_message }}
                                            </p>
                                            <div class="last-icon">
                                                <i class="fas fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->
        <!-- end testimonail-section -->
    @endsection
