@extends('layouts.master')
@section('content')

<form action="{{route('categories.store')}}"  method="post">
    @csrf
    <div class="form-group">    
      <label >Danh mục sản phẩm</label>
      <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục sản phẩm">
    </div>
    
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
