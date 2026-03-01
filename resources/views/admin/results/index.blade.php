@extends('admin.layout.main')

@section('title', 'Results')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="fw-bold mb-1">Results</h3>
        <p class="text-muted">Manage examination results and mark sheets.</p>
    </div>
    <div class="col-md-4 text-md-end">
        <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addResultModal">
            <i class="fa fa-plus me-2"></i> Add Result
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

{{-- Results Table --}}
<div class="premium-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr style="border-bottom: 2px solid #f1f5f9;">
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">#</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Title</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">PDF</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Uploaded</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($results as $key => $result)
                <tr>
                    <td class="py-3 fw-medium">{{ $results->firstItem() + $key }}</td>
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success bg-opacity-10 d-flex align-items-center justify-content-center rounded-3" style="width: 42px; height: 42px; min-width: 42px;">
                                <i class="fa fa-poll text-success"></i>
                            </div>
                            <p class="mb-0 fw-bold">{{ $result->title }}</p>
                        </div>
                    </td>
                    <td class="py-3">
                        <a href="{{ asset('storage/' . $result->pdf) }}" target="_blank" class="btn btn-sm btn-light rounded-pill px-3 py-1 fw-medium shadow-sm">
                            <i class="fa fa-file-pdf text-danger me-1"></i> View PDF
                        </a>
                    </td>
                    <td class="py-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold">
                            {{ $result->created_at->format('d M Y') }}
                        </span>
                    </td>
                    <td class="py-3">
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;" title="Edit" data-bs-toggle="modal" data-bs-target="#editResultModal{{ $result->id }}">
                                <i class="fa fa-pen small text-muted"></i>
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteResultModal{{ $result->id }}">
                                <i class="fa fa-trash small text-danger"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <div class="py-4">
                            <i class="fa fa-poll text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                            <p class="text-muted fw-medium mt-3 mb-1">No results found</p>
                            <p class="text-muted small">Click "Add Result" to upload the first result.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($results->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top: 1px solid #f1f5f9;">
        <p class="text-muted small mb-0">Showing {{ $results->firstItem() }} to {{ $results->lastItem() }} of {{ $results->total() }} results</p>
        {{ $results->links() }}
    </div>
    @endif
</div>

{{-- ========================================== --}}
{{-- MODALS                                     --}}
{{-- ========================================== --}}

{{-- Add Result Modal --}}
<div class="modal fade" id="addResultModal" tabindex="-1" aria-labelledby="addResultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold" id="addResultModalLabel">Add New Result</h5>
                    <p class="text-muted small mb-0">Upload a result document with a title.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.results.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Title <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-poll text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="title" placeholder="e.g. Class 10 Annual Exam 2026" value="{{ old('title') }}" required>
                            </div>
                            @error('title')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">PDF Document <span class="text-danger">*</span></label>
                            <div class="upload-area p-4 rounded-4 text-center" id="addResultPdfArea" style="border: 2px dashed #d1d5db; cursor: pointer; transition: all 0.3s ease;">
                                <input type="file" name="pdf" id="addResultPdfInput" class="d-none" accept=".pdf" required>
                                <div id="addResultPdfPlaceholder">
                                    <i class="fa fa-file-pdf text-muted mb-2" style="font-size: 2rem; opacity: 0.5;"></i>
                                    <p class="text-muted small mb-0 fw-medium">Click to upload PDF</p>
                                    <p class="text-muted small mb-0" style="font-size: 11px;">PDF files only (Max 10MB)</p>
                                </div>
                                <div id="addResultPdfPreview" class="d-none">
                                    <i class="fa fa-file-pdf text-danger mb-2" style="font-size: 2rem;"></i>
                                    <p class="text-muted small mt-1 mb-0 fw-medium" id="addResultPdfName"></p>
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
                        <i class="fa fa-plus me-2"></i> Add Result
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit & Delete Modals (per result, outside table) --}}
@foreach($results as $result)

{{-- Edit Result Modal --}}
<div class="modal fade" id="editResultModal{{ $result->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold">Edit Result</h5>
                    <p class="text-muted small mb-0">Update details for {{ $result->title }}.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.results.update', $result->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Title <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-poll text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="title" value="{{ $result->title }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">PDF <span class="text-muted">(Leave empty to keep current)</span></label>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="bg-danger bg-opacity-10 d-flex align-items-center justify-content-center rounded-3" style="width: 50px; height: 50px;">
                                    <i class="fa fa-file-pdf text-danger fs-5"></i>
                                </div>
                                <div>
                                    <p class="mb-0 small fw-medium">Current PDF</p>
                                    <a href="{{ asset('storage/' . $result->pdf) }}" target="_blank" class="text-primary" style="font-size: 11px;">View current file</a>
                                </div>
                            </div>
                            <input type="file" name="pdf" class="form-control rounded-3 py-2" accept=".pdf">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-save me-2"></i> Update Result
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteResultModal{{ $result->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 rounded-4 shadow-lg text-center overflow-hidden">
            <div class="modal-body p-4">
                <div class="bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-trash-alt text-danger fs-4"></i>
                </div>
                <h5 class="fw-bold mb-2">Delete Result?</h5>
                <p class="text-muted small mb-0">Are you sure you want to delete <strong>{{ $result->title }}</strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center px-4 pb-4 pt-0 gap-2">
                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.results.delete', $result->id) }}" method="POST">
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
    // PDF upload preview for Add Modal
    const addResultPdfArea = document.getElementById('addResultPdfArea');
    const addResultPdfInput = document.getElementById('addResultPdfInput');
    const addResultPdfPlaceholder = document.getElementById('addResultPdfPlaceholder');
    const addResultPdfPreview = document.getElementById('addResultPdfPreview');
    const addResultPdfName = document.getElementById('addResultPdfName');

    addResultPdfArea.addEventListener('click', () => addResultPdfInput.click());

    addResultPdfArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        addResultPdfArea.style.borderColor = '#4361ee';
        addResultPdfArea.style.background = 'rgba(67, 97, 238, 0.05)';
    });

    addResultPdfArea.addEventListener('dragleave', () => {
        addResultPdfArea.style.borderColor = '#d1d5db';
        addResultPdfArea.style.background = 'transparent';
    });

    addResultPdfArea.addEventListener('drop', (e) => {
        e.preventDefault();
        addResultPdfArea.style.borderColor = '#d1d5db';
        addResultPdfArea.style.background = 'transparent';
        if (e.dataTransfer.files.length) {
            addResultPdfInput.files = e.dataTransfer.files;
            showResultPdfPreview(e.dataTransfer.files[0]);
        }
    });

    addResultPdfInput.addEventListener('change', (e) => {
        if (e.target.files.length) showResultPdfPreview(e.target.files[0]);
    });

    function showResultPdfPreview(file) {
        addResultPdfName.textContent = file.name;
        addResultPdfPlaceholder.classList.add('d-none');
        addResultPdfPreview.classList.remove('d-none');
    }

    // Auto-open modal if validation errors exist
    @if($errors->any())
    document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('addResultModal'));
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
