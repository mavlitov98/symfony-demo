<?php

declare(strict_types=1);

namespace App\Entity;

enum OperationEnum: string
{
    case ACCRUAL = 'ACCRUAL';
    case WITHDRAWAL = 'WITHDRAWAL';
}
