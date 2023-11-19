<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\SvedeniyaDocumenty;
use Illuminate\Support\Facades\Storage;

class SvedeniyaDocumentsController extends Controller
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
    public function create($subcategory_id): View
    {
        return view('dashboard.svedeniya-dokumenty-create', compact('subcategory_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            'subcategory_id' => 'required'
        ]);

        // Файл
        $file = (new \App\Services\FileAdd($validated['input-main-file'], 'svedeniya-dokumenty'))->add();

        // Подпись
        $sig_file = array_key_exists('input-sig-file', $validated) ? (new \App\Services\FileAdd($validated['input-sig-file'], 'svedeniya-dokumenty'))->add() : NULL;
        
        // Ключ
        $key_file = array_key_exists('input-key-file', $validated) ? (new \App\Services\FileAdd($validated['input-key-file'], 'svedeniya-dokumenty'))->add() : NULL;

        // Создание модели
        SvedeniyaDocumenty::create([
            'svedeniya_subcategory_id' => $validated["subcategory_id"],
            'title' => $validated["title"],
            'file' => $file,
            'sig_file' => $sig_file,
            'key_file' => $key_file,
            'filetype' => $validated["input-main-file"]->getClientOriginalExtension()
        ]);

        return redirect()->route('dashboard.svedeniya-subcategories-show', $validated['subcategory_id']);
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
        $document = SvedeniyaDocumenty::findOrFail($id);
        
        return view('dashboard.svedeniya-dokumenty-edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
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

        $document = SvedeniyaDocumenty::findOrFail($id);

        // Документ
        $file = (new \App\Services\FileUpdate($document, 'svedeniya-dokumenty', $validated))->file_update();

        // Подпись
        $sig_file = (new \App\Services\FileUpdate($document, 'svedeniya-dokumenty', $validated))->sig_update();

        // Ключ
        $key_file = (new \App\Services\FileUpdate($document, 'svedeniya-dokumenty', $validated))->key_update();

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
        $document = SvedeniyaDocumenty::findOrFail($id);

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
