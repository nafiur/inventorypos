@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Create Unit' }}
@endsection
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Unit</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium"><a href="{{ route('unit.index') }}" class="hover-text-primary">Unit List</a></li>
        </ul>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Unit Information</h5>
            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" action="{{ route('unit.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <div class="icon-field has-validation">
                            {{-- <span class="icon">
                                <iconify-icon icon="f7:person"></iconify-icon>
                            </span> --}}
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <a href="{{ route('unit.index') }}" class="btn btn-dark">Cancel</a>
                        <button class="btn btn-primary-600" type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
