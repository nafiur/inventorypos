@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Update Category Information' }}
@endsection
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Update Category Information</h6>
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
                <form class="row gy-3 needs-validation" action="{{ route('product.category.update') }}" method="POST" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}" id="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <label class="form-label">Category Name</label>
                                <div class="icon-field has-validation">
                                    {{-- <span class="icon">
                <iconify-icon icon="f7:person"></iconify-icon>
            </span> --}}
                                    <input type="text" name="name" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" required>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <div class="icon-field has-validation">
                                    <select name="status" id="" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('product.category.index') }}" class="btn btn-dark">Cancel</a>
                        <button class="btn btn-primary-600" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
