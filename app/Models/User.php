<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed email
 * @property mixed|string password
 * @property mixed id
 */
class User extends Authenticatable implements JWTSubject
{
    /** PSR-12 */
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
