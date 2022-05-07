<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\TelegrafRepository;
use App\Service\RandomTelegrafGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/telegraf/generate", methods={"GET"}, name="telegraf_generate")
 */
class GenerateAction extends AbstractController
{
    public function __invoke(RandomTelegrafGenerator $telegrafGenerator, TelegrafRepository $repository): Response
    {
        $i = 0;
        while (true) {
            $telegraf = $telegrafGenerator->generate();
            $repository->save($telegraf, ++$i % 1000 === 0);
        }
    }
}
