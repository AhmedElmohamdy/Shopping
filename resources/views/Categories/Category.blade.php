

@extends('Shared_Layout.Shared')

@section('Title') All Categories @endsection

@section('Content')


<!-- product section -->
<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">	
					<h3>@lang('messages.Our Categories')</h3>
					<p>@lang('messages.Get Started Shopping......Enjoy')</p>
				</div>
			</div>
		</div>
		<div class="row">
			
@foreach ($category as $Cat )
<div class="col-lg-4 col-md-6 text-center">
	<div class="single-product-item">
		<div class="product-image">
			<a href="{{route('Prodect.CatId',$Cat ->id)}}" > 
				<img src="{{url($Cat ->image_name)}}" 
				style="max-height:250px!important ; min-height:250px!important"
				alt="">
			</a>
		</div>
		<h3>{{ session('locale') == 'en' ? $Cat ->category_name: $Cat ->CategoryNameAr }}</h3>
		<p>{{ session('locale') == 'en' ? $Cat ->description : $Cat->DescriptionAr }}</p>
	</div>
</div>

@endforeach
			

			
		
		
		</div>
	</div>
</div>
<!-- end product section -->


@endsection


	