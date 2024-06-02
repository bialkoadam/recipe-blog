@extends('layout')
@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-center my-6">Receptek</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($recipes as $recipe)
        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 ease-in-out">
            <div class="relative pb-48 overflow-hidden">
                @if($recipe->image_path)
                    <img src="{{ asset('storage/' . $recipe->image_path) }}" class="absolute inset-0 h-full w-full object-cover" alt="{{ $recipe->name }}">
                @endif
            </div>
            <div class="p-4 text-center">
                <h2 class="text-lg font-semibold">{{ $recipe->name }} recept</h2>
                <a href="{{ route('recipes.show', $recipe->id) }}" class="mt-4 inline-block bg-orange-500 text-white text-sm font-semibold rounded-lg px-4 py-2 hover:bg-orange-600">Megtekintés</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
