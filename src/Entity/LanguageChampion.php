<?php

namespace App\Entity;

use App\Repository\LanguageChampionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LanguageChampionRepository::class)
 */
class LanguageChampion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Language::class, inversedBy="languageChampions")
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity=Champion::class, inversedBy="languageChampions")
     */
    private $champion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $lore;

    /**
     * @ORM\Column(type="text")
     */
    private $blurb;

    /**
     * @ORM\Column(type="array")
     */
    private $allytips = [];

    /**
     * @ORM\Column(type="array")
     */
    private $enemytips = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $partype;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLore(): ?string
    {
        return $this->lore;
    }

    public function setLore(string $lore): self
    {
        $this->lore = $lore;

        return $this;
    }

    public function getBlurb(): ?string
    {
        return $this->blurb;
    }

    public function setBlurb(string $blurb): self
    {
        $this->blurb = $blurb;

        return $this;
    }

    public function getAllytips(): ?array
    {
        return $this->allytips;
    }

    public function setAllytips(array $allytips): self
    {
        $this->allytips = $allytips;

        return $this;
    }

    public function getEnemytips(): ?array
    {
        return $this->enemytips;
    }

    public function setEnemytips(array $enemytips): self
    {
        $this->enemytips = $enemytips;

        return $this;
    }

    public function getPartype(): ?string
    {
        return $this->partype;
    }

    public function setPartype(string $partype): self
    {
        $this->partype = $partype;

        return $this;
    }
}
