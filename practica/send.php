<?php
    include("conexion.php");

    // Crear una instancia de la clase conexion
    $db = new conexion();
    $conex = $db->connect(); // Obtener la conexión PDO

    if (isset($_POST['send'])) {
        if (
            strlen($_POST['name']) >= 1 &&
            strlen($_POST['phone']) >= 1 &&
            strlen($_POST['email']) >= 1 &&
            strlen($_POST['message']) >= 1
        ) {
            // Limpieza de los datos enviados por el formulario
            $name = trim($_POST['name']);
            $phone = trim($_POST['phone']);
            $email = trim($_POST['email']);
            $message = trim($_POST['message']);

            // Consulta SQL utilizando PDO
            $consulta = "INSERT INTO datos (nombre, telefono, email, mensaje) 
                         VALUES (:name, :phone, :email, :message)";
            $stmt = $conex->prepare($consulta);
            $resultado = $stmt->execute([
                ':name' => $name,
                ':phone' => $phone,
                ':email' => $email,
                ':message' => $message
            ]);
    }}
?>


