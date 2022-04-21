<?php

declare(strict_types=1);

namespace App\Repository;

use App\Document\Telegraf;
use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

class TelegrafRepository extends DocumentRepository
{
    /**
     * @throws MongoDBException
     */
    public function save(Telegraf $telegraf, bool $flush = true)
    {
        $this->getDocumentManager()->persist($telegraf);

        if ($flush) {
            $this->getDocumentManager()->flush();
        }
    }

    public function flush()
    {
        $this->getDocumentManager()->flush();
    }
}
