<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class NewsGalleryUpdate
{
    protected $model;
    protected $validated;
    protected $folder;

    /**
     * @param array $request->validated()
     * @param Illuminate\Database\Eloquent\Model
     */
    public function __construct($model, $validated, $folder)
    {
        $this->model = $model;
        $this->validated = $validated;
        $this->folder = $folder;
    }
    
    /**
     * Обновление галереи у новости
     * @return array
     */
    public function gallery_update(): array
    {
        // Удаление галереи
        foreach ($this->model->gallery as $gl) {
            // Удаление файлов
            if (Storage::exists($gl->image)) {
                Storage::delete($gl->image);
            }
            // Удаление модели
            $gl->delete();
        }

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

    /**
     * Удаление галереи у новости
     * @return bool
     */
    public function gallery_destroy(): bool
    {
        foreach($this->model->gallery as $gl) {
            // Удаление файлов
            if (Storage::exists($gl->image)) {
                Storage::delete($gl->image);
            }
            // Удаление модели
            $gl->delete();
        }

        return false;
    }
}