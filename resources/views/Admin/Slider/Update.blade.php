@extends('Shared_Layout.SharedAdminView')
  
@section('Title') Update SliderPhoto @endsection


@section('Content')
<form method="POST" action="{{route('Slider.Save')}}"  enctype="multipart/form-data">
    @csrf
   

    <input type="hidden" style="width: 100%" name="id" id="id"  value="{{ $Slider->id }}" >

    <label>@lang('messages.Title'):</label>
    <input type="text"  style="width: 100%" name="Title" id="Title" value="{{ $Slider->Title }}" required>

 

    <label>@lang('messages.Title In Arabic'):</label>
    <input type="text"  style="width: 100%" name="title_ar" id="title_ar" value="{{ $Slider->title_ar }}" required>


    
    <label>@lang('messages.Subtitle'):</label>
    <input type="text"  style="width: 100%" name="subtitle" id="subtitle" value="{{ $Slider->subtitle }}" required>


    
    <label>@lang('messages.Subtitle In Arabic'):</label>
    <input type="text"  style="width: 100%" name="subtitle_ar" id="subtitle_ar" value="{{ $Slider->subtitle_ar }}" required>

    
   



  

  <label>@lang('messages.Current Image'):</label><br>
    <img src="{{ asset($Slider->Slider_Image) }}" id="Slider_Image"  width="200"  height="200" ><br>

    
        <label>@lang('messages.New Image (optional)'):</label>
        <input type="file"  id="Slider_Image" name="Slider_Image"  class="form-control"  >

  <button type="submit"  class="btn btn-success">@lang('messages.UpDate')</button>
  </form>
@endsection

