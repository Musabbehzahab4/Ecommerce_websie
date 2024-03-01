<x-layout.frontend>

    <div class="site-wrap">


        <x-frontend.navbar />


        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="{{ route('front') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                            class="text-black">Thank You</strong></div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="icon-check_circle display-3 text-success"></span>
                        <h2 class="display-3 text-black">Thank you!</h2>
                        <p class="lead mb-5">You order was successfuly completed.</p>
                        <p><a href="{{ route('products') }}" class="btn btn-sm height-auto px-4 py-3 btn-primary">Back to shop</a></p>
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
