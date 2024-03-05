<x-layout.frontend>

    <div class="site-wrap">

        <x-frontend.navbar />
        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="{{ route('front') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                            class="text-black">Cart</strong></div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <form class="col-md-12" method="post">
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)

                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('students/'. $item->attributes->image) }}" alt="Image"
                                                class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $item->name }}</h2>
                                        </td>
                                        <td>${{ $item->price }}</td>
                                        <td>
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <form action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id}}" >
                                                  <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                  class="w-6 text-center bg-gray-300" />
                                                  <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500" style="border-radius: 7px;
                                                  background-color: #ee4266; border-color: #ee4266;">update</button>
                                                  </form>
                                            </div>

                                        </td>
                                        <td>${{ $item->price * $item->quantity }}</td>
                                        <td>
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <button class="px-4 py-2 text-white bg-red-600" style="border-radius: 7px; background-color: #ee4266; border-color: #ee4266;">x</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div>
                                    <form action="{{ route('cart.clear') }}" method="POST">
                                      @csrf
                                      <button class="px-6 py-2 text-red-800 bg-red-300" style="margin-left: 3rem; border-radius: 7px; color: white; background-color: #ee4266; width: 15rem; border-color: #ee4266;">Remove All Cart</button>
                                    </form>
                                  </div>
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black"> ${{ Cart::getTotal() }}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-lg btn-block"
                                            onclick="window.location='{{ route('checkout') }}'">Proceed To Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-frontend.footer />
<x-slot name="custom_js">
    {{-- <script></script> --}}
    <script src="{{ asset('cart/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('cart/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('cart/js/popper.min.js') }}"></script>
    <script src="{{ asset('cart/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('cart/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('cart/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('cart/js/aos.js') }}  "></script>
    <script src="{{ asset('cart/js/main.js') }}"></script>
</x-slot>
</x-layout.frontend>

