@extends('Shared_Layout.SharedAdminView')
@section('Title')
    Add New Product
@endsection

@section('Content')

{{-- Display all error messages --}}
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>@lang('messages.Add New Prodects')</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div id="form_status"></div>
                <div class="contact-form">

                    <form method="POST" id="ProductForm" action="{{ route('Prodect.Save') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- product_name --}}
                        <p>
                            <input type="text" style="width: 100%" 
                                   placeholder="@lang('messages.Product Name')" 
                                   name="product_name" 
                                   id="product_name" 
                                   value="{{ old('product_name') }}" required>

                            @if ($errors->has('product_name'))
                                <span style="color: red;">{{ $errors->first('product_name') }}</span>
                            @endif
                        </p>

                        {{-- ProdactNameAr --}}
                        <p>
                            <input type="text" style="width: 100%" 
                                   placeholder="@lang('messages.ProdactNameInArabic')" 
                                   name="ProdactNameAr" 
                                   id="ProdactNameAr"
                                   value="{{ old('ProdactNameAr') }}" required>

                            @if ($errors->has('ProdactNameAr'))
                                <span style="color: red;">{{ $errors->first('ProdactNameAr') }}</span>
                            @endif
                        </p>

                        {{-- Price and Quantity --}}
                        <p style="display: flex; gap: 10px;">
                            <input type="number" style="width: 20%" 
                                   placeholder="@lang('messages.Product Price')" 
                                   name="product_price" 
                                   id="product_price" 
                                   min="0"
                                   value="{{ old('product_price') }}" required>

                            @if ($errors->has('product_price'))
                                <span style="color: red;">{{ $errors->first('product_price') }}</span>
                            @endif

                            <input type="number" style="width: 20%" 
                                   placeholder="@lang('messages.Product Quantity')" 
                                   name="product_quantity" 
                                   id="product_quantity" 
                                   min="0"
                                   value="{{ old('product_quantity') }}" required>

                            @if ($errors->has('product_quantity'))
                                <span style="color: red;">{{ $errors->first('product_quantity') }}</span>
                            @endif
                        </p>

                        {{-- Category --}}
                        <p>
                            <select name="cat_id" required>
                                <option value="">@lang('messages.Select Category')</option>

                                @foreach ($SelectCat as $category)
                                    <option value="{{ $category->id }}" 
                                            {{ old('cat_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- FIX: correct error name is cat_id --}}
                            @if ($errors->has('cat_id'))
                                <span style="color: red;">{{ $errors->first('cat_id') }}</span>
                            @endif
                        </p>

                        {{-- Description --}}
                        <p>
                            <textarea name="description" id="description" cols="30" rows="10"
                                      placeholder="@lang('messages.Description')" required>{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span style="color: red;">{{ $errors->first('description') }}</span>
                            @endif
                        </p>

                        {{-- Description Arabic --}}
                        <p>
                            <textarea name="DescriptionAr" id="DescriptionAr" cols="30" rows="10"
                                      placeholder="@lang('messages.DescriptionInArabic')" required>{{ old('DescriptionAr') }}</textarea>

                            @if ($errors->has('DescriptionAr'))
                                <span style="color: red;">{{ $errors->first('DescriptionAr') }}</span>
                            @endif
                        </p>

                        {{-- Image --}}
                        <p>
                            <input type="file" name="image_name" id="image_name" class="form-control" required>

                            @if ($errors->has('image_name'))
                                <span style="color: red;">{{ $errors->first('image_name') }}</span>
                            @endif
                        </p>

                        {{-- Submit Button --}}
                        <button type="submit" id="submitButton" class="btn btn-success">
                            @lang('messages.AddNewProdect')
                        </button>

                       {{-- <script>
                            document.getElementById("ProductForm").addEventListener("submit", function(event) {
                                event.preventDefault();
                                alert("Product Added Successfully!");
                                this.submit();
                            });
                        </script>--}}

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
