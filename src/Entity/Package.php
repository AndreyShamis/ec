<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="ec_package",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="uniq_name_pins", columns={"name", "pins"})})
 * @ORM\Entity(repositoryClass="App\Repository\PackageRepository")
 * @UniqueEntity(fields={"name", "pins"}, message="Package name already exist")
 */
class Package
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var integer
     * @ORM\Column(type="smallint", options={"default"="2"})
     */
    private $pins = 2;

    /**
     * @return int
     */
    public function getId(): ?int
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
     * @return Package
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getPins(): int
    {
        return $this->pins;
    }

    /**
     * @param int $pins
     * @return Package
     */
    public function setPins(int $pins): self
    {
        $this->pins = $pins;

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
