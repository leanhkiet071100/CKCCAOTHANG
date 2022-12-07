<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\media_upload_comment;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'content_comment',
        'id_user',
        'id_post',
        'id_comment_parent',
        'status',   
    ];

    protected $primayKey = 'id';
    protected $table = 'comments';

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function post(){
        return $this->belongsTo(Post::class,'id_post','id');
    }

    public function media_upload_comment(){
        return $this->hasMany(media_upload_comment::class,'id_comment','id');
    }
}
