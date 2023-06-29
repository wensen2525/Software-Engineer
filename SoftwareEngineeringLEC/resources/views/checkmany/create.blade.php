{{-- <x-app>
      <div class="container">
            <div class="row">
                  @foreach($confirmations as $confirmation)
                        <div class="col-12">
                              <p class="text-center">Halo {{ $confirmation->cart->user->name }}</p>
                              <p class="mb-1">{{ $confirmation->cart->product->id }}</p>
                              <p class="mb-1">{{ $confirmation->cart->product->name }}</p>
                              <p class="mb-1">{{ $confirmation->cart->product->description }}</p>
                              <p class="mb-1">{{ $confirmation->cart->product->stock }}</p>
                              <p class="mb-1">{{ $confirmation->cart->product->price }}</p>
                              <p class="mb-1">{{ $confirmation->cart->size->name }}</p>
                              <p class="mb-1">{{ $confirmation->cart->quantity }}</p>
                        </div>
                        <hr>
                  
                  <div class="mb-1">
                        <img src="{{ url('/storage/images/products/' . $confirmation->cart->product->image) }}" alt="{{ $confirmation->cart->product->name . '-image' }}" style="width:120px;height:120px;object-fit:cover" class="img-fluid border border-dark rounded-2">
                  </div>
                  @endforeach
                  
                  <div>  
                        @if( isset($addressOne) && isset($paymentMethodOne) )
                              <form action="{{ route('confirmations.checkcart') }}" method="POST" id="formproduct" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $codeConfirmation }}" name="codeConfirmation">
                                    <div>
                                          <select name="address" id="">
                                          <option value="{{ $addressOne->id }}" hidden="hidden" selected>{{ $addressOne->nameaddress . ' : ' . $addressOne->detailaddress}}</option>
                                          @foreach ($addresses as $address)
                                                <option value="{{ $address->id }}">{{ $address->nameaddress . ' : ' . $address->detailaddress}}</option>
                                          @endforeach
                                          </select>
                                    </div>
                                    <div>
                                          <select name="paymentmethod" id="">
                                          <option value="{{ $paymentMethodOne->id }}" hidden="hidden"  selected>{{ $paymentMethodOne->bankname .  ' : ' . $paymentMethodOne->nameaccount . ' , ' . $paymentMethodOne->numberaccount}}</option>
                                          @foreach ($paymentMethods as $paymentMethod)
                                                <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->bankname . ' : ' . $paymentMethod->nameaccount . ' , ' . $paymentMethod->numberaccount}}</option>
                                          @endforeach
                                          </select>
                                    </div>

                                    <div>
                                          <button type="submit" class="btn btn-primary">Check Out</button>
                                    </div>
                              </form>
                        @elseif(isset($addressOne) == false)
                              <div class="d-flex gap-2 col-12">
                                    <a href="{{ route('addresses.create') }}" class="btn btn-primary mb-2">Create Your Address</a>
                                    <a href="{{ route('addresses.view') }}" class="btn btn-primary mb-2">View Your Addresses</a>
                              </div>
                        @elseif(isset($paymentMethodOne) == true)
                              <div class="d-flex gap-2 col-12">
                                    <a href="{{ route('payments.create') }}" class="btn btn-primary mb-2">Create Your Payment Method</a>
                                    <a href="{{ route('payments.view') }}" class="btn btn-primary mb-2">View Your Payment Methods</a>
                              </div>
                        @endif
                  </div>
            </div>
      </div>
</x-app> --}}

