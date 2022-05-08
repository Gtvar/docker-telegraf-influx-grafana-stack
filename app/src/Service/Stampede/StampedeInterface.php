<?php

namespace App\Service\Stampede;

interface StampedeInterface
{
    public function isNeedRecompute($ttl): bool;
    public static function getType(): string;
}
