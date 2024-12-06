<?php
    require_once("Autoload.php");
    class Usuario extends conexion{
        private $strNombre;
        private $strTelefono;
        private $strEmail;
        private $strMensaje;
        private $conexion;

        public function __construct() {
            $this->conexion = (new conexion())->connect();
        }
        

        public function insertUsuario(string $nombre, string $telefono, string $email, string $mensaje) {
            $this->strNombre = $nombre;
            $this->strTelefono = $telefono;
            $this->strEmail = $email;
            $this->strMensaje = $mensaje;

            $sql = "INSERT INTO datos(nombre,telefono,email,mensaje) VALUES(?,?,?,?)";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($this->strNombre, $this->strTelefono, $this->strEmail, $this->strMensaje);
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            return $idInsert;
        }

        public function getUsuarios(){
            $sql = "SELECT * FROM datos";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }

        public function updateUsers(int $id, string $nombre, string $telefono, string $email, string $mensaje){
            $this->strNombre = $nombre;
            $this->strTelefono = $telefono;
            $this->strEmail = $email;
            $this->strMensaje = $mensaje;
            $sql = "UPDATE datos SET nombre=?, telefono=?, email=?, mensaje=? WHERE id=$id ";
            $update = $this->conexion->prepare($sql);
            $arrData = array($this->strNombre, $this->strTelefono, $this->strEmail, $this->strMensaje);
            $resUpdate = $update->execute($arrData);
            return $resUpdate;
        }

        public function getUser(int $id){
            $sql = "SELECT * FROM datos WHERE id = ?";
            $arrWhere = array($id);
            $query = $this->conexion->prepare($sql);
            $query->execute($arrWhere);
            $request = $query->fetch(PDO::FETCH_ASSOC);
            return $request;
        }

        public function delUser(int $id){
            $sql = "DELETE FROM datos WHERE id = ?";
            $arrWhere = array($id);
            $delete = $this->conexion->prepare($sql);
            $del = $delete->execute($arrWhere);
            return $del;
        }
    } 
?>