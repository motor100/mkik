<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Konkurs;
use App\Models\KonkursDocuments;
use Illuminate\Support\Facades\Storage;

class KonkursyDokumentyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $konkursy_dokumenty = KonkursDocuments::orderBy('id', 'desc')->get();

        return view('dashboard.konkursy-dokumenty', compact('konkursy_dokumenty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $konkursy = Konkurs::orderBy('id', 'desc')->get();
        
        return view('dashboard.konkursy-dokumenty-create', compact('konkursy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'konkurs' => 'required',
            'title' => 'required|min:3|max:100',
            'input-main-file' => 'required',
        ]);

        // Файл
        $file = (new \App\Services\FileAdd($validated['input-main-file'], 'konkursy'))->add();

        // Создание модели
        KonkursDocuments::create([
            'konkurs_id' => $validated["konkurs"],
            'title' => $validated["title"],
            'file' => $file,
            'filetype' => $validated["input-main-file"]->getClientOriginalExtension()
        ]);

        return redirect('/dashboard/konkursy-dokumenty');
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
        // Документ
        $document = KonkursDocuments::findOrFail($id); 
        
        // Конкурсы
        $konkursy = Konkurs::orderBy('id', 'desc')->get();

        return view('dashboard.konkursy-dokumenty-edit', compact('document', 'konkursy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'konkurs' => 'required',
            'title' => 'required|min:4|max:250',
            'input-main-file' => 'nullable',
        ]);

        $document = KonkursDocuments::findOrFail($id);

        // Документ
        $file = (new \App\Services\FileUpdate($document, 'konkursy', $validated))->file_update();

        // Тип файла
        $filetype = array_key_exists("input-main-file", $validated) ? $validated["input-main-file"]->getClientOriginalExtension() : $document->filetype;

        // Обновление модели
        $document->update([
            'konkurs_id' => $validated["konkurs"],
            'title' => $validated["title"],
            'file' => $file,
            'filetype' => $filetype
        ]);

        return redirect()->back()->with('status', 'Обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = KonkursDocuments::findOrFail($id);

        // Удаление документа
        if (Storage::exists($document->file)) {
            Storage::delete($document->file);
        }

        // Удаление модели
        $document->delete();
        
        return redirect()->back();
    }
}
