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
                <form class="row gy-3 needs-validation" action="{{ route('supplier.store') }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="f7:person"></iconify-icon>
                            </span>
                            <input type="text" name="#0" class="form-control" name="name" placeholder="Enter Name" required>
                            <div class="invalid-feedback">
                                Please provide Name
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="mage:email"></iconify-icon>
                            </span>
                            <input type="email" name="#0" name="email" class="form-control" placeholder="Enter Email" required>
                            <div class="invalid-feedback">
                                Please provide email address
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="solar:phone-calling-linear"></iconify-icon>
                            </span>
                            <input type="text" name="#0" class="form-control" name="mobile_no" placeholder="+1 (555) 000-0000" required>
                            <div class="invalid-feedback">
                                Please provide phone number
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="f7:person"></iconify-icon>
                            </span>
                            <input type="text" name="#0" class="form-control" name="address" placeholder="Enter Address" required>
                            <div class="invalid-feedback">
                                Please provide Name
                            </div>
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
