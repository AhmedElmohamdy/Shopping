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
      <a href="{{route('Settings.AddNew')}}" class="btn btn-secondary" >@lang('messages.AddNew')  </a>
    </div>
    <table id="myTable" class="display table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th scope="col">@lang('messages.Id')</th>
            <th scope="col">@lang('messages.address')</th>
            <th scope="col">@lang('messages.Phone')</th>
            <th scope="col">@lang('messages.facebook_url')</th>
            <th scope="col">@lang('messages.twitter_url')</th>
            <th scope="col">@lang('messages.instagram_url')</th>
            <th scope="col">@lang('messages.linkedin_url')</th>
            <th scope="col">@lang('messages.email')</th>
            <th scope="col">@lang('messages.About us')</th>
            <th scope="col">@lang('messages.logo')</th>
            <th scope="col">@lang('messages.Created_At')</th>
            <th scope="col">@lang('messages.Updated_At')</th>
            <th scope="col">@lang('messages.Action')</th>
          </tr>
        </thead>
        <tbody>
           
            @foreach ( $Settings as $Setting )
              <tr>
                <th scope="row">{{$Setting ->id}}</th>
                <td>{{ session('locale') == 'en' ? $Setting->address :$Setting->address_ar }}</td>
                <td>{{$Setting ->phone}}</td>
                <td>{{$Setting ->facebook_url}}</td>
                <td>{{$Setting ->twitter_url}}</td>
                <td>{{$Setting ->instagram_url}}</td>
                <td>{{$Setting ->linkedin_url}}</td>
                <td>{{$Setting ->email}}</td>
                <td>{{ session('locale') == 'en' ? $Setting->AboutUs :$Setting->AboutUs_ar }}</td>
                <td><img src="{{ asset($Setting ->logo) }}" width="100" height="100" alt="Setting Image"></td>
                <td>{{$Setting ->created_at}}</td>
                <td>{{$Setting ->updated_at}}</td>
                <td>
                    <a href="{{route('Settings.edit',$Setting ->id)}}" class="btn btn-primary" >@lang('messages.Edit')  </a>

                    <form style="display: inline" method="POST" action="{{route('Settings.Delete',$Setting ->id)}}">
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