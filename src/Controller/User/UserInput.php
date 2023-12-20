<?php

declare(strict_types=1);

namespace App\Controller\User;

use Symfony\Component\Validator\Constraints\NotBlank;

final readonly class UserInput
{
    public function __construct(
        #[NotBlank]
        public string $name,
    ) {
    }
}
