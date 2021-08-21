<?php

namespace App\Entity;

use App\Repository\LanguageChampionSkinRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LanguageChampionSkinRepository::class)
 */
class LanguageChampionSkin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Language::class, inversedBy="languageChampionSkins")
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity=Champion::class, inversedBy="languageChampionSkins")
     */
    private $champion;

    /**
     * @ORM\ManyToOne(targetEntity=Skin::class, inversedBy="languageChampionSkins")
     */
    private $skin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getChampion(): ?Champion
    {
        return $this->champion;
    }

    public function setChampion(?Champion $champion): self
    {
        $this->champion = $champion;

        return $this;
    }

    public function getSkin(): ?Skin
    {
        return $this->skin;
    }

    public function setSkin(?Skin $skin): self
    {
        $this->skin = $skin;

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
}
