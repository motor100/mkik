<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonkursDocuments extends Model
{
    use HasFactory;

    protected $fillable = [
        'konkurs_id',
        'title',
        'file',
        'filetype',
    ];

    /**
     * Получить конкурс, которому принадлежит документ.
     */
    public function konkurs()
    {
        return $this->belongsTo(Konkurs::class);
    }
}
