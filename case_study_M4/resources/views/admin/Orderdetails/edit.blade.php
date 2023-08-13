@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')

    <form action="{{ route('orderdetails.update',$orderdetails->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="order_id">Danh mục</label>
            <select class="form-control @error('order_id') is-invalid @enderror" name="order_id" id="order_id">
                <option value="">-- Chọn danh mục--</option>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}"
                        {{ old('order_id', $orderdetails->order_id) == $order->id ? 'selected' : '' }}>
                        {{ $order->note }}</option>
                @endforeach
            </select>
            @error('order_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="product_id">Danh mục</label>
            <select class="form-control @error('product_id') is-invalid @enderror" name="product_id" id="product_id">
                <option value="">-- Chọn danh mục--</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        {{ old('product_id', $orderdetails->product_id) == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <div class="form-group">
            <label for="quantity">quantity</label>
            <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                id="quantity" value="{{ old('quantity',$orderdetails->quantity) }}" placeholder="Nhập quantity">
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="total">total</label>
            <input type="text" class="form-control @error('total') is-invalid @enderror" name="total" id="total"
                value="{{ old('total',$orderdetails->total) }}" placeholder="Nhập total">
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>






        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endsection
