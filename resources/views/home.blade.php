@extends('layouts.app')

@section('content')
<h2>Products</h2>
<div class="row">
  @foreach($products as $product)
    <div class="col-md-3">
      <div class="card mb-3">
        @if($product->image)
          <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" style="height:200px;object-fit:cover;">
        @else
          <img src="https://via.placeholder.com/200x200" class="card-img-top">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $product->name }}</h5>
          <p class="card-text">{{ $product->price }} $</p>
          <a href="{{ route('cart.add', $product) }}" class="btn btn-sm btn-primary">Add to Cart</a>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
