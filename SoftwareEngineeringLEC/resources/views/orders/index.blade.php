<x-app>
      <div class="pb-5" style="font-family: 'Inter'; background-color: #121212;">
            <div class="container">
                  <div class="row pt-3">
                        <div class="col-2 pe-3 mt-4 pt-2 d-flex flex-column gap-3 text-decoration-none">
                              <a class="text-decoration-none text-warning" style="font-weight: 700" id="unpaid-btn" href="#">Need to be paid</a>
                              <a class="text-decoration-none text-white" style="font-weight: 700" id="paid-btn" href="#">Success</a>
                        </div>
                        {{-- @foreach($codes_unpaid as $code) --}}
                        <div class="col-10" id="unpaid">
                              {{-- <div class=" container order-number">
                                    <p class="text-white" style="text-align: left;">Order Number : #{{ $code->codeConfirmation }}</p>
                              </div> --}}
                              @foreach($orders_unpaid as $order)
                              {{-- @if($order->codeConfirmation == $code->codeConfirmation) --}}
                              <form action="{{ route('confirmations.update', $order) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('UPDATE')
                                    <input type="hidden" value="{{ $order->codeConfirmation }}" name="codeConfirmation">
                              <div class="midcards">
                                    <div class="container mid-list">
                                          <div class="row">
                                                <div class="orderheader">
                                                      <p class="text-white" style="margin-right: 20px;">January 1, 6969</p>
                                                      <p class="onprocess text-white" style="margin-right: 20px; padding: 3px 10px;">On Process</p>
                                                      <p class="text-white">{{ $order->codeConfirmation }}</p>
                                                </div>
                                                <div class="row">
                                                      <div class="col-auto" >
                                                            <img src="{{ url('/storage/images/products/' . $order->cart->product->image) }}" class="product-img" alt="image" style="width: 125px;height:125px;object-fit:cover">
                                                      </div>
                                                      <div class="col-auto">
                                                            <p class="text-white ">{{ $order->cart->product->name }}</p>
                                                            <p class="text-white">Size : {{ $order->cart->size->name }}</p>
                                                            <div class="gradient" style="height: 2px; margin: 15px 0;"></div>
                                                            <p class="text-white">{{ $order->cart->quantity }} x Rp {{ number_format($order->cart->product->price,0,',','.') }}</p>
                                                      </div>
                                                      <div class="col" style="text-align: center; padding: 0%;">
                                                            
                                                      </div>
                                                      <div class="col d-flex flex-column justify-content-center" style="text-align: center; padding: 0%;">
                                                            <p class="rightalign text-white">Total</p>
                                                            <p class="text-white fw-semibold rightalign" id="price">Rp {{ number_format($order->cart->totalPriceProduct,0,',','.') }}</p>
                                                            <a>
                                                                  @method('PUT')
                                                                  <button class="gradient" type="submit" style="min-width: 40px; max-width: 120px; width: 100%; color: white; padding: 6px; margin-top: 10px; border-radius: 5px; border: 0; float: right;">Pay</button>
                                                            </a>
                                                      </div>
                                                </div>
                                          </div>
                                          
                                    </div>
                              </div>
                              {{-- @endif --}}
                              @endforeach
                              @foreach($orders_s_unpaid as $order)
                              {{-- @if($order->codeConfirmation == $code->codeConfirmation) --}}
                              <form action="{{ route('confirmations.update', $order) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('UPDATE')
                                    <input type="hidden" value="{{ $order->codeConfirmation }}" name="codeConfirmation">
                              <div class="midcards">
                                    <div class="container mid-list">
                                          <div class="row">
                                                <div class="orderheader">
                                                      <p class="text-white" style="margin-right: 20px;">January 1, 6969</p>
                                                      <p class="onprocess text-white" style="margin-right: 20px; padding: 3px 10px;">On Process</p>
                                                      <p class="text-white">{{ $order->codeConfirmation }}</p>
                                                </div>
                                                <div class="row">
                                                      <div class="col-auto" >
                                                            <img src="{{ url('/storage/images/products/' . $order->checkone->product->image) }}" class="product-img" alt="image" style="width: 125px;height:125px;object-fit:cover">
                                                      </div>
                                                      <div class="col-auto">
                                                            <p class="text-white ">{{ $order->checkone->product->name }}</p>
                                                            <p class="text-white">Size : {{ $order->checkone->size->name }}</p>
                                                            <div class="gradient" style="height: 2px; margin: 15px 0;"></div>
                                                            <p class="text-white">{{ $order->checkone->quantity }} x Rp {{ number_format($order->checkone->product->price,0,',','.') }}</p>
                                                      </div>
                                                      <div class="col" style="text-align: center; padding: 0%;">
                                                            
                                                      </div>
                                                      <div class="col d-flex flex-column justify-content-center" style="text-align: center; padding: 0%;">
                                                            <p class="rightalign text-white">Total</p>
                                                            <p class="text-white fw-semibold rightalign" id="price">Rp {{ number_format($order->checkone->totalPriceProduct,0,',','.') }}</p>
                                                            <a>
                                                                  @method('PUT')
                                                                  <button class="gradient" type="submit" style="min-width: 40px; max-width: 120px; width: 100%; color: white; padding: 6px; margin-top: 10px; border-radius: 5px; border: 0; float: right;">Pay</button>
                                                            </a>
                                                      </div>
                                                </div>
                                          </div>
                                          
                                    </div>
                              </div>
                              {{-- @endif --}}
                              @endforeach
                        </div>
                        {{-- @endforeach --}}
                        <div class="col-10 d-none" id="paid">
                              @foreach($orders_paid as $order)
                              {{-- @if($order->codeConfirmation == $code->codeConfirmation) --}}
                              <div class="midcards">
                                    <div class="container mid-list">
                                          <div class="row">
                                                <div class="orderheader">
                                                      <p class="text-white" style="margin-right: 20px;">January 1, 6969</p>
                                                      <p class="onprocess bg-success text-white" style="margin-right: 20px; padding: 3px 10px;">Completed</p>
                                                      <p class="text-white">{{ $order->codeConfirmation }}</p>
                                                </div>
                                                <div class="row">
                                                      <div class="col-auto" >
                                                            <img src="{{ url('/storage/images/products/' . $order->cart->product->image) }}" class="product-img" alt="image" style="width: 125px;height:125px;object-fit:cover">
                                                      </div>
                                                      <div class="col-auto">
                                                            <p class="text-white ">{{ $order->cart->product->name }}</p>
                                                            <p class="text-white">Size : {{ $order->cart->size->name }}</p>
                                                            <div class="gradient" style="height: 2px; margin: 15px 0;"></div>
                                                            <p class="text-white">{{ $order->cart->quantity }} x Rp {{ number_format($order->cart->product->price,0,',','.') }}</p>
                                                      </div>
                                                      <div class="col" style="text-align: center; padding: 0%;">
                                                            
                                                      </div>
                                                      <div class="col" style="text-align: center; padding: 0%;">
                                                            <p class="rightalign text-white">Total</p>
                                                            <p class="text-white fw-semibold rightalign" id="price">Rp {{ number_format($order->cart->totalPriceProduct,0,',','.') }}</p>
                                                            <a href="{{ route('ratings.rating', $order->cart->product->id) }}"class="gradient text-decoration-none" style="min-width: 40px; max-width: 120px; width: 100%; color: white; padding: 6px; margin-top: 10px; border-radius: 5px; border: 0; float: right;">
                                                                  Rate
                                                            </a>
                                                      </div>
                                                </div>
                                          </div>
                                          
                                    </div>
                              </div>
                              {{-- @endif --}}
                              @endforeach
                              @foreach($orders_s_paid as $order)
                              {{-- @if($order->codeConfirmation == $code->codeConfirmation) --}}
                              <div class="midcards">
                                    <div class="container mid-list">
                                          <div class="row">
                                                <div class="orderheader">
                                                      <p class="text-white" style="margin-right: 20px;">January 1, 6969</p>
                                                      <p class="onprocess bg-success text-white" style="margin-right: 20px; padding: 3px 10px;">Completed</p>
                                                      <p class="text-white">{{ $order->codeConfirmation }}</p>
                                                </div>
                                                <div class="row">
                                                      <div class="col-auto" >
                                                            <img src="{{ url('/storage/images/products/' . $order->checkone->product->image) }}" class="product-img" alt="image" style="width: 125px;height:125px;object-fit:cover">
                                                      </div>
                                                      <div class="col-auto">
                                                            <p class="text-white ">{{ $order->checkone->product->name }}</p>
                                                            <p class="text-white">Size : {{ $order->checkone->size->name }}</p>
                                                            <div class="gradient" style="height: 2px; margin: 15px 0;"></div>
                                                            <p class="text-white">{{ $order->checkone->quantity }} x Rp {{ number_format($order->checkone->product->price,0,',','.') }}</p>
                                                      </div>
                                                      <div class="col" style="text-align: center; padding: 0%;">
                                                            
                                                      </div>
                                                      <div class="col" style="text-align: center; padding: 0%;">
                                                            <p class="rightalign text-white">Total</p>
                                                            <p class="text-white fw-semibold rightalign" id="price">Rp {{ number_format($order->checkone->totalPriceProduct,0,',','.') }}</p>
                                                            <a href="{{ route('ratings.rating', $order->checkone->product->id) }}"class="gradient text-decoration-none" style="min-width: 40px; max-width: 120px; width: 100%; color: white; padding: 6px; margin-top: 10px; border-radius: 5px; border: 0; float: right;">
                                                                  Rate
                                                            </a>
                                                      </div>
                                                </div>
                                          </div>
                                          
                                    </div>
                              </div>
                              {{-- @endif --}}
                              @endforeach
                        </div>
                  </div>
            </div>
      </div>
      
</x-app>