<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    /**
     * @var Collection<int, Supplier>
     */
    #[ORM\ManyToMany(targetEntity: Supplier::class, inversedBy: 'products')]
    #[ORM\JoinTable(name: 'supply')]
    private Collection $suppliers;

    /**
     * @var Collection<int, OrderLine>
     */
    #[ORM\OneToMany(targetEntity: OrderLine::class, mappedBy: 'product')]
    private Collection $orderLines;

    /**
     * @var Collection<int, Review>
     */
    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'product')]
    private Collection $reviews;

    public function __construct()
    {
        $this->suppliers = new ArrayCollection();
        $this->orderLines = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Supplier>
     */
    public function getSuppliers(): Collection
    {
        return $this->suppliers;
    }

    public function addSupplier(Supplier $supplier): static
    {
        if (!$this->suppliers->contains($supplier)) {
            $this->suppliers->add($supplier);
        }

        return $this;
    }

    public function removeSupplier(Supplier $supplier): static
    {
        $this->suppliers->removeElement($supplier);

        return $this;
    }

    /**
     * @return Collection<int, OrderLine>
     */
    public function getOrderLines(): Collection
    {
        return $this->orderLines;
    }

    public function addOrderLine(OrderLine $orderLine): static
    {
        if (!$this->orderLines->contains($orderLine)) {
            $this->orderLines->add($orderLine);
            $orderLine->setProduct($this);
        }

        return $this;
    }

    public function removeOrderLine(OrderLine $orderLine): static
    {
        if ($this->orderLines->removeElement($orderLine)) {
            // set the owning side to null (unless already changed)
            if ($orderLine->getProduct() === $this) {
                $orderLine->setProduct(null);
            }
        }

        return $this;
    }


    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setProduct($this);
        }

        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getProduct() === $this) {
                $review->setProduct(null);
            }
        }

        return $this;
    }

    public function getImagePath(): string
    {
        return 'images/categories/' . $this->getCategory()->getId() . '/' . $this->getId() . '.png';
    }

    /**
     * @var Collection<int, Review>
     */



    /**
     * Get the number of reviews for this product
     */
    public function getReviewCount(): int
    {
        return $this->reviews->count();
    }


    /**
     * Calculate the average star rating for this product
     *
     * @return float Average rating (0-5)
     */
    public function getAverageRating(): float
    {
        $reviewCount = $this->getReviewCount();//number of reviews

        if ($reviewCount === 0) {
            return 0.0;
        }

        $totalStars = 0;
        foreach ($this->reviews as $review) { //iterate over each review tuple to get Total star numbers
            $totalStars += $review->getStarsNumber();
        }

        // Calculate exact average
        $exactAverage = $totalStars / $reviewCount;

        // Round to nearest 0.5 so that we get [0, 0.5, 1 ... 5]
        return round($exactAverage * 2) / 2;
    }

    public function getStarDistribution(): array
    {
        $avgRating = $this->getAverageRating();
        $fullStars = (int)floor($avgRating);//casting to int
        $hasHalfStar = ($avgRating - $fullStars) >= 0.5;
        $halfStars = $hasHalfStar ? 1 : 0;
        $emptyStars = 5 - ($fullStars + $halfStars);

        return [
            'fullStars' => $fullStars,
            'halfStars' => $halfStars,
            'emptyStars' => $emptyStars,
        ];
    }

}
