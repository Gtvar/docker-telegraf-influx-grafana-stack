<?php

declare(strict_types=1);

namespace App\Dictionary;

final class TelegrafStatus
{
    public const NEW = 'new';
    public const TAKE_TASK = 'take_task';
    public const ON_DELIVERY_POINT = 'on_delivery_point';
    public const PICKUP = 'pickup';
    public const DELIVERED = 'delivered';
    public const CANCELED = 'canceled';

    const STATUSES = [
        self::NEW,
        self::TAKE_TASK,
        self::ON_DELIVERY_POINT,
        self::PICKUP,
        self::DELIVERED,
        self::CANCELED
    ];
}
