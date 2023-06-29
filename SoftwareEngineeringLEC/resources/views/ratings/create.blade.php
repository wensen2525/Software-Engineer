{{-- <x-app>
      <div class="container">
            <div class="row">
                  <p class="text-center">Halo {{ $user->name }}</p>
                  <form action="{{ route('ratings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{ $user }}">
                        <input type="hidden" value="{{ $product->id }}" name="product">
                        <p>{{ $product->name }}</p>
                        <div class="mb-3 form-check">
                              <input type="radio" class="form-control bi bi-star d-inline p-0 border-0" name="ratingstar" checked id="rating1" value="1">

                              <input type="radio" class="form-control bi bi-star d-inline p-0 border-0" name="ratingstar" id="rating2" value="2">

                              <input type="radio" class="form-control bi bi-star d-inline p-0 border-0" name="ratingstar" id="rating3" value="3">

                              <input type="radio" class="form-control bi bi-star d-inline p-0 border-0" name="ratingstar" id="rating4" value="4">

                              <input type="radio" class="form-control bi bi-star d-inline p-0 border-0" name="ratingstar" id="rating5" value="5">

                        </div>
                        <div class="mb-3">
                              <label for="reviewtext" class="form-label">Review</label>
                              <input type="text" class="form-control" name="reviewtext" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Create</button>
                  </form>
            </div>
      </div>
</x-app> --}}

<x-app>
      <div style="font-family: 'Inter'; background-color: #121212;">
            <div class="container">
                  <div class="row pt-3">
                        <div class="col-2 pe-3 mt-4 pt-2 d-flex flex-column gap-3 text-decoration-none">
                              {{-- <a class="text-decoration-none text-warning" style="font-weight: 700" id="unpaid-btn" href="#">Need to be paid</a> --}}
                              <a class="text-decoration-none text-warning" style="font-weight: 700" href="#">Success</a>
                        </div>
                        <div class="col-10" id="paid">
                              <div class="midcards">
                                    <div class="container">
                                          <div class="row">
                                                <a href="{{ route('orders.index') }}" class="mb-3" style="display: flex; align-items: center; text-decoration: none; color: white;">
                                                      <img src="{{ url('/storage/images/asset_website/backarrow.svg')}}" alt="" width="20px" style="margin-right: 5px;">
                                                      <p style="margin: 0;font-weight:700">Back to My Order</p>
                                                </a>
                                                <div class="">
                                                      <p class="text-white" style="margin-right: 20px;">January 1, 6969</p>
                                                      <p class="onprocess bg-success text-white" style="margin-right: 20px; padding: 3px 10px;">Completed</p>
                                                      {{-- <p class="text-white">{{ $order->codeConfirmation }}</p> --}}
                                                </div>
                                                <div class="row">
                                                      <div class="col-auto" >
                                                            <img src="{{ url('/storage/images/products/' . $product->image) }}" class="product-img" alt="image" style="width: 125px;height:125px;object-fit:cover">
                                                      </div>
                                                      <div class="col-auto">
                                                            <p class="text-white ">{{ $product->name }}</p>
                                                            {{-- <p class="text-white">Size : {{ $order->cart->size->name }}</p> --}}
                                                            <div class="gradient" style="height: 2px; margin: 15px 0;"></div>
                                                            <p class="text-white">Rp {{ number_format($product->price,0,',','.') }}</p>
                                                      </div>
                                                      {{-- <div class="col" style="text-align: center; padding: 0%;">
                                                            
                                                      </div> --}}
                                                      
                                                </div>
                                                <form action="{{ route('ratings.store') }}" method="POST" enctype="multipart/form-data">
                                                      @csrf
                                                      <input type="hidden" value="{{ $user }}">
                                                      <input type="hidden" value="{{ $product->id }}" name="product">
                                                      <div class="mt-3">
                                                            <p class="text-white fs-5" style="font-weight: 600">Give Product Rating</p>
                                                            <div style="height: 4px; margin: 25px 0; background-color: #ffffff;"></div>
                                                            <div class="">
                                                                  <p class="text-white" style="display: inline-block; padding-right: 50px;">Product Quality</p>
                                                                  <input type="radio" class="form-control bi bi-star d-inline p-0 border-0 star" name="ratingstar" id="rating1" value="1" onclick="rate(1)" checked>
                                                                  {{-- <label for="rating1" class=""></label> --}}
                                                                  <input type="radio" class="form-control bi bi-star d-inline p-0 border-0 star" name="ratingstar" id="rating2" value="2" onclick="rate(2)">
                                                                  {{-- <label for="rating2" class=""></label> --}}
                                                                  <input type="radio" class="form-control bi bi-star d-inline p-0 border-0 star" name="ratingstar" id="rating3" value="3" onclick="rate(3)">
                                                                  {{-- <label for="rating3" class=""></label> --}}
                                                                  <input type="radio" class="form-control bi bi-star d-inline p-0 border-0 star" name="ratingstar" id="rating4" value="4" onclick="rate(4)">
                                                                  {{-- <label for="rating4" class=""></label> --}}
                                                                  <input type="radio" class="form-control bi bi-star d-inline p-0 border-0 star" name="ratingstar" id="rating5" value="5" onclick="rate(5)">
                                                                  {{-- <label for="rating5" class=""></label> --}}
                                                            </div>
                                                      </div>

                                                      <div class="midcards">
                                                            <div class="container comment-list" style="width: 100%; max-width: 1400px;">
                                                                  <div class="row" style="margin: 25px 0; width: 100%;">
                                                                        <div class="col-auto">
                                                                              <img src="{{ url('/storage/images/asset_website/user.svg') }}" width="80px" alt="pfp">
                                                                        </div>
                                                                        <div class="col">
                                                                              <div class="row" style="margin-right: 20px;">
                                                                                    <h5 class="left-align text-white">{{ $user->name }}</h5>
                                                                                    <div style="height: 2px; margin: 15px 12px; background-color: white; width: 97%;"></div>
                                                                                    <textarea id="" cols="30" rows="10" placeholder="Write your review here..." class="input-text" name="reviewtext" required></textarea>
                                                                                    <div class="text-right">
                                                                                          <button class="gradient margin15" type="submit" style="min-width: 40px; max-width: 120px; width: 100%; color: white; padding: 6px; margin-top: 10px; border-radius: 5px; border: 0; float: right;">Submit</button>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                          
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      
</x-app>

