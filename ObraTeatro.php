<?php

class ObraTeatro extends Funcion 
{
    // Constructor
    public function __construct($nombreFuncion, $precioFuncion, $horaDeInicio,$duracionFuncion)
    {
        // Constructor Cuenta
        parent::__construct($nombreFuncion, $precioFuncion, $horaDeInicio,$duracionFuncion);
    }

    // Metodos
    public function __toString()
    {
        return parent::__toString();
    }

    public function darCosto()
    {
        $precioFuncion= $this->get->precioFuncion();
        $precioCosto= $precioFuncion * 1.45;
        return $precioCosto;
    }
}