@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')

    <form action="{{ route('users.update', $users->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                value="{{ old('name', $users->name) }}" placeholder="Enter name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                value="{{ old('email', $users->email) }}" placeholder="Enter email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">password</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                value="{{ old('password', $users->password) }}" placeholder="Enter password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="group_id">group_id</label>
            <select class="form-control @error('group_id') is-invalid @enderror" name="group_id" id="group_id">
                <option value="">-- enter group_id--</option>
                @foreach ($group as $group1)
                    <option value="{{ $group1->id }}"
                        {{ old('group_id', $group1->group_id) == $group1->id ? 'selected' : '' }}>
                        {{ $group1->name }}</option>
                @endforeach
            </select>
            @error('group_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
