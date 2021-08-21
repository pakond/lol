<?php

namespace App\Entity;

use App\Repository\SkinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkinRepository::class)
 */
class Skin
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
    private $idnum;

    /**
     * @ORM\Column(type="integer")
     */
    private $num;

    /**
     * @ORM\Column(type="boolean")
     */
    private $chromas;

    /**
     * @ORM\ManyToOne(targetEntity=Champion::class, inversedBy="skins")
     */
    private $id_champion;

    /**
     * @ORM\OneToMany(targetEntity=LanguageChampionSkin::class, mappedBy="skin")
     */
    private $languageChampionSkins;

    public function __construct()
    {
        $this->languageChampionSkins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdnum(): ?string
    {
        return $this->idnum;
    }

    public function setIdnum(string $idnum): self
    {
        $this->idnum = $idnum;

        return $this;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function setNum(int $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getChromas(): ?bool
    {
        return $this->chromas;
    }

    public function setChromas(bool $chromas): self
    {
        $this->chromas = $chromas;

        return $this;
    }

    public function getIdChampion(): ?Champion
    {
        return $this->id_champion;
    }

    public function setIdChampion(?Champion $id_champion): self
    {
        $this->id_champion = $id_champion;

        return $this;
    }

    /**
     * @return Collection|LanguageChampionSkin[]
     */
    public function getLanguageChampionSkins(): Collection
    {
        return $this->languageChampionSkins;
    }

    public function addLanguageChampionSkin(LanguageChampionSkin $languageChampionSkin): self
    {
        if (!$this->languageChampionSkins->contains($languageChampionSkin)) {
            $this->languageChampionSkins[] = $languageChampionSkin;
            $languageChampionSkin->setSkin($this);
        }

        return $this;
    }

    public function removeLanguageChampionSkin(LanguageChampionSkin $languageChampionSkin): self
    {
        if ($this->languageChampionSkins->removeElement($languageChampionSkin)) {
            // set the owning side to null (unless already changed)
            if ($languageChampionSkin->getSkin() === $this) {
                $languageChampionSkin->setSkin(null);
            }
        }

        return $this;
    }
}
