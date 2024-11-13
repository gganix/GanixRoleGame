<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM creature WHERE id = ?");
$stmt->execute([$id]);
$creature = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $avatar = $_POST['avatar'];
    $attackPower = $_POST['attackPower'];
    $lifeLevel = $_POST['lifeLevel'];
    $weapon = $_POST['weapon'];

    $stmt = $pdo->prepare("UPDATE creature SET name = ?, description = ?, avatar = ?, attackPower = ?, lifeLevel = ?, weapon = ? WHERE id = ?");
    $stmt->execute([$name, $description, $avatar, $attackPower, $lifeLevel, $weapon, $id]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Criatura</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container my-5">
        <h3 class="text-center">Editar criatura</h3>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $creature['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $creature['description'] ?>" required>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="text" class="form-control" id="avatar" name="avatar" value="<?= $creature['avatar'] ?>" required>
            </div>
            <div class="form-group">
                <label for="attackPower">Attack Power</label>
                <input type="number" class="form-control" id="attackPower" name="attackPower" value="<?= $creature['attackPower'] ?>" required>
            </div>
            <div class="form-group">
                <label for="lifeLevel">Life Level</label>
                <input type="number" class="form-control" id="lifeLevel" name="lifeLevel" value="<?= $creature['lifeLevel'] ?>" required>
            </div>
            <div class="form-group">
                <label for="weapon">Weapon</label>
                <input type="text" class="form-control" id="weapon" name="weapon" value="<?= $creature['weapon'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

</body>
</html>
