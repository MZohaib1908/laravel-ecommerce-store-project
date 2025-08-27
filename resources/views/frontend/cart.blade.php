@extends('layouts.app')

@section('content')
<h1>Your Cart</h1>

@if($cart)
    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>Name</th><th>Quantity</th><th>Price</th>
            </tr>
        </thead>
        <tbody>
        @php $total = 0; @endphp
        @foreach($cart as $item)
            <tr>
                {{-- <td>{{ $item['image'] }}</td> --}}
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['price'] * $item['quantity'] }}</td>
            </tr>
            @php $total += $item['price'] * $item['quantity']; @endphp
        @endforeach
        </tbody>
    </table>
    <h4>Total: {{ $total }} PKR</h4>
    <form action="{{ route('order.place') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
@else
    <div class="alert alert-warning">No items in cart</div>
@endif
@endsection
