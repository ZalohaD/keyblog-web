<x-layout>
    <x-form method="POST" action="{{route('login.store')}}">
        <x-form.input name="email" label="Email" />
        <x-form.input name="password" type="password" label="Password" />
        <x-form.button>Log in</x-form.button>
    </x-form>
</x-layout>
