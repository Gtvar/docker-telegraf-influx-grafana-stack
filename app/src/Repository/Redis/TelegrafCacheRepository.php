<?php

declare(strict_types=1);

namespace App\Repository\Redis;

use App\Dictionary\StampedeStrategyType;
use App\Service\Stampede\StampedeProvider;

class TelegrafCacheRepository extends AbstractRepository
{
    const ENTITY = 'telegraf';
    const CACHE_TTL = 60;

    /**
     * @var StampedeProvider
     */
    private $stampedeProvider;

    public function __construct(\Redis $redis, string $redisNamespace, StampedeProvider $stampedeProvider)
    {
        parent::__construct($redis, $redisNamespace);
        $this->stampedeProvider = $stampedeProvider;
    }

    /**
     * Probabilistic cache flushing algorithm
     */
    public function get(string $status, int $offset): array
    {
        $ttl = $this->getClient()->ttl($this->getCacheKey($status, $offset));

        if (!$ttl || $ttl < 0) {
            return [];
        }

        $delta = (float) $this->getClient()->get($this->getDeltaCacheKey($status, $offset));

        if ($this->stampedeProvider->getStrategy(StampedeStrategyType::XFETCH)->isNeedRecompute($ttl, $delta)) {
            return [];
        }

        return $this->getClient()->hGetAll($this->getCacheKey($status, $offset));
    }

    public function saveRecords(string $status, int $offset, array $records, float $delta): void
    {
        foreach ($records as $id => $time) {
            $this->getClient()->hSet($this->getCacheKey($status, $offset), $id, $time);
        }

        $this->getClient()->expire($this->getCacheKey($status, $offset), self::CACHE_TTL);

        $this->getClient()->set($this->getDeltaCacheKey($status, $offset), $delta);
        $this->getClient()->expire($this->getDeltaCacheKey($status, $offset), self::CACHE_TTL);
    }

    protected function getCacheKey(string $status, int $offset): string
    {
        return parent::getKey(sprintf('%s.%s', $status, $offset));
    }

    protected function getDeltaCacheKey(string $status, int $offset): string
    {
        return parent::getKey(sprintf('%s.%s.delta', $status, $offset));
    }

    protected function getEntity(): string
    {
        return self::ENTITY;
    }
}
