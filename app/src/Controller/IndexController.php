<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\TelegrafRepository;
use App\Service\RandomTelegrafGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route(path="/", methods={"GET"}, name="index")
     */
    public function indexAction(RandomTelegrafGenerator $telegrafGenerator, TelegrafRepository $repository): Response
    {
        $i = 0;
        while ($i < rand(0, 20)) {
            $telegraf = $telegrafGenerator->generate();
            $repository->save($telegraf);
        }

        $all = $repository->findBy([], [], 100, rand(0, 1000));

        $data = [];
        foreach ($all as $telegraf) {
            $data[$telegraf->getId()] = $telegraf->getCreatedAt()->format(\DATE_ATOM);
        }

        return $this->json($data);
    }
}
