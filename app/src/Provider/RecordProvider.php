<?php

declare(strict_types=1);

namespace App\Provider;

use App\Repository\Redis\TelegrafCacheRepository;
use App\Repository\TelegrafRepository;

class RecordProvider
{
    private $repository;
    private $telegrafCacheRepository;

    public function __construct(TelegrafRepository $repository, TelegrafCacheRepository $telegrafCacheRepository)
    {
        $this->repository = $repository;
        $this->telegrafCacheRepository = $telegrafCacheRepository;
    }

    public function getRecord(string $status, int $offset): array
    {
        if ($data = $this->telegrafCacheRepository->get($status, $offset)) {
            return $data;
        }

        $all = $this->repository->findBy(['status' => $status], [], 100, $offset);

        $data = [];
        foreach ($all as $telegraf) {
            $data[$telegraf->getId()] = $telegraf->getCreatedAt()->format(\DATE_ATOM);
        }

        $this->telegrafCacheRepository->saveRecords($status, $offset, $data);

        return $data;
    }
}
