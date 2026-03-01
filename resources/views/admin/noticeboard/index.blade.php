@extends('admin.layout.main')

@section('title', 'Notice Board')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="fw-bold mb-1">Notice Board</h3>
        <p class="text-muted">Manage all notices, circulars and announcements.</p>
    </div>
    <div class="col-md-4 text-md-end">
        <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addNoticeModal">
            <i class="fa fa-plus me-2"></i> Add Notice
        </button>
    </div>
</div>

{{-- Success Alert --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show border-0 rounded-4 shadow-sm mb-4" role="alert" style="background: rgba(16, 185, 129, 0.1); color: #065f46;">
    <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- Notice Board Table --}}
<div class="premium-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr style="border-bottom: 2px solid #f1f5f9;">
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">#</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Image</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Title</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Description</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">PDF</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Date</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notices as $key => $notice)
                <tr>
                    <td class="py-3 fw-medium">{{ $notices->firstItem() + $key }}</td>
                    <td class="py-3">
                        <img src="{{ asset('storage/' . $notice->image) }}" class="rounded-3 shadow-sm" width="50" height="50" style="object-fit: cover;" alt="{{ $notice->title }}">
                    </td>
                    <td class="py-3">
                        <p class="mb-0 fw-bold">{{ $notice->title }}</p>
                    </td>
                    <td class="py-3 text-muted" style="max-width: 250px;">
                        <p class="mb-0 text-truncate" title="{{ $notice->small_desc }}">{{ Str::limit($notice->small_desc, 60) }}</p>
                    </td>
                    <td class="py-3">
                        @if($notice->pdf)
                        <a href="{{ asset('storage/' . $notice->pdf) }}" target="_blank" class="btn btn-sm btn-light rounded-pill px-3 py-1 fw-medium shadow-sm">
                            <i class="fa fa-file-pdf text-danger me-1"></i> View
                        </a>
                        @else
                        <span class="text-muted small">—</span>
                        @endif
                    </td>
                    <td class="py-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold">
                            {{ \Carbon\Carbon::parse($notice->date)->format('d M Y') }}
                        </span>
                    </td>
                    <td class="py-3">
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;" title="Edit" data-bs-toggle="modal" data-bs-target="#editNoticeModal{{ $notice->id }}">
                                <i class="fa fa-pen small text-muted"></i>
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteNoticeModal{{ $notice->id }}">
                                <i class="fa fa-trash small text-danger"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <div class="py-4">
                            <i class="fa fa-envelope-open-text text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                            <p class="text-muted fw-medium mt-3 mb-1">No notices found</p>
                            <p class="text-muted small">Click "Add Notice" to create the first notice.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($notices->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top: 1px solid #f1f5f9;">
        <p class="text-muted small mb-0">Showing {{ $notices->firstItem() }} to {{ $notices->lastItem() }} of {{ $notices->total() }} notices</p>
        {{ $notices->links() }}
    </div>
    @endif
</div>

{{-- ========================================== --}}
{{-- MODALS                                     --}}
{{-- ========================================== --}}

{{-- Add Notice Modal --}}
<div class="modal fade" id="addNoticeModal" tabindex="-1" aria-labelledby="addNoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold" id="addNoticeModalLabel">Add New Notice</h5>
                    <p class="text-muted small mb-0">Fill in the details to create a new notice.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.noticeboard.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-8">
                            <label class="form-label fw-medium small text-muted">Title <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-heading text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="title" placeholder="e.g. Annual Day Notice" value="{{ old('title') }}" required>
                            </div>
                            @error('title')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-medium small text-muted">Date <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-calendar text-muted small"></i></span>
                                <input type="datetime-local" class="form-control bg-transparent border-0 py-2" name="date" value="{{ old('date') }}" required>
                            </div>
                            @error('date')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Short Description <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0 align-self-start pt-2"><i class="fa fa-align-left text-muted small"></i></span>
                                <textarea class="form-control bg-transparent border-0 py-2" name="small_desc" rows="3" placeholder="Brief description of the notice..." required>{{ old('small_desc') }}</textarea>
                            </div>
                            @error('small_desc')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Image <span class="text-danger">*</span></label>
                            <div class="upload-area p-4 rounded-4 text-center" id="addImageUploadArea" style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                <input type="file" name="image" id="addImageInput" class="d-none" accept="image/*" required>
                                <div id="addImagePlaceholder">
                                    <i class="fa fa-image text-muted mb-2" style="font-size: 2rem; opacity: 0.5;"></i>
                                    <p class="text-muted small mb-0 fw-medium">Click to upload image</p>
                                    <p class="text-muted small mb-0" style="font-size: 11px;">JPEG, PNG, JPG, WEBP (Max 2MB)</p>
                                </div>
                                <div id="addImagePreviewDiv" class="d-none">
                                    <img id="addImagePreviewImg" src="" class="rounded-3 shadow-sm" style="max-height: 120px; object-fit: cover;">
                                    <p class="text-muted small mt-2 mb-0 fw-medium" id="addImageFileName"></p>
                                </div>
                            </div>
                            @error('image')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">PDF Attachment <span class="text-danger">*</span></label>
                            <div class="upload-area p-4 rounded-4 text-center" id="addPdfUploadArea" style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                <input type="file" name="pdf" id="addPdfInput" class="d-none" accept=".pdf" required>
                                <div id="addPdfPlaceholder">
                                    <i class="fa fa-file-pdf text-muted mb-2" style="font-size: 2rem; opacity: 0.5;"></i>
                                    <p class="text-muted small mb-0 fw-medium">Click to upload PDF</p>
                                    <p class="text-muted small mb-0" style="font-size: 11px;">PDF files only (Max 5MB)</p>
                                </div>
                                <div id="addPdfPreviewDiv" class="d-none">
                                    <i class="fa fa-file-pdf text-danger mb-2" style="font-size: 2rem;"></i>
                                    <p class="text-muted small mt-1 mb-0 fw-medium" id="addPdfFileName"></p>
                                </div>
                            </div>
                            @error('pdf')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-plus me-2"></i> Add Notice
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit & Delete Modals (per notice, outside table) --}}
@foreach($notices as $notice)

