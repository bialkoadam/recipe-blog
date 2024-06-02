@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Új recept</h1>

    @if ($errors->any())
        <div class="mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto">
        @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Recept név</label>
            <input type="text" name="name" id="name" class="block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>
        <div class="mb-6">
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Kategória</label>
            <select name="category_id" id="category_id" class="block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="difficulty_id" class="block mb-2 text-sm font-medium text-gray-900">Nehézségi szint</label>
            <select name="difficulty_id" id="difficulty_id" class="block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @foreach ($difficulties as $difficulty)
                <option value="{{ $difficulty->id }}">{{ $difficulty->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Recept képe</label>
            <input type="file" name="image" id="image" accept="image/*" class="block w-full text-sm text-gray-900 file:mr-4 file:rounded file:border-0 file:bg-blue-50 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100">
        </div>
        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Leírás</label>
            <textarea name="description" id="description" class="block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" rows="4"></textarea>
        </div>
        <div class="mb-6">
            <label for="ingredients" class="block mb-2 text-sm font-medium text-gray-900">Hozzávalók</label>
            <textarea name="ingredients" id="ingredients" class="block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" rows="4"></textarea>
        </div>
        <div class="mb-6">
            <label for="instruction" class="block mb-2 text-sm font-medium text-gray-900">Elkészítés</label>
            <textarea name="instruction" id="instruction" class="block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" rows="4"></textarea>
        </div>
        <div class="mb-6">
            <label for="time" class="block mb-2 text-sm font-medium text-gray-900">Sütési/főzési idő (perc)</label>
            <input type="number" name="time" id="time" class="block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>
        <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Mentés</button>
    </form>
</div>
@endsection
