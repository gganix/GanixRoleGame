<?php
require_once '../assets/db/db.php';

class Creature {
    public static function fetchAllPublic() {
        global $pdo;
        $stmt = $pdo->query("SELECT name, avatar FROM creature");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetchAllPrivate() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM creature");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO creature (name, avatar, description) VALUES (?, ?, ?)");
        $stmt->execute([$data['name'], $data['avatar'], $data['description']]);
    }

    public static function update($id, $data) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE creature SET name = ?, avatar = ?, description = ? WHERE id = ?");
        $stmt->execute([$data['name'], $data['avatar'], $data['description'], $id]);
    }

    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM creature WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
