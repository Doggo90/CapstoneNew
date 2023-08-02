<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;
use Usamamuneerchaudhary\Commentify\Traits\HasUserAvatar;


class Listing extends Model
{
    use HasFactory, Commentable, HasUserAvatar;
    

    protected $guarded=[];
    public function scopeFilter($query, array $filters){

        $query-> where('tags', 'like', '%' . request('tag'). '%');

        if($filters['search'] ?? false){
            $query-> where('title', 'like', '%' . request('search'). '%')
            ->orWhere('body', 'like', '%' . request('search'). '%')
            ->orWhere('tags', 'like', '%' . request('search'). '%');
        }
         
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
