<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM creature WHERE id = ?");
$stmt->execute([$id]);
$creature = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Criatura</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container my-5">
        <h3 class="text-center"><?= $creature['name'] ?></h3>
        <div class="row">
            <div class="col-md-3 font-weight-bold">Name</div>
            <div class="col-md-9"><?= $creature['name'] ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 font-weight-bold">Description</div>
            <div class="col-md-9"><?= $creature['description'] ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 font-weight-bold">Avatar</div>
            <div class="col-md-9">
                <img src="<?= $creature['avatar'] ?>" height="120" alt="Avatar de <?= $creature['name'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 font-weight-bold">Attack Power</div>
            <div class="col-md-9"><?= $creature['attackPower'] ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 font-weight-bold">Life Level</div>
            <div class="col-md-9"><?= $creature['lifeLevel'] ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 font-weight-bold">Weapon</div>
            <div class="col-md-9"><?= $creature['weapon'] ?></div>
        </div>
    </div>

</body>
</html>
