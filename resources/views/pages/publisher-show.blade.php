<x-layouts.layout>

    <x-page-heading>Posts made by {{$publisher->name}}</x-page-heading>
    <div class="grid lg:grid-cols-3 gap-8 mt-6">
    @foreach($posts as $post)
        <x-post-card :$post />
    @endforeach
    </div>
</x-layouts.layout>
