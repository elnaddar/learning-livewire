<div class="p-5">
    <h1
        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Form</h1>
    <form class="p-5" wire:submit='createNewUser' action="">
        <input class="block rounded border border-gray-300 px-3 py-1 mb-1" wire:model='name' type="type"
            placeholder="name..">
        <input class="block rounded border border-gray-300 px-3 py-1 mb-1" wire:model='email' type="email"
            placeholder="email..">
        <input class="block rounded border border-gray-300 px-3 py-1 mb-1" wire:model='password' type="password"
            placeholder="password..">
        <input class="block rounded px-3 py-1 bg-gray-400 text-white"type="submit" value="submit">
    </form>
    <hr>
    <h2 class="text-4xl font-extrabold dark:text-white">All Users: {{ count($users) }}</h2>
    <ol class="list-decimal">
        @foreach ($users as $user)
            <li>
                <h3>{{ $user->name }}</h3>
                <p>{{ $user->email }}</p>
            </li>
        @endforeach
    </ol>
</div>
