<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class Command
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    #[ORM\OneToMany(mappedBy: 'command', targetEntity: LigneCom::class)]
    private Collection $command;

    public function __construct()
    {
        $this->command = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }

    /**
     * @return Collection<int, LigneCom>
     */
    public function getCommand(): Collection
    {
        return $this->command;
    }

    public function addCommand(LigneCom $command): self
    {
        if (!$this->command->contains($command)) {
            $this->command->add($command);
            $command->setCommand($this);
        }

        return $this;
    }

    public function removeCommand(LigneCom $command): self
    {
        if ($this->command->removeElement($command)) {
            // set the owning side to null (unless already changed)
            if ($command->getCommand() === $this) {
                $command->setCommand(null);
            }
        }

        return $this;
    }


}
