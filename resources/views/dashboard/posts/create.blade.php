<x-layouts.dashboard>

    <x-page-heading>Create post</x-page-heading>

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


            <x-form.form method="POST" action="{{route('dashboard.posts.store')}}" class="text-gray-300 leading-relaxed"  enctype="multipart/form-data">
                @csrf
                <x-form.input label="Title" name="title"  />
                <x-form.input as="textarea" id="editor" label="Content" name="description"  />
                <select name="tags[]" id="tags" multiple class="rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                <x-form.input type="file" label="Image" name="image"/>
                <x-form.button>Create post</x-form.button>
            </x-form.form>
        </section>

    </main>
</x-layouts.dashboard>
