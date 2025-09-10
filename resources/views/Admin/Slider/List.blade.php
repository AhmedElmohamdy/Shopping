<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

@extends('Shared_Layout.SharedAdminView')

@section('Title')
   List SliderPhoto
@endsection




@section('Content')

<div class="container mt-4">
    <div class="left-center">
      <a href="{{route('Slider.AddNew')}}" class="btn btn-secondary" >@lang('messages.AddNewSliderPhoto') </a>
    </div>
    <table id="myTable" class="display table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th scope="col">@lang('messages.Id')</th>
            <th scope="col">@lang('messages.Title')</th>
             <th scope="col">@lang('messages.Subtitle')</th>
            <th scope="col">@lang('messages.Image Name')</th>
            <th scope="col">@lang('messages.Created_At')</th>
            <th scope="col">@lang('messages.Updated_At')</th>
            <th scope="col">@lang('messages.Action')</th>
          </tr>
        </thead>
        <tbody>
           
            @foreach ( $Slider as $Slider )
              <tr>
                <th scope="row">{{$Slider ->id}}</th>
                <td>{{ session('locale') == 'en' ? $Slider ->Title : $Slider ->title_ar }}</td>
                <td>{{ session('locale') == 'en' ? $Slider ->subtitle : $Slider ->subtitle_ar }}</td>
                <td><img src="{{ asset($Slider ->Slider_Image) }}" width="100" height="100" alt="Slider Image"></td>
                <td>{{$Slider ->created_at}}</td>
                <td>{{$Slider ->updated_at}}</td>
                <td>
                    <a href="{{route('Slider.edit',$Slider ->id)}}" class="btn btn-primary" >@lang('messages.Edit')  </a>

                    <form style="display: inline" method="POST" action="{{route('Slider.Delete',$Slider ->id)}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>@lang('messages.Delete')</button>
                    </form>
                </td>
              </tr>
              
              @endforeach
              
              
       
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.show-alert-delete-box', function(event){
            var form =  $(this).closest("form");

            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel","Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    });
</script>
        </tbody>
      </table>
</div>

@endsection
<script>

  $(document).ready( function () {
    let table = new DataTable('#myTable');
  } );


  </script>