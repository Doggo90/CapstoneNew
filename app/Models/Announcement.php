<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Announcement extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function announcement(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function author(): belongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
