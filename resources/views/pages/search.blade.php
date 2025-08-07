<x-layouts.layout>
    <x-page-heading>Seacrh results</x-page-heading>

    <div class="grid lg:grid-cols-3 gap-8 mt-6">

        @foreach($results as $post)
            <x-post-card :$post />
        @endforeach

    </div>
</x-layouts.layout>
