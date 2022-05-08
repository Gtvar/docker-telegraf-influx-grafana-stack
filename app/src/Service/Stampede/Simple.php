<?php

namespace App\Service\Stampede;

use App\Dictionary\StampedeStrategyType;

class Simple implements StampedeInterface
{
    private const STAMPEDE_TTL = 30;

    public function isNeedRecompute($ttl): bool
    {
        $rnd = rand(0, self::STAMPEDE_TTL);
        $recompute = $ttl - $rnd < 0;

        //if ($recompute) {
        //    printf("* Simple: early recompute! ttl:%d rnd:%.06f \n",
        //         $ttl, $rnd);
        //} else {
        //    printf("* Simple: just data ttl:%d rnd:%.06f \n",
        //        $ttl, $rnd);
        //}

        return $recompute;
    }

    public static function getType(): string
    {
        return StampedeStrategyType::SIMPLE;
    }
}
