<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resolved extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_id',
        'access_key',
        'score',
        'started_at',
        'ended_at',
    ];

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function scopeResolved($query)
    {
        $query->where('ended_at', '!=', null);
    }
}
