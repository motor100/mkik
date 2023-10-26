<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageUpdate
{
    protected $model;
    protected $validated;
    protected $folder;

    public function __construct($model, $validated, $folder)
    {
        $this->model = $model;
        $this->validated = $validated;
        $this->folder = $folder;
    }

    /**
     * Обновление изображения
     * @param
     * @return string
     */
    public function update(): string
    {
        if (array_key_exists('input-main-file', $this->validated)) {
            if (Storage::exists($this->model->image)) {
                Storage::delete($this->model->image);
            }

            return Storage::putFile('public/uploads/' . $this->folder, $this->validated["input-main-file"]);

        } else {

            return $this->model->image;
        }
    }
}