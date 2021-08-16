<?php

namespace App\Entity;

use App\Repository\EquipoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipoRepository::class)
 */
class Equipo
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $club;

    /**
     * @ORM\Column(type="integer")
     */
    private $fundacion;

    /**
     * @ORM\OneToOne(targetEntity=Estadio::class, mappedBy="equipo", cascade={"persist", "remove"})
     */
    private $estadio;

    /**
     * @ORM\ManyToOne(targetEntity=Partido::class, inversedBy="equipo_local")
     */
    private $partido;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getClub(): ?string
    {
        return $this->club;
    }

    public function setClub(string $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getFundacion(): ?int
    {
        return $this->fundacion;
    }

    public function setFundacion(int $fundacion): self
    {
        $this->fundacion = $fundacion;

        return $this;
    }

    public function getEstadio(): ?Estadio
    {
        return $this->estadio;
    }

    public function setEstadio(Estadio $estadio): self
    {
        // set the owning side of the relation if necessary
        if ($estadio->getEquipo() !== $this) {
            $estadio->setEquipo($this);
        }

        $this->estadio = $estadio;

        return $this;
    }

    public function getPartido(): ?Partido
    {
        return $this->partido;
    }

    public function setPartido(?Partido $partido): self
    {
        $this->partido = $partido;

        return $this;
    }
}
