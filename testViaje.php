<?php
include_once "Viaje.php";
include_once "ResponsableV.php";
include_once "Pasajeros.php";

$codigo = "";
$destino = "";
$cantPasajeros = 0;
$objPasajeros = [];
$nombre = "";
$apellido = "";
$dni = "";
$opcionModif = 0;
$nuevoCodigo = 0;
$nombreResponsable = "";
$apellidoResponsable = "";
$empleadoNum = 0;
$licenciaNum = 0;






/**
 * pide los datos de los pasajeros y se repite segun la cantidad de pasajeros que se le indique
 */
function arrayPasajeros($cantPas)
//string $nombrePas, $apellidoPas
//array $arrayPas
//int $dniPas, $cont, $telefonoPas
{
    $cont = 1;
    $arrayPas = [];
    do {
        echo "ingrese nombre del pasajero: \n";
        $nombrePas = trim(fgets(STDIN));
        echo "ingrese el apellido:\n ";
        $apellidoPas = trim(fgets(STDIN));
        echo "ingrese el numero de documento:\n ";
        $dniPas = trim(fgets(STDIN));
        echo "ingrese numero de telefono:\n";
        $telefonoPas=trim(fgets(STDIN));
        array_push($arrayPas, new Pasajeros($nombrePas, $apellidoPas, $dniPas ,$telefonoPas));
        $cont++;
    } while ($cont == $cantPas);
    return $arrayPas;
}



 



/**
 * muestra un menu y retorna en las opciones
 * int $opcSeleccionada
 */
function menu()
{
    echo "\n";
    echo "SELECCIONE ALGUNA OPCION\n";
    echo "[1]VER DATOS DEL viaje\n";
    echo "[2]MODIFICAR INFORMACION DEL viaje\n";
    echo "[3]MODIFICAR LOS DATOS DE UNA PERSONA\n";
    echo "[4]SALIR\n\n";
    $opcSeleccionada = trim(fgets(STDIN));
    return $opcSeleccionada;
}






echo "ingrese codigo de viaje:\n ";
$codigo = trim(fgets(STDIN));
echo "\ndestino del viaje:\n ";
$destino = trim(fgets(STDIN));
echo "\ningrese la cantidad de pasajeros:\n";
$cantPasajeros = trim(fgets(STDIN));
echo "\nINGRESE LOS DATOS DE LOS PASAJEROS\n ";
$objPasajeros = arrayPasajeros($cantPasajeros);
echo "\nIngrese numero de empleado:\n";
$empleadoNum=trim(fgets(STDIN));
echo "\nIngrese numero de licencia de licencia:\n";
$licenciaNum=trim(fgets(STDIN));
echo "\nIngrese el nombre del responsable:\n";
$nombreResponsable=trim(fgets(STDIN));
echo "\nIngrese el apellido del responsable:\n\n";
$apellidoResponsable=trim(fgets(STDIN));
echo "\n";


$responsableV = new ResponsableV($empleadoNum, $licenciaNum, $nombreResponsable, $apellidoResponsable);
$viaje = new Viaje($codigo, $destino, $cantPasajeros, $objPasajeros, $responsableV);




do {
    $opcionSel = menu();
    switch ($opcionSel) {



        case 1:
            echo $viaje;
            break;



        case 2:
            echo "MODIFICAR INFORMACION DEL viaje: \n
                1- MODIFICAR CODIGO \n
                2- MODIFICAR DESTINO \n
                3- MODIFICAR CANTIDAD DE PASAJEROS \n\n";
            $opcionModif = trim(fgets(STDIN));
            switch ($opcionModif) {
                case 1:
                    echo "ingrese nuevo codigo: \n";
                    $nuevoCodigo = trim(fgets(STDIN));
                    $viejoCodigo = $viaje->get_codigo();
                    if ($nuevoCodigo !== $viejoCodigo) {
                        echo "El antiguo codigo era: " . $viejoCodigo . "\n";
                        echo "El nuevo es: " . $nuevoCodigo . "\n\n";
                        $viaje->set_codigo($nuevoCodigo);
                    } else {
                        echo "es el mismo codigo\n\n";
                    }
                    break;
                case 2:
                    echo "ingrese nuevo destino: \n";
                    $nuevoDestino = trim(fgets(STDIN));
                    $viejoDestino = $viaje->get_destino();
                    if ($nuevoDestino !== $viejoDestino) {
                        echo "El antiguo destino era: " . $viejoDestino . "\n";
                        echo "El nuevo es: " . $nuevoDestino . "\n\n";
                        $viaje->set_destino($nuevoDestino);
                    } else {
                        echo "es el mismo destino\n\n";
                    }
                    break;
                case 3:
                    echo "modifique la cantidad de pasajeros: \n";
                    $nuevaCantidad = trim(fgets(STDIN));
                    $viejaCantidad = $viaje->get_cantPasajeros($cantPasajeros);
                    if ($nuevaCantidad !== $viejaCantidad) {
                        echo "la antigua cantidad era: " . $viejaCantidad . "\n";
                        echo "la nueva es: " . $nuevaCantidad . "\n\n";
                        $viaje->set_cantPasajeros($nuevaCantidad);
                    } else {
                        echo "es la misma cantidad\n\n";
                    }
            }
            break;





        case 3:
            echo "MODIFICAR DATOS DE UNA PERSONA: \n";
            echo "ingrese el DNI de la persona que busca modificar sus datos: ";
            $dniModif = trim(fgets(STDIN));
            echo "\n";
            $pasajerosModif = $objPasajeros;
            for ($i = 0; $i < count($pasajerosModif); $i++) {
                if ($dniModif == $pasajerosModif[$i]["DNI"]) {
                    echo "SELECCIONE EL DATO QUE QUIERE MODIFICAR\n";
                    echo "[1]MODIFICAR EL NOMBRE " . $pasajerosModif[$i]["NOMBRE"] . "\n";
                    echo "[2]MODIFICAR EL APELLIDO " . $pasajerosModif[$i]["APELLIDO"] . "\n";
                    echo "[3]MODIFICAR EL DNI " . $pasajerosModif[$i]["DNI"] . "\n";
                    echo "[4]MODIFICAR EL TELEFONO " . $pasajerosModif[$i]["TELEFONO"] . "\n";
                    $opcionPasajeros = trim(fgets(STDIN));
                    echo "\n\n";
                    switch ($opcionPasajeros) {
                        case 1:
                            echo "ingrese nuevo nombre: ";
                            $nuevoNombre = trim(fgets(STDIN));
                            echo "\n";
                            $viaje->set_arrayPasajeros($i, "NOMBRE", $nuevoNombre);
                            break;
                        case 2:
                            echo "ingrese el apellido nuevo: ";
                            $nuevoApellido = trim(fgets(STDIN));
                            echo "\n";
                            $viaje->set_arrayPasajeros($i, "APELLIDO", $nuevoApellido);
                            break;
                        case 3:
                            echo "ingrese nuevo dni: ";
                            $nuevoDni = trim(fgets(STDIN));
                            echo "\n";
                            $viaje->set_arrayPasajeros($i, "DNI", $nuevoDni);
                            break;
                        case 4:
                            echo "ingrese nuevo telefono: ";
                            $nuevoTelefono = trim(fgets(STDIN));
                            $viaje->set_arrayPasajeros($i, "TELEFONO", $nuevoTelefono);
                    }
                }
                else {
                    echo "ese numero de DNI no existe";
                }
            }
    }
} while ($opcionSel != "4");
