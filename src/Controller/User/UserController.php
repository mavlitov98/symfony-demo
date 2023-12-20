<?php

declare(strict_types=1);

namespace App\Controller\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

final class UserController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    #[Route(path: '/user/create', methods: ['POST'])]
    public function create(#[MapRequestPayload] UserInput $input): Response
    {
        $user = new User(Uuid::v4(), $input->name);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->json([
            'message' => 'Success',
            'userId' => $user->getId(),
        ]);
    }
}
