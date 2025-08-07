<x-layouts.layout>

<div class="flex gap-8 max-w-6xl mx-auto">
    <aside class="w-80 flex-shrink-0">
        <div class="bg-white/5 rounded-lg p-6 sticky top-8">
            <div class="flex justify-center mb-4">
                @if($post->publisher->avatar)
                    <img src="{{ $post->publisher->avatar }}"
                         alt="{{ $post->publisher->name }}"
                         class="w-20 h-20 rounded-full object-cover border-2 border-white/20">
                @else
                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-2xl font-bold">
                        {{ strtoupper(substr($post->publisher->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            <h2 class="text-xl font-bold text-center mb-2">
                <a href="{{ route('publishers.show', $post->publisher->id) }}"
                   class="hover:text-blue-400 transition-colors">
                    {{ $post->publisher->name }}
                </a>
            </h2>

            @if($post->publisher->bio)
                <p class="text-sm text-gray-300 text-center leading-relaxed mb-4">
                    {{ $post->publisher->bio }}
                </p>
            @endif

        </div>
    </aside>

    <main class="flex-1 min-w-0">
        <header class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-4 text-sm text-gray-400">
                    <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                        {{ $post->created_at->format('M j, Y') }}
                    </time>
                    <span>•</span>
                    <span>{{ $post->read_time ?? '5' }} min read</span>
                </div>

                <x-save-button :$post />
            </div>

            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
                {{ $post->title }}
            </h1>


            @if($post->tags->count() > 0)
                <div class="flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                        <x-tag :$tag />
                    @endforeach
                </div>
            @endif
        </header>

        @if($post->image)
            <div class="mb-8 w-2xs">
                <img src="{{ asset('/storage/'.$post->image) }}"
                     alt="{{ $post->title }}"
                     class="w-full h-full object-cover rounded-lg">
            </div>
        @endif

        <article class="prose prose-invert prose-lg max-w-none">
            {!! $post->description !!}
        </article>

        <footer class="mt-12 pt-8 border-t border-white/20">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-400">Share:</span>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M19 0H5a5 5 0 00-5 5v14a5 5 0 005 5h14a5 5 0 005-5V5a5 5 0 00-5-5zM8 19H5V8h3v11zM6.5 6.732c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zM20 19h-3v-5.604c0-3.368-4-3.113-4 0V19h-3V8h3v1.765c1.396-2.586 7-2.777 7 2.476V19z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>

                <a href="{{ route('home') }}"
                   class="text-blue-400 hover:text-blue-300 transition-colors font-medium">
                    ← Back to Blog
                </a>
            </div>
        </footer>
    </main>
</div>
</x-layouts.layout>
