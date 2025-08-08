@extends('layouts.admin.main')

@section('title', 'Edit Product')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Edit Product</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.products') }}" class="btn btn-outline-primary"><i class="align-middle" data-feather="corner-down-left"></i> Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.product.edit', $product) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="category_id" class="form-label">Category</label>
                                            <select class="form-select @error('category_id') is-invalid @enderror"
                                                name="category_id" id="category_id">
                                                <option value="" selected>Select category</option>

                                                @if (old('category_id'))
                                                    @foreach ($categories as $category)
                                                        @if (old('category_id') == $category->id)
                                                            <option value="{{ $category->id }}" selected>
                                                                {{ $category->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($categories as $category)
                                                        @if ($product->category_id == $category->id)
                                                            <option value="{{ $category->id }}" selected>
                                                                {{ $category->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="brand_id" class="form-label">Brand</label>
                                            <select class="form-select @error('brand_id') is-invalid @enderror"
                                                name="brand_id" id="brand_id">
                                                <option value="" selected>Select brand</option>

                                                @if (old('brand_id'))
                                                    @foreach ($brands as $brand)
                                                        @if (old('brand_id') == $brand->id)
                                                            <option value="{{ $brand->id }}" selected>
                                                                {{ $brand->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($brands as $brand)
                                                        @if ($product->brand_id == $brand->id)
                                                            <option value="{{ $brand->id }}" selected>
                                                                {{ $brand->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('brand_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name" placeholder="Enter product name!"
                                                value="{{ old('name') ?? $product->name }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                                rows="3" placeholder="Enter description!">{{ old('description') ?? $product->description }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" value="Update Details" class="btn btn-primary">
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('admin.product.picture', $product) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Product Image</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                name="image" id="image" placeholder="Enter product image!"
                                                value="{{ old('image') }}">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div>
                                            <input type="submit" value="Update Picture" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 text-center">
                                    <img src="{{ asset('template/img/products/' . $product->image) }}" alt=""
                                        class="img-fluid" width="40%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
