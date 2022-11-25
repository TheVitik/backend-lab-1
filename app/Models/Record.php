<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'sum'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
