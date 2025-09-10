@extends('Shared_Layout.SharedAdminView')
  
@section('Title') Update Category @endsection


@section('Content')
<form method="POST" action="{{route('Category.Save')}}"  enctype="multipart/form-data">
    @csrf
   

    <input type="hidden" style="width: 100%" name="id" id="id"  value="{{ $Categories->id }}" >

    <label>@lang('messages.Category Name'):</label>
    <input type="text"  style="width: 100%" name="category_name" id="category_name" value="{{ $Categories->category_name }}" required>

    
    <label>@lang('messages.CategoryNameInArabic'):</label>
    <input type="text" style="width: 100%" name="CategoryNameAr" id="CategoryNameAr" value="{{ $Categories->CategoryNameAr }}" required>

 




  <label>@lang('messages.Description'):</label>
  <input type="text" style="width: 100%" name="description" id="description" value="{{ $Categories->description }}" required>


  <label>@lang('messages.DescriptionInArabic'):</label>
  <input type="text" style="width: 100%" name="DescriptionAr" id="DescriptionAr" value="{{ $Categories->DescriptionAr }}" required>
  

  <label>@lang('messages.Current Image'):</label><br>
    <img src="{{ asset($Categories->image_name) }}" id="image_name"  width="200"  height="200" ><br>

    
        <label>@lang('messages.New Image (optional)'):</label>
        <input type="file"  id="image_name" name="image_name"  class="form-control"  >

  <button type="submit"  class="btn btn-success">@lang('messages.UpDate')</button>
  </form>
@endsection

