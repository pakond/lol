<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
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
    private $full;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sprite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imggroup;

    /**
     * @ORM\Column(type="smallint")
     */
    private $x;

    /**
     * @ORM\Column(type="smallint")
     */
    private $y;

    /**
     * @ORM\Column(type="smallint")
     */
    private $w;

    /**
     * @ORM\Column(type="smallint")
     */
    private $h;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFull(): ?string
    {
        return $this->full;
    }

    public function setFull(string $full): self
    {
        $this->full = $full;

        return $this;
    }

    public function getSprite(): ?string
    {
        return $this->sprite;
    }

    public function setSprite(string $sprite): self
    {
        $this->sprite = $sprite;

        return $this;
    }

    public function getImggroup(): ?string
    {
        return $this->imggroup;
    }

    public function setImggroup(string $imggroup): self
    {
        $this->imggroup = $imggroup;

        return $this;
    }

    public function getX(): ?int
    {
        return $this->x;
    }

    public function setX(int $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): ?int
    {
        return $this->y;
    }

    public function setY(int $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function getW(): ?int
    {
        return $this->w;
    }

    public function setW(int $w): self
    {
        $this->w = $w;

        return $this;
    }

    public function getH(): ?int
    {
        return $this->h;
    }

    public function setH(int $h): self
    {
        $this->h = $h;

        return $this;
    }
}
