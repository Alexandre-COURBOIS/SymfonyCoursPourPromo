<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;

/**
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Departement
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
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $population;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $superficie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $slugify = new Slugify();

        $slug = $slugify->slugify($this->getNom().$this->getCp());

        $this->setSlug($slug);
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(?int $population): self
    {
        $this->population = $population;

        return $this;
    }

    public function getSuperficie(): ?float
    {
        return $this->superficie;
    }

    public function setSuperficie(?float $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
