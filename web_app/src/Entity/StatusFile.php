<?php

namespace App\Entity;

use App\Repository\StatusFileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusFileRepository::class)]
class StatusFile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $StatusName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusName(): ?string
    {
        return $this->StatusName;
    }

    public function setStatusName(string $StatusName): static
    {
        $this->StatusName = $StatusName;

        return $this;
    }
}
