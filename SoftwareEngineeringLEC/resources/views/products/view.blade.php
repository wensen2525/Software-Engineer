{{-- <x-app>
      <div class="container">
          <div class="row">
                  <p class="text-center">Halo {{ $user->name }}</p>
                  <p>View Product</p>
                <div class="row">
                        <div class="col">
                            <p class="mb-1">{{ $product->id }}</p>
                            <p class="mb-1">{{ $product->name }}</p>
                            <p class="mb-1">{{ $product->description }}</p>
                            <p class="mb-1">{{ $product->stock }}</p>
                            <p class="mb-1">{{ $product->price }}</p>
                            <div class="mb-1">
                                <img src="{{ url('/storage/images/products/' . $product->image) }}" alt="{{ $product->name . '-image' }}" style="width:120px;height:120px;object-fit:cover" class="img-fluid border border-dark rounded-2">
                            </div>
                            <div>
                              <form action="{{ route('carts.store') }}" method="POST" id="formproduct" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product">
                                <div>
                                    <select name="size" id="">
                                        <option hidden="hidden" value="{{ $sz->id }}" selected>{{ $sz->name }}</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ( isset($product->stock) && $product->stock != 0)
                                    <div class="input-group quantity-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minuss btn btn-danger btn-number"  data-type="minus" data-field="">
                                            <span><i class="bi bi-dash-lg"></i></span>
                                            </button>
                                        </span>
                                        <input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="{{ $product->stock }}">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-pluss btn btn-success btn-number" data-type="plus" data-field="">
                                            <span><i class="bi bi-plus-lg"></i></span>
                                            </button>
                                        </span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    <button type="submit" class="btn btn-primary" formaction="{{ route('checkones.view') }}" formmethod="POST">Buy</button>
                                @else
                                    <p class="text-danger">out of stock</p>
                                @endif
                                
                              </form>
                            </div>
                            <a href="{{ route('ratings.rating', $product->id) }}" type="submit" class="btn btn-warning">Rating</a>
                            <b>Review List = {{ number_format($product->averageStar,2,'.',',') }} / 5.00</b>
                            @foreach($product->ratings as $rating)
                                <p class="mb-1">p_id = {{ $rating->product_id }}</p>
                                <p class="mb-1">text = {{ $rating->reviewText }}</p>
                                <p class="mb-1">star = {{ $rating->ratingStar }}</p>
                                <p>=============================================</p>
                            @endforeach
                        </div>
                </div>
                
          </div>
      </div>
</x-app> --}}

