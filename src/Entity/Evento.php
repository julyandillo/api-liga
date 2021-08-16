<?php

namespace App\Entity;

use App\Repository\EventoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass()
 */
abstract class Evento
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
    private $minuto;

    /**
     * @ORM\ManyToOne(targetEntity=Partido::class, inversedBy="eventos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $partido;

    /**
     * @ORM\ManyToOne(targetEntity=Jugador::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $jugador;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinuto(): ?int
    {
        return $this->minuto;
    }

    public function setMinuto(int $minuto): self
    {
        $this->minuto = $minuto;

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

    public function getJugador(): ?Jugador
    {
        return $this->jugador;
    }

    public function setJugador(?Jugador $jugador): self
    {
        $this->jugador = $jugador;

        return $this;
    }
}
