<?php

namespace App\Entity;

use App\Repository\CasopisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CasopisRepository::class)]
class Casopis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Rok = null;

    #[ORM\Column]
    private ?int $Poradi = null;

    #[ORM\Column(length: 255)]
    private ?string $Titul = null;

    #[ORM\Column(length: 255)]
    private ?string $Popis = null;

    #[ORM\Column]
    private ?int $Publikovan = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRok(): ?int
    {
        return $this->Rok;
    }

    public function setRok(int $Rok): static
    {
        $this->Rok = $Rok;

        return $this;
    }

    public function getPoradi(): ?int
    {
        return $this->Poradi;
    }

    public function setPoradi(int $Poradi): static
    {
        $this->Poradi = $Poradi;

        return $this;
    }

    public function getTitul(): ?string
    {
        return $this->Titul;
    }

    public function setTitul(string $Titul): static
    {
        $this->Titul = $Titul;

        return $this;
    }

    public function getPopis(): ?string
    {
        return $this->Popis;
    }

    public function setPopis(string $Popis): static
    {
        $this->Popis = $Popis;

        return $this;
    }

    public function getPublikovan(): ?int
    {
        return $this->Publikovan;
    }

    public function setPublikovan(int $Publikovan): static
    {
        $this->Publikovan = $Publikovan;

        return $this;
    }
}
