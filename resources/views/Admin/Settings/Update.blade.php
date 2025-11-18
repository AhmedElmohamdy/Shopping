@extends('Shared_Layout.SharedAdminView')
  
@section('Title') Update Settings @endsection

@section('Content')
<form method="POST" action="{{ route('Settings.Save') }}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="id" value="{{ $Settings->id }}">

    {{-- Address --}}
    <label>@lang('messages.address'):</label>
    <input type="text" style="width: 100%" name="address" value="{{ old('address', $Settings->address) }}">

    {{-- Address Arabic --}}
    <label>@lang('messages.addressArInArabic'):</label>
    <input type="text" style="width: 100%" name="address_ar" value="{{ old('address_ar', $Settings->address_ar) }}">

    {{-- Phone --}}
    <label>@lang('messages.Phone'):</label>
    <input type="text" style="width: 100%" name="phone" value="{{ old('phone', $Settings->phone) }}">

    {{-- Social URLs --}}
    <label>@lang('messages.facebook_url'):</label>
    <input type="text" style="width: 100%" name="facebook_url" value="{{ old('facebook_url', $Settings->facebook_url) }}">

    <label>@lang('messages.twitter_url'):</label>
    <input type="text" style="width: 100%" name="twitter_url" value="{{ old('twitter_url', $Settings->twitter_url) }}">

    <label>@lang('messages.instagram_url'):</label>
    <input type="text" style="width: 100%" name="instagram_url" value="{{ old('instagram_url', $Settings->instagram_url) }}">

    <label>@lang('messages.linkedin_url'):</label>
    <input type="text" style="width: 100%" name="linkedin_url" value="{{ old('linkedin_url', $Settings->linkedin_url) }}">

    {{-- Email --}}
    <label>@lang('messages.email'):</label>
    <input type="text" style="width: 100%" name="email" value="{{ old('email', $Settings->email) }}">

    {{-- About Us --}}
    <label>@lang('messages.About us'):</label>
    <textarea style="width: 100%" name="AboutUs">{{ old('AboutUs', $Settings->AboutUs) }}</textarea>

    <label>@lang('messages.AboutArUsInArabic'):</label>
    <textarea style="width: 100%" name="AboutUs_ar">{{ old('AboutUs_ar', $Settings->AboutUs_ar) }}</textarea>

    {{-- Current Logo --}}
    <label>@lang('messages.Current Image'):</label><br>
    <img src="{{ asset($Settings->logo) }}" width="200" height="200"><br><br>

    {{-- Optional New Logo --}}
    <label>@lang('messages.New Image (optional)'):</label>
    <input type="file" name="logo" class="form-control">
    @if ($errors->has('logo'))
        <span style="color: red;">{{ $errors->first('logo') }}</span>
    @endif

    {{-- Submit Button --}}
    <button type="submit" class="btn btn-success mt-3">@lang('messages.UpDate')</button>
</form>
@endsection
