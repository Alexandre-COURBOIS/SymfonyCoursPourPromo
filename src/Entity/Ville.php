<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Ville
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
    private $codeCommune;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gentile;

    /**
     * @ORM\Column(type="float")
     */
    private $recordTempChaleur;

    /**
     * @ORM\Column(type="float")
     */
    private $recordTempFroid;

    /**
     * @ORM\Column(type="float")
     */
    private $temperatureMoyenne;

    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
       $this->setTemperatureMoyenne($this->getRecordTempChaleur() / $this->getRecordTempFroid());
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

    public function getCodeCommune(): ?int
    {
        return $this->codeCommune;
    }

    public function setCodeCommune(int $codeCommune): self
    {
        $this->codeCommune = $codeCommune;

        return $this;
    }

    public function getGentile(): ?string
    {
        return $this->gentile;
    }

    public function setGentile(string $gentile): self
    {
        $this->gentile = $gentile;

        return $this;
    }

    public function getRecordTempChaleur(): ?float
    {
        return $this->recordTempChaleur;
    }

    public function setRecordTempChaleur(float $recordTempChaleur): self
    {
        $this->recordTempChaleur = $recordTempChaleur;

        return $this;
    }

    public function getRecordTempFroid(): ?float
    {
        return $this->recordTempFroid;
    }

    public function setRecordTempFroid(float $recordTempFroid): self
    {
        $this->recordTempFroid = $recordTempFroid;

        return $this;
    }

    public function getTemperatureMoyenne(): ?float
    {
        return $this->temperatureMoyenne;
    }

    public function setTemperatureMoyenne(float $temperatureMoyenne): self
    {
        $this->temperatureMoyenne = $temperatureMoyenne;

        return $this;
    }
}
