<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class detail_report extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;
    
    protected $fillable = [
        'reason',
        'status',
    ];

    protected $primayKey = 'id';
    protected $table = 'detail_reports';

    public function report(){
        return $this->belongsTo(report::class,'id_detail_report','id');
    }
}
