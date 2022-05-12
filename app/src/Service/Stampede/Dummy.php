<?php

namespace App\Service\Stampede;

use App\Dictionary\StampedeStrategyType;

class Dummy implements StampedeInterface
{
    public function isNeedRecompute(int $ttl, float $delta): bool
    {
        return false;
    }

    public static function getType(): string
    {
        return StampedeStrategyType::DUMMY;
    }
}
