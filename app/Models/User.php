<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use InteractsWithMedia;
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
        ->width(100)
        ->height(100)
        ->sharpen(10);


    }
    public function getAvatar()
    {
        if ($this->media->first()) {
            return $this->media->first()->getFullUrl('thumb');
        }
        return null;
    }
    public function scopeFilter($query, $search)
    {
        if (is_null($search)) {
            return $query->orderBy('id', 'DESC');
        }
        return $query->orderBy('id', 'DESC')
            ->where('name', 'Like', "%$search%")->orWhere('email', 'Like', "%$search%")
            ->orWhereHas('roles', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'user_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'user_id', 'id');
    }

    public function reviews(){
        return $this->hasMany(Review::class,'commented_by','id');
    }
}
