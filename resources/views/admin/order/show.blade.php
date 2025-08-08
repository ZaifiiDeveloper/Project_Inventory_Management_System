@extends('layouts.admin.main')

@section('title', 'Order Detail')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Order Detail</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.orders') }}" class="btn btn-outline-primary"><i class="align-middle"
                            data-feather="corner-down-left"></i> Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <strong>Vendor:</strong>
                                        {{ $order->vendor->vendor_name }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Product:</strong> {{ $order->product->name }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Date:</strong>
                                        {{ $order->order_date }}
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <strong>Quantity:</strong>
                                        {{ $order->quantity }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Price:</strong> {{ $order->price . "(" . $order->currency . ")" }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Discount:</strong>
                                        {{ $order->discount . '%' }}
                                    </div>
                                </div>
                            </div>

                            {{-- <div>
                                <div class="row">
                                    <div class="col-4">
                                        <strong>:</strong>
                                        {{ $order->vendor->name }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Product:</strong> {{ $order->product->name }}
                                    </div>
                                    <div class="col-4">
                                        <strong>Date:</strong>
                                        {{ $order->order_date }}
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
