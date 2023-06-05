<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantityp = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column]
    private ?int $unitprice = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: LigneCom::class)]
    private Collection $product;

    #[ORM\Column(nullable: true)]
    private ?int $StockAlert = null;

    #[ORM\Column(nullable: true)]
    private ?int $QteACommander = null;

    #[ORM\ManyToOne]
    private ?Fournisseur $idFournisseur = null;

    public function __construct()
    {
        $this->product = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->getId();
    }

    public function getQuantityp(): ?int
    {
        return $this->quantityp;
    }

    public function setQuantityp(int $quantityp): self
    {
        $this->quantityp = $quantityp;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getUnitprice(): ?int
    {
        return $this->unitprice;
    }

    public function setUnitprice(int $unitprice): self
    {
        $this->unitprice = $unitprice;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    
    /**
     * @return Collection<int, LigneCom>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(LigneCom $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
            $product->setProduct($this);
        }

        return $this;
    }

    public function removeProduct(LigneCom $product): self
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getProduct() === $this) {
                $product->setProduct(null);
            }
        }

        return $this;
    }

    public function getStockAlert(): ?int
    {
        return $this->StockAlert;
    }

    public function setStockAlert(?int $StockAlert): self
    {
        $this->StockAlert = $StockAlert;

        return $this;
    }

    public function getQteACommander(): ?int
    {
        return $this->QteACommander;
    }

    public function setQteACommander(?int $QteACommander): self
    {
        $this->QteACommander = $QteACommander;

        return $this;
    }

    public function getIdFournisseur(): ?Fournisseur
    {
        return $this->idFournisseur;
    }

    public function setIdFournisseur(?Fournisseur $idFournisseur): self
    {
        $this->idFournisseur = $idFournisseur;

        return $this;
    }

}
