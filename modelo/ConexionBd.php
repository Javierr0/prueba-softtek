<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'prueba_softtek');

class ConexionBd
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->conexion->set_charset("utf8");
    }

    public function query($sql)
    {
        return $this->conexion->query($sql);
    }

    public function __destruct()
    {
        $this->conexion->close();
    }

}

?>
