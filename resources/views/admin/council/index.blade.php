@extends('admin.layout.main')

@section('title', 'Councils')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="fw-bold mb-1">Councils</h3>
        <p class="text-muted">Manage council members.</p>
    </div>
    <div class="col-md-4 text-md-end">
        <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal"
            data-bs-target="#addCouncilModal">
            <i class="fa fa-plus me-2"></i> Add Council
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
    @if ($councils->count())
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="text-muted small">
                    <th class="fw-semibold">SL</th>
                    <th class="fw-semibold">Image</th>
                    <th class="fw-semibold">Heading</th>
                    <th class="fw-semibold">Designation</th>
                    <th class="fw-semibold">Category</th>
                    <th class="fw-semibold text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($councils as $council)
                <tr>
                    <td class="text-muted small">{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $council->image) }}"
                            class="rounded-3 shadow-sm"
                            style="width: 50px; height: 50px; object-fit: cover;"
                            alt="{{ $council->heading }}">
                    </td>
                    <td class="fw-medium">{{ $council->heading }}</td>
                    <td class="text-muted small">{{ $council->designation }}</td>
                    <td>
                        <span class="badge bg-light text-muted rounded-pill px-3">
                            {{ $council->category->name ?? '—' }}
                        </span>
                    </td>
                    <td class="text-end">
                        <div class="d-flex gap-2 justify-content-end">
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;"
                                title="Edit" data-bs-toggle="modal"
                                data-bs-target="#editCouncilModal{{ $council->id }}">
                                <i class="fa fa-pen small text-muted"></i>
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;"
                                title="Delete" data-bs-toggle="modal"
                                data-bs-target="#deleteCouncilModal{{ $council->id }}">
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
        <i class="fa fa-users text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
        <p class="text-muted fw-medium mt-3 mb-1">No council members found</p>
        <p class="text-muted small">Click "Add Council" to create your first entry.</p>
    </div>
    @endif
</div>


{{-- ========================================== --}}
{{-- ADD MODAL                                  --}}
{{-- ========================================== --}}
<div class="modal fade" id="addCouncilModal" tabindex="-1" aria-labelledby="addCouncilModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold" id="addCouncilModalLabel">Add Council Member</h5>
                    <p class="text-muted small mb-0">Fill in the details below.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.council.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">

                        {{-- Category --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Category <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0">
                                    <i class="fa fa-layer-group text-muted small"></i>
                                </span>
                                <select name="category_id" class="form-select bg-transparent border-0 py-2" required>
                                    <option value="" disabled selected>Select category</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Heading --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Heading / Name <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0">
                                    <i class="fa fa-user text-muted small"></i>
                                </span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="heading"
                                    placeholder="e.g. John Doe" value="{{ old('heading') }}" required>
                            </div>
                            @error('heading')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Designation --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Designation <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0">
                                    <i class="fa fa-briefcase text-muted small"></i>
                                </span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="designation"
                                    placeholder="e.g. Chairman" value="{{ old('designation') }}" required>
                            </div>
                            @error('designation')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Photo <span class="text-danger">*</span></label>
                            <div class="upload-area p-4 rounded-4 text-center" id="addUploadArea"
                                style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                <input type="file" name="image" id="addImageInput" class="d-none" accept="image/*" required>
                                <div id="addPlaceholder">
                                    <i class="fa fa-cloud-upload-alt text-muted mb-2" style="font-size: 2rem; opacity: 0.5;"></i>
                                    <p class="text-muted small mb-0 fw-medium">Click to upload photo</p>
                                    <p class="text-muted small mb-0" style="font-size: 11px;">JPEG, PNG, JPG, WEBP (Max 10MB)</p>
                                </div>
                                <div id="addPreviewDiv" class="d-none">
                                    <img id="addPreviewImg" src="" class="rounded-3 shadow-sm" style="max-height: 120px; object-fit: cover;">
                                    <p class="text-muted small mt-2 mb-0 fw-medium" id="addFileName"></p>
                                </div>
                            </div>
                            @error('image')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-plus me-2"></i> Add Council
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ========================================== --}}
{{-- PER-ROW MODALS                             --}}
{{-- ========================================== --}}
@foreach ($councils as $council)

