@extends('layouts.app')

@section('content')
            <!-- Page Title -->
            <h1 class="h3 mb-4">Edit Product</h1>

            <!-- Edit Form -->
            {{-- <form action="{{ route('products.update', $product->id) }}" method="POST" class="bg-white p-4 border rounded shadow-sm"> --}}
            <form action="{{ route('products.update', $product->id) }}" method="POST" class="bg-white p-4 border rounded shadow-sm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name', $product->name) }}" 
                        required 
                        autofocus
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price ($)</label>
                    <input 
                        type="number" 
                        name="price" 
                        id="price" 
                        class="form-control @error('price') is-invalid @enderror" 
                        value="{{ old('price', $product->price) }}" 
                        step="0.01" 
                        min="0" 
                        required
                    >
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="form-control @error('description') is-invalid @enderror" 
                        rows="4"
                    >{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select 
                        name="category_id" 
                        id="category_id" 
                        class="form-control @error('category_id') is-invalid @enderror" 
                        required
                    >
                        <option value="" disabled>Select a category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- ✅ New Image Field -->
                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" class="mt-2" width="120">
                    @endif
                </div>

                <!-- Submit & Cancel Buttons -->
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="bi bi-save"></i> Update Product
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
@endsection