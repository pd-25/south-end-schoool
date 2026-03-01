@extends('admin.layout.main')

@section('title', 'Events')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="fw-bold mb-1">Events</h3>
        <p class="text-muted">Manage school events and activities.</p>
    </div>
    <div class="col-md-4 text-md-end">
        <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addEventModal">
            <i class="fa fa-plus me-2"></i> Add Event
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

{{-- Events Table --}}
<div class="premium-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr style="border-bottom: 2px solid #f1f5f9;">
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">#</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Image</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Title</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Description</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Event Date</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Created</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $key => $event)
                <tr>
                    <td class="py-3 fw-medium">{{ $events->firstItem() + $key }}</td>
                    <td class="py-3">
                        <img src="{{ asset('storage/' . $event->image) }}" class="rounded-3 shadow-sm" width="50" height="50" style="object-fit: cover;" alt="{{ $event->title }}">
                    </td>
                    <td class="py-3">
                        <p class="mb-0 fw-bold">{{ $event->title }}</p>
                    </td>
                    <td class="py-3 text-muted" style="max-width: 300px;">
                        <p class="mb-0 text-truncate" title="{{ $event->description }}">{{ Str::limit($event->description, 80) }}</p>
                    </td>
                    <td class="py-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold">
                            {{-- @dump($event->event_date ) --}}
                            {{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('d M Y') : 'No Date Set' }}
                        </span>
                    </td>
                     <td class="py-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold">
                            {{ $event->created_at->format('d M Y') }}
                        </span>
                    </td>
                    <td class="py-3">
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;" title="Edit" data-bs-toggle="modal" data-bs-target="#editEventModal{{ $event->id }}">
                                <i class="fa fa-pen small text-muted"></i>
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteEventModal{{ $event->id }}">
                                <i class="fa fa-trash small text-danger"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="py-4">
                            <i class="fa fa-calendar-alt text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                            <p class="text-muted fw-medium mt-3 mb-1">No events found</p>
                            <p class="text-muted small">Click "Add Event" to create the first event.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($events->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top: 1px solid #f1f5f9;">
        <p class="text-muted small mb-0">Showing {{ $events->firstItem() }} to {{ $events->lastItem() }} of {{ $events->total() }} events</p>
        {{ $events->links() }}
    </div>
    @endif
</div>

{{-- ========================================== --}}
{{-- MODALS                                     --}}
{{-- ========================================== --}}

{{-- Add Event Modal --}}
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold" id="addEventModalLabel">Add New Event</h5>
                    <p class="text-muted small mb-0">Fill in the details to create a new event.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Title <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-heading text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="title" placeholder="e.g. Annual Sports Day 2026" value="{{ old('title') }}" required>
                            </div>
                            @error('title')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Event Date <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-calendar text-muted small"></i></span>
                                <input type="date" class="form-control bg-transparent border-0 py-2" name="event_date" value="{{ old('event_date') }}" required>
                            </div>
                            @error('event_date')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Description <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0 align-self-start pt-2"><i class="fa fa-align-left text-muted small"></i></span>
                                <textarea class="form-control bg-transparent border-0 py-2" name="description" rows="4" placeholder="Describe the event in detail..." required>{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Event Image <span class="text-danger">*</span></label>
                            <div class="upload-area p-4 rounded-4 text-center" id="addEventUploadArea" style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                <input type="file" name="image" id="addEventImageInput" class="d-none" accept="image/*" required>
                                <div id="addEventPlaceholder">
                                    <i class="fa fa-cloud-upload-alt text-muted mb-2" style="font-size: 2rem; opacity: 0.5;"></i>
                                    <p class="text-muted small mb-0 fw-medium">Click to upload or drag and drop</p>
                                    <p class="text-muted small mb-0" style="font-size: 11px;">JPEG, PNG, JPG, WEBP (Max 2MB)</p>
                                </div>
                                <div id="addEventPreviewDiv" class="d-none">
                                    <img id="addEventPreviewImg" src="" class="rounded-3 shadow-sm" style="max-height: 150px; object-fit: cover;">
                                    <p class="text-muted small mt-2 mb-0 fw-medium" id="addEventFileName"></p>
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
                        <i class="fa fa-plus me-2"></i> Add Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit & Delete Modals (per event, outside table) --}}
@foreach($events as $event)

{{-- Edit Event Modal --}}
<div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold">Edit Event</h5>
                    <p class="text-muted small mb-0">Update details for {{ $event->title }}.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Title <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-heading text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="title" value="{{ $event->title }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Event Date <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-calendar text-muted small"></i></span>
                                <input type="date" class="form-control bg-transparent border-0 py-2" name="event_date" value="{{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') : '' }}" required>
                            </div>
                            @error('event_date')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Description <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0 align-self-start pt-2"><i class="fa fa-align-left text-muted small"></i></span>
                                <textarea class="form-control bg-transparent border-0 py-2" name="description" rows="4" required>{{ $event->description }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Image <span class="text-muted">(Leave empty to keep current)</span></label>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset('storage/' . $event->image) }}" class="rounded-3 shadow-sm" width="80" height="60" style="object-fit: cover;">
                                <div>
                                    <p class="mb-0 small fw-medium">Current Image</p>
                                    <p class="mb-0 text-muted" style="font-size: 11px;">Upload a new one to replace</p>
                                </div>
                            </div>
                            <input type="file" name="image" class="form-control rounded-3 py-2" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-save me-2"></i> Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteEventModal{{ $event->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 rounded-4 shadow-lg text-center overflow-hidden">
            <div class="modal-body p-4">
                <div class="bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-trash-alt text-danger fs-4"></i>
                </div>
                <h5 class="fw-bold mb-2">Delete Event?</h5>
                <p class="text-muted small mb-0">Are you sure you want to delete <strong>{{ $event->title }}</strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center px-4 pb-4 pt-0 gap-2">
                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.events.delete', $event->id) }}" method="POST">
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
    const addEventUploadArea = document.getElementById('addEventUploadArea');
    const addEventImageInput = document.getElementById('addEventImageInput');
    const addEventPlaceholder = document.getElementById('addEventPlaceholder');
    const addEventPreviewDiv = document.getElementById('addEventPreviewDiv');
    const addEventPreviewImg = document.getElementById('addEventPreviewImg');
    const addEventFileName = document.getElementById('addEventFileName');

    addEventUploadArea.addEventListener('click', () => addEventImageInput.click());

    addEventUploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        addEventUploadArea.style.borderColor = '#4361ee';
        addEventUploadArea.style.background = 'rgba(67, 97, 238, 0.05)';
    });

    addEventUploadArea.addEventListener('dragleave', () => {
        addEventUploadArea.style.borderColor = '#d1d5db';
        addEventUploadArea.style.background = 'transparent';
    });

    addEventUploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        addEventUploadArea.style.borderColor = '#d1d5db';
        addEventUploadArea.style.background = 'transparent';
        if (e.dataTransfer.files.length) {
            addEventImageInput.files = e.dataTransfer.files;
            showEventPreview(e.dataTransfer.files[0]);
        }
    });

    addEventImageInput.addEventListener('change', (e) => {
        if (e.target.files.length) showEventPreview(e.target.files[0]);
    });

    function showEventPreview(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            addEventPreviewImg.src = e.target.result;
            addEventFileName.textContent = file.name;
            addEventPlaceholder.classList.add('d-none');
            addEventPreviewDiv.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }

    // Auto-open modal if validation errors exist
    @if($errors->any())
    document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('addEventModal'));
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
