<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    public $timestamps = true;
    protected $fillable = [
        'provider_user_id',
        'provider',
        'user'

    ];
    protected $primayKey = 'user_id';
    protected $table = 'social';
    
    public function user(){
        return $this->belongsTo(User::class, 'user', 'id');
    }


    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    // public function posts(){
    //     return this->hasMany(Post::class,'id','user_id');
    // }
}