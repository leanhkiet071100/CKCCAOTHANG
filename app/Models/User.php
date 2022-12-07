<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
use App\Models\likepost;
use App\Models\comments;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
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
        'email',
        'phone_number',
        'password',
        'first_name',
        'last_name',
        'sub_name',
        'birth_date',
        'sex',
        'avatar',
        'cover_image',
        'isAdmin',
        'isSubAdmin',
        'status',
        'token',
    ];
    protected $primayKey = 'id';
    protected $table = 'users';
    
    public function posts(){
        return this->hasMany(Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(likepost::class);
    }
    public function report(){
        return $this->hasMany(report::class);
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
