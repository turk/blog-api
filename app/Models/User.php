<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed email
 * @property mixed|string password
 */
class User extends Model
{
    use HasFactory;
}
