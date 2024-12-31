<div class="login-container">
    <div class="login-header">
        <img src="{{'assets/logo2.png'}}" alt="Library Logo">
        <h2>Perpustakaan Digital</h2>
    </div>
    <form>
        <div class="form-group">
            <input type="text" wire:model="email" class="form-control" id="email" placeholder="Email Anda">
            @error('email')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" wire:model="password" class="form-control" id="password" placeholder="Kata Sandi">
            @error('password')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="button" wire:click="proses" class="btn-login">Masuk</button>
    </form>
    <div class="text-center">
        <a href="#">Tidak bisa masuk?</a>
    </div>
</div>
