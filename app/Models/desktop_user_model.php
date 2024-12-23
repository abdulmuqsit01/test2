<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desktop_user_model extends Model
{
    use HasFactory;

    protected $table = 'dekstop_users';

    protected $fillable = [
        'id',
        'nama',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'id_address',
        'no_hp',
        'email',
        'platform'
    ];
}
