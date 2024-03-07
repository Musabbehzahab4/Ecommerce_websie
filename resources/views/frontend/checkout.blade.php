<x-layout.frontend>
    <div class="site-wrap">

        <x-frontend.navbar />

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="{{ route('front') }} ">Home</a> <span class="mx-2 mb-0">/</span>
                        <a href="{{ route('cart.list') }}">Cart</a> <span class="mx-2 mb-0">/</span> <strong
                            class="text-black">Checkout</strong></div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border">
                            <form action="{{ route('checkout') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="c_country" class="text-black">Country <span
                                            class="text-danger">*</span></label>
                                    <select id="c_country" name="country" class="form-control" required>
                                        <option value="pakistan">Pakistan</option>
                                        {{-- <option value="5">Ghana</option> --}}
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">First Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_fname" name="fname"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_lname" class="text-black">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_lname" name="lname"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_address" class="text-black">Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_address" name="address"
                                            placeholder=" address" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-5">
                                    <div class="col-md-6">
                                        <label for="c_email_address" class="text-black">Email Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_email_address"
                                            name="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_phone" class="text-black">Phone <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_phone" name="phone_no"
                                            placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Place Order</button>

                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Your Order</h2>
                                <div class="p-3 p-lg-5 border">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $item)
                                                <tr>
                                                    <td>{{ $item->name }}<strong
                                                            class="mx-2">x</strong>{{ $item->quantity }}</td>
                                                    <td>{{ $item->quantity * $item->price }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Order Total</strong>
                                                </td>
                                                <td class="text-black font-weight-bold">
                                                    <strong>${{ Cart::getTotal() }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="form-group">
                                        {{-- <form action="{{ route('checkout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Place Order</button>
                                        </form> --}}
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- </form> -->
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
