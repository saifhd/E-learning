<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'body',
        'image',
        'category_id'
    ];
    // protected $with=[
    //     'category'
    // ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id','id')->withTrashed();
    }

    public function scopeFilter($query,$search){
        if(is_null($search)){
            return $query->latest()->with(['category', 'author']);
        }
        return $query->latest()->with(['category', 'author'])
            ->where('title', 'Like', "%$search%")
            ->orWhereHas('author', function ($q) use ($search) {
                $q->where('name', 'Like', "$search%");
            })
            ->orWhereHas('category', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            });
    }
}
