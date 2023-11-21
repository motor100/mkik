<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DshiDocumenty extends Model
{
    use HasFactory;

    protected $fillable = [
        'dshi_subcategory_id',
        'title',
        'file',
        'sig_file',
        'key_file',
        'filetype'
    ];
}
