<?php

namespace App\Entity;

use App\Repository\TokenRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TokenRepository::class)]
class Token
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    #[ORM\Column(nullable: true)]
    private ?float $maxSupply = null;

    #[ORM\Column(nullable: true)]
    private ?float $circulatingSupply = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $blockchainType = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getMaxSupply(): ?float
    {
        return $this->maxSupply;
    }

    public function setMaxSupply(?float $maxSupply): self
    {
        $this->maxSupply = $maxSupply;

        return $this;
    }

    public function getCirculatingSupply(): ?float
    {
        return $this->circulatingSupply;
    }

    public function setCirculatingSupply(?float $circulatingSupply): self
    {
        $this->circulatingSupply = $circulatingSupply;

        return $this;
    }

    public function getBlockchainType(): ?string
    {
        return $this->blockchainType;
    }

    public function setBlockchainType(?string $blockchainType): self
    {
        $this->blockchainType = $blockchainType;

        return $this;
    }
}
