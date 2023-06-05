<?php

namespace App\Entity;

use App\Repository\CommandFournisseurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandFournisseurRepository::class)]
class CommandFournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?product $idProduct = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduct(): ?product
    {
        return $this->idProduct;
    }

    public function setIdProduct(?product $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }
}
