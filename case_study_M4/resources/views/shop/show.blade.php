@extends('shop.layouts.master')
@section('content')
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <img src="{{ asset('public/uploads/product/' . $products->image) }}" alt="{{ $products->name }}"
                    style="width: 700px;height: 600px;">
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">Tên sản phẩm: {{ $products['name'] }}</h3><br>
                <h3 class="font-weight-semi-bold mb-4">Giá tiền:
                    {{ str_replace(',', '.', number_format(floatval($products->price))) . ' VND' }}</h3><br>
                <h3 class="mb-4">
                    Mô tả:<h5>{!! $products['description'] !!}</h5>
                </h3>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <a class="btn btn-success add-to-cart-btn" href="#" data-product-id="{{ $products->id }}">
                        <i class="fa fa-shopping-cart mr-2"></i> Thêm vào giỏ hàng
                    </a>
                    <button class="btn btn-dark" onclick="window.history.back()">
                        <i class="fa fa-arrow-left mr-2"></i> Quay lại
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart-btn').on('click', function(e) {
                e.preventDefault();
                var productId = $(this).data('product-id');
                // Gửi yêu cầu Ajax để thêm sản phẩm vào giỏ hàng
                $.ajax({
                    url: '{{ route('shop.addtocart', ['id' => ':id']) }}'.replace(':id',
                        productId), // Đường dẫn tới route xử lý thêm sản phẩm vào giỏ hàng
                    method: 'GET',
                    success: function(response) {
                        // Cập nhật giỏ hàng trên giao diện người dùng
                        $('.cart-quantity').text(response.cartQuantity);
                        alert('Thêm vào giỏ hàng thành công');
                        window.location.reload()
                    },
                    error: function(xhr) {
                        alert('Đã xảy ra lổi, vui lòng thử lại');
                    }
                });
            });
        });
    </script>
@endsection
