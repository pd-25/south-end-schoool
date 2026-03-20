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
                            <img src="{{ asset('storage/' . $gallery->preview_image) }}" class="w-100"
                                style="height: 200px; object-fit: cover;" alt="{{ $gallery->name }}">
                            <div class="position-absolute bottom-0 start-0 w-100 p-3"
                                style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                                <span class="badge bg-white bg-opacity-25 text-white rounded-pill px-3 py-1 small">
                                    <i class="fa fa-images me-1"></i> {{ $gallery->images_count }}
                                    {{ Str::plural('photo', $gallery->images_count) }}
                                </span>
                                {{-- Category Badge --}}
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
                        <p class="text-muted small mb-0">Add a gallery with a name, preview image, and photos.</p>
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
                                    <span class="text-danger small mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Category Dropdown --}}
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
                                    <span class="text-danger small mt-1">{{ $message }}</span>
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
                                    <span class="text-danger small mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-medium small text-muted">Gallery Photos <span class="text-danger">*</span></label>
                                <div class="upload-area p-4 rounded-4 text-center" id="multiUploadArea"
                                    style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                    <input type="file" name="images[]" id="multiInput" class="d-none" accept="image/*" multiple required>
                                    <div id="multiPlaceholder">
                                        <i class="fa fa-cloud-upload-alt text-muted mb-2" style="font-size: 2rem; opacity: 0.5;"></i>
                                        <p class="text-muted small mb-0 fw-medium">Click to upload gallery photos</p>
                                        <p class="text-muted small mb-0" style="font-size: 11px;">Select multiple images (JPEG, PNG, JPG, WEBP)</p>
                                    </div>
                                    <div id="multiPreviewDiv" class="d-none">
                                        <div id="multiPreviewGrid" class="d-flex flex-wrap gap-2 justify-content-center"></div>
                                        <p class="text-muted small mt-2 mb-0 fw-medium" id="multiFileCount"></p>
                                    </div>
                                </div>
                                @error('images')
                                    <span class="text-danger small mt-1">{{ $message }}</span>
                                @enderror
                                @error('images.*')
                                    <span class="text-danger small mt-1">{{ $message }}</span>
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

                                {{-- Category Dropdown --}}
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
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach ($gallery->images as $image)
                                                <div class="position-relative" style="width: 80px; height: 80px;">
                                                    <img src="{{ asset('storage/' . $image->image) }}"
                                                        class="w-100 h-100 rounded-3 shadow-sm" style="object-fit: cover;">
                                                    <a href="#"
                                                        class="btn btn-danger btn-sm rounded-circle d-flex align-items-center justify-content-center position-absolute top-0 end-0 delete-gallery-image-btn"
                                                        style="width: 22px; height: 22px; padding: 0; font-size: 10px; margin: -6px -6px 0 0;"
                                                        title="Remove image"
                                                        data-delete-url="{{ route('admin.gallery.image.delete', $image->id) }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <label class="form-label fw-medium small text-muted">Add More Photos <span class="text-muted">(Optional)</span></label>
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
        // Preview image upload
        const previewUploadArea = document.getElementById('previewUploadArea');
        const previewInput      = document.getElementById('previewInput');
        const previewPlaceholder  = document.getElementById('previewPlaceholder');
        const previewPreviewDiv   = document.getElementById('previewPreviewDiv');
        const previewPreviewImg   = document.getElementById('previewPreviewImg');
        const previewFileName     = document.getElementById('previewFileName');

        previewUploadArea.addEventListener('click', () => previewInput.click());
        previewInput.addEventListener('change', (e) => {
            if (e.target.files.length) showSinglePreview(e.target.files[0]);
        });

        function showSinglePreview(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewPreviewImg.src = e.target.result;
                previewFileName.textContent = file.name;
                previewPlaceholder.classList.add('d-none');
                previewPreviewDiv.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        }

        // Multi image upload
        const multiUploadArea  = document.getElementById('multiUploadArea');
        const multiInput       = document.getElementById('multiInput');
        const multiPlaceholder = document.getElementById('multiPlaceholder');
        const multiPreviewDiv  = document.getElementById('multiPreviewDiv');
        const multiPreviewGrid = document.getElementById('multiPreviewGrid');
        const multiFileCount   = document.getElementById('multiFileCount');

        multiUploadArea.addEventListener('click', () => multiInput.click());
        multiInput.addEventListener('change', (e) => {
            if (e.target.files.length) showMultiPreview(e.target.files);
        });

        function showMultiPreview(files) {
            multiPreviewGrid.innerHTML = '';
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'rounded-3 shadow-sm';
                    img.style.cssText = 'width: 80px; height: 80px; object-fit: cover;';
                    multiPreviewGrid.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
            multiFileCount.textContent = files.length + ' ' + (files.length === 1 ? 'photo' : 'photos') + ' selected';
            multiPlaceholder.classList.add('d-none');
            multiPreviewDiv.classList.remove('d-none');
        }

        // Auto-open modal if validation errors exist
        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function () {
                var modal = new bootstrap.Modal(document.getElementById('addGalleryModal'));
                modal.show();
            });
        @endif

        // Gallery image delete via hidden form
        document.querySelectorAll('.delete-gallery-image-btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                if (confirm('Remove this image?')) {
                    const form = document.getElementById('deleteGalleryImageForm');
                    form.action = this.getAttribute('data-delete-url');
                    form.submit();
                }
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
    </style>
@endpush