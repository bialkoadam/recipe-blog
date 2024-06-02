@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    @if(session('success'))
    <div class="mb-4 rounded bg-green-100 p-4 text-green-800">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-8">
        <h1 class="text-2xl font-bold">Új nehézségi szint hozzáadása</h1>
        <a href="{{ route('difficulties.create') }}" class="mt-2 inline-block rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Hozzáadás</a>
    </div>

    <div class="mb-8">
        <h1 class="text-2xl font-bold">Nehézségi szintek</h1>
        <ul class="space-y-4">
            @foreach ($difficulties as $difficulty)
            <li class="flex flex-col sm:flex-row items-center justify-between rounded bg-white p-4 shadow">
                <span class="font-medium">{{ $difficulty->name }}</span>
                <div class="flex flex-col sm:flex-row items-center mt-4 sm:mt-0">
                    <a href="{{ route('difficulties.edit', $difficulty->id) }}" class="mb-2 sm:mb-0 sm:mr-2 rounded bg-yellow-500 px-4 py-2 text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">Szerkesztés</a>
                    <form action="{{ route('difficulties.destroy', $difficulty->id)}}" method="POST" class="mb-2 sm:mb-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Törlés</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
