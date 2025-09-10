@extends('Shared_Layout.SharedAdminView')

@section('Title')
    List Users
@endsection




@section('Content')
    <div class="container mt-4">
        <table id="myTable" class="display table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">@lang('messages.Id')</th>
                    <th scope="col">@lang('messages.User Name')</th>
                    <th scope="col">@lang('messages.User Email')</th>
                    <th scope="col">@lang('messages.Role')</th>
                    <th scope="col">@lang('messages.Created_At')</th>
                    <th scope="col">@lang('messages.Updated_At')</th>
                    <th scope="col">@lang('messages.Action')</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($User as $users)
                    <tr>
                        <th scope="row">{{ $users->id }}</th>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->role }}</td>
                        <td>{{ $users->created_at }}</td>
                        <td>{{ $users->updated_at }}</td>
                        <td>
                            <form style="display: inline" method="POST" action="{{ route('User.Delete', $users->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm"
                                    data-toggle="tooltip" title='Delete'>@lang('messages.Delete')</button>
                            </form>
                        </td>


                    </tr>
                @endforeach

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $(document).on('click', '.show-alert-delete-box', function(event) {
                            var form = $(this).closest("form");

                            event.preventDefault();
                            swal({
                                title: "Are you sure you want to delete this record?",
                                text: "If you delete this, it will be gone forever.",
                                icon: "warning",
                                type: "warning",
                                buttons: ["Cancel", "Yes!"],
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
