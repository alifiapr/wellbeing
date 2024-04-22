<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psikolog extends Model
{
    use HasFactory;
    protected $table = 'psikolog';
    protected $guarded = [];

    public function konseling()
    {
        return $this->hasMany(Konseling::class);
    }

    public function praktik()
    {
        return $this->hasMany(Praktik::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
