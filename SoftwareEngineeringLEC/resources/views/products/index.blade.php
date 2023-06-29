{{-- <x-app>
      <div class="container">
          <div class="row">
                <p class="text-center">Halo {{ $user->name }}</p>
                <div class="d-flex gap-2 col-12">
                    <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Create Your Products</a>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col">
                            <p class="mb-1">{{ $product->id }}</p>
                            <p class="mb-1">{{ $product->name }}</p>
                            <p class="mb-1">{{ $product->description }}</p>
                            <p class="mb-1">{{ $product->stock }}</p>
                            <p class="mb-1">{{ $product->price }}</p>
                            <div class="mb-1">
                                <a href="{{ route('products.show', $product) }}"><img src="{{ url('/storage/images/products/' . $product->image) }}" alt="{{ $product->name . '-image' }}" style="width:120px;height:120px;object-fit:cover" class="img-fluid border border-dark rounded-2"></a>
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
                    @endforeach
                </div>
                
          </div>
      </div>
</x-app> --}}

<x-app>
    <div class="pb-5" style="font-family: 'Inter'; background-color: #121212;">
        <div class="container">
            <div class="row">
                <div class="col pt-5">
                    <div class="d-flex justify-content-center" >
                            <div class="d-flex flex-column" style="margin-right: 45px;">
                                <p class="text-white" style="font-weight: 500; font-size: 20px;">FILTER BY</p>
                                <div class="px-4 py-3 rounded-3" id="filter" style="width: 320px; height: 960px; background-color: #2a2a2a;">
                                        
                                        <form action="" class="d-flex flex-column gap-3">
                                            <div id="size mb-3">
                                                    <p class="mb-2 text-white" style="font-size: 16px; font-weight: 500;">Size</p>
                                                    <div class=" d-flex justify-content-between">
                                                        <div class="col d-flex flex-column gap-2">
                                                                <div class="form-check d-flex flex-wrap align-items-center">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 30px; height: 30px; margin-inline-end: 10px; border: solid 2px #FFFFFF; background-color: transparent;">
                                                                    <label class="form-check-label text-white" for="exampleCheck1">XS</label>
                                                                </div>
                                                                <div class="form-check d-flex flex-wrap align-items-center">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 30px; height: 30px; margin-inline-end: 10px; border: solid 2px #FFFFFF; background-color: transparent;">
                                                                    <label class="form-check-label text-white" for="exampleCheck1">L</label>
                                                                </div>
                                                                <div class="form-check d-flex flex-wrap align-items-center">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 30px; height: 30px; margin-inline-end: 10px; border: solid 2px #FFFFFF; background-color: transparent;">
                                                                    <label class="form-check-label text-white" for="exampleCheck1">S</label>
                                                                </div>
                                                        </div>
                                                        <div class="col d-flex flex-column gap-2">
                                                                <div class="form-check d-flex flex-wrap align-items-center">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 30px; height: 30px; margin-inline-end: 10px; border: solid 2px #FFFFFF; background-color: transparent;">
                                                                    <label class="form-check-label text-white" for="exampleCheck1">XL</label>
                                                                </div>
                                                                <div class="form-check d-flex flex-wrap align-items-center">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 30px; height: 30px; margin-inline-end: 10px; border: solid 2px #FFFFFF; background-color: transparent;">
                                                                    <label class="form-check-label text-white" for="exampleCheck1">M</label>
                                                                </div>
                                                        </div>
                                                        
                                                    </div>
                                            </div>
                                            <div id="color">
                                                    <p class="mb-2 text-white" style="font-size: 16px; font-weight: 500; margin-top: 5%;">Color</p>
                                                    <div>
                                                        <div class="d-flex gap-3 mb-3">
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #6E6E6E; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #9747FF; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #fbbc05; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #ff5607; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #f6412d; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #d91b5c; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                        </div>
                                                        <div class="d-flex gap-3">
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #0f75bc; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #13a89e; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #0b9444; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #8cc63f; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #ffffff; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                                <div class="col-2 p-2" style="width: 30px;height: 30px;background: #000000; border: solid 1px white; border-radius: 50%;">
                                                                    
                                                                </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div id="genre">
                                                    <p class="mb-2 text-white" style="font-size: 16px; font-weight: 500; margin-top: 5%;">Genre</p>
                                                    <div class="form" style="border: solid 2px transparent; border-radius: 5px; background-image: linear-gradient(#2a2a2a, #2a2a2a), radial-gradient(circle at top left, #E200F7,#04BBEC);
                                                        background-origin: border-box;background-clip: padding-box, border-box;">
                                                        <select class="form-select" style="background-color: transparent; border: none; color: #FFFFFF; ">
                                                            <option selected style="background-color: #2A2A2A;">Choose Your Genre</option>
                                                            <option value="1" style="background-color: #2A2A2A;">One</option>
                                                            <option value="2" style="background-color: #2A2A2A;">Two</option>
                                                            <option value="3" style="background-color: #2A2A2A;">Three</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div id="size">
                                                    <p class="mb-2 text-white" style="font-size: 16px; font-weight: 500; margin-top: 5%;">Item Type</p>
                                                    <div class=" d-flex justify-content-between">
                                                        <div class="col d-flex flex-column gap-2">
                                                                <div class="form-check d-flex flex-wrap align-items-center">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 30px; height: 30px; margin-inline-end: 10px; border: solid 2px #FFFFFF; background-color: transparent;">
                                                                    <label class="form-check-label text-white" for="exampleCheck1">Dress</label>
                                                                </div>
                                                                <div class="form-check d-flex flex-wrap align-items-center">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 30px; height: 30px; margin-inline-end: 10px; border: solid 2px #FFFFFF; background-color: transparent;">
                                                                    <label class="form-check-label text-white" for="exampleCheck1">Tops</label>
                                                                </div>
                                                                <div class="form-check d-flex flex-wrap align-items-center">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 30px; height: 30px; margin-inline-end: 10px; border: solid 2px #FFFFFF; background-color: transparent;">
                                                                    <label class="form-check-label text-white" for="exampleCheck1">Bottoms</label>
                                                                </div>
                                                        </div>
                                                        <div class="col d-flex flex-column gap-2">
                                                                <div class="form-check d-flex flex-wrap align-items-center">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 30px; height: 30px; margin-inline-end: 10px; border: solid 2px #FFFFFF; background-color: transparent;">
                                                                    <label class="form-check-label text-white" for="exampleCheck1">Accesories</label>
                                                                </div>
                                                                <div class="form-check d-flex flex-wrap align-items-center">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 30px; height: 30px; margin-inline-end: 10px; border: solid 2px #FFFFFF; background-color: transparent;">
                                                                    <label class="form-check-label text-white" for="exampleCheck1">Other</label>
                                                                </div>
                                                        </div>
                                                        
                                                    </div>
                                            </div>
                                            <div id="price">
                                                    <p class="mb-2 text-white" style="font-size: 16px; font-weight: 500; margin-top: 5%;">Price</p>
                                                    <div class="d-flex flex-column gap-3">
                                                        <p class="m-0 text-white rounded-2 text-center py-2" style="background-color: #121212;">Lowest First</p>
                                                        <p class="m-0 text-white rounded-2 text-center py-2" style="background-color: #121212;">Highest First</p>
                                                        <div class="d-flex ps-2 gap-3 mt-2 align-items-center">
                                                                <label for="minscrore" class="text-white">Min</label>
                                                                <input type="text" name="minscore" class="form-control" placeholder="" style="background-color: #333333; border: none; color: #FFFFFF;">
                                                        </div>
                                                        <div class="d-flex ps-2 gap-3 mt-2 align-items-center">
                                                                <label for="maxscrore" class="text-white">Max</label>
                                                                <input type="text" name="maxscore" class="form-control" placeholder="" style="background-color: #333333; border: none; color: #FFFFFF;">
                                                        </div>
                                                    </div>
                                            </div>
                                        </form>
                                </div>
                            </div>

                            <!-- Product List -->
                            <div class="d-flex flex-column">
                                <p class="text-white" style="font-weight: 500; font-size: 20px;">PRODUCT LIST</p>
                                <div class="row d-flex justify-content-between gap-4">
                                    @foreach ($products as $product)
                                        <a href="{{ route('products.show', $product) }}" class=" text-decoration-none text-white" style="width: 30%;">
                                            <img src="{{ url('/storage/images/products/' . $product->image) }}" class="bg-dark rounded-3 col-12" style="height: 250px;object-fit:cover;">
                                            <p class="m-0 mt-2" style="font-size: 20px; font-weight: 500;">{{ $product->name }}</p>
                                            <p style="font-size: 20px; font-weight: 500; color: #707070;">Rp {{ number_format($product->price,0,',','.') }}</p>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app>

  