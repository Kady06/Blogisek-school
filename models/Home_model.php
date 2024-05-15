<?php
require DATABASE;

class Home_model
{


    public function getAllPosts(int $category_id = null): array
    {
        global $pdo;

        

        if ($category_id) {
            $query = "SELECT posts.*, categories.name as category_name FROM posts JOIN categories ON posts.category_id = categories.id WHERE category_id = :category_id ORDER BY created_at DESC";
        } else {
            $query = "SELECT posts.*, categories.name as category_name FROM posts JOIN categories ON posts.category_id = categories.id ORDER BY created_at DESC";
        }

        try {
            $res = $pdo->prepare($query);
            if ($category_id) {
                $res->bindParam(":category_id", $category_id);
            }
            $res->execute();
            $res->setFetchMode(PDO::FETCH_ASSOC);
            return $res->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function getSearchPost(string $search, int $category_id = null): array
    {
        global $pdo;

        $search = "%" . $search . "%";

        $query = "SELECT posts.*, categories.name as category_name 
                  FROM posts 
                  JOIN categories ON posts.category_id = categories.id 
                  WHERE title LIKE :searchOne OR content LIKE :searchTwo OR author LIKE :search3
                  ORDER BY created_at DESC";
        $values = array("searchOne" => $search, ":searchTwo" => $search, ":search3" => $search);

        

        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute($values);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage(); // Dočasné ladění
            return [];
        }
    }

    public function existsCategory(int $id) {
        global $pdo;

        $query = "SELECT * FROM categories WHERE id = :id";
        try {
            $res = $pdo->prepare($query);
            $res->bindParam(":id", $id);
            $res->execute();
            $res->setFetchMode(PDO::FETCH_ASSOC);
            return $res->rowCount() > 0;
        } catch (PDOException $e) {
            return [];
        }   
    }
}
