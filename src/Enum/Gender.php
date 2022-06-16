<?php

declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static Gender MALE()
 * @method static Gender FEMALE()
 *
 * @phpstan-extends Enum<\App\Enum\Gender>
 */
final class Gender extends Enum
{
    private const MALE = 'male';
    private const FEMALE = 'female';
}
