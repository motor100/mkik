<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Prepodavateli;
use App\Models\PrepodavateliCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PrepodavateliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search_query = $request->input('search_query');

        $prepodavateli = collect();

        if($search_query) {
            $search_query = htmlspecialchars($search_query);
            $prepodavateli = Prepodavateli::where('title', 'like', "%{$search_query}%")->get();
        } else {
            $prepodavateli = Prepodavateli::orderBy('id', 'desc')->get();
        }

        return view('dashboard.prepodavateli', compact('prepodavateli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $prepodavateli_categories = PrepodavateliCategory::all();
        
        return view('dashboard.prepodavateli-create', compact('prepodavateli_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:4|max:100',
            'input-main-file' => [
                'required',
                \Illuminate\Validation\Rules\File::types(['image/jpeg', 'image/png'])
            ],
            'text' => 'required|min:4|max:16777215',
            'category' => 'required',
            'post' => 'required|min:4|max:150',
            'phone' => 'nullable|min:4|max:20',
            'email' => 'nullable|min:4|max:150',
            'sort' => 'nullable'
        ]);

        $slug = Str::slug($validated['title']);

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(Prepodavateli::query(), $slug))->check();

        Prepodavateli::create([
            'title' => $validated['title'],
            'image' => (new \App\Services\ImageAdd($validated, 'teachers'))->add(),
            'post' => $validated['post'],
            'phone' => array_key_exists('phone', $validated) ? $validated['phone'] : NULL,
            'email' => array_key_exists('email', $validated) ? $validated['email'] : NULL,
            'text' => $validated['text'],
            'slug' => $slug,
            'category_id' => $validated['category'],
            'sort' => array_key_exists('sort', $validated) ? $validated['sort'] : NULL,
        ]);

        return redirect('/dashboard/prepodavateli');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        // Преподаватель
        $prepodavatel = \App\Models\Prepodavateli::findOrFail($id);

        // Категории
        $prepodavateli_categories = PrepodavateliCategory::all();
        
        return view('dashboard.prepodavateli-edit', compact('prepodavatel', 'prepodavateli_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:4|max:100',
            'input-main-file' => [
                'nullable',
                \Illuminate\Validation\Rules\File::types(['image/jpeg', 'image/png'])
            ],
            'text' => 'required|min:4|max:16777215',
            'category' => 'required',
            'post' => 'required|min:4|max:150',
            'phone' => 'nullable|min:4|max:20',
            'email' => 'nullable|min:4|max:150',
            'sort' => 'nullable'
        ]);

        $prepodavatel = Prepodavateli::findOrFail($id);

        $slug = Str::slug($validated['title']);

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(Prepodavateli::query(), $slug))->check();

        // Изображение
        $image = (new \App\Services\ImageUpdate($prepodavatel, $validated, 'teachers'))->update();

        $prepodavatel->update([
            'title' => $validated['title'],
            'image' => $image,
            'post' => $validated['post'],
            'phone' => array_key_exists('phone', $validated) ? $validated['phone'] : NULL,
            'email' => array_key_exists('email', $validated) ? $validated['email'] : NULL,
            'text' => $validated['text'],
            'slug' => $slug,
            'category_id' => $validated['category'],
            'sort' => array_key_exists('sort', $validated) ? $validated['sort'] : NULL,
        ]);

        return redirect()->back()->with('status', 'Обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prepodavatel = Prepodavateli::findOrFail($id);

        // Удаление изображения
        if (Storage::exists($prepodavatel->image)) {
            Storage::delete($prepodavatel->image);
        }

        // Удаление модели
        $prepodavatel->delete();
        
        return redirect()->back();
    }
}
