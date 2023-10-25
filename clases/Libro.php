<?php
class Libro {
    
    public $id;
    protected $conn;
    protected $titulo;
    protected $sipnosis;
    protected $autor;
    protected $genero;  
    protected $añoPublicacion;
    protected $urlImagen;
    protected $urlLibro;  
    protected $idLibro;
    

    public function __construct()
    {
        $this->tabla = 'libros';
    }    

    public function setId($idLibro){
        $this->idLibro = $idLibro;
    }

    public function getId(){
        return $this->idLibro;
    }

    public function setConexion($conexion){
        $this->conn = $conexion;
    }

    public function getConexion(){
        return $this->conn;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setSipnosis($sipnosis){
        $this->sipnosis = $sipnosis;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function setAñoPublicacion($añoPublicacion){
        $this->añoPublicacion = $añoPublicacion;
    }

    public function setUrlImagen($urlImagen){
        $this->urlImagen = $urlImagen;
    }

    public function setUrlLibro($urlLibro){
        $this->urlLibro = $urlLibro;
    }


    /* GETTERS  */

       
        public function getTitulo() {
            return $this->titulo;
        }
    
       
        public function getSipnosis() {
            return $this->sipnosis;
        }
    
      
        public function getAutor() {
            return $this->autor;
        }

        public function getGenero() {
            return $this->genero;
        }

        public function getAñoPublicacion() {
            return $this->añoPublicacion;
        }

        public function getUrlImagen() {
            return $this->urlImagen;
        }

        public function getUrlLibro() {
            return $this->urlLibro;
        }
    

    public function agregarLibro() {

        try {   
            $stmt = $this->conn->prepare("INSERT INTO libros (titulo, descripcion, autor, genero, fecha, urlImagen, urlLibro) VALUES (:titulo, :descripcion, :autor, :genero, :fecha, :urlImagen, :urlLibro)");
            $stmt->bindParam(":titulo", $this->titulo);
            $stmt->bindParam(":descripcion", $this->sipnosis);
            $stmt->bindParam(":autor", $this->autor);
            $stmt->bindParam(":genero", $this->genero);
            $stmt->bindParam(":fecha", $this->añoPublicacion);
            $stmt->bindParam(":urlImagen", $this->urlImagen);
            $stmt->bindParam(":urlLibro", $this->urlLibro);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function editarLibro($id) {
        try {
            $stmt = $this->conn->prepare("UPDATE libros SET titulo = :titulo, descripcion = :descripcion, autor = :autor, genero = :genero, fecha = :fecha, urlImagen = :urlImagen, urlLibro = :urlLibro WHERE id = :id");
            $stmt->bindParam(":titulo", $this->titulo);
            $stmt->bindParam(":descripcion", $this->sipnosis);
            $stmt->bindParam(":autor", $this->autor);
            $stmt->bindParam(":genero", $this->genero);
            $stmt->bindParam(":fecha", $this->añoPublicacion);
            $stmt->bindParam(":urlImagen", $this->urlImagen);
            $stmt->bindParam(":urlLibro", $this->urlLibro);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function eliminarLibro($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM libros WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function getLibros(){
        $stmt = $this->conn->prepare("SELECT * FROM libros");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getLibroById($id){
      try {
        $stmt = $this->conn->prepare("SELECT * FROM libros WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        return $result;
      } catch (\PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }



}