<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $avatar = $_POST['avatar'];
    $attackPower = $_POST['attackPower'];
    $lifeLevel = $_POST['lifeLevel'];
    $weapon = $_POST['weapon'];

    $stmt = $pdo->prepare("INSERT INTO creature (name, description, avatar, attackPower, lifeLevel, weapon) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $avatar, $attackPower, $lifeLevel, $weapon]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Criatura</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container my-5">
            <h3 class="text-center">Crear criatura</h3>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="text" class="form-control" id="avatar" name="avatar" required>
                </div>
                <div class="form-group">
                    <label for="attackPower">Attack Power</label>
                    <input type="number" class="form-control" id="attackPower" name="attackPower" required>
                </div>
                <div class="form-group">
                    <label for="lifeLevel">Life Level</label>
                    <input type="number" class="form-control" id="lifeLevel" name="lifeLevel" required>
                </div>
                <div class="form-group">
                    <label for="weapon">Weapon</label>
                    <input type="text" class="form-control" id="weapon" name="weapon" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>

    </body>
</html>
