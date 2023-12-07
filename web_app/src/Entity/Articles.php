<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column]
    private ?int $AuthorID = null;

    #[ORM\Column]
    private ?int $FileID = null;

    #[ORM\Column]
    private ?int $Status = null;

    #[ORM\Column(length: 255)]
    private ?string $Annotation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $UploadDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $AcceptDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getAuthorID(): ?int
    {
        return $this->AuthorID;
    }

    public function setAuthorID(int $AuthorID): static
    {
        $this->AuthorID = $AuthorID;

        return $this;
    }

    public function getFileID(): ?int
    {
        return $this->FileID;
    }

    public function setFileID(int $FileID): static
    {
        $this->FileID = $FileID;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->Status;
    }

    public function setStatus(int $Status): static
    {
        $this->Status = $Status;

        return $this;
    }

    public function getAnnotation(): ?string
    {
        return $this->Annotation;
    }

    public function setAnnotation(string $Annotation): static
    {
        $this->Annotation = $Annotation;

        return $this;
    }

    public function getUploadDate(): ?\DateTimeInterface
    {
        return $this->UploadDate;
    }

    public function setUploadDate(\DateTimeInterface $UploadDate): static
    {
        $this->UploadDate = $UploadDate;

        return $this;
    }

    public function getAcceptDate(): ?\DateTimeInterface
    {
        return $this->AcceptDate;
    }

    public function setAcceptDate(\DateTimeInterface $AcceptDate): static
    {
        $this->AcceptDate = $AcceptDate;

        return $this;
    }
}
