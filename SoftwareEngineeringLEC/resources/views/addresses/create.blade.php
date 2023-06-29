<x-app>
      <div class="container">
            <div class="row">
                  <p class="text-center">Halo {{ $user->name }}</p>
                  <form action="{{ route('addresses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $user }}">
                        <div class="mb-3">
                          <label for="name" class="form-label">Address Name</label>
                          <input type="type" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                          <label for="detailaddress" class="form-label">Detail <Address></Address></label>
                          <textarea type="text" class="form-control" name="detailaddress"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                  </form>
            </div>
      </div>
</x-app>