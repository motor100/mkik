<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\SvedeniyaSubcategory;

class SvedeniyaSubcategoryController extends Controller
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
        return view('dashboard.svedeniya-subcategories-create', compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:150',
            'sort' => 'nullable|min:1|max:1000',
            'category_id' => 'required|numeric',
        ]);

        $slug = Str::slug($validated["title"]);

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(SvedeniyaSubcategory::query(), $slug))->check();

        SvedeniyaSubcategory::create([
            'svedeniya_category_id' => $validated["category_id"],
            'title' => $validated["title"],
            'slug' => $slug,
            'sort' => array_key_exists('sort', $validated) ? $validated["sort"] : NULL,
        ]);

        return redirect()->route('dashboard.svedeniya-category', $validated["category_id"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $svedeniya_subcategory = \App\Models\SvedeniyaSubcategory::findOrFail($id);

        return view('dashboard.svedeniya-subcategories-show', compact('svedeniya_subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $svedeniya_subcategory = \App\Models\SvedeniyaSubcategory::findOrFail($id);

        return view('dashboard.svedeniya-subcategories-edit', compact('svedeniya_subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:150',
            'sort' => 'nullable|min:1|max:1000',
        ]);

        $svedeniya_subcategory = \App\Models\SvedeniyaSubcategory::findOrFail($id);

        $slug = Str::slug($validated["title"]);

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(SvedeniyaSubcategory::query(), $slug))->check();

        $svedeniya_subcategory->update([
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