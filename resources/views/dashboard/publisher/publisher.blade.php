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
        <section id="createPublisher" class="page  p-8 rounded-lg">
            <x-page-heading>Create publisher profile</x-page-heading>


            <x-form.form method="POST" action="{{route('dashboard.publisher.store')}}" class="text-gray-300 leading-relaxed" enctype="multipart/form-data">
                @csrf
                <x-form.input label="Publisher Name" name="name" :value="$user->publisher->name ?? ''"  />
                <x-form.input type="textarea" label="Bio" name="bio" :value="$user->publisher->bio ?? ''"  />
                <x-form.input label="Publisher Logo" name="logo" type="file" />
                <x-form.button>Create</x-form.button>
            </x-form.form>
        </section>

    </main>

</x-layouts.dashboard>
