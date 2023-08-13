@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')

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
        <a href="{{ route('products.create') }}" class="btn btn-info">Create</a>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <img src="{{ asset('public/uploads/product/' . $item->image) }}" alt="{{ $item->name }}" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>{{ $item->category_id }}</td>
                    <td>
                        <form action="{{ route('products.destroy', [$item->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('products.edit', [$item->id]) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('products.show', [$item->id]) }}" class="btn btn-warning">Show</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                                Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure delete?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-danger">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
@endsection
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS and CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">