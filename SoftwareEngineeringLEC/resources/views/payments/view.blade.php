<x-app>
      <div class="container">
            <div class="row">
                  <p class="text-center">Halo {{ $user->name }}</p>
                  <ul>
                        @foreach($payments as $payment)
                        <li>
                              <div>
                                    {{ $payment->nameaccount }}
                              </div>
                              <div>
                                    {{ $payment->numberaccount }}
                              </div>
                              <div>
                                    {{ $payment->bankname }}
                              </div>
                              <div>
                                    {{ $payment->user->name }}
                              </div>
                        </li>
                        @endforeach
                  </ul>
            </div>
      </div>
</x-app>