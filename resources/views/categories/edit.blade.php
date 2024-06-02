@extends('layout')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Kategória módosítása</h1>

    @error('name')
        <div class="mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
                {{ $message }}
        </div>
    @enderror

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="max-w-lg mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kategória név</label>
            <input type="text" name="name" id="name" value="{{old('name', $category->name)}}" class="block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
        </div>
        <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Mentés</button>
    </form>
</div>
@endsection
