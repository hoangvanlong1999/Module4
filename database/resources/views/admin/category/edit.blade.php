@extends('layouts.master')
@section('content')

<form action="{{route('categories.update',[$categories->id])}}" method='post'>
    @method('PUT')
    @csrf
    <h2 style="color: black" class="offset-5">Chỉnh sửa thể loại</h2>
    <div class="col-12">
        <label style="color: black" class="form-label">Tên Thể Loại</label>
        <input type="text" class="form-control" name="name" value='{{$categories->name}}'> <br>
    </div>
    <input type="submit" value="Cập nhật" class="btn btn-primary">
    <a href="{{route('categories.index')}}" class="btn btn-danger">Huỷ</a>
</form>
@endsection
