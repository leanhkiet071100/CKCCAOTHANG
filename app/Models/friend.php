<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Friend extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
       'id_user_target',
       'id_user_preference',
       'status'

    ];
    protected $primayKey = 'id';
    protected $table = 'friend';
    
    public function users(){
        return $this->belongsTo(User::class, 'id_user_preference', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class ,'id_user_target','id');
    }

    

}
