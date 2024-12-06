<?php
class conexion {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "formulario";
    private $conect;

    public function __construct() {
        $connectionString = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
        try {
            $this->conect = new PDO($connectionString, $this->user, $this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            // Si ocurre un error, se muestra un mensaje y se lanza una excepción
            echo "ERROR: ". $e->getMessage();
            // Aquí puedes lanzar una excepción o manejarlo de otra forma
            throw new Exception("Error de conexión a la base de datos");
        }
    }

    public function connect() {
        return $this->conect; // Deberías asegurarte de que esto devuelva un objeto PDO
    }
}
?>

