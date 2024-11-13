<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit();
}
require '../assets/db/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM creature WHERE idCreature = ?");
$stmt->execute([$id]);
$creature = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $avatar = $_POST['avatar'];
    $attackPower = $_POST['attackPower'];
    $lifeLevel = $_POST['lifeLevel'];
    $weapon = $_POST['weapon'];

    $stmt = $pdo->prepare("UPDATE creature SET name = ?, description = ?, avatar = ?, attackPower = ?, lifeLevel = ?, weapon = ? WHERE idCreature = ?");
    $stmt->execute([$name, $description, $avatar, $attackPower, $lifeLevel, $weapon, $id]);

    header('Location: ../public/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Criatura</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            <h3 class="text-center">Editar Criatura</h3>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($creature['name']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?= htmlspecialchars($creature['description']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input type="text" class="form-control" id="avatar" name="avatar" value="<?= htmlspecialchars($creature['avatar']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="attackPower" class="form-label">Attack Power</label>
                    <input type="number" class="form-control" id="attackPower" name="attackPower" value="<?= htmlspecialchars($creature['attackPower']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="lifeLevel" class="form-label">Life Level</label>
                    <input type="number" class="form-control" id="lifeLevel" name="lifeLevel" value="<?= htmlspecialchars($creature['lifeLevel']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="weapon" class="form-label">Weapon</label>
                    <input type="text" class="form-control" id="weapon" name="weapon" value="<?= htmlspecialchars($creature['weapon']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Edit</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
