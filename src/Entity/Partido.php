<?php

namespace App\Entity;

use App\Repository\PartidoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartidoRepository::class)
 */
class Partido
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
    private $goles_local;

    /**
     * @ORM\Column(type="integer")
     */
    private $goles_visitante;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity=Equipo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipo_local;

    /**
     * @ORM\ManyToOne(targetEntity=Equipo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipo_visitante;

    /**
     * @ORM\ManyToOne(targetEntity=Arbitro::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $arbitro;

    /**
     * @ORM\ManyToOne(targetEntity=Jornada::class, inversedBy="partidos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jornada;

    /**
     * @ORM\OneToMany(targetEntity=Evento::class, mappedBy="partido", orphanRemoval=true)
     */
    private $eventos;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disputado;

    public function __construct()
    {
        $this->eventos = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGolesLocal(): ?int
    {
        return $this->goles_local;
    }

    public function setGolesLocal(int $goles_local): self
    {
        $this->goles_local = $goles_local;

        return $this;
    }

    public function getGolesVisitante(): ?int
    {
        return $this->goles_visitante;
    }

    public function setGolesVisitante(int $goles_visitante): self
    {
        $this->goles_visitante = $goles_visitante;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getEquipoLocal(): ?Equipo
    {
        return $this->equipo_local;
    }

    public function setEquipoLocal(?Equipo $equipo_local): self
    {
        $this->equipo_local = $equipo_local;

        return $this;
    }

    public function getEquipoVisitante(): ?Equipo
    {
        return $this->equipo_visitante;
    }

    public function setEquipoVisitante(?Equipo $equipo_visitante): self
    {
        $this->equipo_visitante = $equipo_visitante;

        return $this;
    }

    public function getArbitro(): ?Arbitro
    {
        return $this->arbitro;
    }

    public function setArbitro(?Arbitro $arbitro): self
    {
        $this->arbitro = $arbitro;

        return $this;
    }

    public function getJornada(): ?Jornada
    {
        return $this->jornada;
    }

    public function setJornada(?Jornada $jornada): self
    {
        $this->jornada = $jornada;

        return $this;
    }

    /**
     * @return Collection|Evento[]
     */
    public function getEventos(): Collection
    {
        return $this->eventos;
    }

    public function addEvento(Evento $evento): self
    {
        if (!$this->eventos->contains($evento)) {
            $this->eventos[] = $evento;
            $evento->setPartido($this);
        }

        return $this;
    }

    public function removeEvento(Evento $evento): self
    {
        if ($this->eventos->removeElement($evento)) {
            // set the owning side to null (unless already changed)
            if ($evento->getPartido() === $this) {
                $evento->setPartido(null);
            }
        }

        return $this;
    }

    public function getDisputado(): ?bool
    {
        return $this->disputado;
    }

    public function setDisputado(bool $disputado): self
    {
        $this->disputado = $disputado;

        return $this;
    }
}
