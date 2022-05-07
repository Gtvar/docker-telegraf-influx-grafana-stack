<?php

declare(strict_types=1);

namespace App\Controller;

use App\Provider\RecordProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/telegraf/status/{status}", methods={"GET"}, name="telegraf_by_status")
 */
class TelegrafByStatusAction extends AbstractController
{
    private $recordProvider;

    public function __construct(RecordProvider $recordProvider)
    {
        $this->recordProvider = $recordProvider;
    }

    public function __invoke(string $status, Request $request): Response
    {
        return $this->json($this->recordProvider->getRecord($status, (int) $request->get('offset')));
    }
}
