@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    @if(session('success'))
    <div class="mb-4 rounded bg-green-100 p-4 text-green-800">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="mb-4 rounded bg-red-100 p-4 text-white-800">
        {{ session('error') }}
    </div>
    @endif

    @auth
    <div class="mb-8">
        <h1 class="text-2xl font-bold">Új kategória hozzáadása</h1>
        <a href="{{ route('categories.create') }}" class="mt-2 inline-block rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Hozzáadás</a>
    </div>
    @endauth

    <div class="mb-8">
        <h1 class="text-2xl font-bold">Kategóriák</h1>
        <ul class="space-y-4">
            @foreach ($categories as $category)
            <li class="flex flex-col sm:flex-row items-center justify-between rounded bg-white p-4 shadow">
                <span class="font-medium">{{ $category->name }}</span>
                <div class="flex flex-col sm:flex-row items-center mt-4 sm:mt-0">
                    <a href="{{ route('categories.show', $category->id) }}" class="mb-2 sm:mb-0 sm:mr-2 rounded bg-green-500 px-4 py-2 text-white hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Megtekintés</a>
                    @auth
                    <a href="{{ route('categories.edit', $category->id) }}" class="mb-2 sm:mb-0 sm:mr-2 rounded bg-yellow-500 px-4 py-2 text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">Szerkesztés</a>
                    <form action="{{ route('categories.destroy', $category->id)}}" method="POST" class="mb-2 sm:mb-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Törlés</button>
                    </form>
                    @endauth
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
