<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;
use Doctrine\ORM\Mapping as ORM;

#[Entity]
class BalanceOperation
{
    public function __construct(
        #[ORM\Id]
        #[ORM\Column(type: 'uuid')]
        private UuidV4 $id,
        #[Column(type: Types::FLOAT)]
        private float $amount,
        #[ManyToOne(targetEntity: User::class)]
        private User $user,
        #[Column(type: Types::STRING, enumType: OperationEnum::class)]
        private OperationEnum $type,
    ) {
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getType(): OperationEnum
    {
        return $this->type;
    }
}
