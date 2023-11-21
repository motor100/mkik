<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DshiSubcategory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dshi_subcategories';
    
    protected $fillable = [
        'dshi_category_id',
        'title',
        'slug',
        'sort',        
    ];

    /**
     * Один ко многим
     * Получить подкатегории к категории.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(DshiDocumenty::class, 'dshi_subcategory_id', 'id');
    }
}
