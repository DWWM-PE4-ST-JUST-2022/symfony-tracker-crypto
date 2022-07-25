<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserTokenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserTokenRepository::class)]
#[ApiResource]
class UserToken
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $quantity = null;

    #[ORM\Column(length: 255)]
    private ?string $walletAddress = null;

    #[ORM\ManyToOne(inversedBy: 'userTokens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Token $token = null;

    #[ORM\ManyToOne(inversedBy: 'userTokens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'receiver', targetEntity: Transaction::class, orphanRemoval: true)]
    private Collection $receiverTransactions;

    #[ORM\OneToMany(mappedBy: 'sender', targetEntity: Transaction::class, orphanRemoval: true)]
    private Collection $senderTransactions;

    public function __construct()
    {
        $this->receiverTransactions = new ArrayCollection();
        $this->senderTransactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getWalletAddress(): ?string
    {
        return $this->walletAddress;
    }

    public function setWalletAddress(string $walletAddress): self
    {
        $this->walletAddress = $walletAddress;

        return $this;
    }

    public function getToken(): ?Token
    {
        return $this->token;
    }

    public function setToken(?Token $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Transaction>
     */
    public function getReceiverTransactions(): Collection
    {
        return $this->receiverTransactions;
    }

    public function addReceiverTransaction(Transaction $receiverTransaction): self
    {
        if (!$this->receiverTransactions->contains($receiverTransaction)) {
            $this->receiverTransactions[] = $receiverTransaction;
            $receiverTransaction->setReceiver($this);
        }

        return $this;
    }

    public function removeReceiverTransaction(Transaction $receiverTransaction): self
    {
        if ($this->receiverTransactions->removeElement($receiverTransaction)) {
            // set the owning side to null (unless already changed)
            if ($receiverTransaction->getReceiver() === $this) {
                $receiverTransaction->setReceiver(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Transaction>
     */
    public function getSenderTransactions(): Collection
    {
        return $this->senderTransactions;
    }

    public function addSenderTransaction(Transaction $senderTransaction): self
    {
        if (!$this->senderTransactions->contains($senderTransaction)) {
            $this->senderTransactions[] = $senderTransaction;
            $senderTransaction->setSender($this);
        }

        return $this;
    }

    public function removeSenderTransaction(Transaction $senderTransaction): self
    {
        if ($this->senderTransactions->removeElement($senderTransaction)) {
            // set the owning side to null (unless already changed)
            if ($senderTransaction->getSender() === $this) {
                $senderTransaction->setSender(null);
            }
        }

        return $this;
    }
}
