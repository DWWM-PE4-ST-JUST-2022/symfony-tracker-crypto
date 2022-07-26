<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
#[ApiResource]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column]
    private ?float $fee = null;

    #[ORM\Column(length: 255)]
    #[
        Assert\Choice([
            'ok',
            'fail',
        ]),
    ]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $occurredAt = null;

    #[ORM\ManyToOne(inversedBy: 'receiverTransactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserToken $receiver = null;

    #[ORM\ManyToOne(inversedBy: 'senderTransactions')]
    #[ORM\JoinColumn(nullable: false)]
    #[
        Assert\NotNull,
    ]
    private ?UserToken $sender = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

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

    public function getOccurredAt(): ?\DateTimeInterface
    {
        return $this->occurredAt;
    }

    public function setOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $this->occurredAt = $occurredAt;

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
