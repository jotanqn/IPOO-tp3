<?php

class Cine extends Funcion
{
    // Atributos
    private $genero;
    private $paisOrigen;

    // Constructor
    public function __construct($nombreFuncion, $precioFuncion, $horaDeInicio, $duracionFuncion, $genero, $paisOrigen)
    {
        // Constructor Cuenta
        parent::__construct($nombreFuncion, $precioFuncion, $horaDeInicio, $duracionFuncion);
        $this->genero = $genero;
        $this->paisOrigen = $paisOrigen;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString()."Genero ".$this->getGenero()." Pais de Origen ".$this->getPaisOrigen();
    }

    public function darCosto()
    {
        $precioFuncion= $this->get->precioFuncion();
        $precioCosto= $precioFuncion * 1.65;
        return $precioCosto;
    }
    

    /**
     * Get the value of genero
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero($genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of paisOrigen
     */
    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }

    /**
     * Set the value of paisOrigen
     */
    public function setPaisOrigen($paisOrigen): self
    {
        $this->paisOrigen = $paisOrigen;

        return $this;
    }
}
