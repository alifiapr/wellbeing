<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktik extends Model
{
    use HasFactory;

    protected $fillable = [
        'psikolog_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    public function psikolog()
    {
        return $this->belongsTo(Psikolog::class);
    }
}
