<?php

namespace App\Entity;

use App\Repository\DeliveryOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeliveryOptionRepository::class)]
class DeliveryOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $daysToDeliver = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $shippingAndHandling = null;

    /**
     * @var Collection<int, CustomerOrder>
     */
    #[ORM\OneToMany(targetEntity: CustomerOrder::class, mappedBy: 'deliveryOption')]
    private Collection $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDaysToDeliver(): ?int
    {
        return $this->daysToDeliver;
    }

    public function setDaysToDeliver(int $daysToDeliver): static
    {
        $this->daysToDeliver = $daysToDeliver;

        return $this;
    }

    public function getShippingAndHandling(): ?string
    {
        return $this->shippingAndHandling;
    }

    public function setShippingAndHandling(string $shippingAndHandling): static
    {
        $this->shippingAndHandling = $shippingAndHandling;

        return $this;
    }

    /**
     * @return Collection<int, CustomerOrder>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(CustomerOrder $order): static
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->setDeliveryOption($this);
        }

        return $this;
    }

    public function removeOrder(CustomerOrder $order): static
    {
        if ($this->orders->removeElement($order)) {
            if ($order->getDeliveryOption() === $this) {
                $order->setDeliveryOption(null);
            }
        }

        return $this;
    }
}
