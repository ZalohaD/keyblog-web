@props(['post'])
<x-panel class="flex flex-col text-center">

    <div class="self-start text-sm">{{$post->publisher->name}}</div>

    <div class="py-9  w-full text-center">
        <h3 class="group-hover:text-blue-600 transition-colors duration-300 text-xl font-bold">{{$post->title}}</h3>
        <p class="text-sm mt-4">{{$post->description}}</p>
    </div>

    <div class="flex justify-between items-center mt-auto w-full">
        <div class="flex flex-wrap gap-x-3 gap-y-2">

            @foreach($post->tags as $tag)

                <x-tag :$tag size="small" />
            @endforeach

        </div>

        <x-publisher-logo :width="42" />
    </div>
</x-panel>
