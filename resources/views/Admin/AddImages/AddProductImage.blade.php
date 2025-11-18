@extends('Shared_Layout.SharedAdminView')
@section('Title')
    Add New ProductImage
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
                        <h3> @lang('messages.Add New Prodect images')</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" id="ProductForm" action="{{ route('product.SaveImage') }}"
                            enctype="multipart/form-data">
                            @csrf


                             <p>
                                <select name="product_id" required>
                                    <option value="">@lang('messages.Select Product')</option>
                                    @foreach ($products as $products)
                                        <option value="{{ $products->id }}" {{ old('product_id') == $products->id ? 'selected' : '' }}>
                                            {{ $products->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('product_id'))
                                    <span style="color: red;">{{ $errors->first('product_id') }}</span>
                                @endif
                            </p>

                              <p>
                                <input type="file" name="image_Name" id="image_Name" class="form-control" required >
                                @if ($errors->has('image_Name'))
                                    <span style="color: red;">{{ $errors->first('image_Name') }}</span>
                                @endif
                                
                            </p>
                            

                            <button type="submit" id="submitButton" class="btn btn-success">@lang('messages.Add ProductImg')</button>


                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
