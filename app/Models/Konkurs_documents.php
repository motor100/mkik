<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konkurs_documents extends Model
{
    use HasFactory;

    /**
     * Получить конкурс, которому принадлежит документ.
     */
    public function konkurs()
    {
        return $this->belongsTo(Konkurs::class);
    }
}
