@extends('layouts.admin.main')

@section('title', 'Vendor Detail')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Vendor Detail</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.vendors') }}" class="btn btn-outline-primary"><i class="align-middle" data-feather="corner-down-left"></i> Back</a>
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
                                        <strong>Vendor Name:</strong>
                                        {{ $vendor->vendor_name }}
                                    </div>
                                    <div class="col-6">
                                        <strong>Person Name:</strong> {{ $vendor->title . " " . $vendor->first_name . $vendor->last_name }}
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <strong>Email:</strong>
                                        {{ $vendor->email }}
                                    </div>
                                    <div class="col-6">
                                        <strong>Phone No.:</strong> {{ $vendor->phone_number }}
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row">
                                    <div class="col-6">
                                        <strong>Website:</strong>
                                        {{ $vendor->website ?? 'N/A' }}
                                    </div>
                                    <div class="col-6">
                                        <strong>Address:</strong> {{ $vendor->address }}
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
