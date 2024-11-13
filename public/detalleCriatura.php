<?php
session_start();
require '../assets/db/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM creature WHERE idCreature = ?");
$stmt->execute([$id]);
$creature = $stmt->fetch(PDO::FETCH_ASSOC);

$authenticated = isset($_SESSION['authenticated']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Criatura - Heroes of Might and Magic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="../assets/img/logo.jpg" height="60" alt="Heroes logo"> Heroes of Might and Magic
        </a>
        <?php if ($authenticated): ?>
            <a class="btn btn-secondary" href="crearCriatura.php">Crear una criatura</a>
            <a class="btn btn-danger" href="logout.php">Cerrar sesión</a>
        <?php else: ?>
            <a class="btn btn-primary" href="login.php">Login</a>
        <?php endif; ?>
    </nav>

    <div class="container my-5">
        <h3 class="text-center">Detalles de la Criatura</h3>
        <div class="card shadow-lg p-4">
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Name</div>
                <div class="col-md-9"><?= htmlspecialchars($creature['name']) ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Description</div>
                <div class="col-md-9"><?= htmlspecialchars($creature['description']) ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Avatar</div>
                <div class="col-md-9">
                    <img src="<?= htmlspecialchars($creature['avatar']) ?>" height="120" class="img-fluid rounded" alt="Avatar de <?= htmlspecialchars($creature['name']) ?>">
                </div>
            </div>
            <?php if ($authenticated): ?>
                <div class="row mb-3">
                    <div class="col-md-3 font-weight-bold">Attack Power</div>
                    <div class="col-md-9"><?= htmlspecialchars($creature['attackPower']) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 font-weight-bold">Life Level</div>
                    <div class="col-md-9"><?= htmlspecialchars($creature['lifeLevel']) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 font-weight-bold">Weapon</div>
                    <div class="col-md-9"><?= htmlspecialchars($creature['weapon']) ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
