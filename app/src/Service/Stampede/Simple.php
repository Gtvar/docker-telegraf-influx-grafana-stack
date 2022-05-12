<?php

namespace App\Service\Stampede;

use App\Dictionary\StampedeStrategyType;

class Simple implements StampedeInterface
{
    private const STAMPEDE_TTL = 30;

    public function isNeedRecompute(int $ttl, float $delta): bool
    {
        $rnd = rand(0, self::STAMPEDE_TTL);
        $recompute = $ttl - $rnd < 0;

        return $recompute;
    }

    public static function getType(): string
    {
        return StampedeStrategyType::SIMPLE;
    }
}
