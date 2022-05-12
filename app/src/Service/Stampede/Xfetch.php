<?php

namespace App\Service\Stampede;

use App\Dictionary\StampedeStrategyType;

/**
 * @see https://github.com/internetarchive/xfetch/blob/master/stampede.php
 */
class Xfetch implements StampedeInterface
{
    private const BETA = 0.2;

    public function isNeedRecompute(int $ttl, float $delta): bool
    {
        $now = time();
        $expiry = $now + $ttl;
        $rnd = self::rnd();
        $logrnd = log($rnd);

        $xfetch = $delta * self::BETA * $logrnd;

        return ($now - $xfetch) >= $expiry;
    }

    private static function rnd()
    {
        $max = mt_getrandmax();

        $rnd = mt_rand(1, $max) / $max;

        return max($rnd, 0.1);
    }

    public static function getType(): string
    {
        return StampedeStrategyType::XFETCH;
    }
}
