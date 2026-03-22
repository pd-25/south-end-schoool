@extends('admin.layout.main')

@section('title', 'Teachers')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="fw-bold mb-1">Teachers</h3>
        <p class="text-muted">Manage all teaching staff records.</p>
    </div>
    <div class="col-md-4 text-md-end">
        <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
            <i class="fa fa-plus me-2"></i> Add Teacher
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

{{-- Teachers Table --}}
<div class="premium-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr style="border-bottom: 2px solid #f1f5f9;">
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">#</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Photo</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Name</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Category</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Designation</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Qualification</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Experience</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $key => $teacher)
                <tr>
                    <td class="py-3 fw-medium">{{ $teachers->firstItem() + $key }}</td>
                    <td class="py-3">
                        <img src="{{ asset('storage/' . $teacher->photo) }}" class="rounded-circle shadow-sm" width="45" height="45" style="object-fit: cover;" alt="{{ $teacher->name }}">
                    </td>
                    <td class="py-3">
                        <p class="mb-0 fw-bold">{{ $teacher->name }}</p>
                    </td>
                    <td class="py-3">
                        @php
                            $categoryColors = [
                                'teacher'          => 'success',
                                'librarian'        => 'warning',
                                'office-assistant' => 'info',
                            ];
                            $color = $categoryColors[$teacher->category] ?? 'secondary';
                        @endphp
                        <span class="badge bg-{{ $color }} bg-opacity-10 text-{{ $color }} rounded-pill px-3 py-2 fw-bold" style="text-transform: capitalize;">
                            {{ ucwords(str_replace('-', ' ', $teacher->category ?? '—')) }}
                        </span>
                    </td>
                    <td class="py-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold">{{ $teacher->designation }}</span>
                    </td>
                    <td class="py-3 text-muted">{{ $teacher->qualification }}</td>
                    <td class="py-3 text-muted">{{ $teacher->experience }}</td>
                    <td class="py-3">
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;" title="Edit" data-bs-toggle="modal" data-bs-target="#editTeacherModal{{ $teacher->id }}">
                                <i class="fa fa-pen small text-muted"></i>
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteTeacherModal{{ $teacher->id }}">
                                <i class="fa fa-trash small text-danger"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-5">
                        <div class="py-4">
                            <i class="fa fa-user-tie text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                            <p class="text-muted fw-medium mt-3 mb-1">No teachers found</p>
                            <p class="text-muted small">Click "Add Teacher" to add the first teacher record.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($teachers->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top: 1px solid #f1f5f9;">
        <p class="text-muted small mb-0">Showing {{ $teachers->firstItem() }} to {{ $teachers->lastItem() }} of {{ $teachers->total() }} teachers</p>
        {{ $teachers->links() }}
    </div>
    @endif
</div>

{{-- ========================================== --}}
{{-- MODALS                                     --}}
{{-- ========================================== --}}

{{-- Add Teacher Modal --}}
<div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold" id="addTeacherModalLabel">Add New Teacher</h5>
                    <p class="text-muted small mb-0">Fill in the details to add a new staff member.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Full Name <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-user text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="name" placeholder="e.g. Dr. John Smith" value="{{ old('name') }}" required>
                            </div>
                            @error('name')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Category <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-tag text-muted small"></i></span>
                                <select class="form-select bg-transparent border-0 py-2" name="category" required>
                                    <option value="" disabled {{ old('category') ? '' : 'selected' }}>Select category</option>
                                    <option value="teacher"          {{ old('category') == 'teacher'          ? 'selected' : '' }}>Teacher</option>
                                    <option value="librarian"        {{ old('category') == 'librarian'        ? 'selected' : '' }}>Librarian</option>
                                    <option value="office-assistant" {{ old('category') == 'office-assistant' ? 'selected' : '' }}>Office Assistant</option>
                                </select>
                            </div>
                            @error('category')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Designation <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-briefcase text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="designation" placeholder="e.g. Senior Teacher" value="{{ old('designation') }}" required>
                            </div>
                            @error('designation')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Qualification <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-graduation-cap text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="qualification" placeholder="e.g. M.Sc, B.Ed" value="{{ old('qualification') }}" required>
                            </div>
                            @error('qualification')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Experience <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-clock text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="experience" placeholder="e.g. 10 Years" value="{{ old('experience') }}" required>
                            </div>
                            @error('experience')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Photo <span class="text-danger">*</span></label>
                            <div class="upload-area p-4 rounded-4 text-center" id="uploadArea" style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                <input type="file" name="photo" id="photoInput" class="d-none" accept="image/*" required>
                                <div id="uploadPlaceholder">
                                    <i class="fa fa-cloud-upload-alt text-muted mb-2" style="font-size: 2rem; opacity: 0.5;"></i>
                                    <p class="text-muted small mb-0 fw-medium">Click to upload or drag and drop</p>
                                    <p class="text-muted small mb-0" style="font-size: 11px;">JPEG, PNG, JPG, WEBP (Max 2MB)</p>
                                </div>
                                <div id="uploadPreview" class="d-none">
                                    <img id="previewImg" src="" class="rounded-3 shadow-sm" style="max-height: 150px; object-fit: cover;">
                                    <p class="text-muted small mt-2 mb-0 fw-medium" id="fileName"></p>
                                </div>
                            </div>
                            @error('photo')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-plus me-2"></i> Add Teacher
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit & Delete Modals (per teacher) --}}
@foreach($teachers as $teacher)

