<?php

declare(strict_types=1);

namespace App\Controller\Balance;

use App\Entity\OperationEnum;
use Symfony\Component\Uid\Uuid;

final readonly class BalanceInput
{
    public function __construct(
        public float $amount,
        public OperationEnum $type,
        public Uuid $userId,
    ) {
    }
}
