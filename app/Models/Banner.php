<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner';

    protected $fillable = [
        'id',
        'name',
        'program_id',
    ];

    public function program()
    {
        return $this->hasMany(program::class, 'program_id', 'id');
    }
}