{{-- Edit Notice Modal --}}
<div class="modal fade" id="editNoticeModal{{ $notice->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold">Edit Notice</h5>
                    <p class="text-muted small mb-0">Update details for {{ $notice->title }}.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.noticeboard.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-8">
                            <label class="form-label fw-medium small text-muted">Title <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-heading text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="title" value="{{ $notice->title }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-medium small text-muted">Date <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-calendar text-muted small"></i></span>
                                <input type="datetime-local" class="form-control bg-transparent border-0 py-2" name="date" value="{{ \Carbon\Carbon::parse($notice->date)->format('Y-m-d\TH:i') }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Short Description <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0 align-self-start pt-2"><i class="fa fa-align-left text-muted small"></i></span>
                                <textarea class="form-control bg-transparent border-0 py-2" name="small_desc" rows="3" required>{{ $notice->small_desc }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Image <span class="text-muted">(Leave empty to keep current)</span></label>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset('storage/' . $notice->image) }}" class="rounded-3 shadow-sm" width="60" height="60" style="object-fit: cover;">
                                <div>
                                    <p class="mb-0 small fw-medium">Current Image</p>
                                    <p class="mb-0 text-muted" style="font-size: 11px;">Upload a new one to replace</p>
                                </div>
                            </div>
                            <input type="file" name="image" class="form-control rounded-3 py-2" accept="image/*">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">PDF <span class="text-muted">(Leave empty to keep current)</span></label>
                            @if($notice->pdf)
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="bg-danger bg-opacity-10 d-flex align-items-center justify-content-center rounded-3" style="width: 60px; height: 60px;">
                                    <i class="fa fa-file-pdf text-danger fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 small fw-medium">Current PDF</p>
                                    <a href="{{ asset('storage/' . $notice->pdf) }}" target="_blank" class="text-primary" style="font-size: 11px;">View current file</a>
                                </div>
                            </div>
                            @endif
                            <input type="file" name="pdf" class="form-control rounded-3 py-2" accept=".pdf">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-save me-2"></i> Update Notice
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteNoticeModal{{ $notice->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 rounded-4 shadow-lg text-center overflow-hidden">
            <div class="modal-body p-4">
                <div class="bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-trash-alt text-danger fs-4"></i>
                </div>
                <h5 class="fw-bold mb-2">Delete Notice?</h5>
                <p class="text-muted small mb-0">Are you sure you want to delete <strong>{{ $notice->title }}</strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center px-4 pb-4 pt-0 gap-2">
                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.noticeboard.delete', $notice->id) }}" method="POST">
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
    // Image upload preview for Add Modal
    const addImageUploadArea = document.getElementById('addImageUploadArea');
    const addImageInput = document.getElementById('addImageInput');
    const addImagePlaceholder = document.getElementById('addImagePlaceholder');
    const addImagePreviewDiv = document.getElementById('addImagePreviewDiv');
    const addImagePreviewImg = document.getElementById('addImagePreviewImg');
    const addImageFileName = document.getElementById('addImageFileName');

    addImageUploadArea.addEventListener('click', () => addImageInput.click());
    addImageUploadArea.addEventListener('dragover', (e) => { e.preventDefault(); addImageUploadArea.style.borderColor = '#4361ee'; addImageUploadArea.style.background = 'rgba(67,97,238,0.05)'; });
    addImageUploadArea.addEventListener('dragleave', () => { addImageUploadArea.style.borderColor = '#d1d5db'; addImageUploadArea.style.background = 'transparent'; });
    addImageUploadArea.addEventListener('drop', (e) => { e.preventDefault(); addImageUploadArea.style.borderColor = '#d1d5db'; addImageUploadArea.style.background = 'transparent'; if (e.dataTransfer.files.length) { addImageInput.files = e.dataTransfer.files; showAddImagePreview(e.dataTransfer.files[0]); } });
    addImageInput.addEventListener('change', (e) => { if (e.target.files.length) showAddImagePreview(e.target.files[0]); });

    function showAddImagePreview(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            addImagePreviewImg.src = e.target.result;
            addImageFileName.textContent = file.name;
            addImagePlaceholder.classList.add('d-none');
            addImagePreviewDiv.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }

    // PDF upload preview for Add Modal
    const addPdfUploadArea = document.getElementById('addPdfUploadArea');
    const addPdfInput = document.getElementById('addPdfInput');
    const addPdfPlaceholder = document.getElementById('addPdfPlaceholder');
    const addPdfPreviewDiv = document.getElementById('addPdfPreviewDiv');
    const addPdfFileName = document.getElementById('addPdfFileName');

    addPdfUploadArea.addEventListener('click', () => addPdfInput.click());
    addPdfUploadArea.addEventListener('dragover', (e) => { e.preventDefault(); addPdfUploadArea.style.borderColor = '#4361ee'; addPdfUploadArea.style.background = 'rgba(67,97,238,0.05)'; });
    addPdfUploadArea.addEventListener('dragleave', () => { addPdfUploadArea.style.borderColor = '#d1d5db'; addPdfUploadArea.style.background = 'transparent'; });
    addPdfUploadArea.addEventListener('drop', (e) => { e.preventDefault(); addPdfUploadArea.style.borderColor = '#d1d5db'; addPdfUploadArea.style.background = 'transparent'; if (e.dataTransfer.files.length) { addPdfInput.files = e.dataTransfer.files; showAddPdfPreview(e.dataTransfer.files[0]); } });
    addPdfInput.addEventListener('change', (e) => { if (e.target.files.length) showAddPdfPreview(e.target.files[0]); });

    function showAddPdfPreview(file) {
        addPdfFileName.textContent = file.name;
        addPdfPlaceholder.classList.add('d-none');
        addPdfPreviewDiv.classList.remove('d-none');
    }

    // Auto-open modal if validation errors exist
    @if($errors->any())
    document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('addNoticeModal'));
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
