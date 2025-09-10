@extends('Shared_Layout.SharedAdminView')

@section('Title')
    Admin
@endsection


@section('Content')





<div class="container mt-5">
    <div class="row">
        <!-- Cards Summary -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5>Total Users</h5>
                    <h3>{{ $totalUsers ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5>Total Orders</h5>
                    <h3>{{ $totalOrders ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h5>Total Products</h5>
                    <h3>{{ $totalProducts ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h5>Total Category</h5>
                    <h3>{{ $totalCategory ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <h5>Total Sales</h5>
                    <h3>${{ $totalSales ?? '0.00' }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-secondary text-white">
                    <h4 class="mb-0">Recent Orders</h4>
                </div>
                <div class="card-body">
                    @if(isset($recentOrders) && $recentOrders->count())
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>User</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                                        <td>{{ number_format($order->total, 2) }}</td> 
                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No recent orders available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div>










@endsection
   



