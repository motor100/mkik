<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbiturientuDokumenty extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        'sig_file',
        'key_file',
        'filetype',
    ];
}
