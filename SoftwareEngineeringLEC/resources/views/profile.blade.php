<x-app>
      <div class="pb-5" style="background-color: #121212; color: white;">
            <section>
                  <div class="container">
                        <div class="row">
                              <div class="menu text-decoration-none text-white">
                                    <a class="text-decoration-none text-white" href="#dashboard">Dashboard</a>
                                    <a class="text-decoration-none text-white" href="#password">Change Password</a>
                                    <a class="text-decoration-none text-white" href="#delivery">Delivery Address</a>
                                    <a class="text-decoration-none text-white" href="#payment">Payment Method</a>
                              </div>
                              <div class="col-3"></div>
                              <div class="col-9" id="dashboard">
                                    <div class="dashboard-profile profile-info">
                                          <h5 class="mb-4">Profile Dashboard</h5>
                                          <div class="profile-content d-flex flex-row ">
                                                <div class="profile-pic">
                                                      <img src="" class="bg-light " height="320px"/>
                                                      <button class="edit-avatar rainbow-button2" style="margin-top: 25px; border: none;">Edit Avatar</button>
                                                </div>
                                                <div class="profile-details" style="flex-grow: 1;">
                                                      <div class="form-set">
                                                            <h3>Name</h3>
                                                            <input type="text" value="{{ $user->name }}"  class="text-field">
                                                      </div>
                                                      <div class="form-set">
                                                            <h3>Gender</h3>
                                                            <input type="text"  class="text-field">
                                                      </div>
                                                      <div class="form-set">
                                                            <h3>Date of Birth</h3>
                                                            <input type="date"  class="text-field">
                                                      </div>
                                                      <div class="form-set">
                                                            <h3>Email</h3>
                                                            <input type="email"  value="{{ $user->email }}"  class="text-field">
                                                      </div>
                                                      <div class="form-set">
                                                            <h3>Phone Number</h3>
                                                            <input type="number"  class="text-field">
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="d-flex justify-content-end">
                                                <button class="w-25 rainbow-button2">Edit Profile</button>
                                          </div>
                                    </div>
                                    <hr style="height: 5px;" id="password">
                                    <div class="password-profile profile-info">
                                          <h5 class="mb-4">Change Password</h5>
                                          <div class="d-flex flex-row">
                                                <input type="password" style="width: 70%; margin-right: 5%" class="text-field">
                                                <button class="w-25 rainbow-button2">Edit Password</button>
                                          </div>
                                    </div>
                                    <hr style="height: 5px;" id="delivery">
                                    <div class="address-profile profile-info">
                                          <h5 class="mb-4">Delivery Address</h5>
                                          <!-- Address Card -->
                                          @foreach($addresses as $address)
                                          <div class="d-flex address-container flex-column" style="border: solid 1px #04BBEC; border-radius: 10px; margin: 10px 0;">
                                                <div class="address-info">
                                                      <h5 class="mr-auto mb-4" style="font-size: 20px; margin-bottom: 25px;">{{ $address->nameaddress }}</h5>
                                                      <button class="default-button" disabled>Default option</button>
                                                </div>
                                                <div class="address-info">
                                                      <h3 style="margin-left: 0;">Postal Code</h3>
                                                      <input type="number" class="address-text-field text-field" style="width: 10%; padding: 2px 0; text-align: center;">
                                                      <h3>Province</h3>
                                                      <input type="text" class="address-text-field text-field" style="width: 29%">
                                                      <h3>City</h3>
                                                      <input type="text" class="address-text-field text-field" style="width: 29%">
                                                </div>
                                                <div class="address-info" style="margin-top: 15px; flex-grow: 1;">
                                                      <input type="text" value="{{ $address->detailaddress }}" style="width:100%; height: fit-content;" class="text-field"/>
                                                      <button style="width: 87px; margin-left: 15px; margin-right: 0;" class="rainbow-button2">Edit</button>
                                                </div>
                                          </div>
                                          <div class="d-flex address-container flex-column" style="border: solid 1px white; border-radius: 10px; margin: 10px 0;">
                                                <div class="address-info">
                                                      <h5 class="mr-auto mb-4" style="font-size: 20px; margin-bottom: 25px;">Office</h5>
                                                      <button class="default-button">Set Default</button>
                                                </div>
                                                <div class="address-info">
                                                      <h3 style="margin-left: 0;">Postal Code</h3>
                                                      <input type="number" class="address-text-field text-field" style="width: 10%; padding: 2px 0; text-align: center;">
                                                      <h3>Province</h3>
                                                      <input type="text" class="address-text-field text-field" style="width: 29%">
                                                      <h3>City</h3>
                                                      <input type="text" class="address-text-field text-field" style="width: 29%">
                                                </div>
                                                <div class="address-info" style="margin-top: 15px; flex-grow: 1;">
                                                      <input type="text" style="width:100%; height: fit-content;" class="text-field"/>
                                                      <button style="width: 87px; margin-left: 15px; margin-right: 0;" class="rainbow-button2">Edit</button>
                                                </div>
                                          </div>
                                          @endforeach
                                          <!-- Add Address -->
                                          <a class="rainbow-button2 btn col-12" type="button" href="{{ route('addresses.create') }}" style="margin-top: 10px;">Add New Address</a>
                                    </div>
                                    <hr style="height: 5px;" id="payment">
                                    <div class="payment-profile profile-info" >
                                          <h5 class="mb-4">Payment Methods</h5>
                                          <!-- Payment Card -->
                                          <div class="d-flex address-container flex-row" style="border: solid 1px #04BBEC; border-radius: 10px; margin: 10px 0;">
                                                <img src="./Images/checkerboard.png" style="width: 40px; height: 40px; background-color: aqua; margin-right: 18px;">
                                                <div class="payment-info">
                                                      <h3 style="margin-left: 0; margin-bottom: 4px; font-weight: lighter;">BCA Account</h3>
                                                      <h3 style="margin-left: 0; margin-bottom: 4px;">10293289023231 - Robin</h3>
                                                </div>
                                                <button class="default-button ml-auto" disabled>Default option</button>
                                          </div>
                                          <div class="d-flex address-container flex-row" style="border: solid 1px white; border-radius: 10px; margin: 10px 0;">
                                                <img src="./Images/checkerboard.png" style="width: 40px; height: 40px; background-color: aqua; margin-right: 18px;">
                                                <div class="payment-info">
                                                      <h3 style="margin-left: 0; margin-bottom: 4px; font-weight: lighter;">Mandiri Account</h3>
                                                      <h3 style="margin-left: 0; margin-bottom: 4px;">10293289323031 - Robin</h3>
                                                </div>
                                                <button class="default-button ml-auto">Set Default</button>
                                          </div>

                                          <!-- Payment Button -->
                                          <a class="rainbow-button2 btn col-12" type="button" href="{{ route('payments.create') }}" style="margin-top: 10px;">Add New Methods</a>
                                    </div>
                              </div>
                        </div>
                  </div>
            </section>
      </div>
</x-app>