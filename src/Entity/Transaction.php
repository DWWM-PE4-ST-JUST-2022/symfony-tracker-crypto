<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $ammount = null;

    #[ORM\Column]
    private ?float $fee = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $occuredAt = null;

    #[ORM\ManyToOne(inversedBy: 'receiverTransactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserToken $receiver = null;

    #[ORM\ManyToOne(inversedBy: 'senderTransactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserToken $sender = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmmount(): ?float
    {
        return $this->ammount;
    }

    public function setAmmount(float $ammount): self
    {
        $this->ammount = $ammount;

        return $this;
    }

    public function getFee(): ?float
    {
        return $this->fee;
    }

    public function setFee(float $fee): self
    {
        $this->fee = $fee;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getOccuredAt(): ?\DateTimeInterface
    {
        return $this->occuredAt;
    }

    public function setOccuredAt(\DateTimeInterface $occuredAt): self
    {
        $this->occuredAt = $occuredAt;

        return $this;
    }

    public function getReceiver(): ?UserToken
    {
        return $this->receiver;
    }

    public function setReceiver(?UserToken $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getSender(): ?UserToken
    {
        return $this->sender;
    }

    public function setSender(?UserToken $sender): self
    {
        $this->sender = $sender;

        return $this;
    }
}
