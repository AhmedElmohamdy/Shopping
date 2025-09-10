@extends('Shared_Layout.SharedAdminView')
  
@section('Title') Update Product @endsection


@section('Content')
<form method="POST" action="{{route('Prodect.Save')}}"  enctype="multipart/form-data">
    @csrf
   

    <input type="hidden" style="width: 100%" name="id" id="id"  value="{{ $product->id }}" >

    <label>@lang('messages.Product Name'):</label>
    <input type="text"  style="width: 100%" name="product_name" id="product_name" value="{{ $product->product_name }}" required>
    <label>@lang('messages.ProdactNameInArabic'):</label>
    <input type="text" style="width: 100%" name="productNameAr" id="productNameAr" value="{{ $product->productNameAr }}" required>

    <label>@lang('messages.Product Price'):</label>
    <input type="text" style="width: 100%" name="product_price" id="product_price" value="{{ $product->product_price }}" required>
    
    <label>@lang('messages.Product Quantity'):</label>
    <input type="text" style="width: 100%" name="product_quantity" id="product_quantity" value="{{ $product->product_quantity }}" required>
 



 


  <label>@lang('messages.Select Category'):</label>
  <select class="custom-dropdown" name="cat_id" style="width: 100%" required>
      <option value="">-- @lang('messages.Select Category') --</option>
      @foreach ($categories as $category)
      {{--if category id equal category id in product colum select it--}}
          <option value="{{ $category->id }}" {{ $product->cat_id == $category->id ? 'selected' : '' }}>
              {{ $category->category_name }}
          </option>
      @endforeach
  </select>
 




  <label>@lang('messages.Description'):</label>
  <input type="text" style="width: 100%" name="description" id="description" value="{{ $product->description }}" required>
    <label>@lang('messages.DescriptionInArabic'):</label>
    <input type="text" style="width: 100%" name="descriptionAr" id="descriptionAr" value="{{ $product->descriptionAr }}" required>

  <label>@lang('messages.Current Image'):</label><br>
    <img src="{{ asset($product->image_name) }}" id="image_name"  width="200"  height="200" ><br>

    
        <label>@lang('messages.New Image (optional)'):</label>
        <input type="file"  id="image_name" name="image_name"  class="form-control"  >

  <button type="submit"  class="btn btn-success">@lang('messages.UpDate')</button>
  </form>
@endsection