<x-app>
    <div style="font-family: 'Inter'; background-color: #121212;">
        <section>
            <div class="container text-white mb-3 ">
                <div class="row">
                        <div class="col-auto mx-5 my-3">
                            <a href="{{ route('products.index') }}" style="display: flex; align-items: center; text-decoration: none;">
                                    <img src="{{ url('/storage/images/asset_website/backarrow.svg')}}" alt="" style="margin-right: 5px;">
                                    <h5 style="margin: 0; padding-right: 10px; color: white; text-decoration: none;">Back to Product List</h5>
                            </a>
                        </div>
                        <div class="col-auto"></div>
                </div>
            </div>                        
        </section>
        
        <section>
            <div class="container text-white">
                <div class="row">
                        <div class="col-5 mx-5" style="padding-right: 5%;">
                            <div style="margin: 10px;">
                                    <div class="row">
                                        <img src="{{ url('/storage/images/products/' . $product->image) }}" class="custom-image-preview" alt="Image">
                                    </div>
                            </div>
                            
                            <div class="row">
                                    <img src="{{ url('/storage/images/products/' . $product->image) }}" class="custom-image-thumbnail" alt="Image">
                                    <img src="{{ url('/storage/images/products/' . $product->image) }}" class="custom-image-thumbnail" alt="Image">
                                    <img src="{{ url('/storage/images/products/' . $product->image) }}" class="custom-image-thumbnail" alt="Image">
                                    <img src="{{ url('/storage/images/products/' . $product->image) }}" class="custom-image-thumbnail" alt="Image">
                            </div>
                            
                        </div>
                        <div class="col" style="padding-right: 5%;">
                            <h2 style="margin: 15px 0 20px 0;">{{ $product->name }}</h2>
                            
                            <div style="margin-bottom: 30px;">
                                    <div class="row">                                                
                                        <div class="col">
                                            <p>Product Price</p>
                                        </div>
                                        <div class="col">
                                            <p>Rp {{ number_format($product->price,0,',','.') }}</p>
                                        </div>
                                    </div>
                                    <div class="row">                                                
                                        <div class="col">
                                            <p>Product Description</p>
                                        </div>
                                        <div class="col">
                                            <p>{{ $product->description }}</p>
                                        </div>
                                    </div>
                                    <div class="row">                                                
                                        <div class="col">
                                                <p>Product Rating</p>
                                        </div>
                                        <div class="col">
                                            @if($product->averageStar == 0)
                                                <p class="text-warning">Not have review yet</p>
                                            @else
                                                <p>{{ number_format($product->averageStar,1,',','.') }} / 5,0</p>
                                            @endif
                                                
                                        </div>
                                    </div>  
                            </div>
                            
                            <h5 class="mb-4">Delivery Info</h5>

                            <div style="background: linear-gradient(to right, #04bbec, #e201f7); height: 2px; margin-bottom: 20px;"></div>
                            <div class="mb-4">
                                    <div class="row">                                                
                                        <div class="col">
                                                <p>Product Delivery</p>
                                        </div>
                                        <div class="col">
                                                <p>JNT</p>
                                        </div>
                                    </div>
                                    <div class="row">                                                
                                        <div class="col">
                                                <p>Product Delivery</p>
                                        </div>
                                        <div class="col">
                                                <p>JNE</p>
                                        </div>
                                    </div>
                            </div>
                            <form action="{{ route('carts.store') }}" method="POST" id="formproduct" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{ $product->id }}" name="product">
                                <div class="mb-4">
                                        <div class="panel-header">
                                            <p class="fw-semibold" style="display:inline-flex">Choose Product Type</p>
                                            <button type="button" class="dropDownBtn">
                                                    <img src="{{ url('/storage/images/asset_website/expand.svg')}}" alt="dropdown">
                                            </button>
                                        </div>
                                        <div class="panel">
                                            @if ( isset($product->stock) && $product->stock != 0)
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <p class="fw-semibold">Quantity</p>
                                                <div class="input-group quantity-group me-4 border border-dark rounded-2" style="width: 200px;">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-left-minuss btn btn-secondary btn-number"  data-type="minus" data-field="">
                                                        <span><i class="bi bi-dash-lg"></i></span>
                                                        </button>
                                                    </span>
                                                    <input type="number" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="{{ $product->stock }}">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-right-pluss btn btn-secondary btn-number" data-type="plus" data-field="">
                                                            <span><i class="bi bi-plus-lg"></i></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div style=" background: linear-gradient(to right, #04bbec, #e201f7); height: 2px;"></div>
                                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                                    <p class="fw-semibold">Size</p>
                                                    <select class="form-select me-4 border border-dark" aria-label="Default select example" style="width: 200px;" name="size">
                                                        <option hidden="hidden" value="{{ $sz->id }}" selected>{{ $sz->name }}</option>
                                                        @foreach ($sizes as $size)
                                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary d-block text-white my-3" style="width: 100%; background: linear-gradient(to right, #04bbec, #e201f7);border-radius: 5px; border: 0;" formaction="{{ route('checkones.view') }}" formmethod="POST">Checkout</button>
                                            <button type="submit" class="btn btn-primary d-block text-white" onclick="success()" style="width: 100%; border-radius: 5px; background: linear-gradient(#121212, #121212) padding-box, linear-gradient(to right, #04bbec, #e201f7) border-box; border: 2px solid transparent;">Add to Cart</button>
                                            @else
                                                <p class="text-warning">out of stock</p>
                                            @endif
                                        </div>
                                </div>

                            </form>
                        </div>
                </div>
            </div>
        </section>
        <section style="background-color: #121212;">
            <div class="container pt-5 text-white">
                <div class="row">
                        <div class="col">
                            <h4 class="fw-semibold mb-4">Product Review</h4>
                        </div>
                        <div style=" background: linear-gradient(to right, #04bbec, #e201f7); height: 2px; margin-bottom: 30px;"></div>

                        @foreach($product->ratings as $rating)
                            <div class="row mb-4">
                                <div class="col-1">
                                        <img src="{{ url('/storage/images/asset_website/user.svg')}}" width="60px" alt="pfp">
                                </div>
                                <div class="col-11">
                                    <h5>{{ $rating->user->name }}</h5>
                                    <p>{{ $rating->reviewText }}</p>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </section>
    </div>
</x-app>