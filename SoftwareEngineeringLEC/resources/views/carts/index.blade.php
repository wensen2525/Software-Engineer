{{-- <x-app>
      <div class="container">
            
            <p class="text-center">Halo {{ $user->name }}</p>
            <form action="{{ route('confirmations.viewcart') }}" method="POST" enctype="multipart/form-data" id="cart_product">
                  @csrf
                  <div class="row">
                  @foreach ($carts as $cart)
                        <div class="col-4 col-sm-4 col-lg-2">
                                    
                                    <input type="checkbox" name="{{$cart->id}}" value="{{ $cart->id }}" id="{{ $cart->id }}" onclick="add_checked(this)";>
                                    <div>
                                          <p>{{$cart->product->name}}</p>
                                          <p>{{$cart->size->name}}</p>
                                          <form>
                                                
                                                <div class="input-group quantity-group">
                                                      <span class="input-group-btn">
                                                      <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                                      <span><i class="bi bi-dash-lg"></i></span>
                                                      </button>
                                                      </span>
                                                      <input type="number" id="quantity" class="form-control input-number" value="{{ $cart->quantity }}" min="1" max="5">
                                                      <input type="hidden" id="cart_id" value="{{ $cart->id }}">
                                                      <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                                      <input type="hidden" value="{{ $cart->product->price }}" id="price">
                                                      <span class="input-group-btn">
                                                      <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                      <span><i class="bi bi-plus-lg"></i></span>
                                                      </button>
                                                      </span>
                                                </div>
                                          </form>
                                          
                                          <div class="price-group">
                                                <p>Price {{$cart->product->price}}</p>
                                                <p id="{{ "totalPriceProduct" . "_" . $cart->id }}">Total Price: {{$cart->totalPriceProduct}}</p>

                                          </div>
                                    </div>                                                  
                        </div>
                  @endforeach
                  </div>
                  @if(!$carts->isEmpty())
                        <div>
                              <a class="btn btn-primary" onclick="document.getElementById('cart_product').submit();">Buy</a>
                        </div>
                  @else
                        <div>
                              <a class="btn btn-primary" href="{{ route('home') }}">order product</a>
                        </div>
                  @endif
                  
            </form>
            
      </div>

</x-app> --}}

