<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;
    protected $table = 'konseling';
    protected $guarded = ['id'];

    public function psikolog()
    {
        return $this->belongsTo(User::class, 'psikolog_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('phone', 'like', '%' . $search . '%')
            ->orWhereHas('psikolog', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('client', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('note', 'like', '%' . $search . '%');

    }
}
