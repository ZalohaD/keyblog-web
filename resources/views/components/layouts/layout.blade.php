<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>KeyBlog</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-semi-black text-white pb-10">
  <div class="px-10">
      <nav class="flex justify-between items-center py-4 border-b border-white/30">
          <div>
              <a href="{{route('home')}}"><img class="home-logo" src="{{Vite::asset('resources/images/logo.png')}}" /> </a>
          </div>
          <div class="space-x-6 font-bold">
              <a href="">About</a>
              <a href="">Blog</a>
              <a href="">Contact Us</a>
          </div>
          @auth
              <div>
                  <a href="{{route('dashboard.index')}}">Dashboard</a>
              </div>
          @endauth
          @guest
          <div>
              <a href="{{route('register.index')}}">Start posting</a>
          </div>
          @endguest
      </nav>
      <main class="mt-10 max-w-[986px] mx-auto">
          {{$slot}}
      </main>
  </div>
</body>
</html>
