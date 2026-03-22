@extends('admin.layout.main')

@section('title', 'Gallery')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h3 class="fw-bold mb-1">Gallery</h3>
            <p class="text-muted">Manage photo galleries and albums.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal"
                data-bs-target="#addGalleryModal">
                <i class="fa fa-plus me-2"></i> Add Gallery
            </button>
        </div>
    </div>

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 rounded-4 shadow-sm mb-4" role="alert"
            style="background: rgba(16, 185, 129, 0.1); color: #065f46;">
            <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Gallery Grid --}}
    @if ($galleries->count())
        <div class="row g-4">
            @foreach ($galleries as $gallery)
                <div class="col-md-6 col-lg-4">
                    <div class="premium-card overflow-hidden h-100"
                        style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div class="position-relative" style="cursor: pointer;" data-bs-toggle="modal"
                            data-bs-target="#viewGalleryModal{{ $gallery->id }}">
                            @if ($gallery->images->first())
                                <img src="{{ asset('storage/' . $gallery->images->first()->image) }}" class="w-100"
                                    style="height: 200px; object-fit: cover;" alt="{{ $gallery->name }}">
                            @else
                                <div class="w-100 d-flex align-items-center justify-content-center bg-light"
                                    style="height: 200px;">
                                    <i class="fa fa-images text-muted" style="font-size: 2.5rem; opacity: 0.3;"></i>
                                </div>
                            @endif
                            <div class="position-absolute bottom-0 start-0 w-100 p-3"
                                style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                                <span class="badge bg-white bg-opacity-25 text-white rounded-pill px-3 py-1 small">
                                    <i class="fa fa-images me-1"></i> {{ $gallery->images_count }}
                                    {{ Str::plural('photo', $gallery->images_count) }}
                                </span>
                                @if ($gallery->category)
                                    <span class="badge bg-primary bg-opacity-75 text-white rounded-pill px-3 py-1 small ms-1">
                                        <i class="fa fa-folder me-1"></i> {{ $gallery->category->name }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fw-bold mb-1">{{ $gallery->name }}</h6>
                                <p class="text-muted small mb-1">{{ $gallery->short_description }}</p>
                                <div class="d-flex align-items-center gap-2">
                                    @if ($gallery->category)
                                        <span class="badge bg-light text-muted rounded-pill px-2" style="font-size: 10px;">
                                            {{ $gallery->category->name }}
                                        </span>
                                    @else
                                        <span class="badge bg-light text-muted rounded-pill px-2" style="font-size: 10px;">
                                            Uncategorized
                                        </span>
                                    @endif
                                    <span class="text-muted small">{{ $gallery->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;"
                                    title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editGalleryModal{{ $gallery->id }}">
                                    <i class="fa fa-pen small text-muted"></i>
                                </button>
                                <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;"
                                    title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteGalleryModal{{ $gallery->id }}">
                                    <i class="fa fa-trash small text-danger"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if ($galleries->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3">
                <p class="text-muted small mb-0">Showing {{ $galleries->firstItem() }} to {{ $galleries->lastItem() }} of
                    {{ $galleries->total() }} galleries</p>
                {{ $galleries->links() }}
            </div>
        @endif
    @else
        <div class="premium-card p-5 text-center">
            <div class="py-4">
                <i class="fa fa-images text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                <p class="text-muted fw-medium mt-3 mb-1">No galleries found</p>
                <p class="text-muted small">Click "Add Gallery" to create your first gallery.</p>
            </div>
        </div>
    @endif

    {{-- ========================================== --}}
    {{-- MODALS                                     --}}
    {{-- ========================================== --}}

    {{-- Add Gallery Modal --}}
    <div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="addGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                <div class="modal-header border-0 px-4 pt-4 pb-0">
                    <div>
                        <h5 class="modal-title fw-bold" id="addGalleryModalLabel">Create New Gallery</h5>
                        <p class="text-muted small mb-0">Add a gallery with a name and photos.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row g-4">

                            <div class="col-md-12">
                                <label class="form-label fw-medium small text-muted">Gallery Name <span class="text-danger">*</span></label>
                                <div class="input-group bg-light rounded-3 border">
                                    <span class="input-group-text bg-transparent border-0"><i class="fa fa-folder text-muted small"></i></span>
                                    <input type="text" class="form-control bg-transparent border-0 py-2" name="name"
                                        placeholder="e.g. Annual Day 2026" value="{{ old('name') }}" required>
                                </div>
                                @error('name')
                                    <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-medium small text-muted">Category <span class="text-danger">*</span></label>
                                <div class="input-group bg-light rounded-3 border">
                                    <span class="input-group-text bg-transparent border-0"><i class="fa fa-tag text-muted small"></i></span>
                                    <select class="form-select bg-transparent border-0 py-2" name="category_id" required>
                                        <option value="" disabled selected>Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-medium small text-muted">Short Description <span class="text-danger">*</span></label>
                                <div class="input-group bg-light rounded-3 border">
                                    <span class="input-group-text bg-transparent border-0"><i class="fa fa-align-left text-muted small"></i></span>
                                    <input type="text" class="form-control bg-transparent border-0 py-2" name="short_description"
                                        placeholder="e.g. Highlights from Annual Day" value="{{ old('short_description') }}" required>
                                </div>
                                @error('short_description')
                                    <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-medium small text-muted">Gallery Photos <span class="text-danger">*</span></label>
                                <div class="upload-area p-4 rounded-4 text-center" id="addUploadArea"
                                    style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                    <input type="file" name="images[]" id="addImagesInput" class="d-none" accept="image/*" multiple required>
                                    <div id="addPlaceholder">
                                        <i class="fa fa-cloud-upload-alt text-muted mb-2" style="font-size: 2rem; opacity: 0.5;"></i>
                                        <p class="text-muted small mb-0 fw-medium">Click to upload gallery photos</p>
                                        <p class="text-muted small mb-0" style="font-size: 11px;">Select multiple images (JPEG, PNG, JPG, WEBP)</p>
                                    </div>
                                    <div id="addPreviewDiv" class="d-none">
                                        <div id="addPreviewGrid" class="d-flex flex-wrap gap-2 justify-content-center"></div>
                                        <p class="text-muted small mt-2 mb-0 fw-medium" id="addFileCount"></p>
                                    </div>
                                </div>
                                @error('images')
                                    <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                @enderror
                                @error('images.*')
                                    <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer border-0 px-4 pb-4 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                            <i class="fa fa-plus me-2"></i> Create Gallery
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Per-gallery Modals --}}
    @foreach ($galleries as $gallery)

        {{-- View Gallery Modal --}}
        <div class="modal fade" id="viewGalleryModal{{ $gallery->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header border-0 px-4 pt-4 pb-2">
                        <div>
                            <h5 class="modal-title fw-bold">{{ $gallery->name }}</h5>
                            <p class="text-muted small mb-0">
                                {{ $gallery->images->count() }} {{ Str::plural('photo', $gallery->images->count()) }}
                                @if ($gallery->category)
                                    · <span class="badge bg-light text-muted rounded-pill px-2">{{ $gallery->category->name }}</span>
                                @endif
                                · Created {{ $gallery->created_at->format('d M Y') }}
                            </p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        @if ($gallery->images->count())
                            <div class="row g-3">
                                @foreach ($gallery->images as $image)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <img src="{{ asset('storage/' . $image->image) }}"
                                            class="w-100 rounded-3 shadow-sm"
                                            style="height: 160px; object-fit: cover;" alt="Gallery image">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fa fa-images text-muted" style="font-size: 2rem; opacity: 0.3;"></i>
                                <p class="text-muted small mt-2 mb-0">No photos in this gallery yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Gallery Modal --}}
        <div class="modal fade" id="editGalleryModal{{ $gallery->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header border-0 px-4 pt-4 pb-0">
                        <div>
                            <h5 class="modal-title fw-bold">Edit Gallery</h5>
                            <p class="text-muted small mb-0">Update details for {{ $gallery->name }}.</p>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body p-4">
                            <div class="row g-4">

                                <div class="col-md-12">
                                    <label class="form-label fw-medium small text-muted">Gallery Name <span class="text-danger">*</span></label>
                                    <div class="input-group bg-light rounded-3 border">
                                        <span class="input-group-text bg-transparent border-0"><i class="fa fa-folder text-muted small"></i></span>
                                        <input type="text" class="form-control bg-transparent border-0 py-2"
                                            name="name" value="{{ $gallery->name }}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-medium small text-muted">Category <span class="text-danger">*</span></label>
                                    <div class="input-group bg-light rounded-3 border">
                                        <span class="input-group-text bg-transparent border-0"><i class="fa fa-tag text-muted small"></i></span>
                                        <select class="form-select bg-transparent border-0 py-2" name="category_id" required>
                                            <option value="" disabled>Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $gallery->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-medium small text-muted">Short Description <span class="text-danger">*</span></label>
                                    <div class="input-group bg-light rounded-3 border">
                                        <span class="input-group-text bg-transparent border-0"><i class="fa fa-align-left text-muted small"></i></span>
                                        <input type="text" class="form-control bg-transparent border-0 py-2"
                                            name="short_description" value="{{ $gallery->short_description }}" required>
                                    </div>
                                </div>

                                {{-- Existing Images --}}
                                @if ($gallery->images->count())
                                    <div class="col-md-12">
                                        <label class="form-label fw-medium small text-muted">Current Photos</label>
                                        <div class="d-flex flex-wrap gap-2" id="currentPhotos{{ $gallery->id }}">
                                            @foreach ($gallery->images as $image)
                                                <div class="position-relative gallery-img-wrapper" id="imgWrapper{{ $image->id }}"
                                                    style="width: 80px; height: 80px;">
                                                    <img src="{{ asset('storage/' . $image->image) }}"
                                                        class="w-100 h-100 rounded-3 shadow-sm" style="object-fit: cover;">
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm rounded-circle d-flex align-items-center justify-content-center position-absolute top-0 end-0 delete-gallery-image-btn"
                                                        style="width: 22px; height: 22px; padding: 0; font-size: 10px; margin: -6px -6px 0 0;"
                                                        title="Remove image"
                                                        data-delete-url="{{ route('admin.gallery.image.delete', $image->id) }}"
                                                        data-image-id="{{ $image->id }}">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <label class="form-label fw-medium small text-muted">Add More Photos
                                        <span class="text-muted">(Optional)</span></label>
                                    <input type="file" name="images[]" class="form-control rounded-3 py-2" accept="image/*" multiple>
                                    <p class="text-muted small mt-1 mb-0" style="font-size: 11px;">Select multiple images to add to this gallery</p>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer border-0 px-4 pb-4 pt-0">
                            <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                                <i class="fa fa-save me-2"></i> Update Gallery
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Delete Confirmation Modal --}}
        <div class="modal fade" id="deleteGalleryModal{{ $gallery->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content border-0 rounded-4 shadow-lg text-center overflow-hidden">
                    <div class="modal-body p-4">
                        <div class="bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-trash-alt text-danger fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Delete Gallery?</h5>
                        <p class="text-muted small mb-0">Are you sure you want to delete
                            <strong>{{ $gallery->name }}</strong> and all its {{ $gallery->images_count }}
                            {{ Str::plural('photo', $gallery->images_count) }}? This cannot be undone.</p>
                    </div>
                    <div class="modal-footer border-0 justify-content-center px-4 pb-4 pt-0 gap-2">
                        <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST">
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

    {{-- Hidden form for gallery image deletion --}}
    <form id="deleteGalleryImageForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // ── Add Gallery: multi-image upload preview ──────────────────
        const addUploadArea  = document.getElementById('addUploadArea');
        const addImagesInput = document.getElementById('addImagesInput');
        const addPlaceholder = document.getElementById('addPlaceholder');
        const addPreviewDiv  = document.getElementById('addPreviewDiv');
        const addPreviewGrid = document.getElementById('addPreviewGrid');
        const addFileCount   = document.getElementById('addFileCount');

        addUploadArea.addEventListener('click', () => addImagesInput.click());

        addImagesInput.addEventListener('change', function () {
            if (!this.files.length) return;
            addPreviewGrid.innerHTML = '';
            Array.from(this.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = e => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'rounded-3 shadow-sm';
                    img.style.cssText = 'width:80px;height:80px;object-fit:cover;';
                    addPreviewGrid.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
            addFileCount.textContent = this.files.length + ' ' + (this.files.length === 1 ? 'photo' : 'photos') + ' selected';
            addPlaceholder.classList.add('d-none');
            addPreviewDiv.classList.remove('d-none');
        });

        // ── Auto-open Add modal on validation errors ─────────────────
        @if ($errors->any())
            var addModal = new bootstrap.Modal(document.getElementById('addGalleryModal'));
            addModal.show();
        @endif

        // ── Delete individual gallery image (AJAX, removes DOM node) ─
        document.querySelectorAll('.delete-gallery-image-btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                if (!confirm('Remove this image?')) return;

                const url     = this.getAttribute('data-delete-url');
                const imageId = this.getAttribute('data-image-id');
                const wrapper = document.getElementById('imgWrapper' + imageId);
                const form    = document.getElementById('deleteGalleryImageForm');

                // Get CSRF token from the hidden form
                const csrf = form.querySelector('input[name="_token"]').value;

                fetch(url, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: '_token=' + encodeURIComponent(csrf) + '&_method=DELETE'
                })
                .then(res => {
                    if (res.ok || res.redirected) {
                        // Remove the thumbnail from the DOM immediately
                        if (wrapper) wrapper.remove();
                    } else {
                        alert('Failed to remove image. Please try again.');
                    }
                })
                .catch(() => alert('Network error. Please try again.'));
            });
        });

    });
</script>
@endpush

@push('styles')
<style>
    .upload-area:hover {
        border-color: #4361ee !important;
        background: rgba(67, 97, 238, 0.03);
    }
    .premium-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12) !important;
    }
    .gallery-img-wrapper:hover .btn-danger {
        opacity: 1;
    }
</style>
@endpush