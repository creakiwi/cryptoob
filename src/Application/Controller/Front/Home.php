<?php

namespace Cryptoob\Application\Controller\Front;

use Cryptoob\Application\Controller\TwigRenderer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route('/', name: 'home', methods: ['GET'])]
class Home
{
    use TwigRenderer;

    public function __invoke(): Response
    {
        return $this->render('front/home.html.twig');
    }
}
