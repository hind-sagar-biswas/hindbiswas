<?php

namespace App\Enums;

enum LearnableGroup: string
{
    case LANGUAGE = 'language';
    case FRAMEWORK = 'framework';

    public static function toArray(): array
    {
        return [
            self::LANGUAGE->value,
            self::FRAMEWORK->value,
        ];
    }
}