@extends('layouts.master')

@section('content')
<?php
use Illuminate\Support\Collection;
?>
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<a href="{{route('users.create')}}" class="btn btn-success"> Them moi </a>
<table border="1" class="table table-striped">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Tuổi</th>
        <th>Thành Phố</th>
        <th>Thao Tác</th>
    </tr>

    <!-- Bắt đầu lặp -->
    @foreach($items as $key => $r)
    <tr>
        <td> {{ $r->id}} </td>
        <td>{{$r->name}} </td>
        <td> {{$r->email}} </td>
        <td> {{$r->age}} </td>
        <td> {{$r->city}}</td>
        <td>
        <form action="" method="POST">
            @method('DELETE')
            @csrf
            <a class="btn btn-success" href="" class="btn btn-primary">Sửa</a>
            <a class="btn btn-success" href="" class="btn btn-primary">Chi tiết</a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa')">Xóa</button>
        </form>
        </td>
    </tr>
    @endforeach
    <!-- Kết thúc vòng lặp -->

</table>

{{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}

@endsection