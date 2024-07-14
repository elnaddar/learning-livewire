<div class="p-5">
    <h1
        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Form</h1>
    <form class="p-5" wire:submit='createNewUser' action="">
        <input class="block px-3 py-1 mb-1 border border-gray-300 rounded" wire:model='name' type="type"
            placeholder="name..">
        @error('name')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
        <input class="block px-3 py-1 mb-1 border border-gray-300 rounded" wire:model='email' type="email"
            placeholder="email..">
        @error('email')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror

        <input class="block px-3 py-1 mb-1 border border-gray-300 rounded" wire:model='password' type="password"
            placeholder="password..">
        @error('password')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror

        <input wire:model='image' accept="image/png image/jpeg" type="file"
            class="block p-2 mb-2 text-sm bg-gray-300 rounded ring-1 ring-inset ring-gray-900">
        @error('image')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
        @if ($image)
            <img class="w-20 h-20 mb-2 rounded" src="{{ $image->temporaryUrl() }}">
        @endif

        <input class="block px-3 py-1 text-white bg-gray-400 rounded hover:bg-gray-600"type="submit" value="submit">
        <div wire:loading>
            Loading....
        </div>
    </form>
    <hr>
    <h2 class="text-4xl font-extrabold dark:text-white">All Users: {{ count($users) }}</h2>
    <ol class="list-decimal">
        @foreach ($users as $user)
            <li>
                <div class="flex items-center">
                    @if ($user->image)
                        <img class="w-10 h-10 mr-2 rounded" src="{{ asset('storage/' . $user->image) }}">
                    @endif
                    <div>
                        <h3>{{ $user->name }}</h3>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ol>
    {{ $users->links() }}
</div>
