@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Show Unit Information' }}
@endsection
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Show Unit Information</h6>
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
                <div class="card-body py-40">
                    <div class="row justify-content-center" id="invoice">
                        <div class="col-lg-8">
                            <div class="shadow-4 border radius-8">
                                {{-- <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
                                    <div>
                                        <h3 class="text-xl">Invoice #3492</h3>
                                        <p class="mb-1 text-sm">Date Issued: 25/08/2020</p>
                                        <p class="mb-0 text-sm">Date Due: 29/08/2020</p>
                                    </div>
                                    <div>
                                        <img src="assets/images/logo.png" alt="image" class="mb-8">
                                        <p class="mb-1 text-sm">4517 Washington Ave. Manchester, Kentucky 39495</p>
                                        <p class="mb-0 text-sm">random@gmail.com, +1 543 2198</p>
                                    </div>
                                </div> --}}
                                <div class="py-28 px-20">
                                    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
                                        <div>
                                            {{-- <h6 class="text-md">Issus For:</h6> --}}
                                            <table class=" text-secondary-light">
                                                <tbody>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td class="ps-8">: {{ $unit->name ??'' }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <div>
                                            <table class="text-sm text-secondary-light">
                                                <tbody>
                                                    <tr>
                                                        <td>Issus Date</td>
                                                        <td class="ps-8">:25 Jan 2024</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Order ID</td>
                                                        <td class="ps-8">:#653214</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipment ID</td>
                                                        <td class="ps-8">:#965215</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> --}}
                                    </div>

                                    {{-- <div class="mt-24">
                                        <div class="table-responsive scroll-sm">
                                            <table class="table bordered-table text-sm">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-sm">SL.</th>
                                                        <th scope="col" class="text-sm">Items</th>
                                                        <th scope="col" class="text-sm">Qty</th>
                                                        <th scope="col" class="text-sm">Units</th>
                                                        <th scope="col" class="text-sm">Unit Price</th>
                                                        <th scope="col" class="text-end text-sm">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>01</td>
                                                        <td>Apple's Shoes</td>
                                                        <td>5</td>
                                                        <td>PC</td>
                                                        <td>$200</td>
                                                        <td class="text-end">$1000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>02</td>
                                                        <td>Apple's Shoes</td>
                                                        <td>5</td>
                                                        <td>PC</td>
                                                        <td>$200</td>
                                                        <td class="text-end">$1000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>03</td>
                                                        <td>Apple's Shoes</td>
                                                        <td>5</td>
                                                        <td>PC</td>
                                                        <td>$200</td>
                                                        <td class="text-end">$1000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>04</td>
                                                        <td>Apple's Shoes</td>
                                                        <td>5</td>
                                                        <td>PC</td>
                                                        <td>$200</td>
                                                        <td class="text-end">$1000.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between gap-3">
                                            <div>
                                                <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Sales By:</span> Jammal</p>
                                                <p class="text-sm mb-0">Thanks for your business</p>
                                            </div>
                                            <div>
                                                <table class="text-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td class="pe-64">Subtotal:</td>
                                                            <td class="pe-16">
                                                                <span class="text-primary-light fw-semibold">$4000.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-64">Discount:</td>
                                                            <td class="pe-16">
                                                                <span class="text-primary-light fw-semibold">$0.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-64 border-bottom pb-4">Tax:</td>
                                                            <td class="pe-16 border-bottom pb-4">
                                                                <span class="text-primary-light fw-semibold">0.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-64 pt-4">
                                                                <span class="text-primary-light fw-semibold">Total:</span>
                                                            </td>
                                                            <td class="pe-16 pt-4">
                                                                <span class="text-primary-light fw-semibold">$1690</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
