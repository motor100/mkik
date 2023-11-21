<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\DshiSubcategory;
use Illuminate\Http\RedirectResponse;

class DshiSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($category_id): View
    {
        return view('dashboard.dshi-subcategories-create', compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:150',
            'sort' => 'nullable|min:1|max:1000',
            'category_id' => 'required|numeric',
        ]);

        $slug = Str::slug($validated["title"]);

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(DshiSubcategory::query(), $slug))->check();

        DshiSubcategory::create([
            'dshi_category_id' => $validated["category_id"],
            'title' => $validated["title"],
            'slug' => $slug,
            'sort' => array_key_exists('sort', $validated) ? $validated["sort"] : NULL,
        ]);

        return redirect()->route('dashboard.dshi-category', $validated["category_id"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $dshi_subcategory = \App\Models\DshiSubcategory::findOrFail($id);

        return view('dashboard.dshi-subcategories-show', compact('dshi_subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $dshi_subcategory = \App\Models\DshiSubcategory::findOrFail($id);

        return view('dashboard.dshi-subcategories-edit', compact('dshi_subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:150',
            'sort' => 'nullable|min:1|max:1000',
        ]);

        $dshi_subcategory = \App\Models\DshiSubcategory::findOrFail($id);

        $slug = Str::slug($validated["title"]);

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(DshiSubcategory::query(), $slug))->check();

        $dshi_subcategory->update([
            'title' => $validated["title"],
            'slug' => $slug,
            'sort' => array_key_exists('sort', $validated) ? $validated["sort"] : NULL,
        ]);

        return redirect()->back()->with('status', 'Обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
