@extends('layouts.app')
@section('main')
<h5><i class="bi bi-plus-square-fill"></i> Edit Item</h5>
           <hr>
           <nav class="my-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active">Edit Product</li>
            </ol>
           </nav>

           <div class="col-md-6">
                <form action="/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control
                            @if($errors->has('name')) {{ 'is-invalid' }} @endif
                            " placeholder="Enter Product Name" value="{{ old('name', $product->name) }}">

                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="mrp" class="form-label">M.R.P</label>
                            <input type="text" name="mrp" id="mrp" class="form-control
                            @if($errors->has('mrp')) {{ 'is-invalid' }} @endif
                            " placeholder="Enter M.R.P" value="{{ old('mrp', $product->mrp) }}">
                            @if ($errors->has('mrp'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mrp') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Selling Price</label>
                            <input type="text" name="price" id="price" class="form-control
                            @if($errors->has('price')) {{ 'is-invalid' }} @endif
                            " placeholder="Enter Selling Price" value="{{ old('price', $product->price) }}">
                            @if ($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" style="resize: none; height: 150px;" class="form-control
                            @if($errors->has('description')) {{ 'is-invalid' }} @endif
                            " placeholder="Enter Description">{{ old('description', $product->description) }}</textarea>
                            @if ($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" name="image" id="image" class="form-control
                            @if($errors->has('image')) {{ 'is-invalid' }} @endif
                            " value="{{ old('image', $product->image) }}">
                            @if ($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark">
                            <i class="bi bi-save"></i> Update
                        </button>

                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-x-circle"></i> Clear
                        </button>

                    </div>

                </form>
           </div>
@endsection
