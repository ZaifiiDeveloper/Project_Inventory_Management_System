@extends('layouts.admin.main')

@section('title', 'Orders')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Orders</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.order.create') }}" class="btn btn-outline-primary"><i class="align-middle"
                            data-feather="plus"></i>Add Order</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($orders) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Vendor</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order->vendor->vendor_name }}</td>
                                                <td>{{ $order->product->name }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ $order->price . '(' . $order->currency . ')' }}</td>
                                                <td>{{ $order->order_date }}</td>
                                                <td>
                                                    <a href="{{ route('admin.order.edit', $order) }}"
                                                        class="btn btn-primary">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.order.show', $order) }}" class="btn btn-info">
                                                        <i class="align-middle" data-feather="eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.order.destroy', $order) }}"
                                                        class="btn btn-danger">
                                                        <i class="align-middle" data-feather="trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info m-0">No record found!</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
