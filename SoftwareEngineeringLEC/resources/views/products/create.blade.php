<x-app>
      <div class="container">
            <div class="row">
                  <p class="text-center">Halo {{ $user->name }}</p>
                  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $user }}">
                        <div class="mb-3">
                              <label for="name" class="form-label">Product Name</label>
                              <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                              <label for="description" class="form-label">Detail</label>
                              <textarea type="text" class="form-control" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                              <label for="stock" class="form-label">Stock</label>
                              <input type="number" class="form-control" name="stock" required>
                        </div>
                        <div class="mb-3">
                              <label for="price" class="form-label">Price</label>
                              <input type="number" class="form-control" name="price" required>
                        </div>
                        <div class="mb-3">
                              <label for="image" class="form-label">Product Image</label>
                              <input type="file" class="form-control" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                  </form>
            </div>
      </div>
</x-app>
  