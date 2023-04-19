<?php
class ResponsableV
{
    //
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;
    //metodo constructor
    public function __construct($numEmpleado, $numLicencia, $nombre, $apellido)
    {
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //metodo get
    public function get_numEmpleado()
    {
        return  $this->numEmpleado;
    }
    public function get_numLicencia()
    {
        return  $this->numLicencia;
    }
    public function get_nombre()
    {
        return  $this->nombre;
    }
    public function get_apellido()
    {
        return  $this->apellido;
    }

    //metodo set
    public function set_numEmpleado($numEmpleado)
    {
        return  $this->numEmpleado = $numEmpleado;
    }
    public function set_numLicencia($numLicencia)
    {
        return  $this->numLicencia = $numLicencia;
    }
    public function set_nombre($nombre)
    {
        return  $this->nombre = $nombre;
    }
    public function set_apellido($apellido)
    {
        return  $this->apellido = $apellido;
    }

    //visualizacion de datos en pantalla
    public function __toString()
    {
        $stringResponsable = "Nombre: ". $this->nombre."\n".
        "Apellido: ". $this->apellido."\n".
        "Numero de empleado: ". $this->numEmpleado."\n".
        "Numero de licencia: ". $this->numLicencia."\n";
        return $stringResponsable;
    }
}
