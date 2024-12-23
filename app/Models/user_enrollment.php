<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_enrollment extends Model
{
    use HasFactory;

    protected $table = 'user_enrollment';

    protected $fillable = [
        'id',
        'program_id',
        'mobile_user',

        'id',
        'nama',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'id_address',
        'no_hp',
        'email',
        'platform',
        'lokasi_kantor_pos'
    ];

    public function program()
    {
        return $this->belongsTo(program::class);
    }
}
