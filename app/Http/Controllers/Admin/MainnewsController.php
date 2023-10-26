<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mainnew;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\MainnewGallery;

class MainnewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $news = Mainnew::orderBy('id', 'desc')->get();

        return view('dashboard.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.news-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:4|max:255',
            'text' => 'required|min:4|max:10000',
            'input-main-file' => [
                                'required',
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(50)
                                                                    ->max(1024)
            ],
            'input-gallery-file' => 'nullable|max:5',
            'input-gallery-file.*' => [
                                    \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                        ->min(50)
                                                                        ->max(1024)
            ],
        ]);

        // Slug
        $slug = Str::slug($validated['title']);

        // Год для добавления в БД и создания папки 'news/' . $year
        $year = date('Y');

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(Mainnew::query(), $slug))->check();

        // Изображение
        $image = (new \App\Services\ImageAdd($validated, 'news/' . $year))->add();

        // Создание модели новости
        $news = Mainnew::create([
            'title' => $validated["title"],
            'image' => $image,
            'text' => $validated["text"],
            'slug' => $slug,
            'year' => $year,
            'date' => date('d.m.Y'),
            'excerpt' => Str::limit(strip_tags($validated['text']), 80, '...'),
        ]);

        // Галерея
        if (array_key_exists('input-gallery-file', $validated)) {
            
            // Массив для вставки
            $gallery_array = (new \App\Services\NewsGalleryAdd($news, $validated, 'news/' . $year))->gallery_add();

            // Создание новых моделей
            MainnewGallery::insert($gallery_array);
        }

        return redirect('/dashboard/news');
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
    public function edit(string $id)
    {
        $news = Mainnew::findOrFail($id);
        
        return view('dashboard.news-edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'nullable|min:4|max:255',
            'text' => 'nullable|min:4|max:10000',
            'input-main-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(50)
                                                                    ->max(1024)
            ],
            'input-gallery-file' => 'nullable|max:5',
            'input-gallery-file.*' => [
                                    \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                        ->min(50)
                                                                        ->max(1024)
            ],
            'delete-gallery' => 'nullable|numeric',
        ]);

        $news = Mainnew::findOrFail($id);

        // Slug
        $slug = Str::slug($validated['title']);

        // Год для добавления в БД и создания папки 'news/' . $year
        $year = date('Y');

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(Mainnew::query(), $slug))->check();

        // Изображение
        $image = (new \App\Services\ImageUpdate($news, $validated, 'news/' . $year))->update();

        // Обновление модели Mainnew
        $news->update([
            'title' => $validated["title"],
            'image' => $image,
            'text' => $validated["text"],
            'slug' => $slug,
            'year' => $year,
            'date' => date('d.m.Y'),
            'excerpt' => Str::limit(strip_tags($validated['text']), 80, '...'),
            'image' => $image,
        ]);

        // Обновление галереи
        if (array_key_exists('input-gallery-file', $validated)) {
            $gallery_array = (new \App\Services\NewsGalleryUpdate($news, $validated, 'news/' . $year))->gallery_update();

            MainnewGallery::insert($gallery_array);
        }

        // Удаление галереи
        if ($validated['delete-gallery']) {
            (new \App\Services\NewsGalleryUpdate($news, $validated, 'news/' . $year))->gallery_destroy();
        }

        return redirect('/dashboard/news');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $news = Mainnew::findOrFail($id);

        // Удаление файла изображения
        if (Storage::exists($news->image)) {
            Storage::delete($news->image);
        }

        // Удаление файлов gallery images 
        foreach($news->gallery as $gl) {
            if (Storage::exists($gl->image)) {
                Storage::delete($gl->image);
            }
        }

        // Удаление галереи
        MainnewGallery::where('mainnew_id', $id)->delete();

        // Удаление модели
        $news->delete();
        
        return redirect('/dashboard/news');
    }
}
