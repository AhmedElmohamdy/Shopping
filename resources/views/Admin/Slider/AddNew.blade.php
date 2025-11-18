@extends('Shared_Layout.SharedAdminView')
@section('Title')
    Add New SliderPhoto
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
                        <h3>@lang('messages.Add New SliderPhotos')</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" id="SliderForm" action="{{ route('Slider.Save') }}"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- Title --}}
                            <p>
                                <input type="text" style="width: 100%" placeholder="@lang('messages.Title')" name="Title"
                                    id="Title" value="{{ old('Title') }}">
                                @if ($errors->has('Title'))
                                    <span style="color: red;">{{ $errors->first('Title') }}</span>
                                @endif
                            </p>

                            {{-- Title Arabic --}}
                            <p>
                                <input type="text" style="width: 100%" placeholder="@lang('messages.Title In Arabic')" name="title_ar"
                                    id="title_ar" value="{{ old('title_ar') }}">
                                @if ($errors->has('title_ar'))
                                    <span style="color: red;">{{ $errors->first('title_ar') }}</span>
                                @endif
                            </p>

                            {{-- Subtitle --}}
                            <p>
                                <input type="text" style="width: 100%" placeholder="@lang('messages.Subtitle')" name="subtitle"
                                    id="subtitle" value="{{ old('subtitle') }}">
                                @if ($errors->has('subtitle'))
                                    <span style="color: red;">{{ $errors->first('subtitle') }}</span>
                                @endif
                            </p>

                            {{-- Subtitle Arabic --}}
                            <p>
                                <input type="text" style="width: 100%" placeholder="@lang('messages.Subtitle In Arabic')" name="subtitle_ar"
                                    id="subtitle_ar" value="{{ old('subtitle_ar') }}">
                                @if ($errors->has('subtitle_ar'))
                                    <span style="color: red;">{{ $errors->first('subtitle_ar') }}</span>
                                @endif
                            </p>

                            {{-- Slider Image --}}
                            <p>
                                <input type="file" name="Slider_Image" id="Slider_Image" class="form-control" required>
                                @if ($errors->has('Slider_Image'))
                                    <span style="color: red;">{{ $errors->first('Slider_Image') }}</span>
                                @endif
                            </p>

                            {{-- Submit Button --}}
                            <button type="submit" class="btn btn-success">@lang('messages.Add SliderPhoto')</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
