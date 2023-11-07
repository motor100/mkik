<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUpdate
{
    protected $model;
    protected $folder;
    protected $validated;
    // pedagogicheskij-sostav-dokumenty

    public function __construct($model, $folder, $validated)
    {
        $this->model = $model;
        $this->folder = $folder;
        $this->validated = $validated;
    }

    /**
     * Обновление документа
     * @param
     * @return mixed
     */
    public function file_update(): mixed
    {
        if (array_key_exists('input-main-file', $this->validated)) {
            if (Storage::exists($this->model->file)) {
                Storage::delete($this->model->file);
            }

            return Storage::putFile('public/uploads/' . $this->folder, $this->validated["input-main-file"]);

        } else {

            return $this->model->file;
        }
    }

    /**
     * Обновление подписи
     * @param
     * @return mixed
     */
    public function sig_update(): mixed
    {
        if (array_key_exists('input-sig-file', $this->validated)) {
            if ($this->model->sig_file) {
                if (Storage::exists($this->model->sig_file)) {
                    Storage::delete($this->model->sig_file);
                }
            }

            return Storage::putFile('public/uploads/' . $this->folder, $this->validated["input-sig-file"]);

        } else {

            return $this->model->sig_file;
        }
    }

    /**
     * Обновление ключа
     * @param
     * @return mixed
     */
    public function key_update(): mixed
    {
        if (array_key_exists('input-key-file', $this->validated)) {
            if ($this->model->key_file) {
                if (Storage::exists($this->model->key_file)) {
                    Storage::delete($this->model->key_file);
                }
            }

            return Storage::putFile('public/uploads/' . $this->folder, $this->validated["input-key-file"]);

        } else {

            return $this->model->key_file;
        }
    }
}