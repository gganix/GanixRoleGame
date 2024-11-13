<?php
require 'db.php';

// Obtener todas las criaturas de la base de datos
$stmt = $pdo->query("SELECT * FROM creature");
$creatures = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heroes Community</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="logo.jpg" height="60" alt="Heroes logo"> Heroes of Might and Magic
        </a>
        <a class="btn btn-secondary" href="crearCriatura.php">Crear una criatura</a>
    </nav>

    <div class="container my-4">
        <div class="row">
            <?php foreach ($creatures as $creature): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?= $creature['avatar'] ?>" class="card-img-top" alt="Avatar de <?= $creature['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $creature['name'] ?></h5>
                            <p class="card-text"><?= $creature['description'] ?></p>
                            <a href="detalleCriatura.php?id=<?= $creature['id'] ?>" class="btn btn-secondary btn-sm">Más Info</a>
                            <a href="editarCriatura.php?id=<?= $creature['id'] ?>" class="btn btn-success btn-sm">Modificar</a>
                            <a href="eliminarCriatura.php?id=<?= $creature['id'] ?>" class="btn btn-danger btn-sm">Exterminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
