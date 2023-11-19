<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SvedeniyaStrukturaDokumenty extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'svedeniya_struktura_dokumenties';
    
    protected $fillable = [
        'svedeniya_subcategory_id',
        'title',
        'file',
        'sig_file',
        'key_file',
        'filetype'
    ];
}
