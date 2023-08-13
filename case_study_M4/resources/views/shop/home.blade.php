@extends('shop.layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="carousel-item active">
    <div class="container">
       <h1 class="fashion_taital">Man Fashion</h1>
       <div class="fashion_section_2">
          <div class="row">
             @foreach ($products as $key => $item)
             <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                   <h4 class="shirt_text">{{ $item->name }}</h4>
                   <p class="price_text">{{$item->price}}</span></p>
                   <div class="tshirt_img"><img src="{{ asset('public/uploads/product/' . $item->image) }}"></div>
                   <div class="btn_main">
                      <div class="buy_bt add-to-cart-btn" data-product-id="{{ $item->id }}" ><a href="#">Buy Now</a></div>
                      <div class="seemore_bt"><a href="{{route('shop.show',$item->id )}}">See More</a></div>
                   </div>
                </div>
             </div>
             @endforeach

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