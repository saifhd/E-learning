<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'video',
        'description',
        'streaming_path',
        'percentage',
        'order',
        'user_id',
        'duration'
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function owner(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
