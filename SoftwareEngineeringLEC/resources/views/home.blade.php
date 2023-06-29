<x-app>
    <div class="pb-5" style="font-family: 'Inter'; background-color: #121212;">
    <section>
        <div class="container-fluid carousel-container">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ url('/storage/images/asset_website/slideshow1.png') }}" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('/storage/images/asset_website/slideshow2.png') }}" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('/storage/images/asset_website/slideshow3.png') }}" alt="...">
                </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5 text-white">
            <div class="row">
                <div class="col">
                <h4 class="fw-semibold mb-4">Recommended Cosplay</h4>
                <div class="col-12">
                    <div class="row">
                        @foreach ($recomendeds as $product)
                            <div class="col">
                                <a href="{{ route('products.show', $product) }}" class="text-decoration-none text-white">
                                        <img
                                        
                                        @if(isset($product->image))
                                            src="{{ url('/storage/images/products/' . $product->image) }}"
                                        @else
                                            src="{{ url('/storage/images/asset_website/crossboard.png') }}"
                                        @endif
                                        
                                        class="rounded float custom-image-size mb-3" alt="Image">
                                        <h5>{{ $product->name }}</h5>
                                        <p style="color: #707070;">Rp{{ number_format($product->price,0,',','.') }}</p>
                                </a>
                            </div>
                        @endforeach
                    
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5 text-white">
              <div class="row">
                <div class="col">
                  <h4 class="fw-semibold mb-4">Best Selling</h4>
                  <div class="col-12">
                    <div class="row">
                        @foreach ($sellings as $product)
                            <div class="col">
                                <a href="{{ route('products.show', $product) }}" class="text-decoration-none text-white">
                                        <img
                                        
                                        @if(isset($product->image))
                                            src="{{ url('/storage/images/products/' . $product->image) }}"
                                        @else
                                            src="{{ url('/storage/images/asset_website/crossboard.png') }}"
                                        @endif
                                        
                                        class="rounded float custom-image-size mb-3" alt="Image">
                                        <h5>{{ $product->name }}</h5>
                                        <p style="color: #707070;">Rp{{ number_format($product->price,0,',','.') }}</p>
                                </a>
                            </div>
                        @endforeach
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
                  <h4 class="fw-semibold mb-4">Popular Anime Cosplay</h4>
                  <div class="col-12">
                    <div class="row">
                        @foreach ($populars as $product)
                            <div class="col">
                                <a href="{{ route('products.show', $product) }}" class="text-decoration-none text-white">
                                        <img
                                        
                                        @if(isset($product->image))
                                            src="{{ url('/storage/images/products/' . $product->image) }}"
                                        @else
                                            src="{{ url('/storage/images/asset_website/crossboard.png') }}"
                                        @endif
                                        
                                        class="rounded float custom-image-size mb-3" alt="Image">
                                        <h5>{{ $product->name }}</h5>
                                        <p style="color: #707070;">Rp{{ number_format($product->price,0,',','.') }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </section>
    </div>
</x-app>
{{-- <x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
            <p class="text-center">Halo {{ $user->name }}</p>
            <div class="d-flex gap-2 col-12">
                <a href="{{ route('addresses.create') }}" class="btn btn-primary mb-2">Create Your Address</a>
                <a href="{{ route('addresses.view') }}" class="btn btn-primary mb-2">View Your Addresses</a>
            </div>
            <div class="d-flex gap-2 col-12">
                <a href="{{ route('payments.create') }}" class="btn btn-primary mb-2">Create Your Payment Method</a>
                <a href="{{ route('payments.view') }}" class="btn btn-primary mb-2">View Your Payment Methods</a>
            </div>
            <div class="mb-3">
                <input type="radio" class="form-control bi bi-star d-inline p-0 border-0" name="ratingstar" id="rating1" value="1">
                <label for="rating1" class=""></label>
                <input type="radio" class="form-control bi bi-star d-inline p-0 border-0" name="ratingstar" id="rating2" value="2">
                <label for="rating2" class=""></label>
                <input type="radio" class="form-control bi bi-star d-inline p-0 border-0" name="ratingstar" id="rating3" value="3">
                <label for="rating3" class=""></label>
                <input type="radio" class="form-control bi bi-star d-inline p-0 border-0" name="ratingstar" id="rating4" value="4">
                <label for="rating4" class=""></label>
                <input type="radio" class="form-control bi bi-star d-inline p-0 border-0" name="ratingstar" id="rating5" value="5">
                <label for="rating5" class=""></label>
            </div>
            
            <a href="{{ route('payments.create') }}" class="btn btn-primary mb-2">Create Your Payment Method</a>
        </div>
    </div>
</x-app> --}}
