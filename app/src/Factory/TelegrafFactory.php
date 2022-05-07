<?php

declare(strict_types=1);

namespace App\Factory;

use App\Document\Telegraf;

class TelegrafFactory
{
    public static function create(string $status, string $text): Telegraf
    {
        $telegraf = new Telegraf();
        $telegraf
            ->setStatus($status)
            ->setText($text);

        return $telegraf;
    }
}
