<div>
    <h1>Form</h1>
    <form wire:submit='createNewUser' action="">
        <input wire:model='name' type="type" placeholder="name..">
        <input wire:model='email' type="email" placeholder="email..">
        <input wire:model='password' type="password" placeholder="password..">
        <input type="submit" value="submit">
    </form>
    <hr>
    <h2>All Users: {{ count($users) }}</h2>
    <ol>
        @foreach ($users as $user)
            <li>
                <h3>{{ $user->name }}</h3>
                <p>{{ $user->email }}</p>
            </li>
        @endforeach
    </ol>
</div>
