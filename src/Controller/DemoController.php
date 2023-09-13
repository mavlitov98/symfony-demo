<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DemoController extends AbstractController
{
    #[Route(path: '/demo', methods: ['POST'])]
    public function demo(): Response
    {
        return $this->json(['message' => 'Hello from Demo!']);
    }
}
