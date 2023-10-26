<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class NewsGalleryAdd
{
    protected $model;
    protected $validated;
    protected $folder;

    /**
     * @param array $request->validated()
     * @param Illuminate\Database\Eloquent\Model
     * @param string папка
     */
    public function __construct($model, $validated, $folder)
    {
        $this->model = $model;
        $this->validated = $validated;
        $this->folder = $folder;
    }
    
    /**
     * Вставка галереи для новости
     * @return array
     */
    public function gallery_add(): array
    {
        // Вставка новых файлов и моделей
        $gallery_array = [];

        foreach ($this->validated['input-gallery-file'] as $value) {
            $item = [];
            $item["mainnew_id"] = $this->model->id;
            $item["image"] = Storage::putFile('public/uploads/' . $this->folder, $value);
            $item["created_at"] = now();
            $item["updated_at"] = now();
            $gallery_array[] = $item;
        }

        return $gallery_array;
    }
}