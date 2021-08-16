<?php

namespace App\Entity;

use App\Repository\EstadisticaRepository;
use App\Tools\Dato;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Persistence\Event\LifecycleEventArgs;

/**
 * @ORM\Entity(repositoryClass=EstadisticaRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Estadistica
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Equipo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipo;

    /**
     * @ORM\ManyToOne(targetEntity=Jornada::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $jornada;

    const PUNTOS = 0;
    const JUGADOS = 1;
    const GANADOS = 2;
    const PERDIDOS = 3;
    const EMPATADOS = 4;
    const GOLES_FAVOR = 5;
    const GOLES_CONTRA = 6;

    private $parametros;

    /**
     * @ORM\Column(type="integer")
     */
    private $puntos;

    /**
     * @ORM\Column(type="integer")
     */
    private $puntos_casa;

    /**
     * @ORM\Column(type="integer")
     */
    private $puntos_fuera;

    /**
     * @ORM\Column(type="integer")
     */
    private $jugados;

    /**
     * @ORM\Column(type="integer")
     */
    private $jugados_casa;

    /**
     * @ORM\Column(type="integer")
     */
    private $jugados_fuera;

    /**
     * @ORM\Column(type="integer")
     */
    private $ganados;

    /**
     * @ORM\Column(type="integer")
     */
    private $ganados_casa;

    /**
     * @ORM\Column(type="integer")
     */
    private $ganados_fuera;

    /**
     * @ORM\Column(type="integer")
     */
    private $empatados;

    /**
     * @ORM\Column(type="integer")
     */
    private $empatados_casa;

    /**
     * @ORM\Column(type="integer")
     */
    private $empatados_fuera;

    /**
     * @ORM\Column(type="integer")
     */
    private $perdidos;

    /**
     * @ORM\Column(type="integer")
     */
    private $perdidos_casa;

    /**
     * @ORM\Column(type="integer")
     */
    private $perdidos_fuera;

    /**
     * @ORM\Column(type="integer")
     */
    private $goles_favor;

    /**
     * @ORM\Column(type="integer")
     */
    private $goles_favor_casa;

    /**
     * @ORM\Column(type="integer")
     */
    private $goles_favor_fuera;

    /**
     * @ORM\Column(type="integer")
     */
    private $goles_contra_casa;

    /**
     * @ORM\Column(type="integer")
     */
    private $goles_contra;

    /**
     * @ORM\Column(type="integer")
     */
    private $goles_contra_fuera;

    public function __construct()
    {
        $this->parametros = [
            self::PUNTOS => new Dato(),
            self::JUGADOS => new Dato(),
            self::GANADOS => new Dato(),
            self::EMPATADOS=> new Dato(),
            self::PERDIDOS => new Dato(),
            self::GOLES_FAVOR => new Dato(),
            self::GOLES_CONTRA => new Dato(),
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipo(): ?Equipo
    {
        return $this->equipo;
    }

    public function setEquipo(?Equipo $equipo): self
    {
        $this->equipo = $equipo;

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
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->puntos = $this->parametros[self::PUNTOS]->getTotal();
        $this->puntos_casa = $this->parametros[self::PUNTOS]->getCasa();
        $this->puntos_fuera = $this->parametros[self::PUNTOS]->getFuera();

        $this->jugados = $this->parametros[self::JUGADOS]->getTotal();
        $this->jugados_casa = $this->parametros[self::JUGADOS]->getCasa();
        $this->jugados_fuera = $this->parametros[self::JUGADOS]->getFuera();

        $this->ganados = $this->parametros[self::GANADOS]->getTotal();
        $this->ganados_casa = $this->parametros[self::GANADOS]->getCasa();
        $this->ganados_fuera = $this->parametros[self::GANADOS]->getFuera();

        $this->perdidos = $this->parametros[self::PERDIDOS]->getTotal();
        $this->perdidos_casa = $this->parametros[self::PERDIDOS]->getCasa();
        $this->perdidos_fuera = $this->parametros[self::PERDIDOS]->getFuera();

        $this->empatados = $this->parametros[self::EMPATADOS]->getTotal();
        $this->empatados_casa = $this->parametros[self::EMPATADOS]->getCasa();
        $this->empatados_fuera = $this->parametros[self::EMPATADOS]->getFuera();

        $this->goles_favor = $this->parametros[self::GOLES_FAVOR]->getTotal();
        $this->goles_favor_casa = $this->parametros[self::GOLES_FAVOR]->getCasa();
        $this->goles_favor_fuera = $this->parametros[self::GOLES_FAVOR]->getFuera();

        $this->goles_contra = $this->parametros[self::GOLES_CONTRA]->getTotal();
        $this->goles_contra_casa = $this->parametros[self::GOLES_CONTRA]->getCasa();
        $this->goles_contra_fuera = $this->parametros[self::GOLES_CONTRA]->getFuera();
    }

    /**
     * @ORM\PostLoad()
     */
    public function postLoad()
    {
        $this->parametros[self::PUNTOS] = new Dato($this->puntos, $this->puntos_casa, $this->puntos_fuera);
        $this->parametros[self::JUGADOS] = new Dato($this->jugados, $this->jugados_casa, $this->jugados_fuera);
        $this->parametros[self::GANADOS] = new Dato($this->ganados, $this->ganados_casa, $this->ganados_fuera);
        $this->parametros[self::PERDIDOS] = new Dato($this->perdidos, $this->perdidos_casa, $this->perdidos_fuera);
        $this->parametros[self::EMPATADOS] = new Dato($this->empatados, $this->empatados_casa, $this->empatados_fuera);
        $this->parametros[self::GOLES_FAVOR] = new Dato($this->goles_favor, $this->goles_favor_casa, $this->goles_favor_fuera);
        $this->parametros[self::GOLES_CONTRA] = new Dato($this->goles_contra, $this->goles_contra_casa, $this->goles_contra_fuera);
    }

    public function getParametro($tipoParametro): Dato
    {
        return $this->parametros[$tipoParametro];
    }

    public function getParametros(): array
    {
        return $this->parametros;
    }

    public function incrementar($valor, $tipoParametro, $tipoDato): void
    {
        $this->parametros[$tipoParametro]->incrementar($valor, $tipoDato);
    }

    public function copiaParametros(Estadistica $estadistica)
    {
        $this->parametros = $estadistica->getParametros();
    }
}