<x-app>
      <div class="pb-5" style="font-family: 'Inter'; background-color: #121212;">
      <section>
            <div class="container p-0 pt-3">

                  <!-- Content -->
                  <form action="{{ route('confirmations.viewcart') }}" method="POST" enctype="multipart/form-data" id="cart_product">
                  <div class="mt-4">

                  <!-- Header -->
                        <div class=" row d-flex mb-3 p-2 rounded" style="background-color: #575757;">
                              @if(isset($addressOne))
                              <div class="col">
                                    <p class="text-white" style="font-weight: 700;font-size: 20px;">Address</p>
                                    <p class="text-white">{{ $addressOne->nameaddress }}</p>
                                    <p class="text-white">{{ $addressOne->detailaddress }}</p>
                              </div>
                              @else
                              <div class="col">
                                    <p class="text-white" style="font-weight: 700;font-size: 20px;">Address</p>
                                    <p class="text-white">You have been created an address</p>
                                    <a href="{{ route('addresses.create') }}" class="btn btn-primary mb-2 text-white">Create Your Address</a>
                              </div>
                              @endif
                              @if(isset($paymentMethodOne))
                              <div class="col">
                                    <p class="text-white" style="font-weight: 700;font-size: 20px;">Payment Method</p>
                                    <p class="text-white">{{ $paymentMethodOne->nameaccount }}</p>
                                    <p class="text-white">{{ $paymentMethodOne->numberaccount }}</p>
                              </div>
                              @else
                              <div class="col">
                                    <p class="text-white" style="font-weight: 700;font-size: 20px;">Payment Method</p>
                                    <p class="text-white">You have been created an payment method</p>
                                    <a href="{{ route('payments.create') }}" class="btn btn-primary mb-2 text-white">Create Your Payment Method</a>
                              </div>
                              @endif
                              
                        </div>
                        <div class="row d-flex align-items-center gap-2" style=" height: 88px; background-color: #575757;
                              color: #FFFFFF; font-family: Inter; font-size: 16px; border-radius: 10px; font-weight: 500;">

                              <div class="col form-check d-flex justify-content-center m-0 p-0" style="max-width: 70px;min-width:70px">
                                    <input type="checkbox" class="form-check-input m-0" id="check-all" style="width: 24px; height: 24px; border: solid 2px #FFFFFF; background-color: transparent; margin-right: 20px;">
                              </div>
                              <p class="col d-flex justify-content-center text-center m-0" style="max-width: 200px;min-width:200px">Product Image</p>
                              <p class="col d-flex justify-content-center text-center m-0" style="max-width: 250px;min-width:250px">Product Name</p>
                              <p class="col d-flex justify-content-center text-center m-0" style="max-width: 50px;min-width:50px">Size</p>
                              <p class="col d-flex justify-content-center text-center m-0" style="max-width: 150px;min-width:150px">Price</p>
                              <p class="col d-flex justify-content-center text-center m-0" style="max-width: 180px;min-width:180px">Quantity</p>
                              <p class="col d-flex justify-content-center text-center m-0">Total Price</p>
                        </div>
                        
                        @csrf
                        @foreach ($carts as $cart)
                        {{-- <input type="checkbox" name="{{$cart->id}}" value="{{ $cart->id }}" id="{{ $cart->id }}" onclick="add_checked(this)";> --}}

                        <div class="row d-flex flex-row align-items-center gap-2 mt-3 py-2 position-relative" style="height: 200px; background-color: #2a2a2a; border-radius: 10px; color:#FFFFFF; font-family: Inter; font-size: 16px;">
                              <a class="position-absolute top-0 d-flex justify-content-end py-2" href="{{ route('carts.delete',$cart) }}"><i class="bi bi-x-circle-fill text-danger"></i></a>
                              <div class="col form-check d-flex justify-content-center m-0 p-0" style="max-width: 70px;min-width:70px">
                                    <input type="checkbox" class="form-check-input m-0 checkallclass" name="{{$cart->id}}" value="{{ $cart->id }}" id="{{ $cart->id }}" style="width: 24px; height: 24px; border: solid 2px #FFFFFF; background-color: transparent; margin-right: 20px;">
                              </div>
                              <div class="col d-flex justify-content-center" style="max-width: 200px;min-width:200px">
                                    <img src="{{ url('/storage/images/products/' . $cart->product->image) }}" alt="" class="col d-flex justify-content-center img-fluid" style="width: 150px; height: 150px; border-radius: 5px;object-fit:cover">
                              </div>
                              <p class="col d-flex justify-content-center text-center m-0" style="max-width: 250px;min-width:250px">{{$cart->product->name}}</p>
                              <p class="col d-flex justify-content-center text-center m-0" style="max-width: 50px;min-width:50px">{{$cart->size->name}}</p>
                              <p class="col d-flex justify-content-center text-center m-0" style="max-width: 150px;min-width:150px">Rp {{ number_format($cart->product->price,0,',','.') }}</p>
                              <div class="col m-auto" style="max-width: 180px;min-width:180px">
                                    <div class="input-group quantity-group me-4 border border-dark rounded-2 d-flex justify-content-center" style="width: 100%;">
                                          <span class="input-group-btn">
                                              <button type="button" class="quantity-left-minus btn btn-secondary btn-number"  data-type="minus" data-field="">
                                              <span><i class="bi bi-dash-lg"></i></span>
                                              </button>
                                          </span>
                                          <input style="max-width: 70px;" type="number" id="quantity" name="quantity" class="form-control input-number text-center" value="{{ $cart->quantity }}" min="1" max="{{ $cart->product->stock }}">
                                          <input type="hidden" id="cart_id" value="{{ $cart->id }}">
                                          <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                          <input type="hidden" value="{{ $cart->product->price }}" id="price">
                                          <span class="input-group-btn">
                                              <button type="button" class="quantity-right-plus btn btn-secondary btn-number" data-type="plus" data-field="">
                                                  <span><i class="bi bi-plus-lg"></i></span>
                                              </button>
                                          </span>
                                    </div>
                              </div>
                              <div class="col d-flex justify-content-center m-0 price-group">
                                    <p class="text-center" id="{{ "totalPriceProduct" . "_" . $cart->id }}">Rp {{ number_format($cart->totalPriceProduct,0,',','.') }}</p>
                              </div>
                              
                        </div>
                        @endforeach                     
                  </div>
                  @if(!$carts->isEmpty())
                        <div class="row mt-3 py-4 mb-3" style="background-color: #575757; border-radius: 10px; font-family: Inter; font-size: 20px; font-weight: 500;">
                        
                              <div class="d-flex flex-row align-items-center justify-content-end px-5 gap-3 totalCartsDetails">
                                    {{-- <input id="totalPriceCartsValue" type="number" value="{{ $totalPriceCartsNow }}"> --}}
                                    {{-- <p class="m-0" style="color: #FFFFFF;">Total ({{ $count_carts }} Products) : <span id="totalPriceCarts" value="{{ $totalPriceCartsNow }}"> Rp {{ number_format($totalPriceCartsNow,0,',','.') }}</span></p> --}}
                                    <a onclick="document.getElementById('cart_product').submit();" class="btn" style="color: #FFFFFF; background: linear-gradient(45deg, #E200F7,#04BBEC); border: none; border-radius: 5px; font-weight: 500;padding: 15px 40px;">Checkout</a>
                              </div>

                        </div>
                        {{-- <div>
                              <a class="btn btn-primary" onclick="document.getElementById('cart_product').submit();">Buy</a>
                        </div> --}}
                  @else
                        <div class="row mt-3 py-4 mb-3" style="background-color: #575757; border-radius: 10px; font-family: Inter; font-size: 20px; font-weight: 500;">
                              <div class="d-flex flex-row align-items-center justify-content-center">
                                    {{-- <input id="totalPriceCartsValue" type="number" value="{{ $totalPriceCartsNow }}"> --}}
                                    {{-- <p class="m-0" style="color: #FFFFFF;">Total ({{ $count_carts }} Products) : <span id="totalPriceCarts" value="{{ $totalPriceCartsNow }}"> Rp {{ number_format($totalPriceCartsNow,0,',','.') }}</span></p> --}}
                                    <a href="{{ route('home') }}" class="btn" style="color: #FFFFFF; background: linear-gradient(45deg, #E200F7,#04BBEC); border: none; border-radius: 5px; font-weight: 500;padding: 15px 40px;">Order Product</a>
                              </div>
                              {{-- <a  class="ms-4 btn d-flex justify-content-center align-items-center text-center" style="width: 268px; height: 55px; color: #FFFFFF; background: linear-gradient(45deg, #E200F7,#04BBEC); border: none; border-radius: 5px; font-weight: 500;">Order Product</a> --}}

                        </div>
                  @endif
                  </form>
            </div>
      </section>
      </div>
</x-app>