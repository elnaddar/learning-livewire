<div>
    <form wire:submit.prevent="login">
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" wire:model="email">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" wire:model="password">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Login</button>
        @if (session()->has('error'))
            <span>{{ session('error') }}</span>
        @endif
    </form>
</div>
