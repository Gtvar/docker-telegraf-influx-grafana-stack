<?php

declare(strict_types=1);

namespace App\Repository\Redis;

use Redis;

abstract class AbstractRepository
{
    private $redis;
    private $redisNamespace;

    public function __construct(Redis $redis, string $redisNamespace)
    {
        $this->redis = $redis;
        $this->redisNamespace = $redisNamespace;
    }

    protected function getClient(): Redis
    {
        return $this->redis;
    }

    protected function getKey(string $key): string
    {
        return sprintf('%s:%s.%s', $this->redisNamespace, $this->getEntity(), $key);
    }

    abstract protected function getEntity(): string;
}
