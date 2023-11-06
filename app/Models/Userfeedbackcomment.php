<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userfeedbackcomment extends Model
{
    use HasFactory;
    protected $table='userfeedbackcomments';
    protected $fillable=[
        'user_name',
        'content',
        'userfeedback_id',
        'status',
    ];

    public function feedback(){
        return $this->belongsTo(Userfeedback::class,'userfeedback_id','id');
    }
}
