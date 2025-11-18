@extends('Shared_Layout.SharedAdminView')

@section('Title')
    Update Category
@endsection

@section('Content')
    <form method="POST" action="{{ route('Category.Save') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $Categories->id }}">

        {{-- Category Name --}}
        <label>@lang('messages.Category Name'):</label>
        <input type="text" style="width: 100%" name="category_name"
            value="{{ old('category_name', $Categories->category_name) }}" required>

        {{-- Category Name Arabic --}}
        <label>@lang('messages.CategoryNameInArabic'):</label>
        <input type="text" style="width: 100%" name="CategoryNameAr"
            value="{{ old('CategoryNameAr', $Categories->CategoryNameAr) }}" required>

        {{-- Description --}}
        <label>@lang('messages.Description'):</label>
        <input type="text" style="width: 100%" name="description"
            value="{{ old('description', $Categories->description) }}" required>

        {{-- Description Arabic --}}
        <label>@lang('messages.DescriptionInArabic'):</label>
        <input type="text" style="width: 100%" name="DescriptionAr"
            value="{{ old('DescriptionAr', $Categories->DescriptionAr) }}" required>

        {{-- Current Image --}}
        <label>@lang('messages.Current Image'):</label><br>
        <img src="{{ asset($Categories->image_name) }}" width="200" height="200"><br><br>

        {{-- Optional New Image --}}
        <label>@lang('messages.New Image (optional)'):</label>
        <input type="file" name="image_name" class="form-control">
        @if ($errors->has('image_name'))
            <span style="color: red;">{{ $errors->first('image_name') }}</span>
        @endif

        {{-- Submit --}}
        <button type="submit" class="btn btn-success mt-3">@lang('messages.UpDate')</button>
    </form>
@endsection
