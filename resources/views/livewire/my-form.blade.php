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
            class="block w-full text-sm bg-gray-900 rounded ring-1 ring-inset ring-gray-300">
        @error('image')
            <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror

        <input class="block px-3 py-1 text-white bg-gray-400 rounded hover:bg-gray-600"type="submit" value="submit">
    </form>
    <hr>
    <h2 class="text-4xl font-extrabold dark:text-white">All Users: {{ count($users) }}</h2>
    <ol class="list-decimal">
        @foreach ($users as $user)
            <li>
                @if ($user->image)
                    <img src="{{ $user->image }}">
                @endif
                <div>
                    <h3>{{ $user->name }}</h3>
                    <p>{{ $user->email }}</p>
                </div>
            </li>
        @endforeach
    </ol>
    {{ $users->links() }}
</div>
