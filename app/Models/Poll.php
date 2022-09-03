<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Poll extends Model
{
    use HasFactory;

    const PUBLISHED = 'published';
    const NOT_PUBLISHED = 'not published';

    protected $fillable = [
        'creator_id',
        'name',
        'status',
        'slug',
        'published_at',
        'views'
    ];

    public function creator(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }
}
