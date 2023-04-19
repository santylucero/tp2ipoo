<?php
class Viaje
{
    private $codigo;
    private $destino;
    private $cantPasajeros;
    private $objPasajeros;
    private $responsable;

    //metodo constructor
    public function __construct($codigo, $destino, $cantPasajeros, $objPasajeros, $responsable)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantPasajeros = $cantPasajeros;
        $this->objPasajeros = $objPasajeros;
        $this->responsable = $responsable;
    }

    //metodo get
    //retorna codigo de viaje
    public function get_codigo()
    {
        return $this->codigo;
    }
    //retorna destino de viaje
    public function get_destino()
    {
        return $this->destino;
    }
    //retorna cantidad de pasajeros maxima
    public function get_cantPasajeros()
    {
        return $this->cantPasajeros;
    }

    //retorna la coleccion de objetos de la clase pasajero
    public function get_objPasajeros()
    {
        return $this->objPasajeros;
    }
    //retorna datos del responsable
    public function get_responsable()
    {
        return $this->responsable;
    }

    //metodos set
    //asigna codigo de viaje
    public function set_codigo($codigo)
    {
        $this->codigo = $codigo;
    }
    //asigna destino de viaje
    public function set_destino($destino)
    {
        $this->destino = $destino;
    }
    //asigna cantidad de pasajeros maxima
    public function set_cantPasajeros($cantPasajeros)
    {
        $this->cantPasajeros = $cantPasajeros;
    }

    //asigna la coleccion de objetos de la clase pasajero
    public function set_objPasajeros($objPasajeros)
    {
        $this->objPasajeros = $objPasajeros;
    }
    //retorna datos del responsable
    public function set_responsable($responsable)
    {
        $this->responsable = $responsable;
    }

    //asignar los datos de los pasajeros
    public function set_arrayPasajeros($numPasajero, $datoPasajero, $valorModif)
    {
        $this->objPasajeros[$numPasajero][$datoPasajero] = $valorModif;
    }

    //almacena todos los datos en una variable para luegos mostrarlos en el toString
    public function datosPasajeros()
    {
        $colPasajero=$this->get_objPasajeros();
        $cadena = "";
        for ($i = 0; $i < count($this->get_objPasajeros()); $i++) {
            $cadena = "____________________________________________________ \n
            PASAJERO nro" . $i + 1 . "\n"
                . "NOMBRE: " . $colPasajero[$i]->get_nombre() . "\n"
                . "APELLIDO: " . $colPasajero[$i]->get_apellido() . "\n"
                . "DNI: " . $colPasajero[$i]->get_documento() . "\n"
                . "TELEFONO: " . $colPasajero[$i]->get_telefono() . "\n" .
                "____________________________________________________ \n" . $cadena ;
        }
        return $cadena;
    }

    //retorna los datos en pantalla
    public function __toString()
    {

        return  "____________________________________________________ \n
    DATOS DEL viaje:\n" .
            "CODIGO DEL viaje: " . $this->get_codigo() . "\n" .
            "DESTINO: " . $this->get_destino() . "\n" .
            "CANTIDAD DE PASAJEROS: " . $this->get_cantPasajeros() . "\n" .
            "RESPONSABLE: " . $this->get_responsable()->get_nombre() . " " . $this->get_responsable()->get_apellido() . "\n" .
            "____________________________________________________ \n" .  $this->datosPasajeros();
    }
}
