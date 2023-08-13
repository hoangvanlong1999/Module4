@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')

    <form action="{{ route('categories.update', $categories->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                value="{{ old('name', $categories->name) }}" placeholder="Enter Name ">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
