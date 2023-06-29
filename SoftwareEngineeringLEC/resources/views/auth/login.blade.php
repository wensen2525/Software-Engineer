<x-navbar>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <section id="Login">
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
                        
                        <form class="d-flex flex-column px-5 py-3" style="font-family: Inter;" method="POST" action="{{ route('login') }}">
                                @csrf
    
                                <div class="d-flex justify-content-center align-items-center gap-5" style="font-family: 'Oswald', sans-serif; font-size: 30px;margin-bottom:50px">
                                    
                                    <a href="{{ route('login') }}" style="color: white; text-decoration: none;">{{ __('Login') }}</a>   
                                    <div style="width: 5px; height: 70px; background-color: white;"></div>
                                    <a href="{{ route('register') }}" style="color: #343434; text-decoration: none;">{{ __('Register') }}</a>                                 
                                </div>

                                <div class="d-flex flex-column gap-4">
                                    <div id="username_div" class="d-flex align-items-center">
                                    
                                            <i class="bi bi-person-circle text-white" style="position: absolute; font-size: 30px; margin-left: 15px;"></i>
                                            
                                            <div class="d-flex flex-column col-12">
                                            <input style="height: 65px; background-color: transparent; 
                                            border: none; border-radius: 0px ;
                                            border-bottom: solid 2px #FFFFFF; 
                                            padding-left: 65px; font-size: 16px; 
                                            font-weight: 500; color: #FFFFFF;" id="email" type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            name="email" placeholder="Email/Username" value="{{ old('email') }}" 
                                            required autocomplete="email" autofocus>
    
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
                                </div>

                                <div class="my-4 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input bg-trasparant" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-white m-0 p-0" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link m-0 p-0 text-decoration-none" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                                <button type="submit" class="btn py-2 mt-2" style="background: linear-gradient(45deg, #E200F7,#04BBEC);
                                    border: none; font-size: 16px; color: #FFFFFF; font-weight: 500;">{{ __('Login') }}</button>

                                <p class="d-flex justify-content-end text-decoration-none mt-3" style="font-size: 16px; color: #FFFFFF;">Dont have any account yet? Click <span><a class="text-primary text-decoration-none ms-1" href="{{ route('register') }}">{{ __('Here') }}</a></span></p>

                                <div class="d-flex flex-row align-items-center" >

                                    <div style="width: 50%; height: 3px; background-color: #FFFFFF;"></div>
                                    <p class="text-white mx-5" style="font-family: 'Oswald', sans-serif; font-size: 30px; font-weight: 500;">or</p>
                                    <div style="width: 50%; height: 3px; background-color: #FFFFFF;"></div>
                                </div>
                                <div class="d-flex flex-row justify-content-center gap-5" style="font-family: Inter; font-size: 16px; margin-top: 30px;">
                                    <div class="d-flex flex-column align-items-center">

                                            <img src="{{ url('/storage/images/asset_website/Google.png') }}" alt="" style="margin-bottom: 13px;">
                                            <p class="text-white">Google</p>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">

                                            <img src="{{ url('/storage/images/asset_website/Facebook.png') }}" alt="" style="margin-bottom: 13px;">
                                            <p class="text-white">Facebook</p>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">

                                            <img src="{{ url('/storage/images/asset_website/Twitter.png') }}" alt="" style="margin-bottom: 13px;">
                                            <p class="text-white">Twitter</p>
                                    </div>
                                </div>
                        </form>
                    </div>
              </div>
        </div>
    </section>
</x-navbar>
