<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed category_id
 * @property mixed user_id
 * @property mixed|string title
 * @property mixed|string description
 * @property int|mixed vote
 * @property mixed id
 */
class Article extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
