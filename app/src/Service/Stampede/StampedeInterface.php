<?php

namespace App\Service\Stampede;

interface StampedeInterface
{
    public function isNeedRecompute(int $ttl, float $delta): bool;
    public static function getType(): string;
}
