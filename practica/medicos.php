<?php
require 'db_config.php';
include 'header.php';

// Obtener parámetro de búsqueda
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Construir consulta con filtro si se proporciona búsqueda
$query = "SELECT id, CONCAT(nombre, ' ', apellido) AS nombre, matricula, especialidad FROM medicos";
if ($search) {
    $query .= " WHERE matricula LIKE :search";
}

$statement = $pdo->prepare($query);

// Pasar parámetro de búsqueda si está definido
if ($search) {
    $statement->bindValue(':search', "%$search%", PDO::PARAM_STR);
}

$statement->execute();
$medicos = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médicos</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Lista de Médicos</h1>
    
    <!-- Formulario de búsqueda -->
    <form method="get" action="" class="form-busqueda">
        <input type="text" name="search" placeholder="Buscar por Matricula" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Buscar</button>
    </form>
    
    <?php if ($medicos): ?>
        <?php foreach ($medicos as $medico): ?>
            <div class="card medico">
                <h3>Dr./Dra. <?= $medico['nombre'] ?></h3>
                <p><strong>Matrícula:</strong> <?= $medico['matricula'] ?></p>
                <p><strong>Especialidad:</strong> <?= $medico['especialidad'] ?></p>
                <a href="pacientes.php?medico_id=<?= $medico['id'] ?>" class="btn">Mostrar Pacientes</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No se encontraron médicos con la matrícula proporcionada.</p>
    <?php endif; ?>
</body>
</html>
