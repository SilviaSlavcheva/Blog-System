<?php

class PostsModel extends BaseModel{
      public function getAll() {
        $statement = self::$db->query(
            "SELECT * FROM posts ORDER BY id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    public function getPostByUserId($id) {
        //var_dump($id);
        $statement = self::$db->prepare(
                "SELECT * FROM posts WHERE user_id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    
    public function getUserIdByUsername($username) {
    
        $statement = self::$db->prepare(
                "SELECT id FROm users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    
    public function setVisitors($counter, $id) {
        $statement = self::$db->prepare(
                "UPDATE posts SET visitors = ? WHERE id = ?");
        $statement->bind_param("ii", $counter, $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
    
    public function getPostById($id) {
        $statement = self::$db->prepare(
                "SELECT * FROM posts WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    
    public function createPost($title) {
        if ($title == '') {
            return false;
        }
        var_dump($title);
        $statement = self::$db->prepare(
            "INSERT INTO posts (title) VALUES(?)");
        $statement->bind_param("s", $title);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function deletePost($id) {
        $statement = self::$db->prepare(
            "DELETE FROM posts WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
    
    public function getFilteredPosts($from, $size) {
        $statement = self::$db->prepare("SELECT id, title FROM posts LIMIT ?, ?");
        $statement->bind_param("ii", $from, $size);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        return $result;  
    } 

}
