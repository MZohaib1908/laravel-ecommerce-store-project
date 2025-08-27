@extends('layouts.app')

@section('content')
<h1>Orders</h1>

<table class="table table-striped">
    <thead class="table-dark">
        <tr><th>ID</th><th>Product</th><th>Quantity</th><th>Status</th><th>Action</th></tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->product->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td><span class="badge bg-info">{{ $order->status }}</span></td>
            <td>
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

