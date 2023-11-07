<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\PedagogicheskijSostavDokumenty;

class PedagogicheskijSostavDokumentyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $documents = PedagogicheskijSostavDokumenty::orderBy('id', 'desc')->get();

        return view('dashboard.pedagogicheskij-sostav-dokumenty', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.pedagogicheskij-sostav-dokumenty-create');
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
        ]);

        // Файл
        $file = (new \App\Services\FileAdd($validated['input-main-file'], 'pedagogicheskij-sostav-dokumenty'))->add();

        // Подпись
        $sig_file = array_key_exists('input-sig-file', $validated) ? (new \App\Services\FileAdd($validated['input-sig-file'], 'pedagogicheskij-sostav-dokumenty'))->add() : NULL;
        
        // Ключ
        $key_file = array_key_exists('input-key-file', $validated) ? (new \App\Services\FileAdd($validated['input-key-file'], 'pedagogicheskij-sostav-dokumenty'))->add() : NULL;

        // Создание модели
        PedagogicheskijSostavDokumenty::create([
            'title' => $validated["title"],
            'file' => $file,
            'sig_file' => $sig_file,
            'key_file' => $key_file,
            'filetype' => $validated["input-main-file"]->getClientOriginalExtension()
        ]);

        return redirect('/dashboard/pedagogicheskij-sostav-dokumenty');
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
        $document = PedagogicheskijSostavDokumenty::findOrFail($id);
        
        return view('dashboard.pedagogicheskij-sostav-dokumenty-edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
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

        $document = PedagogicheskijSostavDokumenty::findOrFail($id);

        // Документ
        $file = (new \App\Services\FileUpdate($document, 'pedagogicheskij-sostav-dokumenty', $validated))->file_update();

        // Подпись
        $sig_file = (new \App\Services\FileUpdate($document, 'pedagogicheskij-sostav-dokumenty', $validated))->sig_update();

        // Ключ
        $key_file = (new \App\Services\FileUpdate($document, 'pedagogicheskij-sostav-dokumenty', $validated))->key_update();

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
        $document = PedagogicheskijSostavDokumenty::findOrFail($id);

        // Удаление документа
        if (Storage::exists($document->file)) {
            Storage::delete($document->file);
        }

        // Удаление подписи
        if (Storage::exists($document->sig_file)) {
            Storage::delete($document->sig_file);
        }

        // Удаление ключа
        if (Storage::exists($document->key_file)) {
            Storage::delete($document->key_file);
        }

        // Удаление модели
        $document->delete();
        
        return redirect('/dashboard/pedagogicheskij-sostav-dokumenty');
    }
}
