<?php

namespace App\Entity;

use App\Repository\PruebaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PruebaRepository::class)
 */
class Prueba
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
    private $relation;

    /**
     * @ORM\ManyToMany(targetEntity=Champion::class, inversedBy="pruebas")
     */
    private $fk_champion;

    public function __construct()
    {
        $this->fk_champion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * @return Collection|Champion[]
     */
    public function getFkChampion(): Collection
    {
        return $this->fk_champion;
    }

    public function addFkChampion(Champion $fkChampion): self
    {
        if (!$this->fk_champion->contains($fkChampion)) {
            $this->fk_champion[] = $fkChampion;
        }

        return $this;
    }

    public function removeFkChampion(Champion $fkChampion): self
    {
        $this->fk_champion->removeElement($fkChampion);

        return $this;
    }
}
