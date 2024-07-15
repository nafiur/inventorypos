@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Create Product Category' }}
@endsection
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Product Category</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium"><a href="{{ route('product.category.index') }}" class="hover-text-primary">Category List</a></li>
        </ul>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Category Information</h5>
            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" action="{{ route('product.category.store') }}" method="POST" novalidate>
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
                        <a href="{{ route('product.category.index') }}" class="btn btn-dark">Cancel</a>
                        <button class="btn btn-primary-600" type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
