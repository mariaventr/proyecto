<?php
require 'db_config.php';
include 'header.php';

// Obtener IDs del médico y paciente seleccionados
$medico_id = $_GET['medico_id'] ?? null;
$paciente_id = $_GET['paciente_id'] ?? null;

if (!$medico_id || !$paciente_id) {
    die("Médico o paciente no seleccionado.");
}

// Obtener fechas del filtro
$start_date = $_GET['start_date'] ?? null;
$end_date = $_GET['end_date'] ?? null;

// Consulta para obtener medicamentos
$query = "
    SELECT 
        medicamentos.nombre_comercial AS nombre,
        medicamentos.laboratorio_titular AS laboratorio,
        medicamentos_pacientes.dosis,
        medicamentos_pacientes.frecuencia,
        medicamentos_pacientes.fecha_alta
    FROM medicamentos_pacientes
    JOIN medicamentos ON medicamentos_pacientes.rela_medicamento = medicamentos.id_medicamento
    WHERE medicamentos_pacientes.rela_paciente = :paciente_id
      AND (:start_date IS NULL OR DATE(medicamentos_pacientes.fecha_alta) >= :start_date)
      AND (:end_date IS NULL OR DATE(medicamentos_pacientes.fecha_alta) <= :end_date)
";
$statement = $pdo->prepare($query);
$statement->bindParam(':paciente_id', $paciente_id);
$statement->bindParam(':start_date', $start_date);
$statement->bindParam(':end_date', $end_date);
$statement->execute();
$medicamentos = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicamentos</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Lista de Medicamentos</h1>
    <form method="GET" action="">
        <input type="hidden" name="medico_id" value="<?= $medico_id ?>">
        <input type="hidden" name="paciente_id" value="<?= $paciente_id ?>">
        <label for="start_date">Fecha Inicio:</label>
        <input type="date" name="start_date" id="start_date">
        <label for="end_date">Fecha Fin:</label>
        <input type="date" name="end_date" id="end_date">
        <button type="submit">Filtrar</button>
    </form>
    
    <?php if (count($medicamentos) > 0): ?>
        <?php foreach ($medicamentos as $medicamento): ?>
            <section class="card medicamento">
                <h3><?= htmlspecialchars($medicamento['nombre']) ?></h3>
                <p><strong>Laboratorio:</strong> <?= htmlspecialchars($medicamento['laboratorio']) ?></p>
                <p><strong>Dosis:</strong> <?= htmlspecialchars($medicamento['dosis']) ?></p>
                <p><strong>Frecuencia:</strong> <?= htmlspecialchars($medicamento['frecuencia']) ?></p>
                <p><strong>Fecha Alta:</strong> <?= htmlspecialchars($medicamento['fecha_alta']) ?></p>
            </section>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No se encontraron medicamentos en el rango de fechas seleccionado.</p>
    <?php endif; ?>
</body>
</html>
