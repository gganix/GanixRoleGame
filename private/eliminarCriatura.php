<?php

session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit();
}

require '../assets/db/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM creature WHERE idCreature = ?");
$stmt->execute([$id]);

header('Location: ../public/index.php');
exit();
?>
