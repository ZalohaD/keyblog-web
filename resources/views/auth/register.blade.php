<x-layouts.layout>
    <x-page-heading>Register</x-page-heading>


        <x-form.form method="POST" action="{{ route('register.store') }}">
            <x-form.input label="Name" name="name" required />
            <x-form.input label="Email" name="email" required />
            <x-form.input type="password" label="Password" name="password" required />
            <x-form.input type="password" label="Password Confirmation" name="password_confirmation" required />

            <x-form.divider />
            <div class="flex justify-between items-center">
                <x-form.button type="submit">Create  Account</x-form.button>
                <div>
                    <p class="mb-2">Already have account? </p>
                    <a href="{{route('login')}}" class="bg-gray-300 rounded-xl py-2 px-6 font-bold text-black">Log in</a>
                </div>
            </div>
        </x-form.form>


</x-layouts.layout>
