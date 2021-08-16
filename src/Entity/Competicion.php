<?php

namespace App\Entity;

use App\Repository\CompeticionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompeticionRepository::class)
 */
class Competicion
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
     * @ORM\OneToMany(targetEntity=Jornada::class, mappedBy="competicion")
     */
    private $jornadas;

    public function __construct()
    {
        $this->jornadas = new ArrayCollection();
    }

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

    /**
     * @return Collection|Jornada[]
     */
    public function getJornadas(): Collection
    {
        return $this->jornadas;
    }

    public function addJornada(Jornada $jornada): self
    {
        if (!$this->jornadas->contains($jornada)) {
            $this->jornadas[] = $jornada;
            $jornada->setCompeticion($this);
        }

        return $this;
    }

    public function removeJornada(Jornada $jornada): self
    {
        if ($this->jornadas->removeElement($jornada)) {
            // set the owning side to null (unless already changed)
            if ($jornada->getCompeticion() === $this) {
                $jornada->setCompeticion(null);
            }
        }

        return $this;
    }

}
