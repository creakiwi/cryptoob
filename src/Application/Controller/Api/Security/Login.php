<?php

namespace Cryptoob\Application\Controller\Api\Security;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route('/login', name: 'login', methods: ['POST'])]
class Login
{
    public function __invoke(): JsonResponse
    {
    }
}
