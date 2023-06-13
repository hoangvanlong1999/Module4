



@extends('layouts.master')

@section('content')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination li {
        margin: 0 5px;
        display: inline-block;
    }

    .pagination a {
        color: #333;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #ccc;
    }

    .pagination a.active {
        background-color: #333;
        color: #fff;
    }
</style>
<table class="table" style="text-align:center">
    <a href="{{route('categories.create')}}" class="btn btn-info">Thêm mới</a>
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Thể Loại</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $key => $item)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$item->name}}</td>
            <td>
                <form action="{{route('categories.destroy',[$item->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <a href="{{route('categories.edit',[$item->id])}}" class="btn btn-warning">Sửa</a>
                    <button onclick="return confirm('Bạn có muốn xóa  này không?');"
                        class="btn btn-danger">Xóa</button>
                    </form>
                </td>
                @endforeach
            </tr>
        </tbody>
        
    </table>

    {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}

@endsection
