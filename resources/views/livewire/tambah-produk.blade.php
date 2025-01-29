<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Produk') }}</div>

                <div class="card-body">
                    <form wire:submit.prevent="store">

                        <!-- Nama Produk -->
                        <label for="nama"
                            class="col-md-12 col-form-label text-md-left">{{ __('Nama Produk') }}</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            wire:model="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Harga Produk -->
                        <label for="harga"
                            class="col-md-12 col-form-label text-md-left">{{ __('Harga Produk') }}</label>
                        <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror"
                            wire:model="harga" value="{{ old('harga') }}" required autocomplete="harga">

                        @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Berat Produk -->
                        <label for="berat"
                            class="col-md-12 col-form-label text-md-left">{{ __('Berat Produk') }}</label>
                        <input id="berat" type="number" class="form-control @error('berat') is-invalid @enderror"
                            wire:model="berat" value="{{ old('berat') }}" required autocomplete="berat">

                        @error('berat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Gambar Produk -->
                        <label for="gambar"
                            class="col-md-12 col-form-label text-md-left">{{ __('Gambar Produk (*maks 2 MB)') }}</label>
                        <input id="gambar" type="file" wire:model="gambar" class="form-control">

                        @error('gambar')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror

                        <br><br>

                        <!-- Tombol Submit -->
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success w-100">Tambah Produk</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
