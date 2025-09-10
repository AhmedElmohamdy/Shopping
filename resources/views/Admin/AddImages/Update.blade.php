@extends('Shared_Layout.SharedAdminView')
  
@section('Title') Update ProductPhotos @endsection


@section('Content')
<form method="POST" action="{{route('product.SaveImage')}}"  enctype="multipart/form-data">
    @csrf
   

    <input type="hidden" style="width: 100%" name="id" id="id"  value="{{ $productImage->id }}" >

    
 <!-- Product dropdown -->
    <label>@lang('messages.Select Product'):</label>
    <select class="custom-dropdown form-control" name="product_id" required>
        <option value="">-- Select Product --</option>
        @foreach ($product as $item)
            <option value="{{ $item->id }}" {{ $productImage->product_id == $item->id ? 'selected' : '' }}>
                {{ $item->product_name }}
            </option>
        @endforeach
    </select>
    

 <!-- Current image display -->
    <label class="mt-3">@lang('messages.Current Image'):</label><br>
    <img src="{{ asset($productImage->image_Name) }}" width="200" height="200"><br>

    <!-- Optional new image input -->
    <label class="mt-3">@lang('messages.New Image (optional)'):</label>
    <input type="file" name="image_Name" class="form-control">

  <button type="submit"  class="btn btn-success">@lang('messages.UpDate')</button>
  </form>
@endsection

