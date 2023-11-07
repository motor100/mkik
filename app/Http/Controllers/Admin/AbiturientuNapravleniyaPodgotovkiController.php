<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\AbiturientuNapravleniyaPodgotovki;
use App\Models\AbiturientuNapravleniyaPodgotovkiGallery;

class AbiturientuNapravleniyaPodgotovkiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Направления подготовки
        $learning_directions = \App\Models\LearningDirection::all();

        // Абитуриенту направления подготовки
        // $abiturientu_napravleniya_podgotovki = \App\Models\AbiturientuNapravleniyaPodgotovki::all();

        return view('dashboard.abiturientu-napravleniya-podgotovki', compact('learning_directions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $napravlenie = AbiturientuNapravleniyaPodgotovki::findOrFail($id);

        return view('dashboard.abiturientu-napravleniya-podgotovki-edit', compact('napravlenie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'chairman' => 'nullable|min:2|max:250',
            'teachers' => 'nullable|min:2|max:250',
            'text' => 'nullable|min:2|max:60000',
            'diploma' => 'nullable|min:2|max:250',
            'input-gallery-file' => 'nullable|max:5',
            'input-gallery-file.*' => [
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(30)
                                                                    ->max(1024)
            ],
            'delete-gallery' => 'nullable|numeric',
        ]);

        $napravlenie = AbiturientuNapravleniyaPodgotovki::findOrFail($id);

        $folder = 'abiturientu-napravleniya-podgotovki';

        // Обновление модели
        $napravlenie->update([
            'chairman' => array_key_exists('chairman', $validated) ? $validated['chairman'] : NULL,
            'teachers' => array_key_exists('teachers', $validated) ? $validated['teachers'] : NULL,
            'text' => array_key_exists('text', $validated) ? $validated['text'] : NULL,
            'diploma' => array_key_exists('diploma', $validated) ? $validated['diploma'] : NULL,
        ]);

        // Обновление галереи
        if (array_key_exists('input-gallery-file', $validated)) {
            $gallery_array = (new \App\Services\AbiturientuNapravleniyaPodgotovkiGalleryUpdate($napravlenie, $validated, $folder))->gallery_update();

            AbiturientuNapravleniyaPodgotovkiGallery::insert($gallery_array);
        }

        // Удаление галереи
        if ($validated['delete-gallery']) {
            (new \App\Services\AbiturientuNapravleniyaPodgotovkiGalleryUpdate($napravlenie, $validated, $folder))->gallery_destroy();
        }

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
