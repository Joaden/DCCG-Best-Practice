<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 */
class Payment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="payments")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $refund;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $token;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $invoice;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $transaction_price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $subscription_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $returnType;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ref;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_error;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isFrst;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRefund(): ?\DateTimeInterface
    {
        return $this->refund;
    }

    public function setRefund(?\DateTimeInterface $refund): self
    {
        $this->refund = $refund;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getInvoice(): ?string
    {
        return $this->invoice;
    }

    public function setInvoice(?string $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getTransactionPrice(): ?string
    {
        return $this->transaction_price;
    }

    public function setTransactionPrice(string $transaction_price): self
    {
        $this->transaction_price = $transaction_price;

        return $this;
    }

    public function getSubscriptionDate(): ?\DateTimeInterface
    {
        return $this->subscription_date;
    }

    public function setSubscriptionDate(\DateTimeInterface $subscription_date): self
    {
        $this->subscription_date = $subscription_date;

        return $this;
    }

    public function getReturnType(): ?int
    {
        return $this->returnType;
    }

    public function setReturnType(?int $returnType): self
    {
        $this->returnType = $returnType;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getIsError(): ?bool
    {
        return $this->is_error;
    }

    public function setIsError(bool $is_error): self
    {
        $this->is_error = $is_error;

        return $this;
    }

    public function getIsFrst(): ?bool
    {
        return $this->isFrst;
    }

    public function setIsFrst(bool $isFrst): self
    {
        $this->isFrst = $isFrst;

        return $this;
    }
}
