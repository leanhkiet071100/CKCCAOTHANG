<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\likepost;
use App\Models\comment;
use App\Models\media_file_upload;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    public $timestamps = true;
    protected $fillable = [
        'id_user',
        'content_post',
        'view_mode',
        'status',
        'post_parent',
        
        
    ];
    protected $primayKey = 'id';
    protected $table = 'posts';

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function post_parent(){
        return $this->belongsTo(Post::class,'post_parent','id');
    }

    public function post_child(){
        return $this->hasMany(Post::class,'post_parent','id');
    }

    public function media_file_uploads(){
        return $this->hasMany(media_file_upload::class,'id_post','id');
    }

    public function comment(){
        return $this->hasMany(Comment::class,'id_post','id');
    }

    public function like(){
        return $this->hasMany(likepost::class,'id_post','id');
    }

    public function report(){
        return $this->hasMany(Report::class,'id_post','id');
    }

    // public function share(){
    //     return $this->hasMany(Share::class,'id_post','id');
    // }

    // public function reaction(){
    //     return $this->hasMany(Reaction::class,'id_post','id');
    // }

    // public function reaction_user(){
    //     return $this->hasMany(Reaction::class,'id_post','id')->where('id_user',auth()->user()->id);
    // }
}
