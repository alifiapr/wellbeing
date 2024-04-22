<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'sender_id')
            ->orWhere('receiver_id', $this->id)->whereNotDeleted();
    }

    public function receivesBroadcastNotificationsOn()
    {
        return 'users.' . $this->id;
    }

    public function konselingAsClient()
    {
        return $this->hasMany(Konseling::class, 'client_id');
    }

    public function konselingAsPsikolog()
    {
        return $this->hasMany(Konseling::class, 'psikolog_id');
    }

    public function dataPsikolog(){
        return $this->hasOne(Psikolog::class, 'user_id');
    }

    public function scopeSearch($query, $value){
        $query->where('name', 'like', '%'.$value.'%')
            ->orWhere('email', 'like', '%'.$value.'%');
    }
}
