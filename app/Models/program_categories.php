<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program_categories extends Model
{
    use HasFactory;

    protected $table = 'program_categories';

    protected $fillable = [
        'id',
        'name',
        'image',
        'slug',
        'thumbnail',
    ];

    public function program()
    {
        return $this->hasMany(program::class, 'program_categories_id', 'id');
    }
}
