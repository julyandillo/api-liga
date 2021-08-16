<?php

namespace App\Entity;

use App\Repository\GolRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GolRepository::class)
 */
class Gol extends Evento
{
    /**
     * @ORM\Column(type="boolean")
     */
    private $penalti;

    /**
     * @ORM\Column(type="boolean")
     */
    private $propia_meta;

    public function getPenalti(): ?bool
    {
        return $this->penalti;
    }

    public function setPenalti(bool $penalti): self
    {
        $this->penalti = $penalti;

        return $this;
    }

    public function getPropiaMeta(): ?bool
    {
        return $this->propia_meta;
    }

    public function setPropiaMeta(bool $propia_meta): self
    {
        $this->propia_meta = $propia_meta;

        return $this;
    }
}
