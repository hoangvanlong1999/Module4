@extends('shop.layouts.master')
@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                    $total = 0;
                    $totalAll = 0;
                @endphp
               @if (session('cart'))
               <table class="table">
                   <thead>
                       <tr>
                           <th>Tên sản phẩm</th>
                           <th>Giá</th>
                           <th>Số lượng</th>
                           <th>Tổng tiền</th>
                           <th></th>
                       </tr>
                   </thead>
                   <tbody>
                       @php
                           $totalAll = 0;
                       @endphp
                       @foreach (session('cart') as $id => $details)
                           @php
                               $total = $details['price']* $details['quantity'];
                               $totalAll += $total;
                           @endphp
                           <tr>
                               <td class="align-middle">
                                   <img src="{{ asset('public/uploads/product/'.$details['image']) }}" alt="" style="width: 50px;">
                                   <a>{{ $details['nameVi'] ?? '' }}</a>
                               </td>
                               <td class="align-middle">{{ number_format($details['price'])}} VNĐ</td>
                               <td class="align-middle" width="80px">
                                   <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                               </td>
                               <td class="align-middle">{{ number_format($total)}} VNĐ</td>
                               <td class="actions" data-th="">
                                   <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                                   <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                               </td>
                           </tr>
                       @endforeach
                   </tbody>
                   <tfoot>
                       <tr>
                           <td colspan="3" class="text-end"><strong>Tổng tiền</strong></td>
                           <td colspan="2">{{ number_format($totalAll) }} VNĐ</td>
                       </tr>
                   </tfoot>
               </table>
           @endif
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="">
                    <div class="input-group-append">
                        {{-- <button class="btn btn-primary"></button> --}}
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tóm tắt giỏ hàng</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Tổng</h6>
                        <h6>{{ is_numeric($totalAll) ? number_format($totalAll) . ' VNĐ' : '0 VNĐ' }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                        <h6 class="font-weight-medium">10VNĐ</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tổng thu</h5>
                        <h5>{{ number_format($totalAll + 10)}} VNĐ </h5>
                        @if (session('cart'))
                        <a href="{{ route('checkOuts') }}" class="btn btn-danger pull-right">Thanh toán</a>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('shop1/update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Bạn có muốn xóa?")) {
                $.ajax({
                    url: '{{ url('shop1/remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
