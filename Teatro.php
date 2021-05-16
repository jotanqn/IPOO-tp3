<?php
class Teatro
{
    // para los objetos teatro
    
    private $nombreTeatro ;
    private $direccion ;
    private $coleccionFuncion;
    
    
    public function __construct($nombreTeatro, $direccion, $coleccionFuncion)
    {
        // Metodo constructor de la clase Punto
        $this->nombreTeatro = $nombreTeatro;
        $this->direccion = $direccion;
        $this->coleccionFuncion = $coleccionFuncion;
    }
    // metodo de lectura atributos
    public function getnombreTeatro()
    {
        return $this->nombreTeatro;
    }
    public function getdireccion()
    {
        return $this->direccion;
    }

    public function getcoleccionFuncion()
    {
        return $this->coleccionFuncion;
    }
// metodo de escritura atributos
	public function setnombreTeatro($nombreTeatro)
	{
		$this->nombreTeatro = $nombreTeatro;
	}
	public function setdireccion($direccion)
	{
		$this->direccion = $direccion;
	}

	public function setcoleccionFuncion($coleccionFuncion)
	{
		$this->coleccionFuncion = $coleccionFuncion;
	}

    public function cambiarFuncion($cambiarFuncion,$nombreFuncion)
    {
        echo "funcion a cambiar ".$cambiarFuncion."\n";
        $coleccionFuncion= $this->getcoleccionFuncion();
        $this->getcoleccionFuncion()[$cambiarFuncion]-> $this->setnombreFuncion ($nombreFuncion);
        $this->setcoleccionFuncion($coleccionFuncion);
    }
    /* Verificar si la funcion a agregar no se solapa con alguna que ya se encuentre cargada
    * @param INT $horaDeInicioNuevaFuncion //expresada en minutos
    * @param INT $duracionNuevaFuncion  // expresada en minutos
    * @return boolean
    */
    public function verificaSolapamientoDeFunciones($horaDeInicioNuevaFuncion,$duracionNuevaFuncion)
    {
        $horaCierreNuevaFuncion = $horaDeInicioNuevaFuncion + $duracionNuevaFuncion;
        $coleccionFuncion = $this->getcoleccionFuncion();
        $seSolapan = false;
      
        foreach ($coleccionFuncion as  $funcion)
            {
                $horaFuncionActual=$funcion->gethoraDeInicio();
                $horaCierreActual= $horaFuncionActual + $funcion->getduracionFuncion();
                
                if (($horaFuncionActual < $horaDeInicioNuevaFuncion) && ($horaDeInicioNuevaFuncion < $horaCierreActual))
                    {
                        $seSolapan = true;
                    }    
            }
        foreach ($coleccionFuncion  as  $funcion)
            
            {
                $horaFuncionActual=$funcion->gethoraDeInicio();
                $horaCierreActual= $horaFuncionActual+$funcion->getduracionFuncion();
                if (($horaDeInicioNuevaFuncion<$horaFuncionActual) && ($horaCierreActual<$horaCierreNuevaFuncion)) 
                    {
                        $seSolapan = true;
                    }
            }
    	return $seSolapan;

    }


    /* muestra todos los parameros del objeto y la coleccion de objetos de funciones
    * @return string
    */
    public function __toString()
	{
        $coleccionFuncionStr ="";
        $i=1;
        foreach ($this->getcoleccionFuncion() as $key => $value)
        {
            $coleccionFuncionStr=$coleccionFuncionStr. "\n Funcion :".$i.$value;
            $i++;
        }
		return "nombre del teatro: ".$this->getnombreTeatro()."\n"."Direccion del Teatro: ".$this->getdireccion()."\n".
		"Funciones \n".$coleccionFuncionStr;
	}

	public function __destruct(){
		echo $this . " instancia destruida, no hay referencias a este objeto \n";
	}
	public function agregarObra ($nombreFuncion, $precioFuncion, $horaDeInicio,$duracionFuncion)
    {
        $coleccionFuncion = $this->getcoleccionFuncion();
        $obraTeatro = new ObraTeatro($nombreFuncion, $precioFuncion, $horaDeInicio,$duracionFuncion);
        array_push($coleccionFuncion,$obraTeatro);
        $this->setcoleccionFuncion($coleccionFuncion);
    }
    public function agregarCine ($nombreFuncion, $precioFuncion, $horaDeInicio, $duracionFuncion, $genero, $paisOrigen)
    {
        $coleccionFuncion = $this->getcoleccionFuncion();
        $cine = new Cine($nombreFuncion, $precioFuncion, $horaDeInicio,$duracionFuncion, $genero, $paisOrigen);
        array_push($coleccionFuncion,$cine);
        $this->setcoleccionFuncion($coleccionFuncion);
    }

    public function agregarMusical ($nombreFuncion, $precioFuncion, $horaDeInicio,$duracionFuncion, $director, $cantidadEscena)
    {
        $coleccionFuncion = $this->getcoleccionFuncion();
        $musical  = new Musical($nombreFuncion, $precioFuncion, $horaDeInicio,$duracionFuncion, $director, $cantidadEscena);
        array_push($coleccionFuncion,$musical);
        $this->setcoleccionFuncion($coleccionFuncion);
    }
}

?>