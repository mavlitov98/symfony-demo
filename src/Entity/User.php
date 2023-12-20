<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Uid\UuidV4;
use Doctrine\ORM\Mapping as ORM;

#[Entity]
#[ORM\Table('"user"')]
class User
{
    public function __construct(
        #[ORM\Id]
        #[ORM\Column(type: 'uuid')]
        private UuidV4 $id,
        #[Column(type: Types::STRING)]
        private string $name,
    ) {
    }

    public function getId(): UuidV4
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
