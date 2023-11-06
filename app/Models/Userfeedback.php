<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userfeedback extends Model
{
    use HasFactory;
    protected $table='userfeedbacks';
    protected $fillable=[
        'title',
        'description',
        'category',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function user_feedback_comment(){
        return $this->belongsTo(Userfeedbackcomment::class);
    }
}
