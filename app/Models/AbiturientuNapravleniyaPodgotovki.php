<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbiturientuNapravleniyaPodgotovki extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'abiturientu_napravleniya_podgotovkis';

    protected $fillable = [
        'learning_direction_id',
        'chairman',
        'teachers',
        'text',
        'diploma',
    ];

    /**
     * Один ко многим
     * Получить галерею к направлению.
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(AbiturientuNapravleniyaPodgotovkiGallery::class, 'learning_direction_id', 'id');
    }

    /**
     * Один к одному
     * Получить направление.
     */
    public function learning_direction()
    {
        return $this->hasOne(LearningDirection::class, 'id', 'learning_direction_id');
    }
}
