<?php

namespace App\Entity;

use App\Repository\JornadaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JornadaRepository::class)
 */
class Jornada
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_inicio;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_fin;

    /**
     * @ORM\ManyToOne(targetEntity=Competicion::class, inversedBy="jornadas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competicion;

    /**
     * @ORM\OneToMany(targetEntity=Partido::class, mappedBy="jornada")
     */
    private $partidos;

    public function __construct()
    {
        $this->partidos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fecha_inicio;
    }

    public function setFechaInicio(\DateTimeInterface $fecha_inicio): self
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fecha_fin;
    }

    public function setFechaFin(\DateTimeInterface $fecha_fin): self
    {
        $this->fecha_fin = $fecha_fin;

        return $this;
    }

    public function getCompeticion(): ?Competicion
    {
        return $this->competicion;
    }

    public function setCompeticion(?Competicion $competicion): self
    {
        $this->competicion = $competicion;

        return $this;
    }

    /**
     * @return Collection|Partido[]
     */
    public function getPartidos(): Collection
    {
        return $this->partidos;
    }

    public function addPartido(Partido $partido): self
    {
        if (!$this->partidos->contains($partido)) {
            $this->partidos[] = $partido;
            $partido->setJornada($this);
        }

        return $this;
    }

    public function removePartido(Partido $partido): self
    {
        if ($this->partidos->removeElement($partido)) {
            // set the owning side to null (unless already changed)
            if ($partido->getJornada() === $this) {
                $partido->setJornada(null);
            }
        }

        return $this;
    }
}
