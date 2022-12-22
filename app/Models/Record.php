<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Record extends Model
{
    use HasFactory;

    protected $with = ['category'];

    protected $fillable = [
        'user_id',
        'category_id',
        'sum'
    ];

    public static function getByUser(int $id)
    {
        return self::where('user_id', $id)->latest()->get();
    }

    public static function getByUserAndCategory(int $userId, int $categoryId)
    {
        return self::where('user_id', $userId)->where('category_id', $categoryId)->latest()->get();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
