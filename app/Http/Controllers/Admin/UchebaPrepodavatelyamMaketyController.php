<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\UchebaPrepodavatelyamMakety;

class UchebaPrepodavatelyamMaketyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $documents = UchebaPrepodavatelyamMakety::orderBy('id', 'desc')->get();

        return view('dashboard.ucheba-prepodavatelyam-makety', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.ucheba-prepodavatelyam-makety-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:4|max:250',
            'input-main-file' => 'required',
            'input-sig-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['asc'])
            ],
            'input-key-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['application/pgp-keys', 'text/plain'])
            ],
        ]);

        // Файл
        $file = (new \App\Services\FileAdd($validated['input-main-file'], 'prepodavatelyam-makety'))->add();

        // Подпись
        $sig_file = array_key_exists('input-sig-file', $validated) ? (new \App\Services\FileAdd($validated['input-sig-file'], 'prepodavatelyam-makety'))->add() : NULL;
        
        // Ключ
        $key_file = array_key_exists('input-key-file', $validated) ? (new \App\Services\FileAdd($validated['input-key-file'], 'prepodavatelyam-makety'))->add() : NULL;

        // Создание модели
        UchebaPrepodavatelyamMakety::create([
            'title' => $validated["title"],
            'file' => $file,
            'sig_file' => $sig_file,
            'key_file' => $key_file,
            'filetype' => $validated["input-main-file"]->getClientOriginalExtension()
        ]);

        return redirect('/dashboard/ucheba-prepodavatelyam-makety');
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
        $document = UchebaPrepodavatelyamMakety::findOrFail($id);
        
        return view('dashboard.ucheba-prepodavatelyam-makety-edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:4|max:250',
            'input-main-file' => 'nullable',
            'input-sig-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['asc'])
            ],
            'input-key-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['application/pgp-keys', 'text/plain'])
            ],
        ]);

        $document = UchebaPrepodavatelyamMakety::findOrFail($id);

        // Документ
        $file = (new \App\Services\FileUpdate($document, 'prepodavatelyam-makety', $validated))->file_update();

        // Подпись
        $sig_file = (new \App\Services\FileUpdate($document, 'prepodavatelyam-makety', $validated))->sig_update();

        // Ключ
        $key_file = (new \App\Services\FileUpdate($document, 'prepodavatelyam-makety', $validated))->key_update();

        // Тип файла
        $filetype = array_key_exists("input-main-file", $validated) ? $validated["input-main-file"]->getClientOriginalExtension() : $document->filetype;
        
        // Обновление модели
        $document->update([
            'title' => $validated["title"],
            'file' => $file,
            'sig_file' => $sig_file,
            'key_file' => $key_file,
            'filetype' => $filetype
        ]);

        return redirect()->back()->with('status', 'Обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $document = UchebaPrepodavatelyamMakety::findOrFail($id);

        // Удаление документа
        if (Storage::exists($document->file)) {
            Storage::delete($document->file);
        }

        // Удаление подписи
        if ($document->sig_file) {
            if (Storage::exists($document->sig_file)) {
                Storage::delete($document->sig_file);
            }
        }

        // Удаление ключа
        if ($document->key_file) {
            if (Storage::exists($document->key_file)) {
                Storage::delete($document->key_file);
            }
        }

        // Удаление модели
        $document->delete();
        
        return redirect()->back();
    }
}
