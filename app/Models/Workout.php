<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $exercise_type_id
 * @property int $user_id
 * @property string $name
 *
 * @property-read User $user
 * @property-read Collection|ExerciseType[] $exerciseTypes
 * @property-read Collection|Exercise[] $workout_exercises
 */
class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercise_type_id',
        'user_id',
        'name',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function exerciseTypes(): BelongsToMany
    {
        return $this->belongsToMany(ExerciseType::class, 'workout_exercises', 'workout_id', 'exercise_type_id');
    }

    public function exercises(): BelongsToMany
    {
        return $this->belongsToMany(Exercise::class, 'workout_exercises', 'workout_id', 'exercise_id');
    }
}
