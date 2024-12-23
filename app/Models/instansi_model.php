<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\program;

class instansi_model extends Model
{
    use HasFactory;

    protected $table = 'instansi';

    protected $fillable = [
        'id',
        'name',
        'logo',
        'email',
        'slug'
    ];
    /**
     * Get all of the comments for the instansi_model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function program()
    {
        return $this->hasMany(program::class, 'instansi_id', 'id');
    }
}
