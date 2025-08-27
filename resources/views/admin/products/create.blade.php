@extends('layouts.app')

@section('content')
            <!-- Page Title -->
            <h1 class="h3 mb-4">Add New Product</h1>

            <!-- Add Product Form -->
            {{-- <form action="{{ route('products.store') }}" method="POST" class="bg-white p-4 border rounded shadow-sm"> --}}
                <form action="{{ route('products.store') }}" method="POST" class="bg-white p-4 border rounded shadow-sm" enctype="multipart/form-data">
                @csrf

                <!-- Product Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Enter product name" 
                        value="{{ old('name') }}" 
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
                        placeholder="0.00" 
                        step="0.01" 
                        min="0" 
                        value="{{ old('price') }}" 
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
                        placeholder="Enter product description" 
                        rows="4"
                    >{{ old('description') }}</textarea>
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
                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Select a category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!--  New Image Field -->
                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <!-- Submit & Cancel Buttons -->
                <div class="d-flex">
                    <button type="submit" class="btn btn-success me-2">
                        <i class="bi bi-save"></i> Save Product
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
@endsection
