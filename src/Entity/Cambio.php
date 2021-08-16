<?php

namespace App\Entity;

use App\Repository\CambioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CambioRepository::class)
 */
class Cambio extends Evento
{
    /**
     * @ORM\Column(type="integer")
     */
    private $tipo;

    public function getTipo(): ?int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }
}
