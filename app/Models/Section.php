<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','user_id'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }
    public function uploaded_videos(){
        return $this->hasMany(Video::class,'section_id','id')->orderBy('order', 'ASC')->where('percentage',100);
    }

    public function teacher(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
