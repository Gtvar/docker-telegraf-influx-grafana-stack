<?php

declare(strict_types=1);

namespace App\Service;

use App\Dictionary\TelegrafStatus;
use App\Document\Telegraf;
use App\Factory\TelegrafFactory;

class RandomTelegrafGenerator
{
    public function generate(): Telegraf
    {
        $status = TelegrafStatus::STATUSES[rand(0, 5)];
        $text = $this->generateRandomString(rand(10, 2048));

        return TelegrafFactory::create($status, $text);
    }

    private function generateRandomString($length = 10): string
    {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', (int) ceil($length/strlen($x)) )),1, $length);
    }
}
