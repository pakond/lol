<?php

namespace App\Entity;

use App\Repository\ChampionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChampionRepository::class)
 */
class Champion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
     * @ORM\Column(type="integer")
     */
    private $key;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

	/**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity=Prueba::class, mappedBy="fk_champion")
     */
    private $pruebas;

    public function __construct()
    {
        $this->pruebas = new ArrayCollection();
    }

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

    /**
     * @return Collection|Prueba[]
     */
    public function getPruebas(): Collection
    {
        return $this->pruebas;
    }

    public function addPrueba(Prueba $prueba): self
    {
        if (!$this->pruebas->contains($prueba)) {
            $this->pruebas[] = $prueba;
            $prueba->addFkChampion($this);
        }

        return $this;
    }

    public function removePrueba(Prueba $prueba): self
    {
        if ($this->pruebas->removeElement($prueba)) {
            $prueba->removeFkChampion($this);
        }

        return $this;
    }
}
