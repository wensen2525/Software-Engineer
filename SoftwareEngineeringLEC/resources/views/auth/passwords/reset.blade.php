{{-- <x-navbar>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-navbar> --}}


<x-navbar>
    <section>
        <div class="container-fluid" >
              <div class="row" style="min-height:100vh">
                    <div class="col-6 p-0 d-flex flex-column justify-content-between align-items-end pe-5 py-3" style="background:url('/storage/images/asset_website/backgroundlogin.png');background-repeat: no-repeat; background-size: cover;" alt="ironmanlogin">
                            <div class="d-flex align-items-end flex-column">
                                <img src="{{ url('/storage/images/asset_website/welcome.png') }}" alt="logo" class="img-fluid mb-2" style="height: 140px;">
                                <p class="d-flex justify-content-end text-white" style="font-family: Inter; font-size: 16px;">Lorem ipsum dolor sit amet.</p>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="d-flex flex-row text-center justify-content-end">
                                      <i class="bi bi-info-circle text-white" style="font-size: 18px; margin-right: 14px; font-family: 'Inter'; font-style: normal; font-weight: 600; font-size: 20px;"></i>
                                      <p class="text-white" style="font-family: 'Inter'; font-style: normal; font-weight: 600; font-size: 20px;">Fun Facts</p>
                                </div>
                                <p class="text-end text-white" style="width: 450px; font-family: 'Inter'; font-size: 16px;">Theatrical costumes were an innovation of the Greek poet Thespis in the 6th century bce, and theatrical costumes were long called “the robes of Thespis.”</p>
                            </div>

                    </div>
                    <div class="col-6 p-0 py-3 px-5" style="background: #090909" id="login_register">
                        
                        <form class="d-flex flex-column px-5 py-3" style="font-family: Inter;" method="POST" action="{{ route('password.update') }}" style="height: 100vh">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="d-flex justify-content-center align-items-center gap-5" style="font-family: 'Oswald', sans-serif; font-size: 30px;margin-bottom:50px">
                                    <a href="#" rel="Login" style="color: #ffffff; text-decoration: none;">{{ __('Reset Password') }}</a>
                                                                
                                </div>
                                <div class="d-flex flex-column gap-4">
                                    <div id="email_div" class="d-flex align-items-center mb-3">

                                            <i class="bi bi-person-circle text-white" style="position: absolute; font-size: 30px; margin-left: 15px;"></i>
                                            
                                            <div class="d-flex flex-column col-12">
                                                <input style="height: 65px; background-color: transparent; 
                                                border: none; border-radius: 0px ;
                                                border-bottom: solid 2px #FFFFFF; 
                                                padding-left: 65px; font-size: 16px; 
                                                font-weight: 500; color: #FFFFFF;" id="email" type="email" 
                                                class="form-control @error('email') is-invalid @enderror" 
                                                name="email" placeholder="Email Address" value="{{ old('email') }}" 
                                                required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div id="password_div" class="d-flex align-items-center">
                                            
                                        <i class="bi bi-lock-fill text-white" style="position: absolute; font-size: 30px; margin-left: 15px;"></i>
                                        <div class="d-flex flex-column col-12">
                                        <input style="height: 65px; background-color: transparent; 
                                        border: none; border-radius: 0px ;
                                        border-bottom: solid 2px #FFFFFF; 
                                        padding-left: 65px; font-size: 16px; 
                                        font-weight: 500; color: #FFFFFF;" placeholder="password"
                                        id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div id="confirm_password_div" class="d-flex align-items-center">
                                            
                                        <i class="bi bi-lock-fill text-white" style="position: absolute; font-size: 30px; margin-left: 15px;"></i>
                                        <input style="height: 65px; background-color: transparent; 
                                        border: none; border-radius: 0px ;
                                        border-bottom: solid 2px #FFFFFF; 
                                        padding-left: 65px; font-size: 16px; 
                                        font-weight: 500; color: #FFFFFF;" placeholder="confirm password"
                                        id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                

                                <button type="submit" class="btn py-2 mt-4" style="background: linear-gradient(45deg, #E200F7,#04BBEC);
                                    border: none; font-size: 16px; color: #FFFFFF; font-weight: 500;">{{ __('Reset Password') }}</button>

                                <p class="d-flex justify-content-end text-decoration-none mt-3" style="font-size: 16px; color: #FFFFFF;">Remember Already? <span><a class="text-primary text-decoration-none ms-1" href="{{ route('login') }}">{{ __('Back to login') }}</a></span></p>
                        </form>
                    </div>
              </div>
        </div>
    </section>
</x-navbar>