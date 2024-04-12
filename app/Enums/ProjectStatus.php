<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case PLANNED = 'planned';
    case ALPHA = 'alpha';
    case BETA = 'beta';
    case STABLE = 'stable';
    case ABANDONED = 'abandoned';
    case ARCHIVED = 'archived';

    public static function toArray(): array
    {
        return [
            self::PLANNED->value,
            self::ALPHA->value,
            self::BETA->value,
            self::STABLE->value,
            self::ABANDONED->value,
            self::ARCHIVED->value,
        ];
    }
}
