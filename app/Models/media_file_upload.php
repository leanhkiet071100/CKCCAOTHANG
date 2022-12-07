<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class media_file_upload extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'id_post',
        'media_file_name',
        'status'
    ];
    protected $primayKey = 'id';
    protected $table = 'media_file_upload';

    public function post(){
        return $this->belongsTo(Post::class,'id_post','id');
    }


    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    // public function comment(){
    //     return $this->hasMany(Comment::class);
    // }
}