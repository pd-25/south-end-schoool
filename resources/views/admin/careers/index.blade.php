@extends('admin.layout.main')

@section('title', 'Careers')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="fw-bold mb-1">Careers</h3>
        <p class="text-muted">Manage job openings and career opportunities.</p>
    </div>
    <div class="col-md-4 text-md-end">
        <button class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addCareerModal">
            <i class="fa fa-plus me-2"></i> Add Career
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

{{-- Careers Table --}}
<div class="premium-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr style="border-bottom: 2px solid #f1f5f9;">
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">#</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Post Name</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Openings</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Qualifications</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Posted</th>
                    <th class="text-muted small fw-bold text-uppercase py-3" style="letter-spacing: 0.5px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($careers as $key => $career)
                <tr>
                    <td class="py-3 fw-medium">{{ $careers->firstItem() + $key }}</td>
                    <td class="py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-warning bg-opacity-10 d-flex align-items-center justify-content-center rounded-3" style="width: 42px; height: 42px; min-width: 42px;">
                                <i class="fa fa-briefcase text-warning"></i>
                            </div>
                            <p class="mb-0 fw-bold">{{ $career->post_name }}</p>
                        </div>
                    </td>
                    <td class="py-3">
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 fw-bold">
                            <i class="fa fa-users me-1"></i> {{ $career->openings }}
                        </span>
                    </td>
                    <td class="py-3 text-muted" style="max-width: 250px;">
                        <p class="mb-0 text-truncate" title="{{ $career->qualifications }}">{{ Str::limit($career->qualifications, 60) }}</p>
                    </td>
                    <td class="py-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 fw-bold">
                            {{ $career->created_at->format('d M Y') }}
                        </span>
                    </td>
                    <td class="py-3">
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;" title="Edit" data-bs-toggle="modal" data-bs-target="#editCareerModal{{ $career->id }}">
                                <i class="fa fa-pen small text-muted"></i>
                            </button>
                            <button class="btn btn-sm btn-light rounded-circle" style="width: 35px; height: 35px;" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteCareerModal{{ $career->id }}">
                                <i class="fa fa-trash small text-danger"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="py-4">
                            <i class="fa fa-briefcase text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                            <p class="text-muted fw-medium mt-3 mb-1">No career openings found</p>
                            <p class="text-muted small">Click "Add Career" to create the first job opening.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($careers->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top: 1px solid #f1f5f9;">
        <p class="text-muted small mb-0">Showing {{ $careers->firstItem() }} to {{ $careers->lastItem() }} of {{ $careers->total() }} openings</p>
        {{ $careers->links() }}
    </div>
    @endif
</div>

{{-- ========================================== --}}
{{-- MODALS                                     --}}
{{-- ========================================== --}}

{{-- Add Career Modal --}}
<div class="modal fade" id="addCareerModal" tabindex="-1" aria-labelledby="addCareerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold" id="addCareerModalLabel">Add Career Opening</h5>
                    <p class="text-muted small mb-0">Fill in the details for the new job opening.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.careers.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-8">
                            <label class="form-label fw-medium small text-muted">Post Name <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-briefcase text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="post_name" placeholder="e.g. Science Teacher" value="{{ old('post_name') }}" required>
                            </div>
                            @error('post_name')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-medium small text-muted">Openings <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-users text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="openings" placeholder="e.g. 2" value="{{ old('openings') }}" required>
                            </div>
                            @error('openings')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Qualifications <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0 align-self-start pt-2"><i class="fa fa-graduation-cap text-muted small"></i></span>
                                <textarea class="form-control bg-transparent border-0 py-2" name="qualifications" rows="3" placeholder="e.g. M.Sc, B.Ed with 5 years experience" required>{{ old('qualifications') }}</textarea>
                            </div>
                            @error('qualifications')
                            <span class="text-danger small mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-plus me-2"></i> Add Career
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit & Delete Modals (per career) --}}
@foreach($careers as $career)

{{-- Edit Career Modal --}}
<div class="modal fade" id="editCareerModal{{ $career->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-header border-0 px-4 pt-4 pb-0">
                <div>
                    <h5 class="modal-title fw-bold">Edit Career</h5>
                    <p class="text-muted small mb-0">Update details for {{ $career->post_name }}.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.careers.update', $career->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-8">
                            <label class="form-label fw-medium small text-muted">Post Name <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-briefcase text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="post_name" value="{{ $career->post_name }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-medium small text-muted">Openings <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0"><i class="fa fa-users text-muted small"></i></span>
                                <input type="text" class="form-control bg-transparent border-0 py-2" name="openings" value="{{ $career->openings }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-medium small text-muted">Qualifications <span class="text-danger">*</span></label>
                            <div class="input-group bg-light rounded-3 border">
                                <span class="input-group-text bg-transparent border-0 align-self-start pt-2"><i class="fa fa-graduation-cap text-muted small"></i></span>
                                <textarea class="form-control bg-transparent border-0 py-2" name="qualifications" rows="3" required>{{ $career->qualifications }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                        <i class="fa fa-save me-2"></i> Update Career
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteCareerModal{{ $career->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 rounded-4 shadow-lg text-center overflow-hidden">
            <div class="modal-body p-4">
                <div class="bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 60px; height: 60px;">
                    <i class="fa fa-trash-alt text-danger fs-4"></i>
                </div>
                <h5 class="fw-bold mb-2">Delete Career?</h5>
                <p class="text-muted small mb-0">Are you sure you want to delete <strong>{{ $career->post_name }}</strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center px-4 pb-4 pt-0 gap-2">
                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.careers.delete', $career->id) }}" method="POST">
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
    @if($errors->any())
    document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('addCareerModal'));
        modal.show();
    });
    @endif
</script>
@endpush
