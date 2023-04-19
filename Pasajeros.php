<?php
class Pasajeros
{
    //la informacion de los pasajeros
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;

    //metodo constructor
    public function __construct($nombre, $apellido, $documento, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
    }

    //metodos get
    public function get_nombre()
    {
        return $this->nombre;
    }
    public function get_apellido()
    {
        return  $this->apellido;
    }
    public function get_documento()
    {
        return  $this->documento;
    }
    public function get_telefono()
    {
        return  $this->telefono;
    }

    //metodos set
    public function set_nombre($nombre)
    {
        return $this->nombre = $nombre;
    }
    public function set_apellido($apellido)
    {
        return $this->apellido = $apellido;
    }
    public function set_documento($documento)
    {
        return $this->documento = $documento;
    }
    public function set_telefono($telefono)
    {
        return $this->telefono = $telefono;
    }

    //visualizacion de datos en pantalla
    public function __toString()
    {
        $pasajeros = "Nombre: " . $this->nombre . "\n" .
            "Apellido: " . $this->apellido . "\n" .
            "Documento: " . $this->documento . "\n" .
            "Telefono: " . $this->telefono . "\n";
        return $pasajeros;
    }
}
