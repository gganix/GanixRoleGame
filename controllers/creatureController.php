<?php
require_once '../models/Creature.php';

class CreatureController {
    public static function getAllPublicCreatures() {
        return Creature::fetchAllPublic();
    }

    public static function getAllPrivateCreatures() {
        return Creature::fetchAllPrivate();
    }

    public static function createCreature($data) {
        Creature::create($data);
    }

    public static function updateCreature($id, $data) {
        Creature::update($id, $data);
    }

    public static function deleteCreature($id) {
        Creature::delete($id);
    }
}
?>
