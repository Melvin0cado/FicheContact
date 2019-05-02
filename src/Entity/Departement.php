<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartementRepository")
 */
class Departement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomDepartement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mailDepartement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDepartement(): ?string
    {
        return $this->nomDepartement;
    }

    public function setNomDepartement(string $nomDepartement): self
    {
        $this->nomDepartement = $nomDepartement;

        return $this;
    }

    public function getMailDepartement(): ?string
    {
        return $this->mailDepartement;
    }

    public function setMailDepartement(string $mailDepartement): self
    {
        $this->mailDepartement = $mailDepartement;

        return $this;
    }
}
