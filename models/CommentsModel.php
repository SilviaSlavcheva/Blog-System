<?php

class CommentsModel extends BaseModel{
    public function getAll() {
        $statement = self::$db->query(
            "SELECT * FROM comments ORDER BY id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getCommentByPostId($id) {
        $statement = self::$db->prepare(
                "SELECT * FROM Comments WHERE post_id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function createComment($text) {
        if ($text == '') {
            return false;
        }
        var_dump($text);
        $statement = self::$db->prepare(
            "INSERT INTO comments (text) VALUES(?)");
        $statement->bind_param("s", $text);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function deleteComment($id) {
        $statement = self::$db->prepare(
            "DELETE FROM comments WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}
