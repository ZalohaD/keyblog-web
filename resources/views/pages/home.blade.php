<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Discover More Keys</h1>
            <form action="" class="mt-6">
                <input
                    type="text"
                    placeholder="Difference between switches"
                    class="rounded-xl bg-white/10 py-4 px-5 w-full max-w-xl border border-white/10 focus:border-blue-500">
            </form>
        </section>
        <section>
            <x-section-heading>Top Posts</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-6">

                @foreach($featuredPosts as $post)
                    <x-post-card :$post />
                @endforeach

            </div>
        </section>
        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-6 space-x-1">

             @foreach($tags as $tag)
                <x-tag :$tag />
             @endforeach

            </div>
        </section>
        <section>
            <x-section-heading>New Posts</x-section-heading>
            <div class="mt-6 space-y-6">
                @foreach($posts as $post)
                    <x-post-card-wide :$post />
                @endforeach
                {{$posts->links()}}

            </div>
        </section>

    </div>
</x-layout>
