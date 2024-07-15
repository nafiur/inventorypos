@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Create Supplier' }}
@endsection
<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Supplier</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium"><a href="{{ route('supplier.index') }}" class="hover-text-primary">Supplier List</a></li>
        </ul>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Supplier Information</h5>
            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" action="{{ route('supplier.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="f7:person"></iconify-icon>
                            </span>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="mage:email"></iconify-icon>
                            </span>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="solar:phone-calling-linear"></iconify-icon>
                            </span>
                            <input type="text" name="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror" placeholder="+1 (555) 000-0000" required>
                            @error('mobile_no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="f7:person"></iconify-icon>
                            </span>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address" required>
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('supplier.index') }}" class="btn btn-dark">Cancel</a>
                        <button class="btn btn-primary-600" type="submit">Submit form</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
