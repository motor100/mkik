<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prepodavateli extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prepodavateli';

    protected $fillable = [
        'title',
        'image',
        'post',
        'phone',
        'email',
        'text',
        'slug',
        'category_id',
        'sort'
    ];
}
