<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use App\Models\Listing;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeFilter($query, array $filters){

        $query-> where('name', 'like', '%' . request('tag'). '%');

        if($filters['search'] ?? false){
            $query-> where('name', 'like', '%' . request('search'). '%')
            ->orWhere('email', 'like', '%' . request('search'). '%')
            ->orWhere('phone', 'like', '%' . request('search'). '%')
            ->orWhere('role', 'like', '%' . request('search'). '%');
        }

    }
    public static function generateUsername($username){
        if($username === null){
            $username = Str::lower(Str::random(8));
        }
        if(User::where('username',$username)->exists()){
            $newUsername = Str::lower(Str::random(8));
            $username = $newUsername.Str::lower(Str::random(3));
        }
        return $username;
    }
    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }



    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->role, 'admin') || str_ends_with($this->role, 'agent');
    }
}
