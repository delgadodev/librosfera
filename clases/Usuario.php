<?php

class Usuario {
    
    public $id;
    protected $apellido;
    protected $nombre;
    protected $telefono;
    protected $email;  
    protected $password;
    protected $rol;  
    protected $conn;


    public function __construct()
    {
        $this->tabla = 'users';
    }    

    public function setConexion($conexion){
        $this->conn = $conexion;
    }

    public function getConexion(){
        return $this->conn;
    }


    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setRol($rol){
        $this->rol = $rol;
    }



    public function agregarUsuario() {
        try {
            $stmt = $this->conn->prepare("INSERT INTO users (nombre, apellido, telefono, email, password, rol) VALUES (:nombre, :apellido, :telefono, :email, :password, :rol)");
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":apellido", $this->apellido);
            $stmt->bindParam(":telefono", $this->telefono);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":rol", $this->rol);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function editarUsuario($id) {
        try {
            $stmt = $this->conn->prepare("UPDATE users SET nombre = :nombre, apellido = :apellido, telefono = :telefono, email = :email, password = :password, rol = :rol WHERE id = :id");
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":apellido", $this->apellido);
            $stmt->bindParam(":telefono", $this->telefono);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":rol", $this->rol);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function eliminarUsuario($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    

    public function checkAdmin($email){
        $stmt = $this->conn->prepare("SELECT rol FROM users WHERE TRIM(email) = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        if($result['rol'] == 'admin'){
            return true;
        }else{
            return false;
        }
    }

    public function getUsers(){
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getUserById($id){
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        return $result;
    }

    public function checkNoRepeatEmail($email){
        $stmt = $this->conn->prepare("SELECT email FROM users WHERE TRIM(email) = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        if(empty($result)){
            return true;
        }else{
            return false;
        }
    }





}