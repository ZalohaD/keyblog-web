<x-layouts.dashboard>
    <x-page-heading>My Posts</x-page-heading>
    <main class="ml-24 mx-auto py-16 px-6 flex-1">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($posts as $post)
                <x-post-card :$post />
            @endforeach
        </div>
    </main>
</x-layouts.dashboard>
