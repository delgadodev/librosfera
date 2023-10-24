<?php

class Conexion {
    private $host = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $base_datos = "biblioteca";
    private $conexion;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->base_datos}";

        try {
            $this->conexion = new PDO($dsn, $this->usuario, $this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function obtenerConexion() {
        return $this->conexion;
    }

    public function cerrarConexion() {
        $this->conexion = null;
    }
}

// Uso de la clase:
// $conexionBD = new Conexion();
// $conexion = $conexionBD->obtenerConexion();
// Realizar operaciones con la base de datos...
// $conexionBD->cerrarConexion();

?>
