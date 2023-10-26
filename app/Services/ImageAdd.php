<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageAdd
{
    protected $validated;
    protected $folder;

    public function __construct($validated, $folder)
    {
        $this->validated = $validated;
        $this->folder = $folder;
    }

    /**
     * @param
     * @return string
     */
    public function add(): string
    {
        return Storage::putFile('public/uploads/' . $this->folder, $this->validated["input-main-file"]);
    }
}