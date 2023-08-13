@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Chi tiết đơn hàng</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">GIá(VND)</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Ngày Đặt Hàng</th>
            <th scope="col">Tổng Tiền(VND)</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @foreach ($items as $key => $item)
        @php $total += $item->total @endphp
            <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>{{ $item->product_name }}</td>
                <td>{{ number_format($item->product_price) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->order_date }}</td>
                <td>{{ number_format($item->total) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>Tổng Tiền của đơn hàng: {{number_format($total)}} VND</p>
@endsection