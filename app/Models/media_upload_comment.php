<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\comment;

class media_upload_comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    public $fillable= [
        'id_comment',
        'media_file_name',
        'status'
    ];

    public function comment(){
        return $this->belongsTo(comment::class,'id_comment','id');
    }
    
}
