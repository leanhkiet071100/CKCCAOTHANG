<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Post;

class likepost extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'id_user',
        'id_post',
        'like',
    ];
    protected $primayKey = 'id';
    protected $table = 'likeposts';

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'id_post', 'id');
    }
}