{{-- Edit Modal --}}
<div class="modal fade" id="editCouncilModal{{ $council->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold">Edit Council Member</h5>
                    <p class="text-muted small mb-0">Update the details below.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.council.update', $council->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="row g-3">

                        {{-- Category --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Category <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0">
                                    <i class="fa fa-layer-group text-muted small"></i>
                                </span>
                                <select name="category_id" class="form-select bg-transparent border-0 py-2" required>
                                    <option value="" disabled>Select category</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $council->category_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Heading --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Heading / Name <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0">
                                    <i class="fa fa-user text-muted small"></i>
                                </span>
                                <input type="text" class="form-control bg-transparent border-0 py-2"
                                    name="heading" value="{{ $council->heading }}" required>
                            </div>
                        </div>

                        {{-- Designation --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">Designation <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0">
                                    <i class="fa fa-briefcase text-muted small"></i>
                                </span>
                                <input type="text" class="form-control bg-transparent border-0 py-2"
                                    name="designation" value="{{ $council->designation }}" required>
                            </div>
                        </div>

                        {{-- Current Image + Upload New --}}
                        <div class="col-12">
                            <label class="form-label fw-medium small text-muted">
                                Photo <span class="text-muted">(Leave empty to keep current)</span>
                            </label>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset('storage/' . $council->image) }}"
                                    class="rounded-3 shadow-sm" width="60" height="60"
                                    style="object-fit: cover;">
                                <div>
                                    <p class="mb-0 small fw-medium">Current Photo</p>
                                    <p class="mb-0 text-muted" style="font-size: 11px;">Upload a new one to replace</p>
                                </div>
                            </div>
                            <div class="upload-area p-3 rounded-4 text-center" id="editUploadArea{{ $council->id }}"
                                style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                <input type="file" name="image" id="editImageInput{{ $council->id }}" class="d-none" accept="image/*">
                                <div id="editPlaceholder{{ $council->id }}">
                                    <i class="fa fa-cloud-upload-alt text-muted" style="font-size: 1.5rem; opacity: 0.5;"></i>
                                    <p class="text-muted small mb-0 fw-medium">Click to upload new photo</p>
                                </div>
                                <div id="editPreviewDiv{{ $council->id }}" class="d-none">
                                    <img id="editPreviewImg{{ $council->id }}" src="" class="rounded-3 shadow-sm" style="max-height: 100px; object-fit: cover;">
                                    <p class="text-muted small mt-1 mb-0 fw-medium" id="editFileName{{ $council->id }}"></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-save me-2"></i> Update Council
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteCouncilModal{{ $council->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 rounded-4 shadow-lg text-center overflow-hidden">
            <div class="modal-body p-4">
                <div class="bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                    style="width: 60px; height: 60px;">
                    <i class="fa fa-trash-alt text-danger fs-4"></i>
                </div>
                <h5 class="fw-bold mb-2">Delete Council Member?</h5>
                <p class="text-muted small mb-0">Are you sure you want to delete
                    <strong>{{ $council->heading }}</strong>? This cannot be undone.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center px-4 pb-4 pt-0 gap-2">
                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.council.delete', $council->id) }}" method="POST">
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
    // Add modal image preview
    const addUploadArea = document.getElementById('addUploadArea');
    const addImageInput = document.getElementById('addImageInput');

    addUploadArea.addEventListener('click', () => addImageInput.click());
    addImageInput.addEventListener('change', (e) => {
        if (e.target.files.length) showAddPreview(e.target.files[0]);
    });

    function showAddPreview(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            document.getElementById('addPreviewImg').src = e.target.result;
            document.getElementById('addFileName').textContent = file.name;
            document.getElementById('addPlaceholder').classList.add('d-none');
            document.getElementById('addPreviewDiv').classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }

    // Edit modal image preview (per row)
    @foreach ($councils as $council)
    (function(id) {
        const area  = document.getElementById('editUploadArea' + id);
        const input = document.getElementById('editImageInput' + id);
        if (area && input) {
            area.addEventListener('click', () => input.click());
            input.addEventListener('change', (e) => {
                if (e.target.files.length) {
                    const reader = new FileReader();
                    reader.onload = (ev) => {
                        document.getElementById('editPreviewImg' + id).src = ev.target.result;
                        document.getElementById('editFileName' + id).textContent = e.target.files[0].name;
                        document.getElementById('editPlaceholder' + id).classList.add('d-none');
                        document.getElementById('editPreviewDiv' + id).classList.remove('d-none');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }
    })({{ $council->id }});
    @endforeach

    // Auto-open add modal on validation errors
    @if ($errors->any())
    document.addEventListener('DOMContentLoaded', function () {
        var modal = new bootstrap.Modal(document.getElementById('addCouncilModal'));
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