<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


@extends('Shared_Layout.SharedAdminView')

@section('Title')
    Order Details
@endsection




@section('Content')
    <div class="container mt-4">

        <table id="myTable" class="display table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">@lang('messages.Id')</th>
                    <th scope="col">@lang('messages.Order Id')</th>
                    <th scope="col">@lang('messages.Product Name')</th>
                    <th scope="col">@lang('messages.Quantity')</th>
                    <th scope="col">@lang('messages.Total Price')</th>
                    <th scope="col">@lang('messages.Created_At')</th>
                    <th scope="col">@lang('messages.Updated_At')</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($order->items as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->order_id }}</td>
                        <td>{{ $item->product->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                    </tr>
                @endforeach



                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


            </tbody>
        </table>
    </div>
@endsection

<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable');
    });
</script>
