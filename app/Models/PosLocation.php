<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosLocation extends Model
{
    use HasFactory;

    protected $table = 'pos_location';

    protected $fillable = [
        'id',
        'pos_location',
        'kcu_or_kcp',
    ];
}
