<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ec_component",
 *     uniqueConstraints={@ORM\UniqueConstraint(
 *     name="uniq_component",
 *     columns={"name", "package", "sub_category", "manufacturer"})})
 * @ORM\Entity(repositoryClass="App\Repository\ComponentRepository")
 */
class Component
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Package", inversedBy="components")
     * @ORM\JoinColumn(name="package")
     */
    private $package;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SubCategory", inversedBy="components")
     * @ORM\JoinColumn(name="sub_category", nullable=false)
     */
    private $sub_category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Manufacturer", inversedBy="components")
     * @ORM\JoinColumn(name="manufacturer")
     */
    private $manufacturer;

    /**
     * @var string
     * @ORM\Column(name="description", type="text", length=4294967295)
     */
    protected $description;
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Component
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Package|null
     */
    public function getPackage(): ?Package
    {
        return $this->package;
    }

    /**
     * @param Package|null $package
     * @return Component
     */
    public function setPackage(?Package $package): self
    {
        $this->package = $package;

        return $this;
    }

    /**
     * @return SubCategory|null
     */
    public function getSubCategory(): ?SubCategory
    {
        return $this->sub_category;
    }

    /**
     * @param SubCategory|null $sub_category
     * @return Component
     */
    public function setSubCategory(?SubCategory $sub_category): self
    {
        $this->sub_category = $sub_category;

        return $this;
    }

    /**
     * @return Manufacturer|null
     */
    public function getManufacturer(): ?Manufacturer
    {
        return $this->manufacturer;
    }

    /**
     * @param Manufacturer|null $manufacturer
     * @return Component
     */
    public function setManufacturer(?Manufacturer $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
