<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mainnew extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'text',
        'slug',
        'year',
        'date',
        'excerpt',
    ];

    /**
     * Один ко многим
     * Получить галерею к новости.
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(MainnewGallery::class);
    }
}
