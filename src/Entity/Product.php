<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     normalizationContext={
 *          "groups"={"products:read"},
 *          "swagger_definition_name"="Listing"
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"products:item:read"},
 *                  "swagger_definition_name"="Single"
 *              },
 *          },
 *          "put",
 *          "patch",
 *          "delete"
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"products:item:read", "products:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"products:item:read", "products:read"})
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * Price of product in USD cents
     *
     * @ORM\Column(type="integer")
     * @Groups({"products:item:read", "products:read"})
     * @Assert\NotNull()
     */
    private $price;

    /**
     * Rating of product between 0.0 and 5.0
     *
     * @ORM\Column(type="float")
     * @Groups({"products:item:read"})
     * @Assert\NotNull()
     * @Assert\Range(min=0, max=5)
     */
    private $rating;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"products:item:read"})
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups({"products:item:read"})
     */
    private $color;

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

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }
}
