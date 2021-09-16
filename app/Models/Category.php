<?php

namespace App\Models;

use Clockwork\Storage\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    // protected $with=['posts'];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function scopeFilter($query, $search)
    {
        if (is_null($search)) {
            return $query->latest()->withCount('posts');
        }
        return $query->latest()->withCount('posts')
        ->where('name', 'Like', "%$search%");

    }
}
