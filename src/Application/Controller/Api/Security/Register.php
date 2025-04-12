<?php

namespace Cryptoob\Application\Controller\Api\Security;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route('/register', name: 'register', methods: ['POST'])]
class Register
{
    public function __invoke(): JsonResponse
    {
    }
}
