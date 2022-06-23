<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lms extends Model
{
    use HasFactory;

    protected $table = 'lms';

    protected $guarded = [];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
