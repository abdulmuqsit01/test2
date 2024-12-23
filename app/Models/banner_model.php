<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner_model extends Model
{
    use HasFactory;

    protected $table = 'banner';

    protected $fillable = [
        'id',
        'name',
    ];
}
