<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    public function __construct(private readonly UserService $service)
    {
    }

    #[Route('/user', name: 'user')]
    public function __invoke(): JsonResponse
    {
        $data = [
            // Just for demonstration purposes, but $data could be the request body.
            'name' => 'John Doe',
            'address' => '',
        ];

        $user = $this->service->normalize($data);

        return $this->json($user);
    }
}