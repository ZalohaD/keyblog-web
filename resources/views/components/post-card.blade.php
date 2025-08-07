@props(['post'])

<x-panel class="flex flex-col text-center">


    <div class="flex justify-between items-center">
        <a href="{{ route('publishers.show', $post->publisher->id) }}" class="self-start text-sm">
            {{ $post->publisher->name }}
        </a>

      <x-save-button :$post />
    </div>

    <a href="{{ route('posts.show', $post->id) }}" class="py-9 w-full text-center group hover:text-blue-600 transition">
        <h3 class="text-xl font-bold">{{ $post->title }}</h3>
        <p class="text-sm mt-4">
            {{ Str::limit(strip_tags($post->description), 150) }}
        </p>
    </a>

    <div class="flex justify-between items-center mt-auto w-full">
        <div class="flex flex-wrap gap-x-3 gap-y-2">
            @foreach($post->tags as $tag)
                <x-tag :$tag size="small" />
            @endforeach
        </div>

        <x-publisher-logo :width="42" />
    </div>
    @if(request()->routeIs('dashboard.posts.myposts'))
    <div class="pt-5"  style="max-width: 5rem;">
    <a href="/" class="font-bold bg-blue-800 text-white rounded-xl py-2 px-6 w-full">
        Edit
    </a>
    </div>
    @endif

</x-panel>
