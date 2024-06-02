<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptek</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="w-full bg-gray-900 text-gray-200">
        <div x-data="{ open: false }" class="mx-auto flex max-w-screen-xl flex-col px-4 md:flex-row md:items-center md:justify-between md:px-6 lg:px-8">
          <div class="flex flex-row items-center justify-between p-4">
            <a href="{{route('welcome')}}" class="focus:shadow-outline rounded-lg text-lg font-semibold uppercase tracking-widest text-white focus:outline-none">Receptek</a>
            <button class="focus:shadow-outline rounded-lg focus:outline-none md:hidden" @click="open = !open">
              <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <nav :class="{'flex': open, 'hidden': !open}" class="hidden flex-grow flex-col pb-4 md:flex md:flex-row md:justify-end md:pb-0">
            <a href="{{route('welcome')}}" class="ml-4 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0">Főoldal</a>
            <a href="{{route('categories.index')}}" class="ml-4 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0">Kategóriák</a>
            @if(auth()->check())
                    <a href="{{route('profile.edit')}}" class="ml-4 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0">Profil</a>

                    <div @click.away="open = false" class="relative z-10" x-data="{ open: false }">
                    <button @click="open = !open" class="ml-4 focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-transparent px-4 py-2 text-left text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4 md:inline md:w-auto">
                    <span>Admin</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="mt-1 ml-1 inline h-4 w-4 transform transition-transform duration-200 md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-full origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="rounded-md bg-gray-800 px-2 py-2 shadow">
                            <a href="{{route('difficulties.index')}}" class="focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0">Nehézségi szintek</a>
                            <a href="{{route('categories.index')}}" class="focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0">Kategóriák</a>
                            <a href="{{route('recipes.index')}}" class="focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0">Receptek</a>
                        </div>
                    </div>
                    </div>
                    <form action="{{route('logout')}}" method="POST" class="mt-2 md:mt-0 md:ml-4">
                        @csrf
                        <button type="submit" class="ml-4 focus:shadow-outline rounded-lg px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none">Kijelentkezés</button>
                    </form>
                @else
                    <a href="{{route('login')}}" class="ml-4 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4">Bejelentkezés</a>
                    <a href="{{route('register')}}" class="ml-4 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4">Regisztráció</a>
                @endif
          </nav>
        </div>
      </div>
<main>
    @yield('content')
</main>
<footer>@ 2024</footer>
</body>
</html>
