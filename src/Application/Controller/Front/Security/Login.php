<?php

namespace Cryptoob\Application\Controller\Front\Security;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route('/login', name: 'login', methods: ['GET'])]
class Login
{
    public function __invoke(): Response
    {
        return new Response('login');
    }
}
