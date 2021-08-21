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
     * @ORM\Column(type="string", length=255)
     */
    private $nameid;

    /**
     * @ORM\Column(type="integer")
     */
    private $keyid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist", "remove"})
	 * @ORM\JoinColumn(nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity=Stats::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $Stats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $version;

    /**
     * @ORM\OneToMany(targetEntity=Skin::class, mappedBy="id_champion")
     */
    //private $skins;

    /**
     * @ORM\Column(type="array")
     */
    private $tags = [];

    /**
     * @ORM\OneToOne(targetEntity=Info::class, cascade={"persist", "remove"})
     */
    private $info;

    /**
     * @ORM\OneToMany(targetEntity=LanguageChampion::class, mappedBy="champion")
     */
    private $languageChampions;

    /**
     * @ORM\OneToMany(targetEntity=LanguageChampionSkin::class, mappedBy="champion")
     */
    private $languageChampionSkins;

    public function __construct()
    {
        //$this->skins = new ArrayCollection();
        $this->languageChampions = new ArrayCollection();
        $this->languageChampionSkins = new ArrayCollection();
    }

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

    public function getKeyid(): ?int
    {
        return $this->keyid;
    }

    public function setKeyid(int $keyid): self
    {
        $this->keyid = $keyid;

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

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getStats(): ?Stats
    {
        return $this->Stats;
    }

    public function setStats(Stats $Stats): self
    {
        $this->Stats = $Stats;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return Collection|Skin[]
     */
    // public function getSkins(): Collection
    // {
    //     return $this->skins;
    // }

    // public function addSkin(Skin $skin): self
    // {
    //     if (!$this->skins->contains($skin)) {
    //         $this->skins[] = $skin;
    //         $skin->setIdChampion($this);
    //     }

    //     return $this;
    // }

    // public function removeSkin(Skin $skin): self
    // {
    //     if ($this->skins->removeElement($skin)) {
    //         // set the owning side to null (unless already changed)
    //         if ($skin->getIdChampion() === $this) {
    //             $skin->setIdChampion(null);
    //         }
    //     }

    //     return $this;
    // }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getInfo(): ?Info
    {
        return $this->info;
    }

    public function setInfo(?Info $info): self
    {
        $this->info = $info;

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
            $languageChampion->setChampion($this);
        }

        return $this;
    }

    public function removeLanguageChampion(LanguageChampion $languageChampion): self
    {
        if ($this->languageChampions->removeElement($languageChampion)) {
            // set the owning side to null (unless already changed)
            if ($languageChampion->getChampion() === $this) {
                $languageChampion->setChampion(null);
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
            $languageChampionSkin->setChampion($this);
        }

        return $this;
    }

    public function removeLanguageChampionSkin(LanguageChampionSkin $languageChampionSkin): self
    {
        if ($this->languageChampionSkins->removeElement($languageChampionSkin)) {
            // set the owning side to null (unless already changed)
            if ($languageChampionSkin->getChampion() === $this) {
                $languageChampionSkin->setChampion(null);
            }
        }

        return $this;
    }
}
