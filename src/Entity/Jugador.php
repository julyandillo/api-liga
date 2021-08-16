<?php

namespace App\Entity;

use App\Repository\JugadorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JugadorRepository::class)
 */
class Jugador
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
    private $apodo;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_nacimiento;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nacionalidad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pais_nacimiento;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $posicion;

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

    public function getApodo(): ?string
    {
        return $this->apodo;
    }

    public function setApodo(string $apodo): self
    {
        $this->apodo = $apodo;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fecha_nacimiento): self
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    public function getNacionalidad(): ?string
    {
        return $this->nacionalidad;
    }

    public function setNacionalidad(string $nacionalidad): self
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    public function getPaisNacimiento(): ?string
    {
        return $this->pais_nacimiento;
    }

    public function setPaisNacimiento(?string $pais_nacimiento): self
    {
        $this->pais_nacimiento = $pais_nacimiento;

        return $this;
    }

    public function getPosicion(): ?string
    {
        return $this->posicion;
    }

    public function setPosicion(string $posicion): self
    {
        $this->posicion = $posicion;

        return $this;
    }
}
