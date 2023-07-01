<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function scopeFilter($query, array $filters){

        $query-> where('tags', 'like', '%' . request('tag'). '%');

        if($filters['search'] ?? false){
            $query-> where('title', 'like', '%' . request('search'). '%')
            ->orWhere('body', 'like', '%' . request('search'). '%')
            ->orWhere('tags', 'like', '%' . request('search'). '%');
        }
         
    }
}
