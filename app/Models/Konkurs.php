<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konkurs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'text',
        'slug',
        'date_start',
        'date_stop',
    ];    
}
