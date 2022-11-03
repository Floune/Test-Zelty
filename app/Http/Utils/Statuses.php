<?php

namespace App\Http\Utils;

class Statuses
{
    const DRAFT = 'DRAFT';
    const PUBLISHED = 'PUBLISHED';

    public static function get()
    {
        return [
            self::DRAFT,
            self::PUBLISHED
        ];
    }
}
