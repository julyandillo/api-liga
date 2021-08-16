<?php

namespace App\Entity;

use App\Repository\TemporadaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TemporadaRepository::class)
 */
class Temporada
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id_competicion;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id_equipo;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id_jugador;


    public function setIdCompeticion($id_competicion): void
    {
        $this->id_competicion = $id_competicion;
    }

    public function getIdCompeticion(): ?int
    {
        return $this->id_competicion;
    }

    /**
     * @return mixed
     */
    public function getIdEquipo()
    {
        return $this->id_equipo;
    }

    /**
     * @param mixed $id_equipo
     */
    public function setIdEquipo($id_equipo): void
    {
        $this->id_equipo = $id_equipo;
    }

    /**
     * @return mixed
     */
    public function getIdJugador()
    {
        return $this->id_jugador;
    }

    /**
     * @param mixed $id_jugador
     */
    public function setIdJugador($id_jugador): void
    {
        $this->id_jugador = $id_jugador;
    }


}
