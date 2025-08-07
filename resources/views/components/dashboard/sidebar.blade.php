<aside class="w-64 bg-gray-900 h-screen p-6 fixed">
    <div class="mb-8">
        <a href="/">
            <img class="home-logo" src="{{Vite::asset('resources/images/logo.png')}}" alt="KeyBlog Logo" />
        </a>
    </div>
    <nav class="space-y-2">
        <a href="{{route('dashboard.index')}}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 @if(request()->is('dashboard')) bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg @else text-gray-300 hover:text-white hover:bg-gray-800 @endif">
            <svg class="w-5 h-5 mr-3 @if(request()->is('dashboard')) text-white @else text-gray-400 group-hover:text-white @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Profile
        </a>

        @if(!Auth::user()->publisher)
        <a href="{{route('dashboard.publisher.create')}}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 text-gray-300 hover:text-white hover:bg-gray-800 @if(request()->is('dashboard/create-publisher')) bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg @else text-gray-300 hover:text-white hover:bg-gray-800 @endif" onclick="showPage('publisher-register')">
            <svg class="w-5 h-5 mr-3 @if(request()->is('dashboard/create-publisher')) text-white @else text-gray-400 group-hover:text-white @endif text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Register as Publisher
        </a>

        @endif
        <a href="{{route('dashboard.posts.saved')}}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 text-gray-300 hover:text-white hover:bg-gray-800 @if(request()->is('dashboard/saved-posts')) bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg @else text-gray-300 hover:text-white hover:bg-gray-800 @endif">
            <svg class="w-5 h-5 mr-3 text-gray-400 @if(request()->is('dashboard/saved-posts')) text-white @else text-gray-400 group-hover:text-white @endif group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
            </svg>
            Saved Posts
        </a>

        @if(Auth::user()->publisher)
        <a href="{{route('dashboard.publisher.create')}}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 text-gray-300 hover:text-white hover:bg-gray-800 @if(request()->is('dashboard/publisher')) bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg @else text-gray-300 hover:text-white hover:bg-gray-800 @endif">
            <svg class="w-5 h-5 mr-3 text-gray-400 @if(request()->is('dashboard/publisher')) text-white @else text-gray-400 group-hover:text-white @endif group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            Publisher Profile
        </a>

        <a href="{{route('dashboard.posts.create')}}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 text-gray-300 hover:text-white hover:bg-gray-800" onclick="showPage('create-post')">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
            </svg>
            Create Post
        </a>

            <a href="{{route('dashboard.posts.myposts')}}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 text-gray-300 hover:text-white hover:bg-gray-800" onclick="showPage('my-posts')">
                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                My Posts
            </a>

        @endif
        <div class="pt-4 mt-4 border-t border-gray-700">
            <form method="POST" action="{{route('logout')}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 text-red-400 hover:text-red-300 hover:bg-red-900/20">
                    <svg class="w-5 h-5 mr-3 text-red-500 group-hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout</button>
            </form>
        </div>
    </nav>
</aside>
