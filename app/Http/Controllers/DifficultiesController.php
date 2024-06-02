<?php

namespace App\Http\Controllers;

use App\Models\Difficulty;
use Illuminate\Http\Request;

class DifficultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $difficulties = Difficulty::all();
        return view('difficulties.index', compact('difficulties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('difficulties.create');
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
        $difficulty = new Difficulty();
        $difficulty->name = $request->name;
        $difficulty->save();

        return redirect()->route('difficulties.index')->with('success', 'Nehézségi szint sikeresen létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $difficulty = Difficulty::find($id);
        return view('difficulties.show', compact('difficulty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $difficulty = Difficulty::find($id);
        return view('difficulties.edit', compact('difficulty'));
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
        $difficulty = Difficulty::find($id);

        $difficulty->name = $request->name;
        $difficulty->save();

        return redirect()->route('difficulties.index')->with('success', 'Nehézségi szint sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $difficulty = Difficulty::find($id);
        $difficulty->delete();
        return redirect()->route('difficulties.index')->with('success', 'Nehézségi szint sikeresen törölve!');
    }
}
