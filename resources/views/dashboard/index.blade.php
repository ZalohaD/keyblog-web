<x-layouts.dashboard>



    <main class="ml-24  mx-auto py-16 px-6 flex-1">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session('info'))
            <div class="bg-blue-100 text-blue-800 p-3 rounded mb-4">
                {{ session('info') }}
            </div>
        @endif
        <section id="profile" class="page 0 p-8 rounded-lg">
            <x-page-heading>Your Profile</x-page-heading>


            <x-form.form method="POST" action="{{route('dashboard.dashboard.profile.update')}}" class="text-gray-300 leading-relaxed">
                @csrf
                <x-form.input label="Name" name="name" :value="$user->name"  />
                <x-form.input label="Email" name="email" :value="$user->email"  />
                <x-form.input label="Old password" name="password" />
                <x-form.input label="Password" name="password"  />
                <x-form.button>Edit profile</x-form.button>
            </x-form.form>
        </section>

    </main>

</x-layouts.dashboard>
