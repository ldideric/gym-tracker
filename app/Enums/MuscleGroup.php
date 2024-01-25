<?php declare(strict_types=1);

namespace App\Enums;

enum MuscleGroup: string
{
    case CHEST = 'Chest';
    case BACK = 'Back';
    case SHOULDERS = 'Shoulders';
    case BICEPS = 'Biceps';
    case TRICEPS = 'Triceps';
    case LEGS = 'Legs';
    case ABS = 'Abs';
    case CARDIO = 'Cardio';
    case FULL_BODY = 'Full Body';
}
