<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DshiCategory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dshi_categories';

    /**
     * Один ко многим
     * Получить подкатегории к категории.
     */
    public function subcategories(): HasMany
    {
        return $this->hasMany(DshiSubcategory::class, 'dshi_category_id', 'id');
    }
}
