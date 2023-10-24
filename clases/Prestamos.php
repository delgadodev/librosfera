<?php

class Prestamos {


    public $id;
    protected $conn;
    protected $libro_id;
    protected $user_id;
    protected $fechaInicio;
    protected $fechaFin;
    protected $tabla;

    public function __construct()
    {
        $this->tabla = 'prestamos';
    }    

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }


    public function setConexion($conexion){
        $this->conn = $conexion;
    }

    public function getConexion(){
        return $this->conn;
    }

    public function setlibro_id($libro_id){
        $this->libro_id = $libro_id;
    }

    public function getlibro_id(){
        return $this->libro_id;
    }

    public function setuser_id($user_id){
        $this->user_id = $user_id;
    }

    public function getuser_id(){
        return $this->user_id;
    }

    public function setFechaInicio($fechaInicio){
        $this->fechaInicio = $fechaInicio;
    }

    public function getFechaInicio(){
        return $this->fechaInicio;
    }

    public function setFechaFin($fechaFin){
        $this->fechaFin = $fechaFin;
    }

    public function getFechaFin(){
        return $this->fechaFin;
    }


    public function createPrestamo($userId, $idLibro, $fechaInicio, $fechaFin){
       try {
            $sql = "INSERT INTO prestamos (user_id, libro_id, fecha_inicio, fecha_fin) VALUES (:user_id, :libro_id, :fecha_inicio, :fecha_fin)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':libro_id', $idLibro);
            $stmt->bindParam(':fecha_inicio', $fechaInicio);
            $stmt->bindParam(':fecha_fin', $fechaFin);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
       }
    

    public function getPrestamo($id){
        try {
            $sql = "SELECT * FROM prestamos WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function devolverPrestamo($id){
        try {
            $sql = "DELETE FROM prestamos WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getPrestamos(){
        try {
            $sql = "SELECT * FROM prestamos";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getPrestamoByUser($email){
        try {
            $sql = "SELECT * FROM prestamos WHERE user_id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $email);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    




















}