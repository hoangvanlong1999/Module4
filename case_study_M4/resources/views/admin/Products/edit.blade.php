@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')

    <form action="{{ route('products.update',$products->id) }}" method="post" enctype="multipart/form-data" style=margin:70px>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                value="{{ old('name', $products->name) }}" placeholder="Enter name ">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug"
                value="{{ old('slug', $products->slug) }}" placeholder="Enter slug">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                value="{{ old('price', $products->price) }}" placeholder="Enter price">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                value="{{ old('description', $products->description) }}" placeholder="Enter description">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">quantity</label>
            <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity"
                value="{{ old('quantity', $products->quantity) }}" placeholder="Enter quantity">
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="status">status</label>
            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" id="status"
                value="{{ old('status', $products->status) }}" placeholder="Enter status">
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                value="{{ old('image', $products->image) }}" placeholder="Enter image">
                <img src="{{ asset('public/uploads/product/' . $products->image) }}" alt="{{ $products->name }}" style="max-width: 100px; max-height: 100px;">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Category_id</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option value="">-- Enter Category_id--</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $products->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