<x-app>
      <div class="pb-5" style="font-family: 'Inter'; background-color: #121212;">
      <form action="{{ route('confirmations.checkcart') }}" method="POST" id="formproduct" enctype="multipart/form-data">
            @csrf
            <section>
                  <div class="container">
                        <div class="row py-5 align-items-center">
                              <div class="col-12">
                              <div class="card" style="background-color: #2A2A2A; color: white;">
                                    <div class="row g-0 my-5 mx-5">
                                    <div class="col-md-7 row">
                                          <h4 class="fw-semibold">Address</h4>
                                          <h6>{{ $addressOne->detailaddress }}</h6>
                                          <h6>Contact : +62 812 9990 8129 </h6>
                                          <div class="col-5">
                                                <select name="address" id="" class="form-select">
                                                      <option value="{{ $addressOne->id }}" hidden="hidden" class="btn mt-1" selected>Change Address</option>
                                                      @foreach ($addresses as $address)
                                                            <option value="{{ $address->id }}">{{ $address->nameaddress . ' : ' . $address->detailaddress}}</option>
                                                      @endforeach
                                                </select>
                                          </div>
                                          
                                    </div>
                                    <input type="hidden" value="{{ $codeConfirmation }}" name="codeConfirmation">
                                    <div class="col-md-5">
                                          <div class="card">
                                          <div class="card-body pb-2">
                                          <h6 class="card-title fw-semibold text-center">Delivery Option</h6>
                                          <div class="border"></div>
                                          <div class="dropdown mt-2">
                                                <select name="productdelivery" id="" class="form-select border  border-dark">
                                                      <option value="{{ $productDeliveryOne->id }}" hidden="hidden" class="btn custom-button2 mt-1 col-12" selected>Choose Product Delivery</option>
                                                      @foreach ($productDeliveries as $productDelivery)
                                                            <option value="{{ $productDelivery->id }}">{{ $productDelivery->name}}</option>
                                                      @endforeach
                                                </select>
                                          </div>
                                          <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="fst-italic mt-1" style="color:#FF2F2F;">Will be accepted on 23 - 26 May</h6>
                                                <h6>Rp99.000</h6>
                                          </div>
                                          </div>
                                          </div>
                                    </div>
                                    </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </section>
            <section>
            <div class="container">
                  <div class="row">
                        <div class="col-12">

                              <div id="product-slider" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                          <div class="carousel-item active">       
                                                <div class="d-flex gap-2" style="overflow:auto">
                                                      @foreach($confirmations as $confirmation)
                                                      <div class="col-4">
                                                            <div class="card col">
                                                                  <div class="row g-0">
                                                                        <div class="col-4">
                                                                              <img src="{{ url('/storage/images/products/' . $confirmation->cart->product->image) }}" class="rounded float m-3" alt="Image" style="width: 8vw; height: 8vw; object-fit:cover; border: 0.5vw; border-color: black;">
                                                                        </div>
                                                                        <div class="col-8">
                                                                              <div class="card-body">
                                                                                    <h5 class="fw-semibold">{{ $confirmation->cart->product->name }}</h5>
                                                                                    <div class="border" style="background: linear-gradient(to right, #E200F7, #04BBEC); height: 2px;"></div>
                                                                                    <h6 class="my-2">Size: {{ $confirmation->cart->size->name }}</h6>
                                                                                    <h6 class="my-2 fw-semibold">Rp {{ number_format($confirmation->cart->product->price,0,',','.') }}</h6>
                                                                                    <h6>Quantity: {{ $confirmation->cart->quantity }}</h6>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      @endforeach
                                                </div>

                                          </div>
                                    </div>
                              </div>

                        </div>
                  </div>
            </div>
            </section>
            <section>
                  <div class="container mt-5 text-white">
                        <div class="row">
                        <div class="col">
                              <div class="col-12">
                              <div class="row">
                                    <div class="col-6 ">
                                    <div class="card mb-3" style="background-color: #2A2A2A; color: white;">
                                          <div class="row g-0">
                                          <div class="col-md-2">
                                          <img src="{{ url('/storage/images/asset_website/wensentancosplay.png') }}" class="rounded float custom-image-size2 m-4" alt="Image" >
                                          </div>
                                          <div class="col-md-10">
                                          <div class="card-body d-flex flex-column">
                                                <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                <h6 class="card-title fw-semibold">Payment Methods</h6>
                                                <h6 class="card-title fw-semibold">{{ $paymentMethodOne->nameaccount }}</h6>
                                                <h6>{{ $paymentMethodOne->bankname }} - {{ $paymentMethodOne->numberaccount }}</h6>
                                                </div>
                                                {{-- <div class="dropdown"> --}}
                                                {{-- <h6 class="card-title fw-semibold">Payment Methods</h6> --}}
                                                {{-- <h6>{{ $paymentMethodOne->bankname . ' : ' . $paymentMethodOne->nameaccount . ' , ' . $paymentMethodOne->numberaccount}}</h6> --}}
                                                <div class="col-5">
                                                      <select name="paymentmethod" id="" class="form-select">
                                                            <option value="{{ $paymentMethodOne->id }}" hidden="hidden" selected>Change Payment</option>
                                                            @foreach ($paymentMethods as $paymentMethod)
                                                                  <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->bankname . ' : ' . $paymentMethod->nameaccount . ' , ' . $paymentMethod->numberaccount}}</option>
                                                            @endforeach
                                                      </select>
                                                </div>

                                                {{-- </div> --}}
                                                </div>
                                          </div>
                                          </div>
                                          </div>
                                    </div>
                                    </div>
                                    <div class="col-2">
                                    <div class="card mb-3" style="background-color: #2A2A2A; color: white;">
                                          <div class="row g-0">
                                          <div class="mb-3 p-3">
                                                <label for="exampleFormControlInput1" class="form-label fw-semibold">Promo Code</label>
                                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Promo Code">
                                          </div>
                                          </div>
                                    </div>
                                    </div>
                                    <div class="col-4">
                                    <div class="card p-4" style="background-color: #2A2A2A; color: white;">
                                          <div class="row g-0">
                                                <div class=" d-flex justify-content-between align-items-center">
                                                <div>
                                                <h5 style="color: #868686;" class="fw-semibold">Total</h5>
                                                <h4>Rp {{ number_format($totalPriceProducts,0,',','.') }}</h4>
                                                <input type="hidden" name="totalPriceProducts" value="{{ $totalPriceProducts }}">
                                                </div>
                                                      <button type="submit" class="btn custom-button">Checkout</button>
                                                </div>
                                          </div>                                                                            
                                          </div>
                                    </div>
                              </div>
                              </div>
                        </div>
                        </div>
                  </div>
            </section>
      </form>
      </div>
</x-app>