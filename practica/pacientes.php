<?php
require 'db_config.php';
include 'header.php';

// Obtener el ID del médico seleccionado
$medico_id = $_GET['medico_id'] ?? null;

if (!$medico_id) {
    die("Médico no seleccionado.");
}

// Obtener pacientes del médico seleccionado
$query = "
    SELECT 
        pacientes.id AS paciente_id,
        CONCAT(pacientes.nombre, ' ', pacientes.apellido) AS nombre,
        pacientes.celular,
        pacientes.fecha_nacimiento,
        departamentos.nombre_departamento AS direccion,
        generos.nombre AS genero
    FROM medico_pacientes
    JOIN pacientes ON medico_pacientes.rela_paciente = pacientes.id
    LEFT JOIN departamentos ON pacientes.rela_departamento = departamentos.id
    LEFT JOIN generos ON pacientes.rela_genero = generos.id
    WHERE medico_pacientes.rela_medico = :medico_id
";
$statement = $pdo->prepare($query);
$statement->bindParam(':medico_id', $medico_id);
$statement->execute();
$pacientes = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Lista de Pacientes</h1>
    <?php foreach ($pacientes as $paciente): ?>
        <div class="card paciente">
            <h3><?= $paciente['nombre'] ?></h3>
            <p><strong>Género:</strong> <?= $paciente['genero'] ?></p>
            <p><strong>Fecha de Nacimiento:</strong> <?= $paciente['fecha_nacimiento'] ?></p>
            <p><strong>Dirección:</strong> <?= $paciente['direccion'] ?></p>
            <p><strong>Celular:</strong> <?= $paciente['celular'] ?></p>
            <a href="medicamentos.php?paciente_id=<?= $paciente['paciente_id'] ?>&medico_id=<?= $medico_id ?>" class="btn">Mostrar Medicamentos</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
