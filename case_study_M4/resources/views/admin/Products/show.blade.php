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

        .modal-dialog {
            margin-top: 200px;
        }

        .modal-footer {
            display: flex;
            justify-content: center;
        }
    </style>
    <table class="table" style="text-align:center">
        <a href="{{ route('products.index') }}" class="btn btn-info">back</a>
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>slug</th>
                <th>price</th>
                <th>description</th>
                <th>quantity</th>
                <th>status</th>
                <th>image</th>
                <th>category_id </th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $products->id }}</td>
                    <td>{{ $products->name }}</td>
                    <td>{{ $products->slug }}</td>
                    <td>{{ $products->price }}</td>
                    <td>{{ $products->description }}</td>
                    <td>{{ $products->quantity }}</td>
                    <td>{{ $products->status }}</td>
                    <td>
                        <img src="{{ asset('public/uploads/product/' . $products->image) }}" alt="{{ $products->name }}" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>{{ $products->category_id }}</td>
                    
                </tr>
        </tbody>
    </table>

@endsection
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS and CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">