<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <!-- Page Title -->
            <h1 class="h3 mb-4">Edit Order</h1>

            <!-- Edit Order Form -->
            <form action="{{ route('orders.update', $order->id) }}" method="POST" class="bg-white p-4 border rounded shadow-sm">
                @csrf
                @method('PUT')

                <!-- Order Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Order Status</label>
                    <select 
                        name="status" 
                        id="status" 
                        class="form-control @error('status') is-invalid @enderror" 
                        required
                    >
                        <option value="" disabled {{ old('status', $order->status) ? '' : 'selected' }}>Select Status</option>
                        <option value="Pending" {{ old('status', $order->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ old('status', $order->status) == 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Shipped" {{ old('status', $order->status) == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="Completed" {{ old('status', $order->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit & Cancel Buttons -->
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="bi bi-save"></i> Update Status
                    </button>
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Load Bootstrap 5 and Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>