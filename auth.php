<?php
session_start();

function checkAuthentication() {
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        header("Location: login.php");
        exit();
    }
}

function login($username, $password) {
    $hardcodedUser = 'admin';
    $hardcodedPass = 'password'; // Cambia esta contraseña

    if ($username === $hardcodedUser && $password === $hardcodedPass) {
        $_SESSION['authenticated'] = true;
        header("Location: private/index.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

function logout() {
    session_destroy();
    header("Location: login.php");
}
?>
