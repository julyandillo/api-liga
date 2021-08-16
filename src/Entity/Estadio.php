<?php

namespace App\Entity;

use App\Repository\EstadioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstadioRepository::class)
 */
class Estadio
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
     * @ORM\Column(type="integer")
     */
    private $capacidad;

    /**
     * @ORM\Column(type="integer")
     */
    private $construccion;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $dimensiones;

    /**
     * @ORM\OneToOne(targetEntity=Equipo::class, inversedBy="estadio", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipo;

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

    public function getCapacidad(): ?int
    {
        return $this->capacidad;
    }

    public function setCapacidad(int $capacidad): self
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    public function getConstruccion(): ?int
    {
        return $this->construccion;
    }

    public function setConstruccion(int $construccion): self
    {
        $this->construccion = $construccion;

        return $this;
    }

    public function getDimensiones(): ?string
    {
        return $this->dimensiones;
    }

    public function setDimensiones(string $dimensiones): self
    {
        $this->dimensiones = $dimensiones;

        return $this;
    }

    public function getEquipo(): ?Equipo
    {
        return $this->equipo;
    }

    public function setEquipo(Equipo $equipo): self
    {
        $this->equipo = $equipo;

        return $this;
    }
}
