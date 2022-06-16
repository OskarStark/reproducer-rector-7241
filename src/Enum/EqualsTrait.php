<?php

declare(strict_types=1);

namespace App\Enum;


use MyCLabs\Enum\Enum;

trait EqualsTrait
{
    /**
     * @param Enum
     */
    public function equalsEnum(self $other): bool
    {
        return $other->getValue() === $this->getValue();
    }
}
