<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    use HasFactory;

    protected $table = 'program';

    protected $fillable = [
        'id',
        'name',
        'image',
        'tag',
        'url',
        'description',
        'featured',
        'instansi_id',
        'program_categories_id',
        'mentor_id',
        'image',
        'thumbnail',
        'slug',
        'harga',
        'call_center'
    ];

    public function instansi()
    {
        return $this->belongsTo(instansi_model::class);
    }

    public function programCategories()
    {
        return $this->belongsTo(program_categories::class);
    }

    public function userEnrollment()
    {
        return $this->hasMany(user_enrollment::class, 'program_id', 'id');
    }
}
