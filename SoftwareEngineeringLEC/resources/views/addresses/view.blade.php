<x-app>
      <div class="container">
            <div class="row">
                  <p class="text-center">Halo {{ $user->name }}</p>
                  <ul>
                        @foreach($addresses as $address)
                        <li>
                              <div>
                                    {{ $address->nameaddress }}
                              </div>
                              <div>
                                    {{ $address->detailaddress }}
                              </div>
                              <div>
                                    {{ $address->user->name }}
                              </div>
                        </li>
                        @endforeach
                  </ul>
            </div>
      </div>
</x-app>