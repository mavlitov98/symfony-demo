<?php

declare(strict_types=1);

namespace App\Application;

use App\Entity\BalanceOperation;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Uid\Uuid;

#[AsMessageHandler]
final readonly class TransactionHandler
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function __invoke(TransactionMessage $message): void
    {
        /** @var User $user */
        $user = $this->entityManager->find(User::class, $message->userId);
        $operation = new BalanceOperation(Uuid::v4(), $message->amount, $user, $message->type);
        $this->entityManager->persist($operation);
        $this->entityManager->flush();
    }
}
