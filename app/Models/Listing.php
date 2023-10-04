<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    protected static function boot()
    {
        parent::boot();

        static::created(function ($listing) {
            // Increment the reputation of the user who created the post.
            $user = $listing->user;
            $user->increment('reputation', 1);
        });
    }
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function author(): belongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class);
    }
}
