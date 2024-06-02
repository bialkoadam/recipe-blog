<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|min:3|max:255'],
            ['name.min' => 'Minimum 3 karakter hosszú lehet a név',
            'name.max' => 'Maximum 255 karakter hosszú lehet a név']
        );
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        $recipes = $category->recipes;
        return view('categories.show', compact('category', 'recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            ['name' => 'required|min:3|max:255'],
            ['name.min' => 'Minimum 3 karakter hosszú lehet a név',
            'name.max' => 'Maximum 255 karakter hosszú lehet a név']
        );
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
        }
        catch (Exception $ex) {
            return redirect()->route('categories.index')->with('error', 'A kategória nem üres, így nem törölhető!');
        }
        return redirect()->route('categories.index')->with('success', 'Kategória sikeresen törölve!');
    }
}
