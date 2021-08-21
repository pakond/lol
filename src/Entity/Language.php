<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LanguageRepository::class)
 */
class Language
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=LanguageChampion::class, mappedBy="language")
     */
    private $languageChampions;

    /**
     * @ORM\OneToMany(targetEntity=LanguageChampionSkin::class, mappedBy="language")
     */
    private $languageChampionSkins;

    public function __construct()
    {
        $this->languageChampions = new ArrayCollection();
        $this->languageChampionSkins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|LanguageChampion[]
     */
    public function getLanguageChampions(): Collection
    {
        return $this->languageChampions;
    }

    public function addLanguageChampion(LanguageChampion $languageChampion): self
    {
        if (!$this->languageChampions->contains($languageChampion)) {
            $this->languageChampions[] = $languageChampion;
            $languageChampion->setLanguage($this);
        }

        return $this;
    }

    public function removeLanguageChampion(LanguageChampion $languageChampion): self
    {
        if ($this->languageChampions->removeElement($languageChampion)) {
            // set the owning side to null (unless already changed)
            if ($languageChampion->getLanguage() === $this) {
                $languageChampion->setLanguage(null);
            }
        }

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
            $languageChampionSkin->setLanguage($this);
        }

        return $this;
    }

    public function removeLanguageChampionSkin(LanguageChampionSkin $languageChampionSkin): self
    {
        if ($this->languageChampionSkins->removeElement($languageChampionSkin)) {
            // set the owning side to null (unless already changed)
            if ($languageChampionSkin->getLanguage() === $this) {
                $languageChampionSkin->setLanguage(null);
            }
        }

        return $this;
    }
}
