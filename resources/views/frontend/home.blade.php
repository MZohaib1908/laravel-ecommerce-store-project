@extends('layouts.app')

@section('content')
<h1 class="mb-4">Our Products</h1>

@foreach($categories as $category)
    <h3 class="mt-4">{{ $category->name }}</h3>
    <div class="row">
        @foreach($category->products as $product)
            <div class="col-md-3">
                <div class="card mb-3 shadow-sm">
                    {{-- Product Image --}}
                    @if(!empty($product->image) && Storage::disk('public')->exists($product->image))
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="card-img-top" 
                             style="height:200px; object-fit:cover;">
                    @else
                        <img src="https://via.placeholder.com/200x200?text=No+Image" 
                             alt="No Image" 
                             class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }} PKR</p>
                        <a href="{{ route('product.view', $product->id) }}" class="btn btn-sm btn-info">View</a>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
@endsection
