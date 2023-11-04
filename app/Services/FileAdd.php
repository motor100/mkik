<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileAdd
{
    protected $file;
    protected $folder;

    public function __construct($file, $folder)
    {
        $this->file = $file;
        $this->folder = $folder;
    }

    /**
     * @param
     * @return string
     */
    public function add(): string
    {
        // Переименование файла
        $fileName = "file" . "-" . date("dmY") . "-" . mt_rand() . "." . $this->file->getClientOriginalExtension();
        
        return Storage::putFileAs('public/uploads/' . $this->folder, $this->file, $fileName);
    }
}