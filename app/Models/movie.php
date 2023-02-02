<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'poster_path',
        'overview',
        'release_date',
        'original_title',
        'original_language',
        'estado',
    ];
}
