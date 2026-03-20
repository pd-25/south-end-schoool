@extends('admin.layout.main')

@section('title', 'Gallery Categories')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="fw-bold mb-1">Gallery Categories</h3>
        <p class="text-muted">Manage gallery categories.</p>
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
                    <th class="fw-semibold">Image</th>
                    <th class="fw-semibold">Name</th>
                    <th class="fw-semibold">Slug</th>
                    <th class="fw-semibold text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td class="text-muted small">{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $category->image) }}"
                            class="rounded-3 shadow-sm"
                            style="width: 50px; height: 50px; object-fit: cover;"
                            alt="{{ $category->name }}">
                    </td>
                    <td class="fw-medium">{{ $category->name }}</td>
                    <td><span class="badge bg-light text-muted rounded-pill px-3">{{ $category->slug }}</span></td>
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

    @if ($categories->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
        <p class="text-muted small mb-0">Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of
            {{ $categories->total() }} categories</p>
        {{ $categories->links() }}
    </div>
    @endif
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
                    <p class="text-muted small mb-0">The slug will be auto-generated from the name.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.gallery.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">

                        {{-- Name --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Category Name <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0">
                                    <i class="fa fa-folder text-muted small"></i>
                                </span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="name"
                                    placeholder="e.g. Annual Day" value="{{ old('name') }}" required>
                            </div>
                            @error('name')
                                <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Category Image <span class="text-danger">*</span></label>
                            <div class="upload-area p-4 rounded-4 text-center" id="addCatUploadArea"
                                style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                <input type="file" name="image" id="addCatImageInput" class="d-none" accept="image/*" required>
                                <div id="addCatPlaceholder">
                                    <i class="fa fa-cloud-upload-alt text-muted mb-2" style="font-size: 2rem; opacity: 0.5;"></i>
                                    <p class="text-muted small mb-0 fw-medium">Click to upload image</p>
                                    <p class="text-muted small mb-0" style="font-size: 11px;">JPEG, PNG, JPG, WEBP (Max 10MB)</p>
                                </div>
                                <div id="addCatPreviewDiv" class="d-none">
                                    <img id="addCatPreviewImg" src="" class="rounded-3 shadow-sm" style="max-height: 120px; object-fit: cover;">
                                    <p class="text-muted small mt-2 mb-0 fw-medium" id="addCatFileName"></p>
                                </div>
                            </div>
                            @error('image')
                                <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

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
                    <p class="text-muted small mb-0">Update the category details.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.gallery.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="row g-3">

                        {{-- Name --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Category Name <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0">
                                    <i class="fa fa-folder text-muted small"></i>
                                </span>
                                <input type="text" class="form-control bg-transparent border-0 py-2"
                                    name="name" value="{{ $category->name }}" required>
                            </div>
                        </div>

                        {{-- Current Image + Upload New --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Category Image <span class="text-muted">(Leave empty to keep current)</span></label>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset('storage/' . $category->image) }}"
                                    class="rounded-3 shadow-sm" width="70" height="55"
                                    style="object-fit: cover;">
                                <div>
                                    <p class="mb-0 small fw-medium">Current Image</p>
                                    <p class="mb-0 text-muted" style="font-size: 11px;">Upload a new one to replace</p>
                                </div>
                            </div>
                            <div class="upload-area p-3 rounded-4 text-center" id="editCatUploadArea{{ $category->id }}"
                                style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                <input type="file" name="image" id="editCatImageInput{{ $category->id }}" class="d-none" accept="image/*">
                                <div id="editCatPlaceholder{{ $category->id }}">
                                    <i class="fa fa-cloud-upload-alt text-muted" style="font-size: 1.5rem; opacity: 0.5;"></i>
                                    <p class="text-muted small mb-0 fw-medium">Click to upload new image</p>
                                </div>
                                <div id="editCatPreviewDiv{{ $category->id }}" class="d-none">
                                    <img id="editCatPreviewImg{{ $category->id }}" src="" class="rounded-3 shadow-sm" style="max-height: 100px; object-fit: cover;">
                                    <p class="text-muted small mt-1 mb-0 fw-medium" id="editCatFileName{{ $category->id }}"></p>
                                </div>
                            </div>
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
                <form action="{{ route('admin.gallery.category.delete', $category->id) }}" method="POST">
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
    // Add category image preview
    const addCatUploadArea = document.getElementById('addCatUploadArea');
    const addCatImageInput = document.getElementById('addCatImageInput');

    addCatUploadArea.addEventListener('click', () => addCatImageInput.click());
    addCatImageInput.addEventListener('change', (e) => {
        if (e.target.files.length) showAddCatPreview(e.target.files[0]);
    });

    function showAddCatPreview(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            document.getElementById('addCatPreviewImg').src = e.target.result;
            document.getElementById('addCatFileName').textContent = file.name;
            document.getElementById('addCatPlaceholder').classList.add('d-none');
            document.getElementById('addCatPreviewDiv').classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }

    // Edit category image preview (per modal)
    @foreach ($categories as $category)
    (function(id) {
        const area  = document.getElementById('editCatUploadArea' + id);
        const input = document.getElementById('editCatImageInput' + id);
        if (area && input) {
            area.addEventListener('click', () => input.click());
            input.addEventListener('change', (e) => {
                if (e.target.files.length) {
                    const reader = new FileReader();
                    reader.onload = (ev) => {
                        document.getElementById('editCatPreviewImg' + id).src = ev.target.result;
                        document.getElementById('editCatFileName' + id).textContent = e.target.files[0].name;
                        document.getElementById('editCatPlaceholder' + id).classList.add('d-none');
                        document.getElementById('editCatPreviewDiv' + id).classList.remove('d-none');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }
    })({{ $category->id }});
    @endforeach

    // Auto-open modal if validation errors exist
    @if ($errors->any())
    document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
        modal.show();
    });
    @endif
</script>
@endpush

@push('styles')
<style>
    .upload-area:hover {
        border-color: #4361ee !important;
        background: rgba(67, 97, 238, 0.03);
    }
</style>
@endpush