<?php

namespace App\Service;

/**
 * @see https://github.com/internetarchive/xfetch/blob/master/stampede.php
 */
class Stampede
{
    private const BETA = 1.0;
    private const DELTA = 5;

    public static function xfetch($ttl): bool
    {
        $now = time();
        $expiry = $now + $ttl;
        $rnd = self::rnd();
        $logrnd = log($rnd);

        $xfetch = self::DELTA * self::BETA * $logrnd;

        $recompute = ($now - $xfetch) >= $expiry;
        if ($recompute) {
            printf("* early recompute! delta:%.04f ttl:%d rnd:%.06f logrnd:%.04f xfetch:%.04f\n",
                self::DELTA, $ttl, $rnd, $logrnd, $xfetch);
        } else {
            printf("* just data delta:%.04f ttl:%d rnd:%.06f logrnd:%.04f xfetch:%.04f\n",
                self::DELTA, $ttl, $rnd, $logrnd, $xfetch);
        }

        return $recompute;
    }

    private static function rnd()
    {
        $max = mt_getrandmax();

        return mt_rand(1, $max) / $max;
    }
}
