<?php

declare(strict_types=1);

namespace App\Controller\Balance;

use App\Application\TransactionMessage;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

final class BalanceController extends AbstractController
{
    public function __construct(
        private readonly MessageBusInterface $bus,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    #[Route(path: '/balance/create-operation', methods: ['POST'])]
    public function createOperation(#[MapRequestPayload] BalanceInput $input): Response
    {
        /** @var User|null $user */
        $user = $this->entityManager->find(User::class, $input->userId);

        if (null === $user) {
            return $this->json(['message' => 'User not found'], 404);
        }

        $operation = new TransactionMessage(Uuid::v4(), $user->getId(), $input->amount, $input->type);
        $this->bus->dispatch($operation);

        return $this->json(['message' => 'Success']);
    }
}
