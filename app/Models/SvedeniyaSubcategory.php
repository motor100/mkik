<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SvedeniyaSubcategory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'svedeniya_subcategories';
    
    protected $fillable = [
        'svedeniya_category_id',
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
        return $this->hasMany(SvedeniyaDocumenty::class, 'svedeniya_subcategory_id', 'id');
    }
}
