@props(['post'])

<x-panel class="flex flex-row gap-x-6">
    <div>
        <x-publisher-logo :publisher="$post->publisher" />
    </div>

    <div class="flex-1 flex flex-col">
        <div class="flex justify-between items-center">
        <a href="{{route('publishers.show', $post->publisher->id)}}" class="self-start text-sm text-gray-400 transition-colors duration-500">{{$post->publisher->name}}</a>
            <x-save-button :$post />
        </div>
        <a href="{{route('posts.show', $post->id)}}">
        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800  transition-colors duration-300">{{$post->title}}</h3>

        <p class="text-sm text-gray-400 mt-auto"> {{ Str::limit(strip_tags($post->description), 150) }}</p>

        </a>
    </div>

    <div>
        @foreach($post->tags as $tag)

            <x-tag :$tag  />
        @endforeach
    </div>
</x-panel>



