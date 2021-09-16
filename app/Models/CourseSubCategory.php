<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubCategory extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'category_id'
    ];


    public function categories(){
        return $this->belongsTo(CourseCategory::class,'category_id','id');
    }

    public function scopeFilter($query, $search){
        if (is_null($search)) {
            return $query->latest();
        }
        return $query->latest()
            ->where('name', 'Like', "%$search%")
            ->orWhereHas('categories', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            });
    }

    public function courses(){
        return $this->hasMany(Course::class,'sub_category_id','id');
    }
}
