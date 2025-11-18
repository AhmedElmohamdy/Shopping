@extends('Shared_Layout.SharedAdminView')

@section('Title')
    Update SliderPhoto
@endsection

@section('Content')
    <form method="POST" action="{{ route('Slider.Save') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $Slider->id }}">

        {{-- Title --}}
        <label>@lang('messages.Title'):</label>
        <input type="text" style="width: 100%" name="Title" value="{{ old('Title', $Slider->Title) }}" required>

        {{-- Title Arabic --}}
        <label>@lang('messages.Title In Arabic'):</label>
        <input type="text" style="width: 100%" name="title_ar" value="{{ old('title_ar', $Slider->title_ar) }}" required>

        {{-- Subtitle --}}
        <label>@lang('messages.Subtitle'):</label>
        <input type="text" style="width: 100%" name="subtitle" value="{{ old('subtitle', $Slider->subtitle) }}" required>

        {{-- Subtitle Arabic --}}
        <label>@lang('messages.Subtitle In Arabic'):</label>
        <input type="text" style="width: 100%" name="subtitle_ar" value="{{ old('subtitle_ar', $Slider->subtitle_ar) }}"
            required>

        {{-- Current Image --}}
        <label>@lang('messages.Current Image'):</label><br>
        <img src="{{ asset($Slider->Slider_Image) }}" width="200" height="200"><br><br>

        {{-- Optional New Image --}}
        <label>@lang('messages.New Image (optional)'):</label>
        <input type="file" name="Slider_Image" class="form-control">
        @if ($errors->has('Slider_Image'))
            <span style="color: red;">{{ $errors->first('Slider_Image') }}</span>
        @endif

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-success mt-3">@lang('messages.UpDate')</button>
    </form>
@endsection
