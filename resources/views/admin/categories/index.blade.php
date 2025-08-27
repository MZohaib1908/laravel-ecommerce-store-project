@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Category
        </a>
    </div>

    <!-- Responsive Table -->
    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-striped table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td class="text-center" style="width: 10%;">{{ $cat->id }}</td>
                        <td class="fw-medium">{{ $cat->name }}</td>
                        <td class="text-center" style="width: 25%;">
                            <!-- Edit Link -->
                            <a href="{{ route('categories.edit', $cat->id) }}" 
                               class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <!-- Delete Form -->
                            <form action="{{ route('categories.destroy', $cat->id) }}" 
                                  method="POST" 
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection
