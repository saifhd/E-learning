<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'discount',
        'description',
        'sub_category_id',
        'category_id',
        'image'
    ];

    public function teacher(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function category(){
        return $this->belongsTo(CourseCategory::class,'category_id','id');
    }

    public function sub_category(){
        return $this->belongsTo(CourseSubCategory::class,'sub_category_id','id');
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class,'course_id','id');
    }

    public function scopeFilter($query,$search){
        if(is_null($search)){
            return $query->latest()->with(['category', 'sub_category']);
        }
        return $query->latest()->with(['category', 'sub_category'])->where('name','Like',"%$search%")
            ->orWhereHas('category',function($q) use($search){
                $q->where('name','Like',"%$search%");
            })->orWhereHas('sub_category',function($q) use($search){
                $q->where('name','Like',"%$search%");
            });
    }


}
