<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Difficulty;
use App\Models\Recipe;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $difficulties = Difficulty::all();
        return view('recipes.create', compact('categories', 'difficulties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'difficulty_id' => 'required|exists:difficulties,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string|min:3|max:255',
            'ingredients' => 'required|string|min:3|max:2000',
            'instruction' => 'required|string|min:3|max:2000',
            'time' => 'required|numeric',
            'image' => 'sometimes|file|image|max:5000',
        ]);

        $recipe = new Recipe($request->except(['image']));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $recipe->image_path = $imagePath;
        }

        $recipe->save();

        return redirect()->route('recipes.index')->with('success', 'A recept sikeresen feltöltve!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe = Recipe::find($id);
        $categories = Category::all();
        $difficulties = Difficulty::all();
        return view('recipes.edit', compact('recipe', 'categories', 'difficulties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'difficulty_id' => 'required|exists:difficulties,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string|min:3|max:255',
            'ingredients' => 'required|string|min:3|max:2000',
            'instruction' => 'required|string|min:3|max:2000',
            'time' => 'required|numeric',
        ]);

        $recipe = Recipe::find($id);
        $recipe->fill($request->except(['image']));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $recipe->image_path = $imagePath;
        }

        $recipe->save();
        return redirect()->route('recipes.index')->with('success', 'A recept sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recept sikeresen törölve!');
    }
}
