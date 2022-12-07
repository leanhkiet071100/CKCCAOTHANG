<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class report extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'id_post',
        'id_detail_report',
        'status',
    ];

    protected $primayKey = 'id';
    protected $table = 'reports';

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function post(){
        return $this->belongsTo(Post::class,'id_post','id');
    }

    public function detail_report(){
        return $this->belongsTo(detail_report::class,'id_detail_report','id');
    }
}
