<?php

namespace App\Models;

use App\Enums\MuscleGroup;
use App\Models\Traits\DecimalTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property MuscleGroup $muscle_group
 * @property string $description
 * @property int $calories_per_minute
 *
 * @property-read Collection|Exercise[] $exercises
 *
 * @property-read bool $is_cardio
 */
class ExerciseType extends Model
{
    use HasFactory, DecimalTrait;

    protected $fillable = [
        'name',
        'muscle_group',
        'description',
        'calories_per_minute',
    ];

    protected $casts = [
        'muscle_group' => MuscleGroup::class,
    ];

    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }

    public function isCardio(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->muscle_group === MuscleGroup::CARDIO,
        );
    }
}
