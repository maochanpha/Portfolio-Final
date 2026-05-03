<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desccription',
    ];

    public function getDescriptionAttribute()
    {
        return $this->attributes['desccription'] ?? null;
    }
}
