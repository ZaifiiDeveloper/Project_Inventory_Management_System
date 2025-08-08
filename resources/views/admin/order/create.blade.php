@extends('layouts.admin.main')

@section('title', 'Add Order')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Add Order</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.orders') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.order.create') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="vendor_id" class="form-label">Vendor</label>
                                            <select class="form-select @error('vendor_id') is-invalid @enderror"
                                                name="vendor_id" id="vendor_id">
                                                <option value="" selected>Select vendor</option>

                                                @foreach ($vendors as $vendor)
                                                    @if (old('vendor_id') == $vendor->id)
                                                        <option value="{{ $vendor->id }}" selected>
                                                            {{ $vendor->vendor_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('vendor_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="product_id" class="form-label">Product</label>
                                            <select class="form-select @error('product_id') is-invalid @enderror"
                                                name="product_id" id="product_id">
                                                <option value="" selected>Select product</option>

                                                @foreach ($products as $product)
                                                    @if (old('product_id') == $product->id)
                                                        <option value="{{ $product->id }}" selected>{{ $product->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="order_date" class="form-label">Order Date</label>
                                            <input type="date"
                                                class="form-control @error('order_date') is-invalid @enderror"
                                                name="order_date" id="order_date" placeholder="Enter product order_date!"
                                                value="{{ old('order_date') }}">
                                            @error('order_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number"
                                                class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                                id="quantity" placeholder="Enter product quantity!"
                                                value="{{ old('quantity') }}">
                                            @error('quantity')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="currency" class="form-label">Currency</label>
                                            <select name="currency" id="currency"
                                                class="form-select @error('currency') is-invalid @enderror">
                                                <option value="">Select a currency</option>
                                                @foreach ($currencies as $currency)
                                                    @if ($currency == old('currency'))
                                                        <option value="{{ $currency }}" selected>{{ $currency }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $currency }}">{{ $currency }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('currency')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="numbers" class="form-control @error('price') is-invalid @enderror"
                                                name="price" id="price" placeholder="Enter product price!"
                                                value="{{ old('price') }}">
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="discount" class="form-label">Discount (%)</label>
                                            <input type="numbers"
                                                class="form-control @error('discount') is-invalid @enderror" name="discount"
                                                id="discount" placeholder="Enter product discount!"
                                                value="{{ old('discount') }}">
                                            @error('discount')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
