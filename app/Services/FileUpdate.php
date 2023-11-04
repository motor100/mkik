<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUpdate
{
    protected $model;
    protected $validated;

    public function __construct($model, $validated)
    {
        $this->model = $model;
        $this->validated = $validated;
    }

    /**
     * Обновление документа
     * @param
     * @return string
     */
    public function file_update(): string
    {
        if (array_key_exists('input-main-file', $this->validated)) {
            if (Storage::exists($this->model->file)) {
                Storage::delete($this->model->file);
            }

            return Storage::putFile('public/uploads/pedagogicheskij-sostav-dokumenty', $this->validated["input-main-file"]);

        } else {

            return $this->model->file;
        }
    }

    /**
     * Обновление подписи
     * @param
     * @return string
     */
    public function sig_update(): string
    {
        if (array_key_exists('input-sig-file', $this->validated)) {
            if (Storage::exists($this->model->sig_file)) {
                Storage::delete($this->model->sig_file);
            }

            return Storage::putFile('public/uploads/pedagogicheskij-sostav-dokumenty', $this->validated["input-sig-file"]);

        } else {

            return $this->model->sig_file;
        }
    }

    /**
     * Обновление ключа
     * @param
     * @return string
     */
    public function key_update(): string
    {
        if (array_key_exists('input-key-file', $this->validated)) {
            if (Storage::exists($this->model->key_file)) {
                Storage::delete($this->model->key_file);
            }

            return Storage::putFile('public/uploads/pedagogicheskij-sostav-dokumenty', $this->validated["input-key-file"]);

        } else {

            return $this->model->key_file;
        }
    }
}