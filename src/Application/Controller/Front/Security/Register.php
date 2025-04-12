<?php

namespace Cryptoob\Application\Controller\Front\Security;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route('/register', name: 'register', methods: ['GET'])]
class Register
{
    public function __invoke(): Response
    {
        return new Response('register');
    }
}
