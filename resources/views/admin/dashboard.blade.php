@extends('layouts.app')

@section('content')
<h1>Admin Dashboard</h1>
<div class="list-group mt-3">
    <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action">Manage Categories</a>
    <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Manage Products</a>
    <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action">View Orders</a>
</div>
@endsection
