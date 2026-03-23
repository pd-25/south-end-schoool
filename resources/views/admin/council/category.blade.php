@extends('admin.layout.main')

@section('title', 'Council Categories')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="fw-bold mb-1">Council Categories</h3>
        <p class="text-muted">Manage council categories.</p>
    </div>
    <div class="col-md-4 text-md-end">
        <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal"
            data-bs-target="#addCategoryModal">
            <i class="fa fa-plus me-2"></i> Add Category
        </button>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show border-0 rounded-4 shadow-sm mb-4" role="alert"
    style="background: rgba(16, 185, 129, 0.1); color: #065f46;">
    <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- Table --}}
<div class="premium-card p-4">
    @if ($categories->count())
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-muted small">
                    <th class="fw-semibold">SL</th>
                    <th class="fw-semibold">Name</th>
                    <th class="fw-semibold text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td class="text-muted small">{{ $loop->iteration }}</td>
                    <td class="fw-medium">{{ $category->name }}</td>
                    <td class="text-end">
                        <div class="d-flex gap-2 justify-content-end">
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;"
                                title="Edit" data-bs-toggle="modal"
                                data-bs-target="#editCategoryModal{{ $category->id }}">
                                <i class="fa fa-pen small text-muted"></i>
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;"
                                title="Delete" data-bs-toggle="modal"
                                data-bs-target="#deleteCategoryModal{{ $category->id }}">
                                <i class="fa fa-trash small text-danger"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @else
    <div class="text-center py-5">
        <i class="fa fa-folder-open text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
        <p class="text-muted fw-medium mt-3 mb-1">No categories found</p>
        <p class="text-muted small">Click "Add Category" to create your first category.</p>
    </div>
    @endif
</div>

{{-- ========================================== --}}
{{-- MODALS                                     --}}
{{-- ========================================== --}}

{{-- Add Category Modal --}}
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold" id="addCategoryModalLabel">Add New Category</h5>
                    <p class="text-muted small mb-0">Enter a name for the new council category.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.council.category.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="col-12">
                        <label class="form-label fw-medium small text-muted">Category Name <span class="text-danger">*</span></label>
                        <div class="input-group bg-light rounded-3 border">
                            <span class="input-group-text bg-transparent border-0">
                                <i class="fa fa-layer-group text-muted small"></i>
                            </span>
                            <input type="text" class="form-control bg-transparent border-0 py-2" name="name"
                                placeholder="e.g. Executive Council" value="{{ old('name') }}" required>
                        </div>
                        @error('name')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-plus me-2"></i> Add Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Per-category Modals --}}
@foreach ($categories as $category)

{{-- Edit Category Modal --}}
<div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold">Edit Category</h5>
                    <p class="text-muted small mb-0">Update the category name.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.council.category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="col-12">
                        <label class="form-label fw-medium small text-muted">Category Name <span class="text-danger">*</span></label>
                        <div class="input-group bg-light rounded-3 border">
                            <span class="input-group-text bg-transparent border-0">
                                <i class="fa fa-layer-group text-muted small"></i>
                            </span>
                            <input type="text" class="form-control bg-transparent border-0 py-2"
                                name="name" value="{{ $category->name }}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-save me-2"></i> Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 rounded-4 shadow-lg text-center overflow-hidden">
            <div class="modal-body p-4">
                <div class="bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                    style="width: 60px; height: 60px;">
                    <i class="fa fa-trash-alt text-danger fs-4"></i>
                </div>
                <h5 class="fw-bold mb-2">Delete Category?</h5>
                <p class="text-muted small mb-0">Are you sure you want to delete
                    <strong>{{ $category->name }}</strong>? This cannot be undone.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center px-4 pb-4 pt-0 gap-2">
                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.council.category.delete', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-trash me-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection

@push('scripts')
<script>
    // Auto-open modal if validation errors exist
    @if ($errors->any())
    document.addEventListener('DOMContentLoaded', function () {
        var modal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
        modal.show();
    });
    @endif
</script>
@endpush