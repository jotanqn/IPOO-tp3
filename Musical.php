<?php

class Musical extends Funcion
{
    // Atributos
    private $director;
    private $cantidadEscena;

    // Constructor
    public function __construct($nombreFuncion, $precioFuncion, $horaDeInicio,$duracionFuncion, $director, $cantidadEscena)
    {
        // Constructor Cuenta
        parent::__construct($nombreFuncion, $precioFuncion, $horaDeInicio,$duracionFuncion);
        $this->directo = $director;
        $this->cantidadEscena = $cantidadEscena;
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString(). " Director: ".$this->getDirector()." Cant. Personas en Escena".$this->getCantidadEscena();
    }

    public function darCosto()
    {
        $precioFuncion= $this->get->precioFuncion();
        $precioCosto= $precioFuncion * 1.12;
        return $precioCosto;
    }

    /**
     * Get the value of director
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set the value of director
     */
    public function setDirector($director): self
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get the value of cantidadEscena
     */
    public function getCantidadEscena()
    {
        return $this->cantidadEscena;
    }

    /**
     * Set the value of cantidadEscena
     */
    public function setCantidadEscena($cantidadEscena): self
    {
        $this->cantidadEscena = $cantidadEscena;

        return $this;
    }
}