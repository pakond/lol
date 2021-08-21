<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatsRepository::class)
 */
class Stats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $hp;

    /**
     * @ORM\Column(type="smallint")
     */
    private $hpperlevel;

    /**
     * @ORM\Column(type="smallint")
     */
    private $mp;

    /**
     * @ORM\Column(type="smallint")
     */
    private $mpperlevel;

    /**
     * @ORM\Column(type="smallint")
     */
    private $movespeed;

    /**
     * @ORM\Column(type="smallint")
     */
    private $armor;

    /**
     * @ORM\Column(type="float")
     */
    private $armorperlevel;

    /**
     * @ORM\Column(type="smallint")
     */
    private $spellblock;

    /**
     * @ORM\Column(type="float")
     */
    private $spellblockperlevel;

    /**
     * @ORM\Column(type="smallint")
     */
    private $attackrange;

    /**
     * @ORM\Column(type="smallint")
     */
    private $hpregen;

    /**
     * @ORM\Column(type="smallint")
     */
    private $hpregenperlevel;

    /**
     * @ORM\Column(type="smallint")
     */
    private $mpregen;

    /**
     * @ORM\Column(type="smallint")
     */
    private $mpregenperlevel;

    /**
     * @ORM\Column(type="smallint")
     */
    private $crit;

    /**
     * @ORM\Column(type="smallint")
     */
    private $critperlevel;

    /**
     * @ORM\Column(type="smallint")
     */
    private $attackdamage;

    /**
     * @ORM\Column(type="smallint")
     */
    private $attackdamageperlevel;

    /**
     * @ORM\Column(type="float")
     */
    private $attackspeedperlevel;

    /**
     * @ORM\Column(type="float")
     */
    private $attackspeed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getHpperlevel(): ?int
    {
        return $this->hpperlevel;
    }

    public function setHpperlevel(int $hpperlevel): self
    {
        $this->hpperlevel = $hpperlevel;

        return $this;
    }

    public function getMp(): ?int
    {
        return $this->mp;
    }

    public function setMp(int $mp): self
    {
        $this->mp = $mp;

        return $this;
    }

    public function getMpperlevel(): ?int
    {
        return $this->mpperlevel;
    }

    public function setMpperlevel(int $mpperlevel): self
    {
        $this->mpperlevel = $mpperlevel;

        return $this;
    }

    public function getMovespeed(): ?int
    {
        return $this->movespeed;
    }

    public function setMovespeed(int $movespeed): self
    {
        $this->movespeed = $movespeed;

        return $this;
    }

    public function getArmor(): ?int
    {
        return $this->armor;
    }

    public function setArmor(int $armor): self
    {
        $this->armor = $armor;

        return $this;
    }

    public function getArmorperlevel(): ?float
    {
        return $this->armorperlevel;
    }

    public function setArmorperlevel(float $armorperlevel): self
    {
        $this->armorperlevel = $armorperlevel;

        return $this;
    }

    public function getSpellblock(): ?int
    {
        return $this->spellblock;
    }

    public function setSpellblock(int $spellblock): self
    {
        $this->spellblock = $spellblock;

        return $this;
    }

    public function getSpellblockperlevel(): ?float
    {
        return $this->spellblockperlevel;
    }

    public function setSpellblockperlevel(float $spellblockperlevel): self
    {
        $this->spellblockperlevel = $spellblockperlevel;

        return $this;
    }

    public function getAttackrange(): ?int
    {
        return $this->attackrange;
    }

    public function setAttackrange(int $attackrange): self
    {
        $this->attackrange = $attackrange;

        return $this;
    }

    public function getHpregen(): ?int
    {
        return $this->hpregen;
    }

    public function setHpregen(int $hpregen): self
    {
        $this->hpregen = $hpregen;

        return $this;
    }

    public function getHpregenperlevel(): ?int
    {
        return $this->hpregenperlevel;
    }

    public function setHpregenperlevel(int $hpregenperlevel): self
    {
        $this->hpregenperlevel = $hpregenperlevel;

        return $this;
    }

    public function getMpregen(): ?int
    {
        return $this->mpregen;
    }

    public function setMpregen(int $mpregen): self
    {
        $this->mpregen = $mpregen;

        return $this;
    }

    public function getMpregenperlevel(): ?int
    {
        return $this->mpregenperlevel;
    }

    public function setMpregenperlevel(int $mpregenperlevel): self
    {
        $this->mpregenperlevel = $mpregenperlevel;

        return $this;
    }

    public function getCrit(): ?int
    {
        return $this->crit;
    }

    public function setCrit(int $crit): self
    {
        $this->crit = $crit;

        return $this;
    }

    public function getCritperlevel(): ?int
    {
        return $this->critperlevel;
    }

    public function setCritperlevel(int $critperlevel): self
    {
        $this->critperlevel = $critperlevel;

        return $this;
    }

    public function getAttackdamage(): ?int
    {
        return $this->attackdamage;
    }

    public function setAttackdamage(int $attackdamage): self
    {
        $this->attackdamage = $attackdamage;

        return $this;
    }

    public function getAttackdamageperlevel(): ?int
    {
        return $this->attackdamageperlevel;
    }

    public function setAttackdamageperlevel(int $attackdamageperlevel): self
    {
        $this->attackdamageperlevel = $attackdamageperlevel;

        return $this;
    }

    public function getAttackspeedperlevel(): ?float
    {
        return $this->attackspeedperlevel;
    }

    public function setAttackspeedperlevel(float $attackspeedperlevel): self
    {
        $this->attackspeedperlevel = $attackspeedperlevel;

        return $this;
    }

    public function getAttackspeed(): ?float
    {
        return $this->attackspeed;
    }

    public function setAttackspeed(float $attackspeed): self
    {
        $this->attackspeed = $attackspeed;

        return $this;
    }
}
