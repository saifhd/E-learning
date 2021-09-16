<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

    public function subcategories(){
        return $this->hasMany(CourseSubCategory::class,'category_id','id');
    }
    public function scopeFilter($query, $search)
    {
        if (is_null($search)) {
            return $query->latest();
        }
        return $query->latest()
            ->where('name', 'Like', "%$search%");
    }

    public function courses(){
        return $this->hasMany('Course::class','category_id','id');
    }
}
