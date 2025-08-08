@extends('layouts.admin.main')

@section('title', 'Customer Detail')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Customer Detail</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.customers') }}" class="btn btn-outline-primary"><i class="align-middle"
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
                                    <div class="col-6">
                                        <strong>Customer Name:</strong>
                                        {{ $customer->name }}
                                    </div>
                                    <div class="col-6">
                                        <strong>Email:</strong>
                                        {{ $customer->email }}
                                    </div>

                                </div>
                            </div>

                            <div>
                                <div class="row">
                                    <div class="col-6">
                                        <strong>Phone No.:</strong>
                                        {{ $customer->phone_no }}
                                    </div>
                                    <div class="col-6">
                                        <strong>Address:</strong>
                                        {{ $customer->address }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
