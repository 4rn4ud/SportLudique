<?php

namespace App\Entity;

use App\Repository\LigneComRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneComRepository::class)]
class LigneCom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantity = null;


    #[ORM\OneToOne(mappedBy: 'lignecom', cascade: ['persist', 'remove'])]
    private ?Comment $comment = null;

    #[ORM\ManyToOne(inversedBy: 'command')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Command $command = null;

    #[ORM\ManyToOne(inversedBy: 'product')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $product = null;

    public function __construct()
    {
        $this->ncommand = new ArrayCollection();
        $this->nproduct = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->getId();
    }
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }


    public function getComment(): ?Comment
    {
        return $this->comment;
    }

    public function setComment(Comment $comment): self
    {
        // set the owning side of the relation if necessary
        if ($comment->getLignecom() !== $this) {
            $comment->setLignecom($this);
        }

        $this->comment = $comment;

        return $this;
    }

    public function getCommand(): ?Command
    {
        return $this->command;
    }

    public function setCommand(?Command $command): self
    {
        $this->command = $command;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
