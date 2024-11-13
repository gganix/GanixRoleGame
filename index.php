<?php
session_start();
require './assets/db/db.php';

// Comprobación de acceso a la sección privada
if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM creature");
$creatures = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heroes Community - Privado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="./assets/img/logo.jpg" height="60" alt="Heroes logo"> Heroes of Might and Magic - Privado
        </a>
        <a class="btn btn-secondary" href="crearCriatura.php">Crear Criatura</a>
        <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
    </nav>

    <div class="container my-5">
        <h3 class="text-center">Gestión de Criaturas</h3>
        <div class="row mt-4">
            <?php foreach ($creatures as $creature): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?= htmlspecialchars($creature['avatar']) ?>" class="card-img-top" alt="Avatar de <?= htmlspecialchars($creature['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($creature['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($creature['description']) ?></p>
                            <a href="detallePrivado.php?id=<?= $creature['idCreature'] ?>" class="btn btn-secondary btn-sm">Más Info</a>
                            <a href="editarCriatura.php?id=<?= $creature['idCreature'] ?>" class="btn btn-success btn-sm">Editar</a>
                            <a href="eliminarCriatura.php?id=<?= $creature['idCreature'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta criatura?')">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
