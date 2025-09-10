@extends('Shared_Layout.SharedAdminView')
  
@section('Title') Update  @endsection


@section('Content')
<form method="POST" action="{{route('Settings.Save')}}"  enctype="multipart/form-data">
    @csrf
   

    <input type="hidden" style="width: 100%" name="id" id="id"  value="{{ $Settings->id }}" >

    <label>@lang('messages.address'):</label>
    <input type="text"  style="width: 100%" name="address" id="address" value="{{ $Settings->address}}" >
    <label>@lang('messages.addressArInArabic'):</label>
    <input type="text"  style="width: 100%" name="address_ar" id="address_ar" value="{{ $Settings->address_ar }}" >

    <label>@lang('messages.Phone'):</label>
    <input type="text"  style="width: 100%" name="phone" id="phone" value="{{ $Settings->phone }}" >
    <label>@lang('messages.facebook_url'):</label>
    <input type="text"  style="width: 100%" name="facebook_url" id="facebook_url" value="{{ $Settings->facebook_url }}" >
    <label>@lang('messages.twitter_url'):</label>
    <input type="text"  style="width: 100%" name="twitter_url" id="twitter_url" value="{{ $Settings->twitter_url }}" >
    <label>@lang('messages.instagram_url'):</label>
    <input type="text"  style="width: 100%" name="instagram_url" id="instagram_url" value="{{ $Settings->instagram_url }}" >
    <label>@lang('messages.linkedin_url'):</label>
    <input type="text"  style="width: 100%" name="linkedin_url" id="linkedin_url" value="{{ $Settings->linkedin_url }}" >

    <label>@lang('messages.email'):</label>
    <input type="text"  style="width: 100%" name="email" id="email" value="{{ $Settings->email }}" >

    <label>@lang('messages.About us'):</label>
    <textarea style="width: 100%" name="AboutUs" id="AboutUs">{{ $Settings->AboutUs }}</textarea>
    <label>@lang('messages.AboutArUsInArabic'):</label>
    <textarea style="width: 100%" name="AboutUs_ar" id="AboutUs_ar">{{ $Settings->AboutUs_ar }}</textarea>

    


  
  <label>@lang('messages.Current Image'):</label><br>
    <img src="{{ asset($Settings->logo) }}" id="logo"  width="200"  height="200" ><br>

    
        <label>@lang('messages.New Image (optional)'):</label>
        <input type="file"  id="logo" name="logo"  class="form-control"  >

  <button type="submit"  class="btn btn-success">@lang('messages.UpDate')</button>
  </form>
@endsection

