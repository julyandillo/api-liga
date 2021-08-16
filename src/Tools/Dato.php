<?php

namespace App\Tools;

class Dato
{
    const EN_CASA = 0;
    const FUERA = 1;

    private $total;
    private $casa;
    private $fuera;

    public function __construct($total=0, $casa=0, $fuera=0)
    {
        $this->total = $total;
        $this->casa = $casa;
        $this->fuera = $fuera;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getCasa(): int
    {
        return $this->casa;
    }

    public function getFuera(): int
    {
        return $this->fuera;
    }

    public function incrementar(int $valor, int $tipo)
    {
        $this->total += $valor;
        if ($tipo == self::EN_CASA) {
            $this->casa += $valor;
        } else {
            $this->fuera += $valor;
        }
    }

}