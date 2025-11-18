@extends('Shared_Layout.SharedAdminView')
@section('Title')
    Add New Category
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
                    <h3>@lang('messages.Add New Category')</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" id="CategoryForm" action="{{ route('Category.Save') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Category Name --}}
                        <p>
                            <input type="text" 
                                   style="width: 100%" 
                                   placeholder="@lang('messages.Category Name')" 
                                   name="category_name" 
                                   value="{{ old('category_name') }}" 
                                   required>
                            @if ($errors->has('category_name'))
                                <span style="color: red;">{{ $errors->first('category_name') }}</span>
                            @endif
                        </p>

                        {{-- Category Name Arabic --}}
                        <p>
                            <input type="text" 
                                   style="width: 100%" 
                                   placeholder="@lang('messages.CategoryNameInArabic')" 
                                   name="CategoryNameAr" 
                                   value="{{ old('CategoryNameAr') }}" 
                                   required>
                            @if ($errors->has('CategoryNameAr'))
                                <span style="color: red;">{{ $errors->first('CategoryNameAr') }}</span>
                            @endif
                        </p>

                        {{-- Description --}}
                        <p>
                            <textarea name="description" 
                                      id="description" 
                                      cols="30" 
                                      rows="10" 
                                      placeholder="@lang('messages.Description')" 
                                      required>{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span style="color: red;">{{ $errors->first('description') }}</span>
                            @endif
                        </p>

                        {{-- Description Arabic --}}
                        <p>
                            <textarea name="DescriptionAr" 
                                      id="DescriptionAr" 
                                      cols="30" 
                                      rows="10" 
                                      placeholder="@lang('messages.DescriptionInArabic')" 
                                      required>{{ old('DescriptionAr') }}</textarea>
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
                            @lang('messages.Add Category')
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
