<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Comments extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected static function booted()
    {
        static::created(function ($comment) {
            $comment->listing->comments_count++;
            $comment->listing->save();
        });
    }
    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comments::class);
    }
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function post(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function mentions(): hasMany
    {
        return $this->hasMany(Mention::class);
    }
                // REPUTATION IF A COMMENT IS CREATED
    protected static function boot()
    {
        parent::boot();

        static::created(function ($comment) {
            // Increment the reputation of the user who created the comment.
            $user = $comment->user;
            $user->increment('reputation', 1);
            if($comment->is_helpful === true){
                $user->increment('reputation', 2);
            }
        });
    }
}
