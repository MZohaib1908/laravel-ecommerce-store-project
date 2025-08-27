@extends('layouts.app')

@section('content')
    <!-- Page Title and Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Product
        </a>
    </div>

    <!-- Success Message (Optional) -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Responsive Table -->
    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-striped table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $prod)
                    <tr>
                        <td class="text-center" style="width: 5%;">{{ $prod->id }}</td>
                        <td>
                            @if(!empty($prod->image) && \Illuminate\Support\Facades\Storage::disk('public')->exists($prod->image))
                                <img src="{{ asset('storage/' . $prod->image) }}" 
                                    alt="{{ $prod->image }}" 
                                    width="60" height="60" 
                                    style="object-fit: cover; border-radius: 5px;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td style="width: 30%;">{{ $prod->name }}</td>
                        <td style="width: 25%;">
                            {{ $prod->category ? $prod->category->name : 'No Category' }}
                        </td>
                        <td class="fw-bold" style="width: 15%;">${{ number_format($prod->price, 2) }}</td>
                        <td class="text-center" style="width: 25%;">
                            <!-- Edit Button -->
                            <a href="{{ route('products.edit', $prod->id) }}" 
                                class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <!-- Delete Form -->
                            <form action="{{ route('products.destroy', $prod->id) }}" 
                                    method="POST" 
                                    style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <!-- No Products Fallback -->
    @if($products->isEmpty())
        <div class="text-center mt-4 text-muted">
            <p>No products found. <a href="{{ route('products.create') }}" class="text-primary">Add one</a>.</p>
        </div>
    @endif
@endsection


