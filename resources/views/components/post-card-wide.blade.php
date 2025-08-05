@props(['post'])

<x-panel class="flex flex-row gap-x-6">

    <div>
        <x-publisher-logo />
    </div>

    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-sm text-gray-400 transition-colors duration-500">{{$post->publisher->name}}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800  transition-colors duration-300">{{$post->title}}</h3>

        <p class="text-sm text-gray-400 mt-auto">{{$post->description}}</p>
    </div>

    <div>
        @foreach($post->tags as $tag)

            <x-tag :$tag  />
        @endforeach
    </div>
</x-panel>



