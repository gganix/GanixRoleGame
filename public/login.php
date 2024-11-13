<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'password') {
        $_SESSION['authenticated'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Heroes of Might and Magic</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>

    <body class="d-flex align-items-center justify-content-center vh-100 bg-light">
        <div class="card shadow-lg p-4" style="width: 20rem;">
            <h2 class="text-center mb-4">Login</h2>
            <form method="POST">
                <?php if (isset($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                } ?>
                <div class="mb-3">
                    <label class="form-label">Usuario:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>
        </div>
    </body>
</html>
