<x-app>
      <div class="container">
            <div class="row">
                  <p class="text-center">Halo {{ $user->name }}</p>
                  @foreach ($carts as $cart)
                        <div class="col">
                              {{-- <form action="{{ route('confirmations.update') }}" method="post" enctype="multipart/form-data"> --}}
                                    @csrf
                                    @method('UPDATE')
                                    <input type="checkbox" name="cart" value="{{ $cart }}">
                                    <div>
                                          <p>==============================</p>
                                          <p>{{$cart->product->name}}</p>
                                          <p>{{$cart->size->name}}</p>
                                          <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                                    <span><i class="bi bi-dash-lg"></i></span>
                                                    </button>
                                                </span>
                                                <input type="number" id="quantity" name="quantity" class="form-control input-number" value="{{ $cart->product->quantity }}" min="1" max="5">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                    <span><i class="bi bi-plus-lg"></i></span>
                                                    </button>
                                                </span>
                                            </div>
                                          <p>{{$cart->product->price}}</p>
                                          <p>{{$cart->product->totalPriceProduct}}</p>
                                    </div>
                                    <div>
                                          @method('PUT')
                                          <button type="submit" class="btn btn-primary">Pay</button>
                                    </div>
                              </form>
                        </div>
                  @endforeach
                  
            </div>
      </div>
</x-app>