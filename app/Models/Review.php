<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable=[
        'commented_by',
        'course_id',
        'rating',
        'massage'
    ];

    public function commented_user(){
        return $this->belongsTo(User::class,'commented_by','id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id','id');
    }
}
