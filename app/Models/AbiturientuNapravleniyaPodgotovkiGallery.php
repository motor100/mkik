<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbiturientuNapravleniyaPodgotovkiGallery extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'abiturientu_napravleniya_podgotovkis_galleries';

    protected $fillable = [
        'anp_id',
        'image'
    ];
}
