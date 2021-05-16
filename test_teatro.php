<?php
include_once 'Teatro.php';
include_once 'Funcion.php';
include_once 'ObraTeatro.php';
include_once 'Musical.php';
include_once 'Cine.php';

/** carga nombre funcion del teatro
 * return strin $nombreFuncion
 */
function cargarNombreFuncion()
{
    echo "\nIngrese el Nombre de la Funcion :";
    $nombreFuncion =  trim(fgets(STDIN));
    return $nombreFuncion;
}
/** carga precio funcion del teatro
 * return int $precioFuncion
 */
function cargarPrecioFuncion()
{
    echo "ingrese el Precio la Funcion :";
    $precioFuncion =  trim(fgets(STDIN));
    return $precioFuncion;
}
/** carga nombre funcion del teatro
 * return strin $nombreFuncion
 */
function cargarHoraDeInicio()
{
    do {
        echo "\nIngrese la hora (0 a 23): ";
        $hora = trim(fgets(STDIN));
        if (is_numeric($hora) && $hora > -1 && $hora < 24) {
            $opcionValida = true;
        } else {
            echo "\n";
            print ("\e[1;37;41mDebe ingresar un hora valida entre 0 y 23\e[0m") . "\n";

            $opcionValida = false;
        }
    } while (!$opcionValida);

    do {
        echo "\nIngrese los minutos (0 a 59): ";
        $minutos = trim(fgets(STDIN));
        if (is_numeric($minutos) && $minutos > -1 && $minutos < 60) {
            $opcionValida = true;
        } else {
            echo "\n";
            print ("\e[1;37;41mDebe ingresar minutos validos entre 0 y 59  \e[0m") . "\n";

            $opcionValida = false;
        }
    } while (!$opcionValida);
    // Convierto a minutos la hora de inicio + los minutos
    $horaDeInicio =  $hora * 60 + $minutos;
    return $horaDeInicio;
}
/** carga nombre funcion del teatro
 * return strin $nombreFuncion
 */
function cargarDuracionFuncion()
{
    do {
        echo "\nIngrese los minutos de duracion de la funcion): ";
        $duracionFuncion = trim(fgets(STDIN));
        if (is_numeric($duracionFuncion) && $duracionFuncion > 0) {
            $opcionValida = true;
        } else {
            echo "\n";
            print ("\e[1;37;41mError: Debe ingresar un duracion valida en minutos\e[0m") . "\n";
            $opcionValida = false;
        }
    } while (!$opcionValida);
    return $duracionFuncion;
}


//** Programa Principal
/* Crea un objeto Teatro
/* string $nombreTeatro , $direccion 
/* array $coleccionFuncion */

// inicializo variable
$nombreTeatro = "Vorterix";
$direccion = "Buenos Aires 1400 Neuquen";

$coleccionFuncion = array();


// se crea un objeto Teatro
$teatro = new Teatro($nombreTeatro, $direccion, $coleccionFuncion);



do {
    echo "--------------------------------------------------------------\n";
    echo $teatro;
    echo "--------------------------------------------------------------\n";
    echo "1) Cambiar el Nombre del Teatro. \n";
    echo "2) Cambiar la direccion del Teatro. \n";
    echo "3) Modificar la funcion. \n";
    echo "4) Agregar una funcion. \n";
    echo "5) Precio Costo\n";
    echo "0) Salir. \n";
    echo "--------------------------------------------------------------\n";

    // Ingreso y lectura de la opcion
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));
    switch ($opcion) {
        case 1:
            echo "ingrese el nombre del treatro ";
            $nombreTeatro = trim(fgets(STDIN));
            $teatro->setnombreTeatro($nombreTeatro);
            break;
        case 2:
            echo "ingrese la direccion del treatro ";
            $direccion = trim(fgets(STDIN));
            $teatro->setdireccion($direccion);
            break;
        case 3:
            do {
                $cantFunciones = count($teatro->getcoleccionFuncion());
                echo "Que funcion desea cambiar? (1 a " . $cantFunciones . ")";
                $cambiarFuncion = (trim(fgets(STDIN)));
                //Verificamos que ingrese numeros y que sea entre 1 y XXX
                if (is_numeric($cambiarFuncion) && $cambiarFuncion > 0 && $cambiarFuncion < ($cantFunciones + 1)) {
                    $opcionValida = true;
                    $cambiarFuncion = $cambiarFuncion - 1;
                    $nombreNvaFuncion = (trim(fgets(STDIN)));
                    $teatro->cambiarFuncion($cambiarFuncion, $nombreNvaFuncion);
                } else {
                    echo "Debe ingresar una opcion valida \n";
                    $opcionValida = false;
                }
            } while (!$opcionValida);
            break;
        case 4:
            do {
				echo "Que tipo de Nueva Funcion desea agergar?:";
                echo "1) Obra Teatro. \n";
                echo "2) Cine. \n";
                echo "3) Musical. \n";
                echo "0) Cancela";
                echo "--------------------------------------------------------------\n";
            
                // Ingreso y lectura de la opcion
                echo "Ingrese una opcion: ";
                $tipo = (int) trim(fgets(STDIN));

                echo "va a agregar".$tipo.":\n" ;
                $horaDeInicio = cargarHoraDeInicio();
                $duracionFuncion = cargarDuracionFuncion();
                $exiteFuncion =$teatro->verificaSolapamientoDeFunciones($horaDeInicio,$duracionFuncion);
               
                if ($exiteFuncion)
                {
                    echo"\n";
                    print("\e[1;37;41mNo se puede cargar en ese horario se solapan con otra funcion\e[0m")."\n";
                    
                }else {
                    $cantFunciones= count($teatro->getcoleccionFuncion());
                    echo "\nSe puede agragar funcion no se solapa\n Numero de funciones ". $cantFunciones."\n";
                    $nombreFuncion = cargarNombreFuncion();
                    $precioFuncion = cargarPrecioFuncion();
                    switch ($tipo) {
                    case 1:
                        $teatro->agregarObra($nombreFuncion, $precioFuncion, $horaDeInicio, $duracionFuncion);
                        break;
                    break;
                    case 2:
                        echo "\nIngrese el Genero de la Pelicula :";
                        $genero =  trim(fgets(STDIN));
                        echo "\nIngrese el Pais de Origen :";
                        $paisOrigen=  trim(fgets(STDIN));

                        $teatro->agregarObra($nombreFuncion, $precioFuncion, $horaDeInicio, $duracionFuncion, $genero, $paisOrigen);
                    break;
                    case 3:
                        echo "\nIngrese el Director del Musical :";
                        $director =  trim(fgets(STDIN));
                        echo "\nIngrese la Cantidad de Personas en Escena  :";
                        $cantidadEscena=  trim(fgets(STDIN));

                        $teatro->agregarMusical($nombreFuncion, $precioFuncion, $horaDeInicio, $duracionFuncion, $director, $cantidadEscena);
                    break;
                    }
                }break;
            }while ($tipo != 0);
            case 5:
                echo "Precio de costo de las funciones";
                $coleccionFuncion = $teatro->getcoleccionFuncion();
                foreach ($coleccionFuncion as $funcion) {
                    $precioCosto = $funcion->darCosto();
                    echo $funcion." Precio Costo ".$precioCosto;
                }
            break;
            
    } break;
           
} while ($opcion != 0);

?>