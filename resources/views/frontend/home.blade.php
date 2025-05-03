<x-frontend-layout>
    <section>
        <div class="">
            <img class="h-[400px] w-full" src="https://img.lazcdn.com/us/domino/4f59e7a4-9054-4253-83e0-eaf337bd2658_NP-1976-688.jpg_2200x2200q80.jpg_.webp" alt="img">
        </div>
    </section>
    <section>
        <div class="container py-5">
            <h1 class="secondary font-bold text-2xl">Recommended Restaurants/Stores</h1>
            <p>Nearest Stores/Restaurant to your location</p>
        </div>
    </section>
    <section>
        <div class="container grid grid-cols-3 gaps-4">
            @foreach ($shop_profiles as $shop_profile)
            <x-shop-card :shop_profile="$shop_profile"/>

            @endforeach
        </div>
    </section>

    <section class="py-10">
        <h2 class="text-center font-bold primary text-2xl">Grabe our limited items at Special Offer Price</h2>
        <div class="container grid grid-cols-3 gap-4 py-5">
            @foreach ($offer_products as $product)
            <x-product-card :product="$product"/>
            @endforeach
        </div>

    </section>
   <section>
    <div class="container text-center py-20" >

        <h1 class="mb-5 text-2xl">
            List your Restaurant or Store at Habibi Pvt.Ltd ! <br>
            Reach 1,00,000+ New Customers!
        </h1>

        <button data-modal-target="-modal" data-modal-toggle="-modal" class="btn-secondary cursor-pointer">SEND A REQUEST</button>




  <!-- Main modal -->
  <div id="-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow-sm">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                  <h1 class="font-semibold text-2xl secondary">WELCOME TO HABIBI PVT.LTD</h1>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4">
                <form action="{{route('store_request')}}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 text-left">
                        <div>
                            <label for="name">Enter Merchant Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" class="w-full">
                            @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>

                            @enderror
                        </div>
                        <div>
                            <label for="email">Enter Merchant Email <span class="text-red-500">*</span></label>
                            <input type="text" name="email" id="email" class="w-full">
                            @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>

                            @enderror
                        </div>
                        <div>
                            <label for="shop_name">Enter Your Shop Name <span class="text-red-500">*</span></label>
                            <input type="text" name="shop_name" id="shop_name" class="w-full">
                            @error('shop_name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>

                            @enderror
                        </div>
                        <div>
                            <label for="shop_address">Enter Your Shop Address <span class="text-red-500">*</span></label>
                            <input type="text" name="shop_address" id="shop_address" class="w-full">
                            @error('shop_address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>

                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn-secondary cursor-pointer">Submit</button>
                        </div>
                    </div>
                </form>
              </div>


          </div>
      </div>
  </div>

    </div>
   </section>
</x-frontend-layout>
