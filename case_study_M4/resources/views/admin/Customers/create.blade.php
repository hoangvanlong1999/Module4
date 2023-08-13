@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')

    <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                value="{{ old('name') }}" placeholder="Nhập tên ">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                value="{{ old('phone') }}" placeholder="Nhập phone ">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                value="{{ old('address') }}" placeholder="Nhập address ">
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                value="{{ old('email') }}" placeholder="Nhập email ">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="password">password</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                value="{{ old('password') }}" placeholder="Nhập password ">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                value="{{ old('image') }}" placeholder="Nhập image ">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
