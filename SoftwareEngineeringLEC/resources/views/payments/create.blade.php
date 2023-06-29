<x-app>
      <div class="container">
            <div class="row">
                  <p class="text-center">Halo {{ $user->name }}</p>
                  <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $user }}">
                        <div class="mb-3">
                              <label for="bankname" class="form-label">Bank Name</label>
                              <input type="type" class="form-control" name="bankname" required>
                        </div>
                        <div class="mb-3">
                              <label for="nameaccount" class="form-label">Name Account</label>
                              <input type="text" class="form-control" name="nameaccount" required>
                        </div>
                        <div class="mb-3">
                              <label for="numberaccount" class="form-label">Number Account</label>
                              <input type="type" class="form-control" name="numberaccount" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Create</button>
                  </form>
            </div>
      </div>
</x-app>
  