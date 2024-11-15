<?php
session_start();
require '../assets/db/db.php';

$stmt = $pdo->query("SELECT * FROM creature");
$creatures = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Determina si el usuario ha iniciado sesión
$authenticated = isset($_SESSION['authenticated']);
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

    <!-- Nav -->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="../assets/img/logo.jpg" height="60" alt="Heroes logo"> Heroes of Might and Magic
        </a>
        <?php if ($authenticated): ?>
            <a class="btn btn-secondary" href="../private/crearCriatura.php">Crear una criatura</a>
            <a class="btn btn-danger" href="logout.php">Cerrar sesión</a>
        <?php else: ?>
            <a class="btn btn-primary" href="login.php">Login</a>
        <?php endif; ?>
    </nav>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <img src="../assets/img/Heroes_banner.jpg" class="img-fluid" alt="Heroes V Banner">
            </div>
            <div class="col-md-4 text-center">
                <h3>Comunidad de usuarios de Heroes</h3>
                <p>La aventura comienza aquí, en tu navegador</p>
                <a href="#" class="btn btn-primary btn-lg">Juega ahora!</a>
            </div>
        </div>

        <!-- Cards de criaturas -->
        <div class="row mt-4">
            <?php foreach ($creatures as $creature): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?= htmlspecialchars($creature['avatar']) ?>" class="card-img-top" alt="Avatar de <?= htmlspecialchars($creature['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($creature['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($creature['description']) ?></p>
                            <a href="detalleCriatura.php?id=<?= $creature['idCreature'] ?>" class="btn btn-secondary btn-sm">More Info</a>
                            <?php if ($authenticated): ?>
                                <a href="../private/editarCriatura.php?id=<?= $creature['idCreature'] ?>" class="btn btn-success btn-sm">Modificar</a>
                                <a href="../private/eliminarCriatura.php?id=<?= $creature['idCreature'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta criatura?')">Exterminar</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
