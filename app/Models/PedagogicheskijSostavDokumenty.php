<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedagogicheskijSostavDokumenty extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pedagogicheskij_sostav_dokuments';

    protected $fillable = [
        'title',
        'file',
        'sig_file',
        'key_file',
        'filetype'
    ];
}
