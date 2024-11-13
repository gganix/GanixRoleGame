<?php

require './assets/db/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM creature WHERE idCreature = ?");
$stmt->execute([$id]);

header('Location: index.php');
exit();
?>
