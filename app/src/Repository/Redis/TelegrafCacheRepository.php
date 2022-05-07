<?php

declare(strict_types=1);

namespace App\Repository\Redis;

class TelegrafCacheRepository extends AbstractRepository
{
    const ENTITY = 'telegraf';
    const CACHE_TTL = 100;
    const STAMPEDE_TTL = 30;

    /**
     * Probabilistic cache flushing algorithm
     */
    public function get(string $status, int $offset): array
    {
        $ttl = $this->getClient()->ttl($this->getCacheKey($status, $offset));

        if (!$ttl || $ttl < 0) {
            return [];
        }

        if ($ttl - rand(0, self::STAMPEDE_TTL) < 0) {
            return [];
        }

        return $this->getClient()->hGetAll($this->getCacheKey($status, $offset));
    }

    public function saveRecords(string $status, int $offset, array $records): void
    {
        foreach ($records as $id => $time) {
            $this->getClient()->hSet($this->getCacheKey($status, $offset), $id, $time);
        }

        $this->getClient()->expire($this->getCacheKey($status, $offset), self::CACHE_TTL);
    }

    protected function getCacheKey(string $status, int $offset): string
    {
        return parent::getKey(sprintf('%s.%s', $status, $offset));
    }

    protected function getEntity(): string
    {
        return self::ENTITY;
    }
}
