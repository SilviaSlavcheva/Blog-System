<?php

class UsersModel extends BaseModel{
   public function getAll() {
        $statement = self::$db->query(
            "SELECT * FROM users ORDER BY id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
}
