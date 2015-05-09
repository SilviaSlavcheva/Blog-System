<?php

class TagsModel extends BaseModel{
    public function getAll() {
        $statement = self::$db->query(
            "SELECT * FROM tags ORDER BY id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    public function getPostByTagId($id) {
        //var_dump($id);
        $statement = self::$db->prepare(
                "SELECT * FROM posts JOIN posts_tags ON posts.id = posts_tags.posts_id "
                . "WHERE posts_tags.tags_id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
     public function createTag($name) {
        if ($name == '') {
            return false;
        }
        //var_dump($title);
        $statement = self::$db->prepare(
            "INSERT INTO tags (name) VALUES(?)");
        $statement->bind_param("s", $title);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}
