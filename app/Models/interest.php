<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interest extends Model
{
    use HasFactory;
    protected $table = 'interests';

    protected $fillable = [
        'id',
        'mobile_user',
        'categories_id',
    ];
    public function categories()
    {
        return $this->hasMany(program_categories::class, 'categories_id', 'id');
    }
}
