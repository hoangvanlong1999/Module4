@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')

    <form action="{{ route('orders.update',$orders->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="order_date">order_date</label>
            <input type="text" class="form-control @error('order_date') is-invalid @enderror" name="order_date" id="order_date"
                value="{{ old('order_date',$orders->order_date) }}" placeholder="Nhập order_date ">
            @error('order_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="delivery_date">delivery_date</label>
            <input type="text" class="form-control @error('delivery_date') is-invalid @enderror" name="delivery_date" id="delivery_date"
                value="{{ old('delivery_date',$orders->delivery_date) }}" placeholder="Nhập delivery_date">
            @error('delivery_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="total_amount">total_amount</label>
            <input type="text" class="form-control @error('total_amount') is-invalid @enderror" name="total_amount" id="total_amount"
                value="{{ old('total_amount',$orders->total_amount) }}" placeholder="Nhập total_amount">
            @error('total_amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="note">note</label>
            <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" id="note"
                value="{{ old('note',$orders->note) }}" placeholder="Nhập note">
            @error('note')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="customer_id">Khách hàng</label>
            <select class="form-control @error('customer_id') is-invalid @enderror" name="customer_id" id="customer_id">
                <option value="">-- Chọn khách hàng--</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ old('customer_id', $orders->customer_id) == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endsection