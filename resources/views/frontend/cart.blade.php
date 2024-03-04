<x-layout.frontend>

    <div class="site-wrap">

        <x-frontend.navbar />
        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="{{ route('front') }}">Home</a> <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Cart</strong>
                    </div>
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
                                    @php
                                        $total = 0;
                                    @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $detail)
                                            @php
                                                $total += $detail['price'] * $detail['quantity'];
                                            @endphp
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <img src="{{ asset('students/' . $detail['image']) }}"
                                                        alt="Image" class="img-fluid">
                                                </td>
                                                <td class="product-name">
                                                    <h2 class="h5 text-black">{{ $detail['name'] }}</h2>
                                                </td>
                                                <td>${{ $detail['price'] }}</td>
                                                <td>
                                                    <input type="number" value="{{ $detail['quantity'] }}"
                                                        class="form-control quantity" />

                                                </td>
                                                <td>${{ $detail['price'] * $detail['quantity'] }}</td>
                                                <td><a href="#"
                                                        class="btn btn-primary height-auto btn-sm remove-from-cart">X</a>
                                                </td>
                                        @endforeach
                                    @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <button class="btn btn-primary btn-sm btn-block  update-cart">Update Cart</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">${{ $total }}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-lg btn-block"
                                            onclick="window.location='{{ route('checkout') }}'">Proceed To
                                            Checkout</button>
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
    <x-frontend.script-user />
    <script>
        $(".update-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            // console.log(ele);
            // die;
            $.ajax({
                url: "{{ route('update.cart') }}",
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });


        $(".remove-from-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: "{{ route('remove.from.cart') }}",
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },

                    success: function(response) {
                        window.location.reload();
                    }
                });
            }

        });
    </script>
    <x-slot name="custom_js">
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
