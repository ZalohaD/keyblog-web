<x-layout>
    <x-page-heading>Register</x-page-heading>


        <x-form.form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
            <x-form.input label="Name" name="name" required />
            <x-form.input label="Email" name="email" required />
            <x-form.input type="password" label="Password" name="password" required />
            <x-form.input type="password" label="Password Confirmation" name="password_confirmation" required />

            <x-form.divider />


            <x-form.input label="Publisher Name" name="name" required />
            <x-form.input label="Publisher Logo" name="logo" type="file" />
            <x-form.button type="submit">Create  Account</x-form.button>
        </x-form.form>


</x-layout>