{{-- Edit Teacher Modal --}}
<div class="modal fade" id="editTeacherModal{{ $teacher->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold">Edit Teacher</h5>
                    <p class="text-muted small mb-0">Update the details for {{ $teacher->name }}.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Full Name <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-user text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="name" value="{{ $teacher->name }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Category <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-tag text-muted small"></i></span>
                                <select class="form-select bg-transparent border-0 py-2" name="category" required>
                                    <option value="" disabled>Select category</option>
                                    <option value="teacher"          {{ $teacher->category == 'teacher'          ? 'selected' : '' }}>Teacher</option>
                                    <option value="librarian"        {{ $teacher->category == 'librarian'        ? 'selected' : '' }}>Librarian</option>
                                    <option value="office-assistant" {{ $teacher->category == 'office-assistant' ? 'selected' : '' }}>Office Assistant</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Designation <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-briefcase text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="designation" value="{{ $teacher->designation }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Qualification <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-graduation-cap text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="qualification" value="{{ $teacher->qualification }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-medium small text-muted">Experience <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-clock text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="experience" value="{{ $teacher->experience }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Photo <span class="text-muted">(Leave empty to keep current)</span></label>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="{{ asset('storage/' . $teacher->photo) }}" class="rounded-3 shadow-sm" width="60" height="60" style="object-fit: cover;">
                                <div>
                                    <p class="mb-0 small fw-medium">Current Photo</p>
                                    <p class="mb-0 text-muted" style="font-size: 11px;">Upload a new one to replace</p>
                                </div>
                            </div>
                            <input type="file" name="photo" class="form-control rounded-3 py-2" accept="image/*">
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-save me-2"></i> Update Teacher
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteTeacherModal{{ $teacher->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 rounded-4 shadow-lg text-center overflow-hidden">
            <div class="modal-body p-4">
                <div class="bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-trash-alt text-danger fs-4"></i>
                </div>
                <h5 class="fw-bold mb-2">Delete Teacher?</h5>
                <p class="text-muted small mb-0">Are you sure you want to delete <strong>{{ $teacher->name }}</strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center px-4 pb-4 pt-0 gap-2">
                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.teachers.delete', $teacher->id) }}" method="POST">
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
    document.addEventListener('DOMContentLoaded', function () {

        // Photo upload preview for Add Modal
        const uploadArea        = document.getElementById('uploadArea');
        const photoInput        = document.getElementById('photoInput');
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');
        const uploadPreview     = document.getElementById('uploadPreview');
        const previewImg        = document.getElementById('previewImg');
        const fileName          = document.getElementById('fileName');

        uploadArea.addEventListener('click', () => photoInput.click());

        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#4361ee';
            uploadArea.style.background  = 'rgba(67, 97, 238, 0.05)';
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.style.borderColor = '#d1d5db';
            uploadArea.style.background  = 'transparent';
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#d1d5db';
            uploadArea.style.background  = 'transparent';
            const files = e.dataTransfer.files;
            if (files.length) {
                photoInput.files = files;
                showPreview(files[0]);
            }
        });

        photoInput.addEventListener('change', (e) => {
            if (e.target.files.length) showPreview(e.target.files[0]);
        });

        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                fileName.textContent = file.name;
                uploadPlaceholder.classList.add('d-none');
                uploadPreview.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        }

        // Auto-open Add modal on validation errors
        @if($errors->any())
            var modal = new bootstrap.Modal(document.getElementById('addTeacherModal'));
            modal.show();
        @endif

    });
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