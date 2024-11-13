<?php
require './assets/db/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM creature WHERE idCreature = ?");
$stmt->execute([$id]);
$creature = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles de la Criatura</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
                <img src="./assets/img/logo.jpg" height="60" alt="Heroes logo"> Heroes of Might and Magic
            </a>
            <a class="btn btn-secondary" href="crearCriatura.php">Crear una criatura</a>
        </nav>
        
        <div class="container my-5">
            <h3 class="text-center">DETALLES DE LA CRIATURA</h3>
            <div class="card shadow-lg p-4">
                <div class="row">
                    <div class="col-md-3 font-weight-bold">Name</div>
                    <div class="col-md-9"><?= htmlspecialchars($creature['name']) ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 font-weight-bold">Description</div>
                    <div class="col-md-9"><?= htmlspecialchars($creature['description']) ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 font-weight-bold">Avatar</div>
                    <div class="col-md-9">
                        <img src="<?= htmlspecialchars($creature['avatar']) ?>" class="img-fluid rounded" height="120" alt="Avatar de <?= htmlspecialchars($creature['name']) ?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 font-weight-bold">Attack Power</div>
                    <div class="col-md-9"><?= htmlspecialchars($creature['attackPower']) ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 font-weight-bold">Life Level</div>
                    <div class="col-md-9"><?= htmlspecialchars($creature['lifeLevel']) ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 font-weight-bold">Weapon</div>
                    <div class="col-md-9"><?= htmlspecialchars($creature['weapon']) ?></div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
