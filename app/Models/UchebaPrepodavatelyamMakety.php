<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UchebaPrepodavatelyamMakety extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prepodavatelyam_maketys';

    protected $fillable = [
        'title',
        'file',
        'sig_file',
        'key_file',
        'filetype'
    ];
}
