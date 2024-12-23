<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailModel extends Model
{
    use HasFactory;

    protected $table = 'table_email';

    protected $fillable = [
        'id',
        'destination_email',
        'from',
        'call_center',
        'alamat',
        'program',
        'instansi',
        'nama',
        'no_hp',
        'url',
        'instanceEmail',
        'sended_at',
        'status',
        'lokasi_kantor_pos'
    ];
}
