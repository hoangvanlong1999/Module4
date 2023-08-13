    @include('shop.includes.header')

      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

               @yield('content')

            </div>
            {{-- <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a> --}}
         </div>
      </div>
      
      @include('shop.includes.footer')
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{asset('shop/js/jquery.min.js')}}"></script>
      <script src="{{asset('shop/js/popper.min.js')}}"></script>
      <script src="{{asset('shop/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('shop/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('shop/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('shop/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('shop/js/custom.js')}}"></script>
      @yield('scripts')
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>