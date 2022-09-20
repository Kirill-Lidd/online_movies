<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $guarded = false;

    const TYPE_COMMENT_NEGATIVE = 0;
    const TYPE_COMMENT_POSITIVE = 1;
    const TYPE_COMMENT_NEUTRAL = 2;

    public static function getTypeComment()
    {
        return [
            self::TYPE_COMMENT_NEGATIVE => 'Отрицательный',
            self::TYPE_COMMENT_POSITIVE => 'Положительный',
            self::TYPE_COMMENT_NEUTRAL => 'Нейтральный',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