<script>
      function rate(score) {
            document.getElementById('rating5').classList.remove('bi-star-fill')
            document.getElementById('rating4').classList.remove('bi-star-fill')
            document.getElementById('rating3').classList.remove('bi-star-fill')
            document.getElementById('rating2').classList.remove('bi-star-fill')
            document.getElementById('rating1').classList.remove('bi-star-fill')
            document.getElementById('rating5').classList.add('bi-star')
            document.getElementById('rating4').classList.add('bi-star')
            document.getElementById('rating3').classList.add('bi-star')
            document.getElementById('rating2').classList.add('bi-star')
            document.getElementById('rating1').classList.add('bi-star')

            switch(score) {
                  case 5:{
                        document.getElementById('rating5').classList.remove('bi-star')
                        document.getElementById('rating5').classList.add('bi-star-fill')
                  }
                  case 4:{
                        document.getElementById('rating4').classList.remove('bi-star')
                        document.getElementById('rating4').classList.add('bi-star-fill')
                  }
                  case 3:{
                        document.getElementById('rating3').classList.remove('bi-star')
                        document.getElementById('rating3').classList.add('bi-star-fill')
                  }
                  case 2:{
                        document.getElementById('rating2').classList.remove('bi-star')
                        document.getElementById('rating2').classList.add('bi-star-fill')
                  }
                  case 1:{
                        document.getElementById('rating1').classList.remove('bi-star')
                        document.getElementById('rating1').classList.add('bi-star-fill')
                        break;
                  }
            }
      }
</script>

{{-- <form action="{{ route('ratings.store') }}" method="POST" enctype="multipart/form-data"></form>
      <div class="container">
            <p class="ordertitle left-align">Give Product Rating</p>
            <div style="height: 4px; margin: 25px 0; background-color: #2A2A2A;"></div>
            <div class="left-align">
                  <p class="ordertitle left-align" style="display: inline-block; padding-right: 50px;">Product Quality</p>
                  <input type="radio" class="form-control bi bi-star d-inline p-0 border-0 star" name="ratingstar" id="rating1" value="1" onclick="rate(1)">
                  <label for="rating1" class=""></label>
                  <input type="radio" class="form-control bi bi-star d-inline p-0 border-0 star" name="ratingstar" id="rating2" value="2" onclick="rate(2)">
                  <label for="rating2" class=""></label>
                  <input type="radio" class="form-control bi bi-star d-inline p-0 border-0 star" name="ratingstar" id="rating3" value="3" onclick="rate(3)">
                  <label for="rating3" class=""></label>
                  <input type="radio" class="form-control bi bi-star d-inline p-0 border-0 star" name="ratingstar" id="rating4" value="4" onclick="rate(4)">
                  <label for="rating4" class=""></label>
                  <input type="radio" class="form-control bi bi-star d-inline p-0 border-0 star" name="ratingstar" id="rating5" value="5" onclick="rate(5)">
                  <label for="rating5" class=""></label>
            </div>
      </div>

      <div class="midcards">
            <div class="container comment-list" style="width: 100%; max-width: 1400px;">
                  <div class="row" style="margin: 25px 0; width: 100%;">
                        <div class="col-auto">
                              <img src="./Images/user.svg" width="80px" alt="pfp">
                        </div>
                        <div class="col">
                              <div class="row" style="margin-right: 20px;">
                                    <h5 class="left-align">Stefanus Jonathan</h5>
                                    <div style="height: 2px; margin: 15px 12px; background-color: white; width: 97%;"></div>
                                    <textarea name="" id="" cols="30" rows="10" placeholder="Write your review here..." class="input-text" name="reviewtext" required></textarea>
                                    <div class="text-right">
                                          <button class="gradient margin15" type="submit" style="min-width: 40px; max-width: 120px; width: 100%; color: white; padding: 6px; margin-top: 10px; border-radius: 5px; border: 0; float: right;">Submit</button>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</form> --}}