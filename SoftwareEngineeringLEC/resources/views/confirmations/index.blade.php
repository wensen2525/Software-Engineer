{{-- <x-app>
      <div class="container">
            <div class="row">
                  <div class="col">
                        <li>{{ $confirmations->checkone->user->name }}</li>
                        <li>{{ $confirmations->checkone->id }}</li>
                        <li>{{ $confirmations->checkone->product->name }}</li>
                        <li>{{ $confirmations->paymentmethod->nameaccount }}</li>
                        <li>{{ $confirmations->address->nameaddress }}</li>
                        <li>{{ $confirmations->id }}</li>
                        <form action="{{ route('confirmations.update', $confirmations) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('UPDATE')
                              <input type="hidden" value="{{ $codeConfirmation }}" name="codeConfirmation">

                              <div>
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning">Confirm</button>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</x-app> --}}

<x-app>
      <div class="pb-5" style="font-family: 'Inter'; background-color: #121212;">
            <section>
                        <div class="container">
                              <div class="row pt-5 align-items-center">
                                    <div class="col-12">
                                          <h4 class="fw-semibold text-white">Payment</h4>
                                          <p class="text-white">Transfer your payment to the account below and don’t forget to double check before confirm payment</p>
                                    </div>
                              </div>
                        </div>
            </section>
            <section>
                        <div class="container">
                        <div class="col-12 mt-3">
                              <div class="row">
                              <div class="col-md-6">
                              <div class="card text-white" style="background-color: #2A2A2A; height: 100%;">
                                    <div class="row g-0 my-5 mx-5">
                                    <h6 class="fw-semibold">Payment Instruction</h6>
                                    <div class="border d-flex my-2" style="border-color: #FF901B !important;"></div>
                                    <ol class="list-unstyled" style="line-height: 2.5vw;">
                                    <li>Please follow these instructions to complete the payment process:
                                          <ol>
                                          <li>Choose m-Transfer > Bank Virtual Account.</li>
                                          <li>Input Virtual Account Number and choose Send.</li>
                                          <li>Check payment information and make sure that the provided information is correct.</li>
                                          <li>Choose the Yes option.</li>
                                          <li>Input PIN number and choose OK.</li>
                                          </ol>
                                    </li>
                                    </ol>
                                    </div>
                              </div>
                              </div>
                              <div class="col-md-6">
                              <div class="card text-white" style="background-color: #2A2A2A; height: 100%;">
                                    <div class="row g-0 my-5 mx-5" style="line-height: 2.5vw;">
                                    <h6 class="fw-semibold">Payment Detail</h6>
                                    <div class="border d-flex my-2" style="border-color: #FF901B !important;"></div>
                                    <div class="row g-0">
                                    <div class="col">Total Price</div>
                                    <div class="col text-end">Rp {{ number_format($confirmations->checkone->totalPriceProduct,0,',','.') }}</div>
                                    </div>
                                    <div class="row g-0 mb-4">
                                    <div class="col">Payment Time Remaining</div>
                                    <div class="col text-end" style="color: #FF901B;">42 minutes 11 seconds</div>
                                    </div>
                                    <div class="card my-2" style="background-color: white;">
                                    <div class="row m-2 mx-3 align-items-center">
                                          <div class="col fw-semibold">BCA</div>
                                          <div class="col text-end">
                                          <img src="{{ url('/storage/images/asset_website/BCA_logo_Bank_Central_Asia 1.svg') }}" alt="BCA" style="height: 20px;">
                                          </div>
                                    </div>
                                    </div>
                                    <div class="card my-2" style="background-color: white;">
                                    <div class="row m-2 mx-3 align-items-center">
                                          <div class="col fw-semibold">Account Number</div>
                                          <div class="col fw-semibold text-end" style="color: #FF901B;">8462 6358 6736 7262</div>
                                    </div>
                                    </div>
                                    <div class="mt-3 text-end">
                                    <form action="{{ route('confirmations.update', $confirmations) }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          @method('UPDATE')
                                          <input type="hidden" value="{{ $codeConfirmation }}" name="codeConfirmation">
            
                                          <div>
                                                @method('PUT')
                                                <button type="submit" class="btn fw-semibold" style="background: linear-gradient(to right, #E200F7, #04BBEC); padding: 1vw; padding-right: 3vw; padding-left: 3vw; border: none; color: white;">Confirm Payment</button>
                                          </div>
                                    </form>
                                    {{-- <a href="./order_success.html" type="button" class="btn fw-semibold" style="background: linear-gradient(to right, #E200F7, #04BBEC); padding: 1vw; padding-right: 3vw; padding-left: 3vw; border: none; color: white;">Confirm Payment</a> --}}
                                    </div>
                                    </div>
                              </div>
                              </div>
                              </div>
                        </div>
                        </div>                                              
            </section>
      </div>
</x-app>