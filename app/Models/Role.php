<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Spatie\Permission\Models\Role as UserRole;

class Role extends UserRole
{
    use HasFactory;
    // protected $table='roles';
    public static function scopeFilter($query,$search){
        if(is_null($search)){
            $query->orderBy('id','DESC');
        }
        else{
            return $query ->orderBy('id','DESC')->where('name','Like',"%$search%")
                ->orWhereHas('permissions',function($q) use($search){
                    $q->where('name','LIKE',"%$search%");
                });
        }
    }

}
