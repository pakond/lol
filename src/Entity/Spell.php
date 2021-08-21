<?php

namespace App\Entity;

use App\Repository\SpellRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpellRepository::class)
 */
class Spell
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $tooltip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $maxrank;

    /**
     * @ORM\Column(type="array")
     */
    private $cooldown = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cooldownburn;

    /**
     * @ORM\Column(type="array")
     */
    private $cost = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $costburn;

    /**
     * @ORM\Column(type="array")
     */
    private $effectburn = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $costtype;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $maxammo;

    /**
     * @ORM\Column(type="array")
     */
    private $range_ = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rangeburn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resource;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameid(): ?string
    {
        return $this->nameid;
    }

    public function setNameid(string $nameid): self
    {
        $this->nameid = $nameid;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTooltip(): ?string
    {
        return $this->tooltip;
    }

    public function setTooltip(string $tooltip): self
    {
        $this->tooltip = $tooltip;

        return $this;
    }

    public function getMaxrank(): ?string
    {
        return $this->maxrank;
    }

    public function setMaxrank(string $maxrank): self
    {
        $this->maxrank = $maxrank;

        return $this;
    }

    public function getCooldown(): ?array
    {
        return $this->cooldown;
    }

    public function setCooldown(array $cooldown): self
    {
        $this->cooldown = $cooldown;

        return $this;
    }

    public function getCooldownburn(): ?string
    {
        return $this->cooldownburn;
    }

    public function setCooldownburn(string $cooldownburn): self
    {
        $this->cooldownburn = $cooldownburn;

        return $this;
    }

    public function getCost(): ?array
    {
        return $this->cost;
    }

    public function setCost(array $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getCostburn(): ?string
    {
        return $this->costburn;
    }

    public function setCostburn(string $costburn): self
    {
        $this->costburn = $costburn;

        return $this;
    }

    public function getEffectburn(): ?array
    {
        return $this->effectburn;
    }

    public function setEffectburn(array $effectburn): self
    {
        $this->effectburn = $effectburn;

        return $this;
    }

    public function getCosttype(): ?string
    {
        return $this->costtype;
    }

    public function setCosttype(string $costtype): self
    {
        $this->costtype = $costtype;

        return $this;
    }

    public function getMaxammo(): ?string
    {
        return $this->maxammo;
    }

    public function setMaxammo(string $maxammo): self
    {
        $this->maxammo = $maxammo;

        return $this;
    }

    public function getRange(): ?array
    {
        return $this->range_;
    }

    public function setRange(array $range_): self
    {
        $this->range_ = $range_;

        return $this;
    }

    public function getRangeburn(): ?string
    {
        return $this->rangeburn;
    }

    public function setRangeburn(string $rangeburn): self
    {
        $this->rangeburn = $rangeburn;

        return $this;
    }

    public function getResource(): ?string
    {
        return $this->resource;
    }

    public function setResource(string $resource): self
    {
        $this->resource = $resource;

        return $this;
    }
}
