@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                value="{{ old('name') }}" placeholder="Enter name ">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        

        

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
