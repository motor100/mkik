<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentamAttestationForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'course',
        'learning_direction_id',
        'file',
        'sig_file',
        'key_file',
    ];

    /**
     * Один к одному
     * Получить направление.
     */
    public function learning_direction()
    {
        return $this->hasOne(LearningDirection::class, 'id', 'learning_direction_id');
    }
}
