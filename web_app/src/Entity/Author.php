<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $AuthorName = null;

    #[ORM\Column(length: 255)]
    private ?string $AuthorSurname = null;

    #[ORM\Column]
    private ?int $StatusID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorName(): ?string
    {
        return $this->AuthorName;
    }

    public function setAuthorName(string $AuthorName): static
    {
        $this->AuthorName = $AuthorName;

        return $this;
    }

    public function getAuthorSurname(): ?string
    {
        return $this->AuthorSurname;
    }

    public function setAuthorSurname(string $AuthorSurname): static
    {
        $this->AuthorSurname = $AuthorSurname;

        return $this;
    }

    public function getStatusID(): ?int
    {
        return $this->StatusID;
    }

    public function setStatusID(int $StatusID): static
    {
        $this->StatusID = $StatusID;

        return $this;
    }
}
