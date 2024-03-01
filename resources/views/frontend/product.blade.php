<x-layout.frontend>

      <div class="hero_area">
         <!-- header section strats -->
         <x-frontend.navbar />

         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
                @foreach ($product as $item)

                <div class="col-sm-6 col-md-4 col-lg-3">
                   <div class="box">
                      <div class="option_container">
                         <div class="options">
                            <a href="{{ route('Cartss') }}" class="option1">
                             Add To Cart
                            </a>
                            <a href="" class="option2">
                            Buy Now
                            </a>
                         </div>
                      </div>
                      <div class="img-box">
                         <img src="{{ asset('students/' . $item->image) }}" alt="">
                      </div>
                      <div class="detail-box">
                         <h5>
                           {{ $item->name }}
                         </h5>
                         <h6>
                            ${{ $item->price }}
                         </h6>
                      </div>
                   </div>
                </div>
                @endforeach
            </div>

            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>
      <!-- end product section -->
      <!-- footer section -->
      <x-frontend.footer />
      <x-frontend.script-user />
    </x-layout.frontend>

