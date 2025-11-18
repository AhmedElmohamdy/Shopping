@extends('Shared_Layout.SharedAdminView')

@section('Title')
    Update Product
@endsection

@section('Content')
    <form method="POST" action="{{ route('Prodect.Save') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $product->id }}">

        {{-- Product Name --}}
        <label>@lang('messages.Product Name'):</label>
        <input type="text" style="width: 100%" name="product_name" value="{{ old('product_name', $product->product_name) }}"
            required>

        {{-- Product Name Arabic --}}
        <label>@lang('messages.ProdactNameInArabic'):</label>
        <input type="text" style="width: 100%" name="ProdactNameAr"
            value="{{ old('ProdactNameAr', $product->ProdactNameAr) }}" required>

        {{-- Product Price --}}
        <label>@lang('messages.Product Price'):</label>
        <input type="number" style="width: 100%" name="product_price"
            value="{{ old('product_price', $product->product_price) }}" required>

        {{-- Product Quantity --}}
        <label>@lang('messages.Product Quantity'):</label>
        <input type="number" style="width: 100%" name="product_quantity"
            value="{{ old('product_quantity', $product->product_quantity) }}" required>

        {{-- Category --}}
        <label>@lang('messages.Select Category'):</label>
        <select class="custom-dropdown" name="cat_id" style="width: 100%" required>
            <option value="">-- @lang('messages.Select Category') --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->cat_id == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>

        {{-- Description --}}
        <label>@lang('messages.Description'):</label>
        <input type="text" style="width: 100%" name="description" value="{{ old('description', $product->description) }}"
            required>

        {{-- Description Arabic --}}
        <label>@lang('messages.DescriptionInArabic'):</label>
        <input type="text" style="width: 100%" name="DescriptionAr"
            value="{{ old('DescriptionAr', $product->DescriptionAr) }}" required>

        {{-- Existing Image --}}
        <label>@lang('messages.Current Image'):</label><br>
        <img src="{{ asset($product->image_name) }}" width="200" height="200"><br><br>

        {{-- New Image --}}
        <label>@lang('messages.New Image (optional)'):</label>
        <input type="file" name="image_name" class="form-control">

        <button type="submit" class="btn btn-success">@lang('messages.UpDate')</button>
    </form>
@endsection
