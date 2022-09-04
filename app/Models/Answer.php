<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'resolved_id',
        'question_id',
        'value',
    ];

    public function resolved(): BelongsTo
    {
        return $this->belongsTo(Resolved::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
