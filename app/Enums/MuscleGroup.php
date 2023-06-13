<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MuscleGroup extends Enum
{
	const CHEST = 'Chest';
	const BACK = 'Back';
	const SHOULDERS = 'Shoulders';
	const BICEPS = 'Biceps';
	const TRICEPS = 'Triceps';
	const LEGS = 'Legs';
	const ABS = 'Abs';
	const CARDIO = 'Cardio';
	const FULL_BODY = 'Full Body';
}
