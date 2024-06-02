@extends('layout')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">{{ $recipe->name }} recept</h1>
    </div>

    <div class="flex flex-wrap -mx-2">
        <div class="w-full md:w-1/2 px-2 mb-4">
            @if($recipe->image_path)
                <img src="{{ asset('storage/' . $recipe->image_path) }}" class="rounded shadow-md" alt="{{ $recipe->name }}">
            @endif
        </div>
        <div class="w-full md:w-1/4 px-2 mb-4">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Sütési/főzési idő</h2>
                <p class="text-gray-600">{{ $recipe->time }} perc</p>
            </div>
        </div>
        <div class="w-full md:w-1/4 px-2 mb-4">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Kategória</h2>
                <p class="text-gray-600">{{ $recipe->category->name }}</p>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap -mx-2">
        <div class="w-full md:w-1/3 px-2 mb-4">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Hozzávalók</h2>
                <p class="text-gray-600 whitespace-pre-line">{{ $recipe->ingredients }}</p>
            </div>
        </div>
        <div class="w-full md:w-2/3 px-2 mb-4">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Elkészítés</h2>
                <p class="text-gray-600 whitespace-pre-line">{{ $recipe->instruction }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
