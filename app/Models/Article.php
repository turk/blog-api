<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed category_id
 * @property mixed user_id
 * @property mixed|string title
 * @property mixed|string description
 * @property int|mixed vote
 */
class Article extends Model
{
    use HasFactory;
}
