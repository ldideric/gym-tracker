<?php

namespace App\Models;

use App\Models\Traits\DecimalTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $session_id
 * @property int $exercise_type_id
 * @property int $sets
 * @property int $reps
 * @property int $weight
 * @property Carbon $duration
 *
 * @property Session $session
 * @property ExerciseType $exerciseType
 */
class Exercise extends Model
{
    use HasFactory, DecimalTrait;

    protected $fillable = [
        'session_id',
        'exercise_type_id',
        'sets',
        'reps',
        'weight',
        'duration',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    public function exerciseType(): BelongsTo
    {
        return $this->belongsTo(ExerciseType::class);
    }
}
