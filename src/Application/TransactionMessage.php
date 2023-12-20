<?php

declare(strict_types=1);

namespace App\Application;

use App\Entity\OperationEnum;
use Symfony\Component\Uid\Uuid;

final readonly class TransactionMessage
{
    public function __construct(
        public Uuid $id,
        public Uuid $userId,
        public float $amount,
        public OperationEnum $type,
    ) {
    }
}
