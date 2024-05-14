<?php 
require DATABASE;

class Home_model {


    public function getAllPosts() : array {
        global $pdo;

        $query = "SELECT posts.*, categories.name as category_name FROM posts JOIN categories ON posts.category_id = categories.id ORDER BY created_at DESC";

        try {
            $res = $pdo->prepare($query);
            $res->execute();
            $res->setFetchMode(PDO::FETCH_ASSOC);
            return $res->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }
}