<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'creator_id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
